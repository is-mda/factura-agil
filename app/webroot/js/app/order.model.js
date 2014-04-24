App.OrderModel = function() {

    'use strict';

    var _fields = {
        grossAmount: 'Order.gross_amount'
    };
    
    var _setElement = function() {
        App.Model.setElement('body');
    };

    var _setGrossAmount = function(value) {
        App.Model.setFieldValue(_fields.grossAmount, value);
    };

    var _emptyValues = function() {
        App.Model.emptyField(_fields.grossAmount);
    };
    
    var _update = function(grossAmount) {        
        _setGrossAmount(grossAmount);
    };
    
    var Api = {};
    
    Api.update = function(grossAmount) {
        _setElement();
        isNaN(grossAmount) ? _emptyValues() : _update(grossAmount);
    };
    
    var init = function() {
        App.DocumentModel = App.OrderModel;
    };

    App.addInitializer(init);    
    
    return Api;
    
}();
