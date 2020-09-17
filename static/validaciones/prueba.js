document.addEventListener('DOMContentLoaded', function() {
    var secondarySlider = new Splide('#secondary-slider', {
        fixedWidth: 80,
        height: 80,
        gap: 8,
        cover: true,
        isNavigation: true,
        focus: 'center',
        pagination: false,
        arrows: true,
        breakpoints: {
            '600': {
                fixedWidth: 66,
                height: 40,
            }
        },
    }).mount();

    var primarySlider = new Splide('#primary-slider', {
        fixedWidth: 300,
        height: 300,
        type: 'fade',
        heightRatio: 0.5,
        pagination: false,
        arrows: false,
        cover: true,
    }); // do not call mount() here.

    primarySlider.sync(secondarySlider).mount();
});