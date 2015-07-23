$(document).bind("mobileinit", function () {
    $.mobile.pushStateEnabled = true;
    $.mobile.ignoreContentEnabled=true;
});
var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
}; 
$(function () {
    var menuStatus;
    var show = function() {
        if(menuStatus) {
            return;
        }
        $('#menu').show();
        $.mobile.activePage.animate({
            marginLeft: "230px",
        }, 400, 'swing', function() {
            menuStatus = true;
        });
    };
    var hide = function() {
        if(!menuStatus) {
            return;
        }
        $.mobile.activePage.animate({
            marginLeft: "0px",
        }, 400, 'swing', function() {
            menuStatus = false;
            $('#menu').hide();
        });
    };
    var toggle = function() {
        if (!menuStatus) {
            show();
        } else {
            hide();
        }
        return false;
    };
    var isPage = function(page) {
        var pathname = window.location.pathname;
        if (pathname.indexOf(page) <= -1) {
            return false;
        }
        return true;
    }
 
    // Show/hide the menu
    $("a.showMenu").click(toggle);
    $('#menu, .pages').on("swipeleft", function() {
        if(!isPage('resume')) {
            hide();
        }
    });
    $('.pages').on("swiperight", function() {
        if(!isPage('resume')) {
            show();
        }
    });
});
 