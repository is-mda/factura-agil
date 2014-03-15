App.InvoiceModel = function() {

    'use strict';

    var _fields = {
        grossAmount: 'Invoice.gross_amount',
        netAmount: 'Invoice.net_amount',
        taxRate: 'Invoice.tax_rate',
        taxAmount: 'Invoice.tax_amount'
    };
    
    var _setElement = function() {
        App.Model.setElement('body');
    };

    var _setGrossAmount = function(value) {
        App.Model.setFieldValue(_fields.grossAmount, value);
    };

    var _setNetAmount = function(value) {
        App.Model.setFieldValue(_fields.netAmount, value);
    };

    var _setTaxAmount = function(value) {
        App.Model.setFieldValue(_fields.taxAmount, value);
    };

    var _getTaxRate = function() {
        return App.Model.getFieldIntValue(_fields.taxRate);
    };    
    
    var _emptyValues = function() {
        App.Model.emptyField(_fields.grossAmount);
        App.Model.emptyField(_fields.netAmount);
        App.Model.emptyField(_fields.taxAmount);
    };
    
    var _update = function(grossAmount) {        
        var taxAmount = grossAmount * (_getTaxRate()/100);
        _setGrossAmount(grossAmount);
        _setTaxAmount(taxAmount);
        _setNetAmount(grossAmount + taxAmount);
    };
    
    var Api = {};
    
    Api.update = function(grossAmount) {
        _setElement();
        isNaN(grossAmount) ? _emptyValues() : _update(grossAmount);
    };
    
    return Api;
    
}();
