$(function () {
    /**
     * Manejo de la impresora
     */

    // stores loaded label and printer info
    var colores = [],
        label = null,
        printers = null,
        hasFramework = true,
        showPreview = false,
        selectedNameId = null,
        selectedSizeId = null,
        name = null,
        previousName = null,
        previousSelectedSizeId = null,
        garanty = null,
        previousGaranty = null,
        updatedInfo = false,
        labelForm = $('#label-form'),
        inputTamaño = $('#LabelTamaño'),
        inputColor = $('#LabelName'),
        inputGaranty = $('#LabelTandaBase'),
        linkActualizarVP = $('.update-preview');

    linkActualizarVP.click(function() {
        if(inputColor.val().length == 0) {
            alert('Seleccione un color para generar la vista previa');
        }
    });

    labelForm.submit(function (e) {
        e.preventDefault();
        printLabel();
        return false;
    });

    inputTamaño.change(function() {
        verificarTamaño();
        verifyIfUpdated();
    });

    inputColor.autocomplete({
        close: function( event, ui ) {
            verificarColor();
            verifyIfUpdated();
        }
    });

    inputGaranty.blur(function() {
        verificarGaranty();
        verifyIfUpdated();
    });

    inputGaranty.on('input', function() {
        verificarGaranty();
        verifyIfUpdated();
    });

    cargarColores();
    verificarImpresora();
    verificarColor();
    verificarTamaño();
    verificarGaranty();
    loadLabel();
    verifyIfUpdated();

    function verifyIfUpdated() {
        if(updatedInfo) {
            getSelectedColor();
            loadPreview();
            updatedInfo = false;
        }
    }

    function verificarGaranty() {
        garanty = inputGaranty.val();
        if(garanty != previousGaranty) {
            updatedInfo = true;
            previousGaranty = garanty;
        }
    }

    function verificarColor() {
        name = inputColor.val();
        if(name != previousName) {
            updatedInfo = true;
            previousName = name;
        }
    }

    function verificarTamaño() {
        getSelectedSize();
        if(selectedSizeId != previousSelectedSizeId) {
            updatedInfo = true;
            previousSelectedSizeId = selectedSizeId;
        }
    }

    function cargarColores() {
        var response = $.ajax({
            'url': '/names/getOptions/1',
            'type': 'post',
            'dataType': 'json',
            'async': false,
            'cache': false
        });
        response = $.parseJSON(response.responseText);
        $.each(response, function(id, name) {
            colores.push(name);
        });
        inputColor.autocomplete({
            source: colores
        });
    }

    function loadLabel() {
        var response = $.ajax({
            'url': '/labels/getLabelFileXMLContent',
            'type': 'post',
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
            } else {
                try {
                    var printerSelect = $('#LabelImpresora');
                    printerSelect.empty();
                    for (var i = 0; i < printers.length; i++) {
                        printerSelect.append('<option value="' + printers[i].name + '">' + printers[i].name + '</option>');
                    }
                } catch (e2) {
                    alert(e2.message);
                }
            }
        } catch (e1) {
            hasFramework = false;
            alert('No tiene el framework de DYMO instalado.');
        }
    }

    /**
     * Manejo de la sección de vista previa
     */

    function getSelectedSize() {
        selectedSizeId = inputTamaño.val();
    }

    function getSelectedColor() {
        var response = $.ajax({
            'url': '/names/getNameID',
            'type': 'post',
            'cache': false,
            'async': false,
            'dataType': 'json',
            'data': {
                'name': name
            }
        });
        response = $.parseJSON(response.responseText);
        if(response.success) {
            showPreview = true;
            selectedNameId = response.name_id;
        } else {
            showPreview = false;
            selectedNameId = null;
        }
    }

    /**
     * Generates label preview and updates corresponend <img> element
     * Note: this does not work in IE 6 & 7 because they don't support data urls
     * if you want previews in IE 6 & 7 you have to do it on the server side
     */
    function updatePreview() {
        if (label) {
            var pngData = {};

            if (hasFramework) {
                try {
                    pngData = label.render();
                    $('#label-preview-image').attr('src', "data:image/png;base64," + pngData);
                } catch (e) {
                    hasFramework = false;
                    alert('No tiene el framework de DYMO instalado.');
                }
            }
        }
    }

    function loadPreview() {
        if(showPreview) {
            try {
                var response = $.ajax({
                    'url': '/labels/getPreviewAjax/' + selectedNameId + '/' + selectedSizeId,
                    'type': 'post',
                    'cache': false,
                    'async': false,
                    'dataType': 'json'
                });
                response = $.parseJSON(response.responseText);
                try {
                    if (response.success) {

                        label.setObjectText('Name', response.barcode.Name.name);
                        label.setObjectText('ID_Name', response.barcode.Name.code);
                        label.setObjectText('Name_Amount', response.barcode.Size.amount);
                        label.setObjectText('Barcode', response.barcode.Barcode.barcode);
                        label.setObjectText('Garanty', inputGaranty.val().trim());

                        $('#label-preview-image').css('display', 'block');
                        $('input[type=submit]').removeAttr('disabled');

                        $('.preview').load('/labels/getPreview/' + selectedNameId + '/' + selectedSizeId);
                        updatePreview();

                    } else {
                        $('#label-preview-image').css('display', 'none');
                        $('input[type=submit]').attr('disabled', 'disabled');
                    }
                } catch (e2) {
                    hasFramework = false;
                    $('#label-preview-image').css('display', 'none');
                    $('input[type=submit]').attr('disabled', 'disabled');
                    alert('No tiene el framework de DYMO instalado.');
                }
            } catch (e1) {
            }
        }
    }

    function printLabel() {
        if (hasFramework) {
            if (inputGaranty.val().trim().length == 0) {
                alert('No has ingresado un valor para "Tanda Base"');
            } else {
                inputGaranty.val(inputGaranty.val().trim());
                if (confirm('¿Imprimir esta etiqueta?')) {
                    var response = $.ajax({
                        'type': 'post',
                        'dataType': 'json',
                        'data': {
                            'name_id': selectedNameId,
                            'size_id': selectedSizeId,
                            'tanda_base': inputGaranty.val()
                        },
                        'async': false,
                        'cache': false,
                        'url': '/logs/addLog'
                    });
                    response = $.parseJSON(response.responseText);
                    if (response.success) {
                        label.print($('#LabelImpresora').val());
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