App.InvoiceManager = function() {

    'use strict';
    
    var _config = {
        linesSelector: '#invoice-lines'
    };
    
    var _onInvoiceLinesChange = function(evt, grossAmount) {
        App.InvoiceModel.update(grossAmount);
        App.CommonManager.parseCurrency();
    };

    var init = function() {
        $(_config.linesSelector).on('invoice_lines:change', _onInvoiceLinesChange);
        App.CommonManager.parseCurrency();
    };

    App.addInitializer(init);

}();