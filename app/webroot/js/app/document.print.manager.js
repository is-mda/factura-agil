App.DocumentPrintManager = function() {

    'use strict';

    var init = function() {
        window.print();
    };

    App.addInitializer(init);
    
}();
