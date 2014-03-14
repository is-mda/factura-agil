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
    
    Api.Model = {
        el: 'body',
        setElement: function(el) {
            this.el = el;
        },
        setFieldValue: function(field, value) {
            $(this.el).find('input[data-field="' + field + '"]').val(value);
        },
        emptyField : function(field) {
            this.setFieldValue(field, '');
        },
        getFieldValue: function(field) {
            return $(this.el).find('input[data-field="' + field + '"]').val();
        },
        getFieldIntValue: function(field) {
            return parseInt(this.getFieldValue(field));
        },
        getFieldFloatValue: function(field) {
            return parseFloat(this.getFieldValue(field));
        }
    };

    return Api;

}();
