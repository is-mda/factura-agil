App.InvoiceLineModel = function() {

    'use strict';

    var _fields = {
        quantity: 'InvoiceLine.item_quantity',
        price: 'InvoiceLine.item_price',
        amount: 'InvoiceLine.amount'
    };

    var Api = {};

    var _setElement = function(el) {
        App.Model.setElement(el);
    };

    var _getQuantity = function() {
        return App.Model.getFieldValue(_fields.quantity);
    };

    var _getPrice = function() {
        return App.Model.getFieldValue(_fields.price);
    };

    var _getAmount = function() {
        return App.Model.getFieldValue(_fields.amount);
    };

    var _evaluateAmount = function() {
        var quantity = _getQuantity();
        if (isNaN(quantity))
            throw 'Invalid quantity';
        var price = _getPrice();
        if (isNaN(price))
            throw 'Invalid price';
        return quantity * price;
    };

    var _updateAmount = function() {        
        try {
            var amount = _evaluateAmount();
            App.Model.setFieldValue(_fields.amount, amount);
            return amount;
        }
        catch (e) {
            App.Model.emptyField(_fields.amount);
            return NaN;
        }
    };

    Api.evaluate = function(line) {
        _setElement(line);
        return _updateAmount();
    };
    
    Api.getAmount = function(line) {
        _setElement(line);
        return _getAmount();
    };

    Api.evaluateAll = function(lines) {
        var grossAmount = 0;
        $(lines).each(function(i, line) {
            if(isNaN(grossAmount)) return;
            var amount = App.InvoiceLineModel.getAmount(line);
            if(isNaN(amount)) grossAmount = NaN;
            else grossAmount += amount;
        });
        return grossAmount;
    };

    return Api;

}();
