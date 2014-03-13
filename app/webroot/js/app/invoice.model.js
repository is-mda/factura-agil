App.InvoiceModel = function() {

    'use strict';

    var _invoice = null;
    
    var _fields = {
        grossAmount: 'Invoice.gross_amount',
        netAmount: 'Invoice.net_amount',
        taxRate: 'Invoice.tax_rate',
        taxAmount: 'Invoice.tax_amount'
    };  
    
    var _update = function(grossAmount) {
        
    };
    
    var Api = {};
    
    Api.update = function(invoice, grossAmount) {
        _invoice = invoice;
        _update(grossAmount ? grossAmount : null);
    };
    
    return Api;
    
}();
