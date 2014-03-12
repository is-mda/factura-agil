App.InvoiceManager = function() {

    'use strict';

    var _nextLineNumber = 0;

    var _config = {
        tableSelector: '#invoice_lines',
        fieldNamePattern: 'data[{model}][{n}][{field}]'
    };

    var _replaceMetadata = function(field) {
        return _config.fieldNamePattern
                .replace('{n}', _getNextLineNumber())
                .replace('{model}', field.split('.')[0])
                .replace('{field}', field.split('.')[1]);
    };

    var _updateNextLineNumber = function() {
        if (_nextLineNumber === 0)
            _nextLineNumber = _getNumLines();
        else
            _nextLineNumber++;
    };

    var _getNextLineNumber = function() {
        return _nextLineNumber;
    };

    var _getNumLines = function() {
        return $(_config.tableSelector).find('tbody tr').length;
    };

    var _cloneLine = function() {
        return $(_config.tableSelector).find('tbody tr:last').clone();
    };

    var _parseLine = function(newLine) {
        newLine.find('input').each(function(i, input) {
            $(input).attr('name', _replaceMetadata($(input).data('field'))).attr('id', '').val('');
        });
        return newLine;
    };

    var _appendLine = function(newLine) {
        $(_config.tableSelector).find('tbody').append(newLine);
    };

    var _removeLine = function(node) {
        if (_getNumLines() > 1) $(node).closest('tr').remove();
    };

    var addLine = function(evt) {
        evt.preventDefault();
        _updateNextLineNumber();
        _appendLine(_parseLine(_cloneLine()));
    };

    var removeLine = function(evt) {
        evt.preventDefault();
        _removeLine(evt.target);
    };

    var init = function() {
        $('.add-line').click(addLine);
        $('.remove-line').click(removeLine);
    };

    App.addInitializer(init());

}();
