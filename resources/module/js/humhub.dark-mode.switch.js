humhub.module('dark-mode.switch', function (module, require, $) {
    module.initOnPjaxLoad = true;
    module.initOnAjaxLoad = true;
    
    let $inputRadio;
    let $cancelBtn;
    let $startVal;
    const $cssUrl = module.config['css-url'];
    
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
        if ($('#dark-css-link').length) {
            $('#dark-css-link').attr('media', 'screen and (prefers-color-scheme: dark)');
        } else {
            $('head').append('<link id="dark-css-link" rel="stylesheet" type="text/css" media="screen and (prefers-color-scheme: dark)" href="' + $cssUrl + '">');
        }
    }
    
    function setLight() {
        if ($('#dark-css-link').length) {
            $('#dark-css-link').remove();
        }
    }
    
   function setDark() {
        if ($('#dark-css-link').length) {
            $('#dark-css-link').attr('media', 'screen');
        } else {
            $('head').append('<link id="dark-css-link" rel="stylesheet" type="text/css" media="screen" href="' + $cssUrl + '">');
        }
    }

    module.export({
        init: init
    });
});