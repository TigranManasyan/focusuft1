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
    const windowWidth = $(window).width();
    const scrollTopButton = $('#scroll-top');
    const workingOffsetTop = $('.working-list').length > 0 && $('.working-list')[0].offsetTop;
    
    const questionNav = document.querySelector('.question-nav');
    const questionNavHeight = questionNav && questionNav.clientHeight;
    const questionNavWidth = questionNav && questionNav.clientWidth;
    const questionContent = document.querySelector('.question-content-content');
    let flagForOptimized = true;
    function fixQuestionNav(resize = false) {
        if(questionNav && questionContent) {
            const cords = questionContent.getBoundingClientRect();
            
            if(resize || flagForOptimized) {
                flagForOptimized = false;
                if(cords.x - questionNavWidth > 30) {
                    questionNav.style.left = cords.x - questionNavWidth - 30 + 'px';
                } else {
                    questionNav.style.left = '5px';
                    questionNav.style.width = cords.x - 10 + 'px';
                }
            }
            
            if(Math.abs(cords.y) >= cords.height - questionNavHeight) {
                questionNav.style.top = '-' + (questionNavHeight - (cords.height + cords.top)) + 'px';
                return;
            }
            
            if(cords.top <= 0) {
                questionNav.style.top = '5px';
            } else {
                questionNav.style.top = cords.top + 'px';
            }
        }
    }
    $('.hamburger').on('click', function () {
        $(this).toggleClass('is-active');
        questionNav.classList.toggle('active');
        $('.question-list').toggleClass('to-left');
    });

    scrollTopButton.on('click', function () {
        $("body, html").animate({
            scrollTop: 0
        }, 800)
    });
    
    $(window).on('scroll', function () {
        initMain();
    });
    $(window).on('resize', function () {
        if($(window).width() > 1280) {
            fixQuestionNav(true);
        }
    });
    initMain();
    
    function initMain() {
        const WST = $(window).scrollTop();
        if(WST > 40) {
            scrollTopButton.addClass('active')
        } else {
            scrollTopButton.removeClass('active')
        }
        
        if(WST > (workingOffsetTop - windowHeight / 1.7)) {
            $('.working-list').addClass('active')
        }
        if(windowWidth > 1280) {
            fixQuestionNav();
        }
    }

//header classes
    $('.link').on('click', function (e) {
        let navigationMenu = $('.link');
        $(this).addClass('active');
        for (let i = 0; i < navigationMenu.length; i++) {
            if (e.target.innerHTML !== navigationMenu[i].innerHTML) {
                navigationMenu[i].classList.remove('active')
            }

        }
    });
    
    
    $('.plus-button').on('click', function () {
        const parent = $(this).parents('.question-block');
        if(!$(parent).hasClass('active')) {
            $('.question-block').removeClass('active');
            $('.open-text-block').slideUp();
            $(parent).toggleClass('active').find('.open-text-block').slideToggle(200);
        } else {
            $(parent).removeClass('active').find('.open-text-block').slideToggle(200);
        }
    });

    function adaptiveHeight(list) {
        let maxHeight = 0;
        list.each(function (i) {
            if(i === 0) {
                maxHeight = $(this).height();
            } else {
                maxHeight = maxHeight > $(this).height() ? maxHeight : $(this).height();
            }
        });
        list.height(maxHeight + 'px');
    }
    adaptiveHeight($('.buy-premium-block'));
    adaptiveHeight($('.premium-and-free .foot-text'));

    $('.show-logo-btn').on('click', function () {
        $('.show-logo-btn').find('svg').toggleClass('active');
        $('.open-closead-block').slideToggle();

        adaptiveHeight($('.logo-icons-block'));
        adaptiveHeight($('.open-close-top'));
        adaptiveHeight($('.compani-logo'));
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
    });

    // playing iframe video
    $('.play-iframe-btn').on('click', function () {
        const parent = $(this).parents('.features-section__img, .iframe-block-bg');
        const videoUrl = $(this).data('url') + '?autoplay=1';

        parent.addClass('active');
        $(this).fadeOut();
        parent.find('.img').hide();
        parent.find('iframe.display-no')
            .attr('src', videoUrl)
            .removeClass('display-no')
    });
    console.log(window.location.pathname)
});
