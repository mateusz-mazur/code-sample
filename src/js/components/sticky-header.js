export const stickyHeader = () => {
    $(window).scroll(function() {
        if ($(this).scrollTop() >= 100) {
            $(".js-top-page").addClass("top-page--window-scrolled");
        } else {
            $(".js-top-page").removeClass("top-page--window-scrolled");
        }
    });

};
