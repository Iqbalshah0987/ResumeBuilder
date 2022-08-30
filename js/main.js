(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.sticky-top').css('top', '0px');
        } else {
            $('.sticky-top').css('top', '-100px');
        }
    });
    
    
    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";
    
    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
            function() {
                const $this = $(this);
                $this.addClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "true");
                $this.find($dropdownMenu).addClass(showClass);
            },
            function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
            }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Header carousel
    $(".header-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        items: 1,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        margin: 24,
        dots: true,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });

    // Testimonials resume carousel
    $(".testimonial-resume-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        margin: 24,
        dots: true,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });
    

    setInterval(function(){
        $(".testimonial-resume-carousel .owl-nav, .testimonial-resume-carousel .owl-dots").removeClass("disabled");
    },1000);
    
    
})(jQuery);




// custom javaScript
$(document).ready(function(){

    function eyeButtonFunction(eye_button,password){

        if($("#"+password).attr("type")==="password"){

            $("#"+password).attr("type","text");
            $("#"+eye_button).removeClass("bi-eye-slash").addClass("bi-eye");
            $("#"+eye_button).attr("title","Hide Password");

         }else{
            $("#"+password).attr("type","password");
            $("#"+eye_button).removeClass("bi-eye").addClass("bi-eye-slash");
            $("#"+eye_button).attr("title","Show Password");

         }
    }

     //   toggle password eye button
     $("#eye-button1").on("click",function(){
        eyeButtonFunction("eye-button1","password");
     });
 
     //   toggle password eye button
     $("#eye-button2").on("click",function(){
        eyeButtonFunction("eye-button2","cpassword");
     });

     //   toggle password eye button
     $("#eye-button3").on("click",function(){
        eyeButtonFunction("eye-button3","npassword");
     });

     //   toggle password eye button
     $("#eye-button4").on("click",function(){
        eyeButtonFunction("eye-button4","cnpassword");
     });



})

