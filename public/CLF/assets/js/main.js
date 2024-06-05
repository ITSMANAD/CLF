$(document).ready(function () {
    //Init the carousel
    $("#suggestion-slider").owlCarousel({
        rtl: true,
        items: 1,
        autoplay: true,
        autoplayTimeout: 5000,
        loop: true,
        dots: false,
        onInitialized: startProgressBar,
        onTranslate: resetProgressBar,
        onTranslated: startProgressBar
    });

    function startProgressBar() {
      // apply keyframe animation
      $(".slide-progress").css({
        width: "100%",
        transition: "width 5000ms"
      });
    }

    function resetProgressBar() {
      $(".slide-progress").css({
        width: 0,
        transition: "width 0s"
      });
    }

    // **************  product slider
    $(".product-carousel").owlCarousel({
        rtl: true,
        margin: 10,
        nav: true,
        navText: ['<i class="now-ui-icons arrows-1_minimal-right"></i>', '<i class="now-ui-icons arrows-1_minimal-left"></i>'],
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                slideBy: 1
            },
            576: {
                items: 2,
                slideBy: 1
            },
            768: {
                items: 3,
                slideBy: 2
            },
            992: {
                items: 3,
                slideBy: 2
            },
            1400: {
                items: 4,
                slideBy: 3
            }
        }
    });


    $('.brand-slider .owl-carousel').owlCarousel({
        rtl: true,
        margin: 10,
        items: 5,
        nav: true,
        navText: ['<i class="now-ui-icons arrows-1_minimal-right"></i>', '<i class="now-ui-icons arrows-1_minimal-left"></i>'],
        responsive: {
            0: {
                items: 1
            },
            576: {
                items: 4
            },
            768: {
                items: 5
            },
            992: {
                items: 5
            }
        }
    });

    $('.back-to-top').click(function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 800, 'easeInExpo');
    });

    if ($("#img-product-zoom").length) {
        $("#img-product-zoom").ezPlus({
            zoomType: "inner",
            containLensZoom: true,
            gallery: 'gallery_01f',
            cursor: "crosshair",
            galleryActiveClass: "active",
            responsive: true,
            imageCrossfade: true,
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 500
        });
    }

    $(".sum-more").click(function () {
        var sumaryBox = $(this).parents('.parent-expert');
        sumaryBox.find('.content-expert').toggleClass('active');
        sumaryBox.find('.shadow-box').fadeToggle();

        $(this).find('i').toggleClass('active');

        $(this).find('.show-more').fadeToggle(0);
        $(this).find('.show-less').fadeToggle(0);

    });

    $('nav.header-responsive li.active').addClass('open').children('ul').show();

    $("nav.header-responsive li.sub-menu> a").on('click', function () {
        $(this).removeAttr('href');
        var e = $(this).parent('li');
        if (e.hasClass('open')) {
            e.removeClass('open');
            e.find('li').removeClass('open');
            e.find('ul').slideUp(400);

        } else {
            e.addClass('open');
            e.children('ul').slideDown(400);
            e.siblings('li').children('ul').slideUp(400);
            e.siblings('li').removeClass('open');
        }
    });

    // Start scroll

    $(window).scroll(function () {
        if ($(this).scrollTop() > 60) {
            $("nav.header-responsive").css({ height: '60px' });
            $("nav.header-responsive .search-nav").css({ opacity: '0', visibility: 'hidden' });
        } else {
            $("nav.header-responsive").css({ height: '110px' });
            $("nav.header-responsive .search-nav").css({ opacity: '1', visibility: 'visible' });
        }
    });

    // End scroll

    // favorites product

    $("ul.gallery-options button.add-favorites").on("click",function () {
        $(this).toggleClass("favorites");
    });

    // favorites product

});
document.addEventListener('DOMContentLoaded', () => {
    // Functions to open and close a modal
    function openModal($el) {
        $el.classList.add('is-active');
    }

    function closeModal($el) {
        $el.classList.remove('is-active');
    }

    function closeAllModals() {
        (document.querySelectorAll('.modal') || []).forEach(($modal) => {
            closeModal($modal);
        });
    }

    // Add a click event on buttons to open a specific modal
    (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
        const modal = $trigger.dataset.target;
        const $target = document.getElementById(modal);

        $trigger.addEventListener('click', () => {
            openModal($target);
        });
    });

    // Add a click event on various child elements to close the parent modal
    (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
        const $target = $close.closest('.modal');

        $close.addEventListener('click', () => {
            closeModal($target);
        });
    });

    // Add a keyboard event to close all modals
    document.addEventListener('keydown', (event) => {
        if(event.key === "Escape") {
            closeAllModals();
        }
    });
});
