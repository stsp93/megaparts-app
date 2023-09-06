$("#banners-carousel").swipe({
    swipe: function (event, direction) {
        if (direction == 'left') $(this).carousel('next');
        if (direction == 'right') $(this).carousel('prev');
    },
    allowPageScroll: "vertical"
});

$('.filter').on('click', function () {
    $('.search-checkboxes').toggle();
});

$('.main-carousel').flickity({
    cellAlign: 'left',
    groupCells: true,
    pageDots: false,
    setGallerySize: false,
    contain: true
});

$('.auto-carousel').flickity({
    cellAlign: 'left',
    groupCells: true,
    pageDots: false,
    prevNextButtons: false,
    autoPlay: true,
    setGallerySize: false,
    contain: true
});

$('.reviews-carousel').flickity({
    initialIndex: 3,
    wrapAround: true,
    pageDots: false,
    setGallerySize: false,
});



