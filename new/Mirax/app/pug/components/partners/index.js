(function ($) {

    /*-------------------------------------
    Slider Partners
    -------------------------------------*/
    if ($('#slider_partners').length) {
        $('#slider_partners').owlCarousel({
            dots: true,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 6
                },
                1000: {
                    items: 6
                }
            }
        });
    }
})(jQuery);