'use strict';

(function ($) {

    // =====Catage menu====
    $('.hero__categories__all').on('click', function () {
        $('.hero__categories ul').slideToggle(400);
    });

    $(".mobile__open").on('click', function () {
        $(".mobile__menu__wrapper").addClass("show__mobile__menu__wrapper");
        $(".mobile__menu__overlay").addClass("active");
        $("body").addClass("over_hid");
    });

    /*------------------
           Background Set
       --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Mobie Menu
    $(".mobile__open").on('click', function () {
        $(".mobile__menu__wrapper").addClass("show__mobile__menu__wrapper");
        $(".mobile__menu__overlay").addClass("active");
        $("body").addClass("over_hid");
    });

    $(".mobile__menu__overlay").on('click', function () {
        $(".mobile__menu__wrapper").removeClass("show__mobile__menu__wrapper");
        $(".mobile__menu__overlay").removeClass("active");
        $("body").removeClass("over_hid");
    });


    /*------------------
        Navigation
    --------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    // =====Menu hero===
    /*------------------
    Menu Hover
    --------------------*/
    $(".header__menu ul li").on('mousehover', function () {
        $(this).addClass('active');
    });

    $(".header__menu ul li").on('mouseleave', function () {
        $('.header__menu ul li').removeClass('active');
    });


    /*------------------
    Hero banner silder
    --------------------*/
    $(".hero-silder").owlCarousel({
        items: 1,
        dots: true,
        autoplay: true,
        loop: true,
        smartSpeed: 1200
    });

    //==Suggestion-product silder
    $(".suggesstion-product-silder").owlCarousel({
        loop: true,
        margin: 0,
        items: 2,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            320: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 3,
            },

            992: {
                items: 4,
            }
        }
    });

    /*--------------------------
    Banner Slider
----------------------------*/
    $(".banner__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: true,
        smartSpeed: 1000,
        autoHeight: false,
        autoplay: true
    });

    /*------------------
            Product filter
        --------------------*/
    $('.nav.nav-tabs li a').on('click', function () {
        $('.nav.nav-tabs li a').removeClass('active-color');
        $(this).addClass('active-color');
    });

    // if ($('.property__gallery').length > 0) {
    //     var containerEl = document.querySelector('.property__gallery');
    //     var mixer = mixitup(containerEl);
    // }

    /*------------------
        Product choose
    --------------------*/
    // $('.filter__controls li').on('click', function () {
    //     $('.filter__controls li').removeClass('active');
    //     $(this).addClass('active');
    // });






    $(".product-choosed-silder").owlCarousel({
        loop: true,
        margin: 0,
        items: 4,
        dots: false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            320: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 3,
            },

            992: {
                items: 4,
            }
        }
    });

    // $(".account-details.order-details").owlCarousel({
    //     loop: true,
    //     margin: 0,
    //     items: 4,
    //     dots: true,
    //     nav: false,
    //     animateOut: 'fadeOut',
    //     animateIn: 'fadeIn',
    //     smartSpeed: 1200,
    //     autoHeight: false,
    //     autoplay: false,
    //     responsive: {
    //         320: {
    //             items: 1,
    //         },

    //         480: {
    //             items: 2,
    //         },

    //         768: {
    //             items: 3,
    //         },

    //         992: {
    //             items: 4,
    //         }
    //     }
    // });



    $(".latest-product__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true
    });


    // nút bên product detail

    $('.filter-toggle a').on('click', function () {
        $('.nav.nav-tabs li a').removeClass('active-color');
        $(this).addClass('active-color');
    });

    // lọc sp tại homepage
    $('.filter__controls li').on('click', function () {
        $('.filter__controls li').removeClass('active');
        $(this).addClass('active');
    });

    var owl = $(".property__gallery__flash-sale").owlCarousel({
        // loop: true,
        margin: 0,
        items: 3,
        dots: false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false,
        responsive: {
            320: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 3,
            },

            992: {
                items: 4,
            }
        }
    });

    // list 1

    var owl = $(".property__gallery.line_1").owlCarousel({
        // loop: true,
        margin: 0,
        items: 3,
        dots: false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false,
        responsive: {
            320: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 3,
            },

            992: {
                items: 4,
            }
        }
    });

    $('.filter__controls.line_1').on('click', '.item', function () {

        var $item = $(this);
        var filter = $item.data('owl-filter')

        console.log(filter);

        owl.owlcarousel2_filter(filter);
    })

    // list 2
    var owl2 = $(".property__gallery.line_2").owlCarousel({
        // loop: true,
        margin: 0,
        items: 3,
        dots: false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false,
        responsive: {
            320: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 3,
            },

            992: {
                items: 4,
            }
        }
    });

    $('.filter__controls.line_2').on('click', '.item', function () {

        var $item = $(this);
        var filter = $item.data('owl-filter')

        owl2.owlcarousel2_filter(filter);

    })

    // line_3 
    var owl3 = $(".property__gallery.line_3").owlCarousel({
        // loop: true,
        margin: 0,
        items: 3,
        dots: false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: false,
        responsive: {
            320: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 3,
            },

            992: {
                items: 4,
            }
        }
    });

    $('.filter__controls.line_3').on('click', '.item', function () {

        var $item = $(this);
        var filter = $item.data('owl-filter')

        owl3.owlcarousel2_filter(filter);

    })

    // Nut tang giam tai product detail
    $('input.input-qty').each(function() {
        var $this = $(this),
          qty = $this.parent().find('.is-form'),
          min = Number($this.attr('min')),
          max = Number($this.attr('max'))
        if (min == 0) {
          var d = parseInt($(this).val()) ;
        } else d = parseInt($(this).val());
        $(qty).on('click', function() {
          if ($(this).hasClass('minus')) {
            if (d > min) d += -1
          } else if ($(this).hasClass('plus')) {
            var x = Number($this.val()) + 1
            if (x <= max) d += 1
          }
          $this.attr('value', d).val(d)
        })
      })

})(jQuery)


const root = document.documentElement;
const marqueeElementsDisplayed = getComputedStyle(root).getPropertyValue("--marquee-elements-displayed");
const marqueeContent = document.querySelector("ul.marquee-content");

root.style.setProperty("--marquee-elements", marqueeContent.children.length);

for (let i = 0; i < marqueeElementsDisplayed; i++) {
    marqueeContent.appendChild(marqueeContent.children[i].cloneNode(true));
}

