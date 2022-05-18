(function ($) {
    "use strict";


    /*========  CounterUp ===========*/
    $('.count').counterUp({
        delay: 10,
        time: 2000
    });


    
    var $window = $(window),
        $body = $('body');

    jQuery(document).ready(function ($) {


        /*======== Sticky header ===========*/
        $('.navbar-collapse a').on('click', function () {
            $(".navbar-collapse").collapse('hide');
        });

        $window.on('scroll', function () {
            if ($(".header").offset().top > 0) {
                $(".header").addClass("style");
            } else {
                $(".header").removeClass("style");
            }
        });

        /*======== Smoothscroll js ===========*/
        $(function () {
            $('a.smoth-scroll, .scroll, .about-content a').on('click', function (event) {
                var $anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $($anchor.attr('href')).offset().top - 0
                }, 1000);
                event.preventDefault();
            });
        });

        /*======== jquery scroll spy ===========*/
        $body.scrollspy({
            target: "#ca-navbar",
            offset: 95
        });


        //    bottom to top js start
        var html_body = $('html, body');
        var amountScrolled = 300;
        var bootomclass = $('.back-top-btn');
        bootomclass.hide();
        $window.on('scroll', function () {
            if ($window.scrollTop() > amountScrolled) {
                bootomclass.fadeIn('slow');
            } else {
                bootomclass.fadeOut('slow');
            }
            var scrollPos = $window.scrollTop();
        });

        bootomclass.on('click', function () {
            html_body.animate({
                scrollTop: 0
            }, 600);
            return false;
        });


        /*======== Magnific Popup ===========*/
        $('.work-popup').magnificPopup({
            type: 'image'
        });


        
        // statistics jquery circle progressbar initialization
        var $section = $('#statisticsSection');
        if ($section.length >0) {
            $(document).bind('scroll', function (ev) {
                var scrollOffset = $(document).scrollTop();
                var containerOffset = $section.offset().top - window.innerHeight;
                if (scrollOffset > containerOffset) {
                  $('.round').each(function() {
                    $(this).circleProgress({
                      animation: {
                        duration: 1500,
                        easing: "circleProgressEasing"
                      }
                    }).on('circle-animation-progress', function(event, progress) {
                      $(this).find('strong').text(parseInt(progress*$(this).data('number')) + "+");
                    });
                  });
                  // unbind event not to load scroll again
                  $(document).unbind('scroll');
                }
            });
        }
        // Client Slider 
        var $client_slider = $('.client-slider');
        $client_slider.owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            autoplay: true,
            margin: 0,
            autoplayTimeout: 4000,
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 2
                },
                576: {
                    items: 3
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                }
            }
        });

        // testimonial_slider 
        var $testimonial_slider = $('.testimonial-slider');
        $testimonial_slider.owlCarousel({
            loop: true,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            nav: false,
            dots: false,
            autoplay: true,
            margin: 0,
            autoplayTimeout: 4000,
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                }
            }
        });


        // blog-slider
        var $blog_slider = $('.blog-slider');
        $blog_slider.owlCarousel({
            loop: true,
            nav: false,
            dots: false,
            margin: 0,
            autoplay: true,
            autoplayTimeout: 4000,
            smartSpeed: 1200,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 3
                },
                1920: {
                    items: 3
                }
            }
        });


    });


    $window.on('load', function () {
        setTimeout(function () {
            $('body').addClass('loaded');
        });

    });



}(jQuery));

