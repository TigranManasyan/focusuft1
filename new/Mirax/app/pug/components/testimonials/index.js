
(function ($) {

    /*-------------------------------------
    Slider Reviews
    -------------------------------------*/
    if ($('#slider-reviews').length) {
        $('#slider-reviews').owlCarousel({
            nav: false,
            loop: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 5000,
            items: 1
        });
    }
})(jQuery);