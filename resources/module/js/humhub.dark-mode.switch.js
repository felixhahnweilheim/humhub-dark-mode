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
        if (val == 'light') {
            $('html').attr('data-bs-theme', 'light');// Bootstrap 5 attribute
            $('html').attr('data-dark-mode-default', false);// Custom attribute - prevent switching when system preference changes
        } else if (val == 'dark') {
            $('html').attr('data-bs-theme', 'dark');
            $('html').attr('data-dark-mode-default', false);
        } else {
            $('html').attr('data-dark-mode-default', true);// Custom attribute - allow switching based on system preference
            if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                $('html').attr('data-bs-theme', 'dark');
            } else {
                $('html').attr('data-bs-theme', 'light');
            }
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                if (!$('html').attr('data-dark-mode-default') || $('html').attr('data-dark-mode-default') == 'false') return;
                if (window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    $('html').attr('data-bs-theme', 'dark');
                } else {
                    $('html').attr('data-bs-theme', 'light');
                }
            });
        }
    }
    
    module.export({
        init: init
    });
});