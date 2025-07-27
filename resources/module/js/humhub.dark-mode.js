humhub.module('dark-mode', function (module, require, $) {
    module.initOnPjaxLoad = true;
    module.initOnAjaxLoad = true;
    
    const init = function () {
        $(function () {
            setMode(module.config['mode']);
        });
    };
    
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
        init: init,
        setMode: setMode
    });
});