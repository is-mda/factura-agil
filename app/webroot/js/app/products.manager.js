App.ProductsManager = function() {

    'use strict';

    var Api = {};

    var _data = [];

    var _loadProducts = function() {
        $.each(Data.products, function(index, product) {
            _data[product.Product.code] = product.Product;
        });
    };    

    var init = function() {
        _loadProducts();
    };

    Api.getProduct = function(code) {
        if(_data[code]) return _data[code];
        return null;
    };

    App.addInitializer(init);
    
    return Api;

}();

