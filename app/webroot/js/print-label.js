$(function() {
    function getSelectedSize() {
        return $('#LabelTamaño').val();
    }
    function getSelectedColor() {
        return $('#LabelPintura').val();
    }
    function loadPreview() {
        $('.preview').load('/labels/getPreview/' + getSelectedColor() + '/' + getSelectedSize());
    }
    loadPreview();
    $('#LabelPintura').change(function() {
        loadPreview();
    });
    $('#LabelTamaño').change(function() {
        loadPreview();
    });
});