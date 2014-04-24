App.BarcodeManager = function() {

    'use strict';

    var _config = {
        barcodeInput: '#barcode'
    };
    
    var _addProduct = function(product) {
        var line = App.DocumentItemsManager.searchLine(product.code);
        if(line) App.DocumentItemsManager.addOneToLineQuantity(line);
        else App.DocumentItemsManager.addLine(product);
    };
    
    var onChange = function(evt) {
        evt.preventDefault();
        var product = App.ProductsManager.getProduct($(evt.target).val());
        if(product) _addProduct(product);
        $(evt.target).val('');
    };

    var init = function() {
        $(_config.barcodeInput).change(onChange).focus();
    };

    App.addInitializer(init);
    
}();

