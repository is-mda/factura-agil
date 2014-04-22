App.InvoiceManager = function() {

    'use strict';
    
    var _config = {
        linesSelector: '#document-items',
        barcodeInput: '#barcode'
    };
    
    var _onDocumentItemsChange = function(evt, grossAmount) {
        App.InvoiceModel.update(grossAmount);
        App.CommonManager.parseCurrency();
    };

    var init = function() {
        $(_config.linesSelector).on('document_items:change', _onDocumentItemsChange);
        App.CommonManager.parseCurrency();
        $(_config.barcodeInput).focus();
    };

    App.addInitializer(init);

}();