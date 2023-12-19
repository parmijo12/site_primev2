$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        autoplay: true,
        autoplayHoverPause: true,
        autoplayTimeout: 5000,
        loop: true,
        margin: 0,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            760: {
                items: 2,
            },
            1000: {
                items: 3,
                
            },
        }
    });
});