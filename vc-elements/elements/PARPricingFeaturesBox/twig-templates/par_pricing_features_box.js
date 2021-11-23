(function ($) {
    "use strict"; // Start of use strict
        console.log(pricingSliderArray)
        console.log(pricePerChild)
        var mySlider = new rSlider({
            target: '#pricing-slider',
            values: ['10', '20', '30','40', '75+'],
            range: false,// range slider
            set: null, // an array of preselected values
            width: null,
            scale: false,
            labels: true,
            tooltip: false,
            step: null, // step size
            disabled: false, // is disabled?
            onChange: function (vals) {
                console.log(vals)
            var price = 999;
            if (vals === "75+") {
                $(".pricing-slider .per-month-more").show();
                $(".pricing-slider .per-month").hide();

            } else {
                price = parseInt(vals) * pricePerChild
                $(".pricing-slider .per-month-more").hide();
                $(".pricing-slider .per-month").show();
            }
            $(".pricing-slider ins").each(function (index) {
                if ($(this).find(".child-count").length > 0) {
                    $(this).text($(this).find(".child-count").text());
                }
            });
            $(".pricing-slider ins:contains('" + vals + "')").html("<span class='child-count'>" + vals + "</span><span class='child'>Child</span>")

            $(".pricing-slider .price").text(price);

        }
    });

})(jQuery); // End of use strict
