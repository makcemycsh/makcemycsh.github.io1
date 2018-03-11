$(document).ready(function () {
    $(".wrap-slider").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 8000,
//        fade: true,
        cssEase: 'linear',
        appendArrows: $('.slider-arrow'),
        prevArrow: '<div class="prev"></div>',
        nextArrow: '<div class="next"></div>'
    });
});