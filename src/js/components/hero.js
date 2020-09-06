/*
* Import slick lib.
* */
    import 'slick-carousel/slick/slick.css';
    import 'slick-carousel/slick/slick.js';

export const heroSlider = () => {
    const heroSlider = document.querySelector('.page-hero.page-hero--slider');

    const is_hero_slider = () => {
        return heroSlider;
    };

    const is_slides = () => {
        const slides = heroSlider.querySelector('.hero-slider');

        return slides;
    };

    const show_popover = () => {
        let currentSlidePopover = document.querySelector('.slick-active .hero-slider__popover');
        currentSlidePopover.querySelector('.popover__text').classList.add('active');
        currentSlidePopover.querySelector('.popover__pulsar-icon').classList.add('active');
    };

    const hide_popover = () => {
        let currentSlidePopover = document.querySelector('.slick-active .hero-slider__popover');
        currentSlidePopover.querySelector('.popover__text').classList.remove('active');
        currentSlidePopover.querySelector('.popover__pulsar-icon').classList.remove('active');
    };

    const init_slider = () => {
        if (is_hero_slider()) {
            if (is_slides()) {
                $(function() {
                    $(document).ready(function(){
                        const heroSlider = $('.hero-slider');

                        heroSlider.on('init', function(slick) {
                            show_popover();
                        })

                        heroSlider.slick({
                            dots: true,
                            infinite: true,
                            speed: 600,
                            autoplay: 2000,
                            fade: true
                        });

                        heroSlider.on('beforeChange', function(slick) {
                            hide_popover();
                        })

                        heroSlider.on('afterChange', function(event, slick, direction) {
                            show_popover();
                        })

                    });
                });
            }
        }
    };
    init_slider();
};
