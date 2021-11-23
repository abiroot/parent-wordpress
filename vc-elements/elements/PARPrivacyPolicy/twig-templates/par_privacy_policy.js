(function ($) {
    "use strict";

    if($(".privacy-policy").length > 0){
        $(".privacy-policy .pnp-link a").on("click", function(e){
            e.preventDefault();

            $('.privacy-policy .pnp-link').removeClass('active');
            $(this).closest('.pnp-link').addClass('active');
            var dataPage = $(this).attr('data-page');

            $(".privacy-policy div[data-page]").hide();
            $(".privacy-policy div[data-page=" + dataPage + "]").show();
        });
    }

})(jQuery);
