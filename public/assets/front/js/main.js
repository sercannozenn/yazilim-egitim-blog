AOS.init();
hljs.highlightAll();

$('#searchIcon2').click(function () {
    $("#searchForm").hide();
    $('#searchIcon1').show();
})
$('#searchIcon1').click(function () {
    $(this).hide();
    $('#searchForm').show();
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

    $('.btnArticleResponse').click(function ()
    {
        $('.response-form').toggle();
    });
});
