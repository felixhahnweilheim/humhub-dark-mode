humhub.module('dark-mode', function(module, require, $) {
    // Select the button
    const btn = document.getElementById("switch-button");

    // Listen for a click on the button 
    btn.addEventListener("click", function() {
        // Save the choice in a cookie
        setCookie('theme', 'dark', 365);
        location.reload();
    });
	
	
    function setCookie(cname, cvalue, exdays) {
        const d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        let expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }
});
