App.DocumentItemsManager = function() {

    'use strict';

    var _nextLineNumber = 0;

    var Api = {};

    var _config = {
        tableSelector: '#document-items',
        addLineButtonSelector: '.add-line',
        removeLinesButtonSelector: '.remove-lines'
    };
    
    var _brackets = function(element) {
        return '[' + element + ']';
    };
    
    var _generateInputName = function(field) {
        var fieldNameParts = field.split('.');
        return 'data' + $.map(fieldNameParts, function(el, index) {
            return ((index === fieldNameParts.length - 1) ? _brackets(_getNextLineNumber()) : '') + _brackets(el);
        }).join('');
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
            $(input).attr('name', _generateInputName($(input).data('field'))).attr('id', '').val('');
        });
        newLine.find('input[data-no-clone=1]').remove();
        return newLine;
    };

    var _appendLine = function(newLine) {
        $(_config.tableSelector).find('tbody').append(newLine);
        return newLine;
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

    var _lineChange = function() {
        $(_config.tableSelector).trigger('document_items:change', [App.DocumentItemModel.evaluateAll(_getLines())]);
    };
    
    var _evaluateLine = function(line) {
        App.DocumentItemModel.evaluate(line);
        _lineChange();
    };
    
    var _addLine = function() {
        _updateNextLineNumber();
        return _appendLine(_parseLine(_cloneLine()));
    };
    
    var _searchEmptyLine = function() {
        var empty = _getLines().filter(function(index, line) {
            return App.DocumentItemModel.isEmpty(line);
        });
        return empty.length ? empty.first() : null;
    };
    
    var onDocumentInitialized = function() {
        if(!_searchEmptyLine()) _lineChange();
    };
    
    var onAddLine = function(evt) {
        evt.preventDefault();
        _addLine();
    };
    
    var onEvaluableInputChange = function(evt) {
        _evaluateLine($(evt.target).closest('tr'));
    };

    var removeSelectedLines = function(evt) {
        evt.preventDefault();
        _removeSelectedLines();
    };
    
    Api.addLine = function(data) {
        var line = _searchEmptyLine() || _addLine();
        App.DocumentItemModel.setData(line, data);
        _evaluateLine(line);
    };
    
    Api.addOneToLineQuantity = function(line) {
        App.DocumentItemModel.addOneToQuantity(line);
        _evaluateLine(line);
    };
    
    Api.searchLine = function(code) {
        var targetLine = $.grep(_getLines(), function(line) {
            return App.DocumentItemModel.getCode(line) === code;
        });
        return targetLine.length ? targetLine[0] : null;
    };
    
    
    var init = function() {
        $(_config.addLineButtonSelector).click(onAddLine);
        $(_config.removeLinesButtonSelector).click(removeSelectedLines);
        $(_config.tableSelector).on('click', 'input[type=checkbox]', _checkRemoveButtonStatus);
        $(_config.tableSelector).on('change', 'input[data-evaluable=1]', onEvaluableInputChange);
        $('body').on('document:initialized', onDocumentInitialized);
    };

    App.addInitializer(init);
    
    return Api;

}();