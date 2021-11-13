$(document).ready(function(){

    // Slider Start Here
    $('.owl-carousel.main-slider').owlCarousel({
        items:1,
        merge:true,
        loop:true,
        autoplay:true,
        responsiveClass: true,
        autoplayHoverPause: true, // Stops autoplay
        responsiveRefreshRate : 10,
        autoplaySpeed:2000,
        autoplayTimeout:10000,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed:500,
        margin:10,
        nav:true,
        navText:['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

    $('.single-slider').addClass('clear');

    // Slider End Here



    //jQuery Code for back to top Start Here

    $('#top').hide();
    
    $(window).scroll(function(){    
        var wScroll = $(this).scrollTop();

        var showScrollButton = 50;

        if(wScroll > showScrollButton){
            $('#top').fadeIn();  
        }else{
            $('#top').fadeOut();
        }

    });
    //creating click function for back to top
    $('#top').click(function(){
        $('body, html').animate({
           scrollTop:0 
        }, 2000);
        return false;
    });
    //jQuery Code for back to top End Here



    // Code for Etra section start here
    $('.etra-contents').children('.training').css({
        "opacity": "0",
    });

    $('.etra-contents').children('.research').css({
        "opacity": "0",
    });

    $('.etra-contents').children('.advocacy').css({
        "opacity": "0",
    });

    $('.etra-backgrounds').children('.etra-part').addClass('skewed');
    $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();
        var etrascroll = 10;
        if(scroll > etrascroll){    
            $('.etra-backgrounds').children('.etra-part').addClass('scrolled');
        }else{
            $('.etra-backgrounds').children('.etra-part').removeClass('scrolled');
        }

        if(scroll> 100){
            $('.etra-contents').children('.education').css({
                "opacity": "1",
            });
        }else{
            $('.etra-contents').children('.education').css({
                "opacity": "0",
            });
        }

        if(scroll> 250){
            $('.etra-contents').children('.research').css({
                "opacity": "1",
            });
        }else{
            $('.etra-contents').children('.research').css({
                "opacity": "0",
            });
        }

        if(scroll> 350){
            $('.etra-contents').children('.advocacy').css({
                "opacity": "1",
            });
        }else{
            $('.etra-contents').children('.advocacy').css({
                "opacity": "0",
            });
        }

    });
    // Code for etra section end here



    // Project Slider Start Here
    
    $('.projects-slider').owlCarousel({
        // items:3,
        merge:true,
        loop:true,
        autoplay:true,
        autoplaySpeed:2000,
        autoplayTimeout:10000,
        smartSpeed:500,
        margin:30,
        nav:true,
        navText:['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        lazyLoad:true,
        center:false,
        responsive:{
            480:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:3
            }
        }
    });

    // Project Slider End Here



    // Project Slider Start Here
    
    $('.news-events-slider').owlCarousel({
        // items:3,
        merge:true,
        loop:true,
        autoplay:true,
        autoplaySpeed:2000,
        autoplayTimeout:10000,
        smartSpeed:500,
        margin:30,
        nav:true,
        navText:['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        lazyLoad:true,
        center:false,
        responsive:{
            480:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:3
            }
        }
    });

    // Project Slider End Here



    // News Slider Start Here
    $('.owl-carousel.publication-slider').owlCarousel({
        items:3,
        loop:true,
        autoplay:true,
        responsiveClass: true,
        autoplayHoverPause: true, // Stops autoplay
        responsiveRefreshRate : 10,
        autoplaySpeed:2000,
        autoplayTimeout:10000,
        smartSpeed:500,
        margin:10,
        nav:true,
        navText:['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:3
            },
            1367:{
                items:4
            },
        }
    });
    // News Slider End Here







    //Code for sticky menu Start Here
    var x = $('.header-main').offset().top; 
    
    $(window).scroll(function(){
        var y = $(window).scrollTop();
        
        if(y>x){
            $('.header-main').addClass('sticky');
           }else{
            $('.header-main').removeClass('sticky');
           }
    });
    $('.header-main').wrapAll('<div class="cover">');
    // $('.cover').css('height', $('.header-main').outerHeight());
    $('.cover').css('height', '90px');
    // $('.cover').css('max-height', '90px');
    // $('.cover').css('height', 'auto');
    //Code for sticky menu End Here


    $('.second-drop-menu').mouseenter(function(){
        $(this).children('.second-dropped-menu').slideDown(500);
    });

    $('.second-drop-menu').mouseleave(function(){
        $(this).children('.second-dropped-menu').slideUp(0);
    });


    // Publication Height
    var l_p_height = $('.latest-publication').innerHeight();
    $('.publication-list').css('height', l_p_height);




    // Partners Slider Start here
    $('.owl-carousel.partners-slider').owlCarousel({
        items:5,
        loop:true,
        autoplay:true,
        responsiveClass: true,
        autoplayHoverPause: true, // Stops autoplay
        responsiveRefreshRate : 10,
        autoplaySpeed:2000,
        autoplayTimeout:10000,
        smartSpeed:500,
        margin:10,
        // nav:true,
        // navText:['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:3
            },
            1366:{
                items:5
            },
        }
    });




    // Image gallery
    $('.gallery a').simpleLightbox();



});

// Wow initialize
new WOW().init();