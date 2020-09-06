const scrollToContent = function () {
    (function ($) {
        $(document).ready(() => {
            const scrollBtn = $('.js-button-scroll-to-content');

            scrollBtn.on('click', (e) => {
                e.preventDefault();

                $('html, body').animate({
                    scrollTop: $('.box-to-scroll').offset().top - 130,
                }, 1000);
            });
        });
    }(jQuery));
};

export default scrollToContent;
