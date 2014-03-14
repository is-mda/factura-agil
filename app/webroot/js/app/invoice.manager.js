App.InvoiceManager = function() {

    'use strict';
    
    var _config = {
        linesSelector: '#invoice-lines'
    };
    
    var _onInvoiceLinesChange = function(evt, grossAmount) {
        App.InvoiceModel.update(grossAmount);
    };

    var init = function() {
        $(_config.linesSelector).on('invoice_lines:change', _onInvoiceLinesChange);
    };

    App.addInitializer(init());

}();