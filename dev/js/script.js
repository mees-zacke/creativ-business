jQuery(function ($) {

  $(document).ready(function () {
    isIE();
 });

  /* https://jsfiddle.net/alvaroAV/svvz7tkn/ */
  function isIE() {
    ua = navigator.userAgent;
    /* MSIE used to detect old browsers and Trident used to newer ones*/
    var is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;

    return is_ie;
  }
  /* Create an alert to show if the browser is IE or not */
  if (isIE()){
    alert('Ihr Browser wird nicht mehr Unterstützt. Bitte verwenden Sie einen neuen. Zum Beispiel: Microsoft Edge, Google Chrome oder Mozilla Firefox');
  }

});

//// Funktionalität beim Scrollen ////

(function($){
    $(window).scroll(function(){
        if($(window).scrollTop() >= 1) {
            $('body').addClass('onScroll');
        } else {
            $('body').removeClass('onScroll');
        }
    });
})(jQuery);

//// Mobile Menu Opener ////

$( document ).ready(function() {
    var hamburger_closed = $('#hamburger-closed'),
        hamburger_open = $('#hamburger-open'),
        mm = $('#mobile-menu');
    hamburger_closed.click(function() {
        hamburger_closed.toggleClass('active');
        mm.toggleClass('active');
        return false;
    });
    hamburger_open.click(function() {
        hamburger_closed.toggleClass('active');
        mm.toggleClass('active');
        return false;
    });
});

// Mobile Menu Navigation Level_2 Openers //

function sub_open(id) {
    var open_element = $('#' + id + '> ul'),
        opener = $('#' + id + ' .sub-opener');

    open_element.toggleClass('sub-open').slideToggle(200);
    opener.toggleClass('sub-opener-open');
    $('.sub-open').not(open_element).slideToggle(200).removeClass('sub-open');
    $('.sub-opener').not(opener).removeClass('sub-opener-open');
}

