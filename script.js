$("#banners-carousel").swipe({
    swipe: function (event, direction) {
        if (direction == 'left') $(this).carousel('next');
        if (direction == 'right') $(this).carousel('prev');
    },
    allowPageScroll: "vertical" 
});

$('.filter').on('click', function() {
    $('.search-checkboxes').toggle();
})