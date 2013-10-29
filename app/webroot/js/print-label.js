$(function () {

    /**
     * Manejo de la impresora
     */

    // stores loaded label and printer info
    var label = {}, printers = {}, hasFramework = true;

    verificarImpresora();
    loadLabel();

    function loadLabel() {
        var response = $.ajax({
            'url': '/labels/getLabelFileXMLContent',
            'cache': false,
            'async': false,
            'dataType': 'xml'
        });

        try {
            label = dymo.label.framework.openLabelXml(response.responseText);
        } catch (e) {
            hasFramework = false;
            alert('No tiene el framework de DYMO instalado.');
        }

    }

    function verificarImpresora() {
        try {
            printers = dymo.label.framework.getPrinters();
            if (printers.length == 0) {
                alert("No se detecta una impresora DYMO en su equipo.");
            }
        } catch (e) {
            hasFramework = false;
            alert('No tiene el framework de DYMO instalado.');
        }
    }

    /**
     * Manejo de la sección de vista previa
     */

    loadPreview();

    function getSelectedSize() {
        return $('#LabelTamaño').val();
    }

    function getSelectedColor() {
        return $('#LabelPintura').val();
    }

    /**
     * Generates label preview and updates corresponend <img> element
     * Note: this does not work in IE 6 & 7 because they don't support data urls
     * if you want previews in IE 6 & 7 you have to do it on the server side
     */
    function updatePreview() {
        if (!label) return;

        var pngData = {};

        if(hasFramework) {
            try {
                pngData = label.render();
                $('#label-preview-image').attr('src', "data:image/png;base64," + pngData);
            } catch (e) {
                hasFramework = false;
                alert('No tiene el framework de DYMO instalado.');
            }
        }

    }

    function loadPreview() {
        var response = $.ajax({
            'url': '/labels/getPreviewAjax/' + getSelectedColor() + '/' + getSelectedSize(),
            'cache': false,
            'async': false,
            'dataType': 'json'
        });
        response = $.parseJSON(response.responseText);
        $('.preview').load('/labels/getPreview/' + getSelectedColor() + '/' + getSelectedSize());
        try {
            if(response.success) {
                $('#label-preview-image').css('display', 'block');
                label.setObjectText('Name', response.barcode.Name.name);
                label.setObjectText('ID_Name', response.barcode.Name.code);
                label.setObjectText('Name_Amount', response.barcode.Size.amount);
                label.setObjectText('Barcode', response.barcode.Barcode.barcode);
                label.setObjectText('Garanty', $('#LabelTandaBase').val().trim());
                $('input[type=submit]').removeAttr('disabled');
            } else {
                $('#label-preview-image').css('display', 'none');
                $('input[type=submit]').attr('disabled', 'disabled');
            }
        } catch (e) {
            hasFramework = false;
            $('#label-preview-image').css('display', 'none');
            $('input[type=submit]').attr('disabled', 'disabled');
            alert('No tiene el framework de DYMO instalado.');
        }
        updatePreview();
    }

    $('#LabelPintura').change(function () {
        loadPreview();
    });

    $('#LabelTamaño').change(function () {
        loadPreview();
    });

    setInterval(function() { checkTextValue(); }, 250);

    function checkTextValue() {
        label.setObjectText('Garanty', $('#LabelTandaBase').val());
        updatePreview();
    }

    $('#label-form').submit(function(e) {
        e.preventDefault();
        printLabel();
        return false;
    });

    function printLabel() {
        if(hasFramework) {
            var inputTandaBase = $('#LabelTandaBase');
            if(inputTandaBase.val().trim().length == 0) {
                alert('No has ingresado un valor para "Tanda Base"');
            } else {
                inputTandaBase.val(inputTandaBase.val().trim());
                if(confirm('¿Imprimir esta etiqueta?')) {
                    var response = $.ajax({
                        'type': 'post',
                        'dataType': 'json',
                        'data': {
                            'name_id': getSelectedColor(),
                            'size_id': getSelectedSize(),
                            'tanda_base': inputTandaBase.val()
                        },
                        'async': false,
                        'cache': false,
                        'url': '/logs/addLog'
                    });
                    response = $.parseJSON(response.responseText);
                    if(response.success) {
                        label.print(printers[0].name);
                    } else {
                        alert('Error al tratar de crear el registro de impresión.')
                    }
                } else {
                    // TODO: ¿Alguna acción aquí?
                }
            }
        } else {
            alert('No tiene el framework de DYMO instalado.');
        }
    }

});