$(function () {
    $('#menu-btn').on('click', function () {
        $(this).toggleClass('active');
        $('#header-nav, body').toggleClass('active');
        $('.blur-bg').fadeToggle();
    });
    $('.blur-bg').on('click', function () {
        $('#menu-btn, #header-nav, body').removeClass('active');
        $(this).fadeOut();
    });
    
    const windowHeight = $(window).height();
    const scrollTopButton = $('#scroll-top');
    const workingOffsetTop = $('.working-list').length > 0 && $('.working-list')[0].offsetTop;
    
    scrollTopButton.on('click', function () {
        $("body, html").animate({
            scrollTop: 0
        }, 800)
    });
    
    $(window).on('load scroll', function () {
        const WST = $(window).scrollTop();
        if(WST > 40) {
            scrollTopButton.addClass('active')
        } else {
            scrollTopButton.removeClass('active')
        }
        
        if(WST > (workingOffsetTop - windowHeight / 1.7)) {
            $('.working-list').addClass('active')
        }
    });
    
    $('.plus-button').on('click', function () {
        $(this).parents('.question-block').toggleClass('newPadding isGo')
            .find('.open-text-block').slideToggle();
    });
    
    $('.pricing-list .btn-circle').on('click', function () {
        $('.open-permium  > svg').toggleClass('isOpen');
        $('.open-closead-block').slideToggle();
    });
    
    $('.show-more-text').on('click', function (e) {
        e.preventDefault();
        $(this).parent().find('.more-text').slideDown();
        $(this).remove();
    });
    
    $('#sign-up').on('click', function () {
        $('.blur-bg, .sign-in').fadeIn();
        $('body').addClass('active');
        $('#menu-btn').fadeOut();
    });
    $('#close-sign, .blur-bg').on('click', function () {
        $('.blur-bg, .sign-in').fadeOut();
        $('body').removeClass('active');
        $('#menu-btn').fadeIn();
    });
    $('#contacts-link').on('click', function (e) {
        e.preventDefault();
        $('#menu-btn, #header-nav').removeClass('active');
        $('.blur-bg').fadeOut();
        $('#contacts-modal').fadeIn();
        $('body').addClass('active');
    });
    $('#contacts-modal, .close-contact').on('click', function (e) {
        if ($(e.target).hasClass('contacts-modal') || $(this).hasClass('close-contact')) {
            $('#contacts-modal').fadeOut();
            $('body').removeClass('active');
        }
    })
});
