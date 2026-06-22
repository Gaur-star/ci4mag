$(document).ready(function(){
    $('.search_btn').click(function(){
        $('.search_area').toggleClass('search_active')
    })
})

// =======fixed header====

let fixheader = document.querySelector(".header_area");
let sticky = fixheader.offsetTop = 270;

window.addEventListener("scroll", () => {
    if (window.pageYOffset > sticky) {
        fixheader.classList.add("sticky_header");
    } else {
        fixheader.classList.remove("sticky_header");
    }
});

// =====main banner slider
$(".main_banner_slider").owlCarousel({
    loop: true,
    animateOut: 'fadeOut',
    autoplay: false,
    autoplayHoverPause: true,
    nav: true,
    margin: 0,
    dots: false,
    mouseDrag: true,
    touchDrag: true,
    slideSpeed: 500,
    navText: ['<i class="fa-solid fa-angle-right"></i>', "<i class='fa fa-angle-left'></i>"],
    items: 1,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        }
    }

});

// ======latest news slider
$('.latest_news_slider').owlCarousel({
    loop:true,
    margin:30,
    navText: [
        '<i class="fa-solid fa-angle-left"></i>',
        '<i class="fa-solid fa-angle-right"></i>'
    ],
    nav:true,
    responsive:{
        0:{
            items:1
        },
        576:{
            items:2
        },
        1000:{
            items:4
        }
    }
})

// ======trending slider
$('.trending_slider').owlCarousel({
    loop: true,
    animateOut: 'fadeOut',
    autoplay: false,
    autoplayHoverPause: true,
    nav: true,
    margin: 0,
    dots: false,
    mouseDrag: true,
    touchDrag: true,
    slideSpeed: 500,
    navText: ['<i class="fa-solid fa-angle-left"></i>', "<i class='fa fa-angle-right'></i>"],
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
})


// ======trending slider
$('.ver_post_slider').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
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
})


// ======related post slider
$('.related_slider').owlCarousel({
    loop:true,
    margin:30,
    navText: [
        '<i class="fa-solid fa-angle-left"></i>',
        '<i class="fa-solid fa-angle-right"></i>'
    ],
    nav:true,
    responsive:{
        0:{
            items:1
        },
        576:{
            items:2
        },
        1000:{
            items:4
        }
    }
})