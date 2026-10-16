humhub.module('dark-mode.switch', function (module, require, $) {
    module.initOnPjaxLoad = true;

    const client = require('client');

    const init = function () {
        // Radio list in Account Settings
        $('#usersetting-darkmode').on('input', function () {
            setMode($('input[name="UserSetting[darkMode]"]:checked').val());
        });
    };

    // Dropdown in top bar
    const switchMode = function (evt) {
        const mode = evt.$trigger.data('mode');

        setMode(mode);
        $('.dark-mode .dropdown-item').removeClass('active');
        evt.$trigger.addClass('active');
        $('input[name="UserSetting[darkMode]"][value="' + mode + '"]').prop('checked', true);

        client.post(evt.url, {data: {mode: mode}}).catch(function (e) {
            module.log.error(e, true);
        });
    };

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
        init: init,
        switchMode: switchMode
    });
});
