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
        if (val == 'light')     setLight();
        else if (val == 'dark') setDark();
        else                    setDefault();
    }
    
    function setDefault() {
        if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
            setDark();
            listenForDefault();
        } else {
            setLight();
            listenForDefault();
        }
    }
    
    function setLight() {
        $('html').attr('data-bs-theme', 'light');
    }
    
    function setDark() {
        $('html').attr('data-bs-theme', 'dark');
    }

    function listenForDefault() {
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
            setDefault();
        })
    }
    
    module.export({
        init: init
    });
});