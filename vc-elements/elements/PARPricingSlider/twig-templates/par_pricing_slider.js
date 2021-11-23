(function ($) {
    "use strict"; // Start of use strict
    var sliderMobile = document.getElementById('pricing-slider-mobile')
    var sliderTablet = document.getElementById('pricing-slider-tablet')
    var sliderDesktop = document.getElementById('pricing-slider-desktop')

    if(screen.width <= 600 ){
        sliderMobile.setAttribute('hidden' ,false)
        sliderTablet.setAttribute('hidden' ,true)
        sliderDesktop.setAttribute('hidden' ,true)
    }else if (screen.width <1007)
    {
        sliderMobile.setAttribute('hidden' ,true)
        sliderTablet.setAttribute('hidden' ,false)
        sliderDesktop.setAttribute('hidden' ,true)
    }else{
        sliderMobile.setAttribute('hidden' ,true)
        sliderTablet.setAttribute('hidden' ,true)
        sliderDesktop.setAttribute('hidden' ,false)
    }

    console.log(sliderDesktop.getAttribute('hidden'))
    if(sliderDesktop.getAttribute('hidden') === 'false'){
        console.log('in')
        var mySlider = new rSlider({
            target: '#pricing-slider-desktop',
            values: pricingSliderArray,
            range: false,// range slider
            set: null, // an array of preselected values
            width: 700,
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
        })

    }
    if(sliderTablet.getAttribute('hidden') === 'false'){
        var mySlider = new rSlider({
            target: '#pricing-slider-tablet',
            values: pricingSliderArray,
            range: false,// range slider
            set: null, // an array of preselected values
            width: 400,
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
        })

    }

    if(sliderMobile.getAttribute('hidden') === 'false'){
        var mySliderMobile = new rSlider({
            target: '#pricing-slider-mobile',
            values: pricingSliderArray,
            range: false,// range slider
            set: null, // an array of preselected values
            width: 250,
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

    }

})(jQuery); // End of use strict
