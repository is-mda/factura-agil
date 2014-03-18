App.InvoiceLinesManager = function() {

    'use strict';

    var _nextLineNumber = 0;

    var _config = {
        tableSelector: '#invoice-lines',
        fieldNamePattern: 'data[{model}][{n}][{field}]',
        addLineButtonSelector: '.add-line',
        removeLinesButtonSelector: '.remove-lines'
    };
    
    var _replaceMetadata = function(field) {
        return _config.fieldNamePattern
                .replace('{n}', _getNextLineNumber())
                .replace('{model}', field.split('.')[0])
                .replace('{field}', field.split('.')[1]);
    };

    var _updateNextLineNumber = function() {
        if (_nextLineNumber === 0) _nextLineNumber = _getNumLines();
        else _nextLineNumber++;
    };

    var _getNextLineNumber = function() {
        return _nextLineNumber;
    };

    var _getLines = function() {
        return $(_config.tableSelector).find('tbody tr');
    };
    
    var _getNumLines = function() {
        return _getLines().length;
    };

    var _cloneLine = function() {
        return $(_config.tableSelector).find('tbody tr:last').clone();
    };

    var _parseLine = function(newLine) {
        newLine.find('td').not('.check').find('input').each(function(i, input) {
            $(input).attr('name', _replaceMetadata($(input).data('field'))).attr('id', '').val('');
        });
        return newLine;
    };

    var _appendLine = function(newLine) {
        $(_config.tableSelector).find('tbody').append(newLine);
    };

    var _getSelectedLines = function() {
        return $(_config.tableSelector).find('tbody input[type=checkbox]:checked').closest('tr');
    };

    var _allLinesSelected = function() {
        return _getSelectedLines().length === _getNumLines();
    };
    
    var _someLinesSelected = function() {
        return _getSelectedLines().length > 0 && _getSelectedLines().length < _getNumLines();
    };

    var _removeSelectedLines = function() {
        if(!_allLinesSelected()) {
            _getSelectedLines().remove();
            _checkRemoveButtonStatus();
            _lineChange();
        }
    };

    var _checkRemoveButtonStatus = function() {
        if(_someLinesSelected()) $(_config.removeLinesButtonSelector).removeClass('disabled');
        else $(_config.removeLinesButtonSelector).addClass('disabled');
    };

    var addLine = function(evt) {
        evt.preventDefault();
        _updateNextLineNumber();
        _appendLine(_parseLine(_cloneLine()));
    };

    var removeSelectedLines = function(evt) {
        evt.preventDefault();
        _removeSelectedLines();
    };
    
    var _lineChange = function() {
        $(_config.tableSelector).trigger('invoice_lines:change', [App.InvoiceLineModel.evaluateAll(_getLines())]);
    };
    
    var _evaluateLine = function(evt) {
        App.InvoiceLineModel.evaluate($(evt.target).closest('tr'));
        _lineChange();
    };
    
    var init = function() {
        $(_config.addLineButtonSelector).click(addLine);
        $(_config.removeLinesButtonSelector).click(removeSelectedLines);
        $(_config.tableSelector).on('click', 'input[type=checkbox]', _checkRemoveButtonStatus);
        $(_config.tableSelector).on('change', 'input[data-evaluable=1]', _evaluateLine);
    };

    App.addInitializer(init);

}();