$(document).ready(function () {
    //initialize swiper when document ready  
    var mySwiper = new Swiper ('.swiper-container', {
        // Optional parameters
        pagination: '.swiper-pagination',
        paginationClickable: true,
        direction: 'horizontal',
        loop: true,
        autoplay: 2500,
        autoplayDisableOnInteraction: false
    })
});