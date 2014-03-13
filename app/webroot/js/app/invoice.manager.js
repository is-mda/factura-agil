App.InvoiceManager = function() {

    'use strict';
    
    var _config = {
        formSelector: '#invoice',
        linesSelector: '#invoice-lines'
    };
    
    var _onInvoiceLinesChange = function(evt, grossAmount) {
        App.InvoiceModel.update($(_config.formSelector), grossAmount);
    };

    var init = function() {
        $(_config.linesSelector).on('invoice_lines:change', _onInvoiceLinesChange);
    };

    App.addInitializer(init());

}();