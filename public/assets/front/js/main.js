AOS.init();
hljs.highlightAll();

$('#searchIcon2').click(function () {
    $("#searchForm").hide();
    $('#searchIcon1').show();
})
$('#searchIcon1').click(function () {
    $(this).hide();
    $('#searchForm').show();
    $('#search_text').focus();
});

$(window).scroll(function (){
   if ($(window).scrollTop() > 150){
       $(".scroll-to-top").css("display", "block");
   }
   else {
       $(".scroll-to-top").css("display", "none");
   }
});
$(".scroll-to-top").click(function (){
   $("html,body").animate({
       scrollTop:$("body").offset().top
   },50);
});



$(document).ready(function () {
    const swiper = new Swiper('.swiper-most-popular', {
        loop: true,
        navigation: {
            nextEl: '.most-popular-swiper-button-next',
            prevEl: '.most-popular-swiper-button-prev',
        },
        speed: 1000,
        spaceBetween: 30,
        slidesPerView: 3,
    });
    const suggest = new Swiper('.swiper-suggest-article', {
        loop: true,
        navigation: {
            nextEl: '.most-popular-swiper-button-next',
            prevEl: '.most-popular-swiper-button-prev',
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false
        },
        speed: 1000,
        spaceBetween: 30,
        slidesPerView: 3,
    });
    const youtube = new Swiper('.swiper-youtube', {
        loop: true,
        speed: 1000,
        slidesPerView: 1,
        navigation: {
            nextEl: '.youtube-swiper-button-next',
            prevEl: '.youtube-swiper-button-prev',
        },
    });
    const authors = new Swiper('.swiper-authors', {
        loop: true,
        speed: 1000,
        slidesPerView: 1,
        navigation: {
            nextEl: '.authors-swiper-button-next',
            prevEl: '.authors-swiper-button-prev',
        },
    });




});

