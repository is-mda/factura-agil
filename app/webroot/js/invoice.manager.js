var InvoiceManager = function() {
    
    'use strict';
    
    var Api = {};
    
    var _nLines = 1;
    
    var _config = {
        tableSelector: '#invoice_lines',
        fieldNamePattern: 'data[{model}][{n}][{field}]'
    };
    
    var _cloneInvoiceLine = function() {
        return $(_config.tableSelector).find('tbody tr:last').clone();
    };
    
    var _replaceMetadata = function(field) {
        return _config.fieldNamePattern
                .replace('{n}', _nLines)            
                .replace('{model}', field.split('.')[0])
                .replace('{field}', field.split('.')[1]); 
    };
    
    var _setCorrectFieldNames = function(newLine) {
        newLine.find('input').each(function(i, input) {
            $(input).attr('name', _replaceMetadata($(input).data('field')));
        });
        return newLine;
    };
    
    Api.addInvoiceLine = function() {
        // 3. aumentar _n
        // 1. clonar la ultima linea
        // 2. corregir los nombres de campos y eliminar ids
        _nLines++;
        _setCorrectFieldNames(_cloneInvoiceLine());
        
    };

    return Api;
    
}();
