(function ($) {

    /*-------------------------------------
    Portfolio
    -------------------------------------*/
    var portfolio = $('#isotope');

    if (portfolio.length) {
        portfolio.isotope({
            itemSelector: '.portfolioBox',
            filter: "*"
        });

        $('.filter__btn').click(function () {
            var selector = $(this).attr('data-filter');

            $('#isotope').isotope({
                filter: selector,
            });

            $('.filter__btn span.accent').removeClass('accent');
            $(this).find('span').addClass('accent');
        });
    }
})(jQuery);