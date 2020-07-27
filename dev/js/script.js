jQuery(function ($) {

    $(document).ready(function () {
        isIE();
        setHeaderStates();
    });

    /* https://jsfiddle.net/alvaroAV/svvz7tkn/ */
    function isIE() {
        ua = navigator.userAgent;
        /* MSIE used to detect old browsers and Trident used to newer ones*/
        var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

        return is_ie;
    }

    /* Create an alert to show if the browser is IE or not */
    if (isIE()) {
        alert('Ihr Browser wird nicht mehr Unterstützt. Bitte verwenden Sie einen neuen. Zum Beispiel: Microsoft Edge, Google Chrome oder Mozilla Firefox');
    }

});

//// Funktionalität beim Scrollen ////

(function ($) {
    $(window).scroll(function () {
        if ($(window).scrollTop() >= 1) {
            $('body').addClass('onScroll');
        } else {
            $('body').removeClass('onScroll');
        }
    });
})(jQuery);

//// Mobile Menu Opener ////

$(document).ready(function () {
    var hamburger_closed = $('#hamburger-closed'),
        hamburger_open = $('#hamburger-open'),
        mm = $('#mobile-menu');
    hamburger_closed.click(function () {
        hamburger_closed.toggleClass('active');
        mm.toggleClass('active');
        return false;
    });
    hamburger_open.click(function () {
        hamburger_closed.toggleClass('active');
        mm.toggleClass('active');
        return false;
    });
});


// Mobile Menu Navigation Openers //

$(function open_trail() {
    $('.trail >ul').addClass('sub-open');
    $('.active >ul').addClass('sub-open');
});

function sub_open(id, level) {
    if (window.matchMedia("(max-width: 64em)").matches) {
        var open_element = $('#' + id + '> ul'),
            opener = $('#' + id + ' >.nav-link-container .sub-opener');
        open_element.toggleClass('sub-open').slideToggle(200);
        opener.toggleClass('sub-opener-open');
        $('.' + level + ' .sub-open').not(open_element).slideToggle(200).removeClass('sub-open');
        $('.' + level + ' .sub-opener').not(opener).removeClass('sub-opener-open');
    }
}




// Header Funktionen
function setHeaderStates() {

    // Höhe des Headers bestimmen
    var headerHeight = $('#header').height();
    var resizeTimer;
    $(window).resize(function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(itsResized, 250)
    });

    function itsResized() {
        headerHeight = $('#header').height();
    }


// Menü bei Scroll verstecken und wieder anzeigen
    var body = $('body');
    $(window).ready(function () {
        hiddenClass()
    });

    function hiddenClass() {
        var prev = 0;
        var header = $('#header');
        var ankernav = $('#ankernav-container');
        $(window).on('scroll', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(classHidden, 0)
        });

        function classHidden() {
            var scrollTop = $(window).scrollTop();
            header.toggleClass('hidden', scrollTop > prev);
            ankernav.toggleClass('hidden', scrollTop > prev);
            header.toggleClass('visible', scrollTop < headerHeight);
            prev = scrollTop;
        }

    }
}

// Autocomplete

$(function() {
    $( "#header .opener-suche-container .ui-widget #ctrl_1" ).autocomplete({
        source: 'files/layout/php/live_search.php',
        minLength: 2,
        contentType: "application/json; charset=utf-8",
        select: function(event, ui) {
            if(ui.item){
                $(event.target).val(ui.item.value);
            }
            $(event.target.form).submit();
        }

    });
});

// #seitenbanner toggle
$(function () {
    var el = $("#seitenbanner");
    function toggleBanner () {
        if ($(window).width() < 768) {
            if (el.css('left') === '0px') {
                el.css('left','-100vw');
            } else {
                el.css('left','0');
            }
        }
    }

    el.on('touch click', function () {
        toggleBanner();
    })
});