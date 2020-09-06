export const video = () => {
    (function($){

        $(".js-single-video").click(function(){
            $(this).parent().parent().html("<iframe src='"+$(this).data("vimeo-src")+"?portrait=0&title=0&badge=0&byline=0&autoplay=1' width='100%' height='100%' allow=autoplay frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>");
        });

    })(jQuery);
};
