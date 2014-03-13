App.InvoiceLineModel = function() {

    'use strict';

    var _line = null;

    var _fields = {
        quantity: 'InvoiceLine.item_quantity',
        price: 'InvoiceLine.item_price',
        amount: 'InvoiceLine.amount'
    };

    var Api = {};

    var _getQuantity = function() {
        return parseInt($(_line).find('input[data-field="' + _fields.quantity + '"]').val());
    };

    var _getPrice = function() {
        return parseFloat($(_line).find('input[data-field="' + _fields.price + '"]').val());
    };

    var _getAmount = function() {
        return parseFloat($(_line).find('input[data-field="' + _fields.amount + '"]').val());
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
            $(_line).find('input[data-field="' + _fields.amount + '"]').val(amount);
            return amount;
        }
        catch (e) {
            $(_line).find('input[data-field="' + _fields.amount + '"]').val('');
            return NaN;
        }
    };

    Api.evaluate = function(line) {
        _line = line;
        return _updateAmount();
    };
    
    Api.getAmount = function(line) {
        _line = line;
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
