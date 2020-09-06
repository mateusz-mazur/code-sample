(function($){
    let AOS = require("aos");

    $(window).on("resize", function() {

        /* ~~~~~~~~~~ Refresh ~~~~~~~~~~ */

        AOS.refreshHard();
    });

    $(document).on("lazyloaded", function(){

        /* ~~~~~~~~~~ Refresh ~~~~~~~~~~ */

        AOS.refreshHard();
    });


})(jQuery);
