

$(document).ready(function () {
    console.log(window.ENVIRONMENT);


/**
 * Screen touch detection
 *
 * @returns {type}
 * @example alert(isTouchDevice());
 */
function isTouchDevice() {
    return typeof window.ontouchstart !== 'undefined';
}

/**
 * Additional touch metric
 * Use as metric5
 *
 * @returns {number}
 * @example alert(isTouchDevice());
 */
function is_touch_metric() {
    if (isTouchDevice()) {
        return 1;
    }
    return 0;
}

/**
 * Convert users ip address to int
 * Analytics value parameter only allows whole numbers
 *
 * @param {int} ip
 */
function toInt(ip) {
    var ipl = 0;
    ip.split('.').forEach(function (octet) {
        ipl <<= 8;
        ipl += parseInt(octet);
    });
    return (ipl >>> 0);
}


/**
 * GLOBAL obj_analytics
 * @type {object}
 * @name obj_analytics
 *
 * @fires obj_analytics.send_event
 * @fires obj_analytics.send_pageview
 *
 * The metric index must be a positive integer between 1 and 200,
 * */
var obj_analytics = function () {

    return {
        platinum_body: document.getElementsByClassName("platinum"),
        events_div: document.getElementById("events_div"),
        ANALYTICS_OBJ_OK: 0,
        ANALYTICS_OBJ_ERROR: 1,
        //ANALYTICS_USER_IP: toInt(window.USER_IP_ADD),
        ANALYTICS_METRIC_1: is_touch_metric(),  //is device a touch device 0|1
        ANALYTICS_METRIC_2: 2,  // is actual user (metric2)
        ANALYTICS_METRIC_3: 1,  // non logged in visitor (metric3)
        ANALYTICS_METRIC_0: 0,  //error metric
        INVALID_ANALYTICS_MSG: 'Google analytics object undefined',
        ANALYTICS_NO_EVENT_MSG: 'Google analytics EVENT NOT SENT',
        ANALYTICS_NO_PAGEVIEW_MSG: 'Google analytics PAGEVIEW NOT SENT',
        ANALYTICS_NO_VALIDATION_MSG: 'Google analytics VALIDATION NOT SENT',
        ANALYTICS_MSG_USER_SUCCESS: 'User Successful Live Check',
        ANALYTICS_MSG_GROUP_SUCCESS: 'Group Successful Live Check',
        ANALYTICS_MSG_USER_FAIL: 'User Failed Errors',
        ANALYTICS_MSG_USER_LIVE_FAIL: 'User Failed Live Check',
        ANALYTICS_MSG_GROUP_LIVE_FAIL: 'Group Failed Live Check',
        pathName: window.location.pathname,

        /**
         * Ensure console is available for dubugging
         */
        debug: function () {
            if (!window.console || !console.log) {
                return;
            }
            return Function.prototype.bind.call(console.log, console);
        },

        /**
         * Display non fatal exception and error messages
         * @internal Errors only show in development
         *
         * @param {string} message
         */
        error_func: function (message) {
            if (window.ENVIRONMENT === 'development') {
                this.debug(obj_analytics.error_func);
                console.trace(message);
                console.log(message);
            }
        },

        /**
         * Display exception messages
         * @internal Exception only show in development
         *
         * @param {string} error
         */
        analytics_exception_message: function (error) {
            if (window.ENVIRONMENT === 'development') {
                console.log(error.name);
                console.log(error.message);
            }
        },

        /**
         * Send Generic Event
         * @event obj_analytics.send_event
         *
         * @throws  {Error}
         * @param category
         * @param action
         * @param label
         * @param value
         */
        send_event: function (category, action, label, value) {
            if (ga('send', 'event', category, action, label, value, {'nonInteraction': true})) {
                return true;
            } else {
                throw new Error(obj_analytics.ANALYTICS_NO_EVENT_MSG);
            }
        },

        /**
         * Send Basic Pageview with dimension
         * @event obj_analytics.send_pageview
         *
         * @param {string} dimension Analytics dimension (1-10)
         * @throws  {Error}
         */
        send_pageview: function (dimension) {
            if (dimension) {
                ga('set', dimension, clientId);      // Generic GA cookie tracker
                ga('send', 'pageview');
            } else {
                throw new Error(obj_analytics.ANALYTICS_NO_PAGEVIEW_MSG);
            }
        },

        /**
         * Send Generic Event
         * @event obj_analytics.send_event
         *
         * @throws  {Error}
         * @param category
         * @param action
         * @param label
         * @param value
         */
        send_validation_event: function (category, action, label, value) {
            if (ga('send', 'event', category, action, label, value, {'nonInteraction': true})) {
                return true;
            } else {
                throw new Error(obj_analytics.ANALYTICS_NO_VALIDATION_MSG);
            }
        }
    };
}();
(function ($) {

    var analytics_admin_obj = {};


    if (typeof ga !== 'undefined') {

        // =========================== Create Analytics jQuery Extension ================================
        $.extend({
            ga: {
                trackEvent: function (args) {
                    var defaultArgs = {
                        category: 'User',
                        action: 'Click',
                        label: '',
                        value: obj_analytics.ANALYTICS_USER_IP,
                        nonInteractive: false,
                        metric: obj_analytics.ANALYTICS_METRIC_2
                    };
                    args = $.extend(defaultArgs, args);
                    ga('send', 'event', args.category, args.action, args.label, args.value, {'nonInteraction': args.nonInteractive});
                }
            }
        });

        // =========================== Send Analytics Pageviews and Events ================================
        ga(function (tracker) {

            //Uncomment below to place analytics in DEBUG MODE
            //window.ga_debug = {trace: true};

            // Get the value of the Google Analytics client tracking cookie
            var clientId = tracker.get('clientId');

            /*
             Send the page view after all parameters are set
             */
            if (typeof GROUP_ID !== 'undefined') {
                ga('set', 'dimension1', GROUP_ID);                              // Set the group ID using current cookie.
            } else {
                ga('set', 'dimension1', 'NO_GROUP');                            // Generic Group
            }

            ga('set', 'dimension2', PROCESS_ID);                                // Assigned process_id
            ga('set', 'metric1', obj_analytics.ANALYTICS_METRIC_1);             // Used as a secondary filter to accompany dimension

            if (typeof USER_ID !== 'undefined') {
                ga('set', 'dimension3', USER_ID);                               // Level 1 dimension
                ga('set', 'metric2', obj_analytics.ANALYTICS_METRIC_2);         // Used as a secondary filter to accompany dimension
                ga('set', 'metric3', obj_analytics.ANALYTICS_METRIC_0);
                ga('set', 'userId', USER_ID);                                   // Set the user ID using signed-in user_id.
            } else {
                ga('set', 'metric2', obj_analytics.ANALYTICS_METRIC_0);
                ga('set', 'metric3', obj_analytics.ANALYTICS_METRIC_3);
            }
            ga('set', 'dimension5', clientId);                                  // Generic GA cookie tracker
            ga('set', 'dimension8', USER_IP_ADD);                               // Can track user by clientId or USER_ID


            // Distinguish if layout is classic or platinum
            if ($("body").hasClass("platinum")) {
                ga('set', 'dimension9', "PLATINUM");
            } else if ($("body").hasClass("bravowellness")) {
                ga('set', 'dimension9', "CLASSIC");
            } else {
                ga('set', 'dimension9', "UNDEFINED");
            }

            // Distinguish domains
            ga('set', 'dimension10', window.location.hostname);

            ga('send', 'pageview');

        });


        // =========================== External Analytics Events ================================
        /**
         * Automatically track outbound links
         *
         * @param {string} event
         * @see  https://www.axllent.org/docs/view/track-outbound-links-with-analytics-js/
         */
        function _gaLt(event) {

            /* If GA is blocked or not loaded, or not main|middle|touch click then don't track */
            if (!ga.hasOwnProperty("loaded") || ga.loaded != true || (event.which != 1 && event.which != 2)) {
                return;
            }

            var el = event.srcElement || event.target;

            /* Loop up the DOM tree through parent elements if clicked element is not a link (eg: an image inside a link) */
            while (el && (typeof el.tagName == 'undefined' || el.tagName.toLowerCase() != 'a' || !el.href)) {
                el = el.parentNode;
            }

            /* if a link with valid href has been clicked */
            if (el && el.href) {

                var link = el.href;

                /* Only if it is an external link */
                if (link.indexOf(location.host) == -1 && !link.match(/^javascript\:/i)) {

                    /* Is actual target set and not _(self|parent|top)? */
                    var target = (el.target && !el.target.match(/^_(self|parent|top)$/i)) ? el.target : false;

                    /* Assume a target if Ctrl|shift|meta-click */
                    if (event.ctrlKey || event.shiftKey || event.metaKey || event.which == 2) {
                        target = "_blank";
                    }

                    var hbrun = false; // tracker has not yet run

                    /* HitCallback to open link in same window after tracker */
                    var hitBack = function () {
                        /* run once only */
                        if (hbrun) return;
                        hbrun = true;
                        window.location.href = link;
                    };

                    if (target) { /* If target opens a new window then just track */
                        ga(
                            "send", "event", "External Link", link,
                            document.location.pathname + document.location.search
                        );
                    } else { /* Prevent standard click, track then open */
                        event.preventDefault ? event.preventDefault() : event.returnValue = !1;
                        /* send event with callback */
                        ga(
                            "send", "event", "External Link", link,
                            document.location.pathname + document.location.search, {
                                "hitCallback": hitBack
                            }
                        );

                        /* Run hitCallback again if GA takes longer than 1 second */
                        setTimeout(hitBack, 1000);
                    }
                }
            }
        }

        var _w = window;
        /* Use "click" if touchscreen device, else "mousedown" */
        var _gaLtEvt = ("ontouchstart" in _w) ? "click" : "mousedown";
        /* Attach the event to all clicks in the document after page has loaded */
        _w.addEventListener ? _w.addEventListener("load", function () {
                document.body.addEventListener(_gaLtEvt, _gaLt, !1)
            }, !1)
            : _w.attachEvent && _w.attachEvent("onload", function () {
            document.body.attachEvent("on" + _gaLtEvt, _gaLt)
        });


    } else {
        analytics_obj.error_func(analytics_obj.INVALID_ANALYTICS_MSG);
    }

}(jQuery));
});
