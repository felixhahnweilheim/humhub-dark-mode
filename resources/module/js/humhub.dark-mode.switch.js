humhub.module('dark-mode.switch', function (module, require, $) {
    module.initOnPjaxLoad = true;
    module.initOnAjaxLoad = true;
    
    let darkMode = require('dark-mode');
    let $inputRadio;
    let $cancelBtn;
    let $startVal;
    
    const init = function () {
        $(function () {
            initializeInputs();
            bindInputEvents();
        });
    };
    
    function initializeInputs() {
        $inputRadio = $('#usersetting-darkmode');
        $cancelBtn = $('button[data-modal-close]');
        $startVal = $('input[name="UserSetting[darkMode]"]:checked').val();
    }
    
    function bindInputEvents() {
        $inputRadio.on('input', updateMode);
        $cancelBtn.on('click', cancelChanges);
    }
    
    function updateMode() {
        var val = $('input[name="UserSetting[darkMode]"]:checked').val();
        darkMode.setMode(val);
    }
    
    function cancelChanges() {
        darkMode.setMode($startVal);
    }
    
    module.export({
        init: init
    });
});