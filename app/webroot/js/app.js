var App = function() {

    'use strict';

    var Api = {};
    
    var _initializers = [];

    Api.addInitializer = function(f) {
        _initializers.push(f);
    };
    
    Api.run = function() {
        $.each(_initializers, function(i, f) {
           f();
        });
    };

    return Api;

}();
