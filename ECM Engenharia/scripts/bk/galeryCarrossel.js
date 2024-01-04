const galeryCarrossel = new Glider(document.querySelector('.photo-carrossel'), {
    // Mobile-first defaults
    slidesToShow: 1,
    slidesToScroll: 1,
    scrollLock: true,
    draggable: true,
    dots: '#dots-galery',
    arrows: {
        prev: '.prev-galery',
        next: '.next-galery'
    },
    responsive: [
        {
            // screens greater than >= 775px
            breakpoint: 600,
            settings: {
                // Set to `auto` and provide item width to adjust to viewport
                slidesToShow: 1,
                slidesToScroll: 1,
                duration: 0.25
            }
        }, {
            // screens greater than >= 1024px
            breakpoint: 750,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                duration: .25
            }
        }
    ]
});