(function ($) {
    showSuccessToast = function (msg) {
        'use strict';
        resetToastPosition();
        $.toast({
            heading: 'Success',
            text: msg,
            showHideTransition: 'slide',
            icon: 'success',
            loaderBg: 'rgba(255,255,255,0.5)',
            position: 'top-right'
        })
    };
    showInfoToast = function (msg) {
        'use strict';
        resetToastPosition();
        $.toast({
            heading: 'Info',
            text: msg,
            showHideTransition: 'slide',
            icon: 'info',
            loaderBg: 'rgba(255,255,255,0.5)',
            position: 'top-right'
        })
    };
    showWarningToast = function (msg) {
        'use strict';
        resetToastPosition();
        $.toast({
            heading: 'Warning',
            text: msg,
            showHideTransition: 'slide',
            icon: 'warning',
            loaderBg: 'rgba(255,255,255,0.5)',
            position: 'top-right'
        })
    };
    showDangerToast = function (msg) {
        'use strict';
        resetToastPosition();
        $.toast({
            heading: 'Error',
            text: msg,
            showHideTransition: 'slide',
            icon: 'error',
            loaderBg: 'rgba(255,255,255,0.5)',
            position: 'top-right'
        })
    };
    showToastPosition = function (position) {
        'use strict';
        resetToastPosition();
        $.toast({
            heading: 'Positioning',
            text: 'Specify the custom position object or use one of the predefined ones',
            position: String(position),
            icon: 'info',
            stack: false,
            loaderBg: 'rgba(255,255,255,0.5)'
        })
    };
    showToastInCustomPosition = function () {
        'use strict';
        resetToastPosition();
        $.toast({
            heading: 'Custom positioning',
            text: 'Specify the custom position object or use one of the predefined ones',
            icon: 'info',
            position: {
                left: 120,
                top: 120
            },
            stack: false,
            loaderBg: 'rgba(255,255,255,0.5)'
        })
    };
    resetToastPosition = function () {
        $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center');
        $(".jq-toast-wrap").css({
            "top": "",
            "left": "",
            "bottom": "",
            "right": ""
        });
    }
})(jQuery);
