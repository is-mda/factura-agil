App.CommonManager = function() {

    'use strict';

    var Api = {};

    Api.parseCurrency = function() {
        $('input.currency').each(function(i, input) {
            var val = parseFloat($(input).val());
            if(!isNaN(val)) $(input).val(val.toFixed(2));
        });
    };

    var _initExternalLinks = function() {
        $('a.external').click(function(evt) {
            evt.preventDefault();
            window.open($(evt.target).closest('a').attr('href'));
        });
    };
    var init = function() {
        _initExternalLinks();
    };

    App.addInitializer(init);
    
    return Api;

}();


