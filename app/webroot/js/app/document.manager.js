App.DocumentManager = function() {

    'use strict';
    
    var _config = {
        linesSelector: '#document-items'
    };
    
    var _onDocumentItemsChange = function(evt, grossAmount) {
        if(App.DocumentModel) {
            App.DocumentModel.update(grossAmount);
            App.CommonManager.parseCurrency();
        }
    };

    var init = function() {
        $(_config.linesSelector).on('document_items:change', _onDocumentItemsChange);
        App.CommonManager.parseCurrency();
    };

    App.addInitializer(init);

}();