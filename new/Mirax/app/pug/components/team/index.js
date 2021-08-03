(function ($) {
    var team = $('#team');

    if (team.length) {
        $('#team').sliphover({
            target: '.team-block',
            backgroundColor: 'rgba(0,0,0, .8)',
            caption: 'data-caption'
        });
    }
})(jQuery);