App.DocumentItemModel = function() {

    'use strict';

    var _fields = {
        code: 'Document.DocumentItem.code',
        name: 'Document.DocumentItem.name',
        quantity: 'Document.DocumentItem.quantity',
        price: 'Document.DocumentItem.price',
        amount: 'Document.DocumentItem.amount'
    };

    var Api = {};

    var _setElement = function(el) {
        App.Model.setElement(el);
    };

    var _getCode = function() {
        return App.Model.getFieldValue(_fields.code);
    };

    var _setCode = function(code) {
        App.Model.setFieldValue(_fields.code, code);
    };

    var _setName = function(name) {
        App.Model.setFieldValue(_fields.name, name);
    };

    var _getQuantity = function() {
        return App.Model.getFieldIntValue(_fields.quantity);
    };

    var _setQuantity = function(quantity) {
        App.Model.setFieldValue(_fields.quantity, quantity);
    };

    var _getPrice = function() {
        return App.Model.getFieldFloatValue(_fields.price);
    };

    var _setPrice = function(price) {
        App.Model.setFieldValue(_fields.price, price);
    };

    var _getAmount = function() {
        return App.Model.getFieldFloatValue(_fields.amount);
    };

    var _evaluateAmount = function() {
        var quantity = _getQuantity();
        if (isNaN(quantity)) throw 'Invalid quantity';
        var price = _getPrice();
        if (isNaN(price)) throw 'Invalid price';
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
    
    Api.getCode = function(line) {
        _setElement(line);
        return _getCode();
    };
    
    Api.getAmount = function(line) {
        _setElement(line);
        return _getAmount();
    };

    Api.addOneToQuantity = function(line) {
        _setElement(line);
        _setQuantity(_getQuantity() + 1);
    };

    Api.setData = function(line, data) {
        _setElement(line);
        _setCode(data.code);
        _setName(data.name);
        _setPrice(data.price);
        _setQuantity(data.quantity ? data.quantity : 1);
    };

    Api.evaluateAll = function(lines) {
        var grossAmount = 0;
        $(lines).each(function(i, line) {
            if(isNaN(grossAmount)) return;
            var amount = App.DocumentItemModel.getAmount(line);
            if(isNaN(amount)) grossAmount = NaN;
            else grossAmount += amount;
        });
        return grossAmount;
    };

    return Api;

}();
