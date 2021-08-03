(function ($) {

    var slider = $('#owl-slider-2');

    /*-------------------------------------
     * Owl slider header
     -------------------------------------*/

    if (slider.length) {
        slider.owlCarousel({
            items: 1,
            navigation: false,
            autoplay: true,
            autoplayTimeout: 5000,
            dots: true,
            loop: true,
            animateOut: 'fadeOut'
        });
    }

})(jQuery);