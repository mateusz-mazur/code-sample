/*
* Block Video.
* */

    /*
    * Styles.
    * */
    import './_video-styles.scss';

    /*
    * Import.
    * */
    import 'slick-carousel';

    /*
    *
    * */
    $(function() {
        $(document).ready(function(){

            $('.video-slider').slick({
                centerMode: true,
                centerPadding: '0px',
                slidesToShow: 3,
                swipe: false,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: true,
                            centerMode: true,
                            // centerPadding: '40px',
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            arrows: true,
                            centerMode: true,
                            // centerPadding: '40px',
                            slidesToShow: 1
                        }
                    }
                ]
            });

            $('.video-slider').on('afterChange', function(event, slick, direction) {
                let currentSlide = document.querySelector('.slick-current .video-slider__item');
            });
        });
    });
