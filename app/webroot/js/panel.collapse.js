App.PanelCollapse = function() {

    'use strict';

    var _config = {
        panelSelector: '.panel-collapse',
        headingSelector: '.panel-heading'        
    };

    var _toggleBody = function(node) {
        if (_isOpen(node)) _hideBody(node);
        else _showBody(node);
    };
    var _headingClickManager = function(evt) {
        _toggleBody($(evt.target));
    };
    var _isOpen = function(node) {
        return node.closest(_config.panelSelector).hasClass('open');
    };
    var _showBody = function(node) {
        node.closest(_config.panelSelector).addClass('open');
    };
    var _hideBody = function(node) {
        node.closest(_config.panelSelector).removeClass('open');
    };
    var init = function() {
        $(_config.panelSelector).find(_config.headingSelector).click(_headingClickManager);
    };
    App.addInitializer(init());

}();
