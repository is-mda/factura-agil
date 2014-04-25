App.FiltersManager = function() {

    'use strict';

    var _config = {
        filtersSelector: '.filters'
    };

    var _isAnyFilterFilled = function(panel) {
        return $.grep($(panel).find('input[type=text], select'), function(input) {            
            return $(input).val();
        }).length;
    };

    var _resetFilters = function(panel) {
        $(panel).find('input[type=text], select').val('');
    };

    var _onReset = function(evt) {
        evt.preventDefault();
        _resetFilters($(evt.target).closest(_config.filtersSelector));
    };

    var _onPanelOpen = function(evt, panel) {
        $(panel).find('input:first').focus();
    };

    var _initFiltersPanel = function(panel) {
        $(panel).on('panel-collapse:open', _onPanelOpen);
        if(_isAnyFilterFilled(panel)) App.PanelCollapse.open(panel);
        
    };

    var init = function() {
        $(_config.filtersSelector).each(function(i, panel) {
            _initFiltersPanel(panel);
        });
        $('input[type=reset]', _config.filtersSelector).click(_onReset);
    };

    App.addInitializer(init);
    
}();
