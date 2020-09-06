export const testimonialsSlider = function () {
    $(document).ready(function () {
        $('.box-testimonials-desc .item').hide();
        $('.box-testimonials-desc .item-1').show();
        $('.box-testimonials-logos #item-1').addClass('active');
        $('.box-testimonials-logos #item-1 img').addClass('active');

        $('.box-testimonials-logos .item').on('click', function () {

            $('.box-testimonials-logos .item').removeClass('active');
            $('.box-testimonials-logos .item img').removeClass('active');
            $(this).addClass('active');
            $(this).find('img').addClass('active');
            let curLogo = '.' + $(this).attr('id');

            $('.box-testimonials-desc .item').hide();
            $('.box-testimonials-desc').find(curLogo).fadeIn('slow');

        });
    });
};
