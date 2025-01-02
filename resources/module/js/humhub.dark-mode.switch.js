humhub.module('dark-mode.switch', function (module, require, $) {
    module.initOnPjaxLoad = true;
    module.initOnAjaxLoad = true;
    
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
        setMode(val);
    }
    
    function cancelChanges() {
        setMode($startVal);
    }
    
    function setMode(val) {
        if      (val == 'default') setDefault();
        else if (val == 'light')   setLight();
        else if (val == 'dark')    setDark();
    }
    
    function setDefault() {
        $('#dark-css-link').attr('media', 'screen and (prefers-color-scheme: dark)');
    }
    
    function setLight() {
        $('#dark-css-link').attr('media', 'none');
    }
    
   function setDark() {
        $('#dark-css-link').attr('media', 'all');
    }

    module.export({
        init: init
    });
});