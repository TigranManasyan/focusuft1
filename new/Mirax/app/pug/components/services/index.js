(function ($) {

    /*-------------------------------------
    Services
    -------------------------------------*/
    var services = $('#services');

    if (services.length) {
        $('#services').sliphover({
            target: '.services-block',
            backgroundColor: 'rgba(0,0,0, .8)',
            caption: 'data-caption'
        });
    }
})(jQuery);