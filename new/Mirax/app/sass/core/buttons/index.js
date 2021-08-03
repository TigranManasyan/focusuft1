var btnBack = $('.btn-back');

$(document).on('scroll', function() {
    if ($(this).scrollTop() > 100) {
        btnBack.css('display', 'flex');
    } else {
        btnBack.css('display', 'none');
    }
});

btnBack.on('click', function() {
    $('html,body').animate({ scrollTop: 0 }, 1800);
});