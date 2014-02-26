// Only do something if jQuery isn't defined
function givemerss(tag) {
    if (typeof jQuery == 'undefined') {
        if (typeof $ == 'function') {
            // warning, global var
            thisPageUsingOtherJSLibrary = true;
        }
        function getScript(url, success) {
            var script = document.createElement('script');
            script.src = url;
            var head = document.getElementsByTagName('head')[0],
		done = false;
            // Attach handlers for all browsers
            script.onload = script.onreadystatechange = function () {

                if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {
                    done = true;
                    // callback function provided as param
                    success();
                    script.onload = script.onreadystatechange = null;
                    head.removeChild(script);
                };
            };
            head.appendChild(script);
        };
        var jquerycdn = "https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js";  //version 1.7.1
        getScript(jquerycdn, function () {
            if (typeof jQuery == 'undefined') {
                // Super failsafe - still somehow failed...
                alert("Sorry, jQuery is not loaded. ");
            } else {
                jQueryReady();
            }
        });

    } else { // jQuery was already loaded
        // Run your jQuery Code
        jQueryReady();
    };

    function jQueryReady() {
        getScript("rssproxyaction.js", function () {
            showRSSfeed(tag);
        });
    }
}