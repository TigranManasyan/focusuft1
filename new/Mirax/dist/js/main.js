(function ($) {
    "use strict";

    /*-------------------------------------
    Background image
    -------------------------------------*/
    $('div').each(function () {
        var url = $(this).attr('data-image');
        if (url) {
            $(this).css('background-image', 'url(' + url + ')');
        }
    });

    /*-------------------------------------
    Animate Effect
    -------------------------------------*/
    if (document.getElementById('primary') !== null) {
        var primaryData = document.getElementById('primary').dataset.animate;

        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) != true && primaryData === 'on') {
            new WOW().init();
        }
    }

    /*-------------------------------------
    Background Section
    -------------------------------------*/
    $('.fw-page-builder-content').find('section:even').addClass("bg-light");

    /*-------------------------------------
    * Header Sticly
    -------------------------------------*/
    var isSticly = $('header').attr('data-sticly');
    var header = $('header');
    var headerHeight = $('header').outerHeight();

    if (isSticly === 'on') {
        $(document).on('scroll', function () {
            if ($(this).scrollTop() >= headerHeight) {
                header.addClass('header--fix');
            }
            else {
                header.removeClass('header--fix');
            }
        });
    }

    /*-------------------------------------
    BTN Back
    -------------------------------------*/

    var btnBack = $('.btn-back');

    $(document).on('scroll', function () {
        if ($(this).scrollTop() > 100) {
            btnBack.css('display', 'flex');
        } else {
            btnBack.css('display', 'none');
        }
    });

    btnBack.on('click', function () {
        $('html,body').animate({scrollTop: 0}, 1800);
    });

    /*-------------------------------------
    Burger Click
    -------------------------------------*/
    var menu = $('#menu-primary-menu');

    $('.burger').on('click', function () {
        $(this).toggleClass('burger--active');
        menu.toggleClass('open');
        $('body').toggleClass('body-fixed');
    });

    /*-------------------------------------
    Burger Menu
    -------------------------------------*/
    $('.drop-menu ').on('click', function () {
        $(this).parent('.menu-item-has-children').toggleClass('open');
    });

    function checkMenu() {
        if ($(window).width() < 992) {
            menu.addClass('header__menu--burger');
            menu.removeClass('header__menu');
        }
        else {
            if ($('.header--burger').length > 0) {
                return null;
            }
            else {
                menu.addClass('header__menu');
                menu.removeClass('header__menu--burger');
            }
        }
    }

    $(window).resize('on', function () {
        checkMenu();
    });

    checkMenu();

    /*-------------------------------------
    Preloader
    -------------------------------------*/
    $(window).on('load', function () {
        var preloader = $('.preloader');
        if (preloader.length) {
            preloader.delay(600).fadeOut('slow');
        }
    });

    /*-------------------------------------
    * Slider click icon mouse
    -------------------------------------*/
    var slideMouse = $('.slider--mouse');
    if (slideMouse != undefined) {
        $(document).on('click', '.slider--mouse', function () {
            var slideHeight = $('.slide-top').height();
            $('html,body').animate({scrollTop: slideHeight}, 800);
        });
    }

    /*-------------------------------------
    Sticky Sidebar
    -------------------------------------*/
    var sidebar = $('#sidebar');

    if (sidebar.length) {
        sidebar.stickySidebar({
            innerWrapperClass: 'sidebar__inner',
            topSpacing: 80,
            bottomSpacing: 10
        });
    }


})(jQuery);
