(function ($) {
    "use strict"; // Start of use strict

    (new IntersectionObserver(function (e, o) {
        if (e[0].intersectionRatio > 0) {
            document.documentElement.removeAttribute('class');
        } else {
            document.documentElement.setAttribute('class', 'stuck');
        }
    })).observe(document.querySelector('.trigger'));

    if ($('section.counters').length > 0) {
        var a = 0;
        $(window).scroll(function () {
            var oTop = $('section.counters').offset().top - window.innerHeight;
            if (a === 0 && $(window).scrollTop() > oTop) {
                $('section.counters .counter strong').each(function () {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                            countNum: countTo
                        },
                        {
                            duration: 3000,
                            easing: 'swing',
                            step: function () {
                                $this.text(Math.floor(this.countNum));
                            },
                            complete: function () {
                                $this.text(this.countNum);
                                //alert('finished');
                            }
                        });
                });
                a = 1;
            }
        });
    }


    if ($(".info-slide .splide").length > 0) {
        var infoSlide = new Splide('.info-slide .splide', {
            type: 'loop',
            perPage: 1,
            arrows: false,
            autoplay: true,
            gap: '10px'
        });
        infoSlide.mount();
    }

    if ($('.career-positions .splide').length > 0) {
        var careersSlide = new Splide('.career-positions .splide', {
            type: 'loop',
            perPage: 6,
            arrows: false,
            autoplay: true,
            gap: '15px',
            breakpoints: {
                1400: {
                    perPage: 6,
                    arrows: true,
                },
                1200: {
                    perPage: 4,
                    arrows: true,
                },
                768: {
                    perPage: 2,
                },
                578: {
                    perPage: 1,
                },
            }
        });
        careersSlide.mount();
    }

    // if ($("#pricing-slider").length > 0) {
    //     var mySlider = new rSlider({
    //         target: '#pricing-slider',
    //         values: [10, 30, 50, 70, '75+'],
    //         range: false,// range slider
    //         set: null, // an array of preselected values
    //         width: null,
    //         scale: false,
    //         labels: true,
    //         tooltip: false,
    //         step: null, // step size
    //         disabled: false, // is disabled?
    //         onChange: function (vals) {
    //             var price = 999;
    //             if (vals === "75+") {
    //                 $(".pricing-slider .per-month-more").show();
    //                 $(".pricing-slider .per-month").hide();
    //
    //             } else {
    //                 if (vals === "10") {
    //                     price = 25;
    //                 } else if (vals === "30") {
    //                     price = 75;
    //                 } else if (vals === "50") {
    //                     price = 125;
    //                 } else if (vals === "70") {
    //                     price = 175;
    //                 }
    //                 $(".pricing-slider .per-month-more").hide();
    //                 $(".pricing-slider .per-month").show();
    //             }
    //             $(".pricing-slider ins").each(function (index) {
    //                 if ($(this).find(".child-count").length > 0) {
    //                     $(this).text($(this).find(".child-count").text());
    //                 }
    //             });
    //             $(".pricing-slider ins:contains('" + vals + "')").html("<span class='child-count'>" + vals + "</span><span class='child'>Child</span>")
    //
    //             $(".pricing-slider .price").text(price);
    //
    //         }
    //     });
    // }


    // if ($("#address-picker").length > 0) {
    //     $("#address-picker .countries-list li").on("click", function(){
    //         $("#address-picker .countries-list li").removeClass("active");
    //         $(this).addClass('active');
    //         var countryCode = $(this).attr('data-country');
    //         let countryNameElement = $(".country-info .country");
    //         let addressElement = $(".country-info ul li.address");
    //         let phoneElement = $(".country-info ul li.phone");
    //         let mailElement = $(".country-info ul li.mail ");
    //
    //         if(countryCode === "dk"){
    //             countryNameElement.text("Denmark(HQ)");
    //             addressElement.find("span").text("Rentemestervej 2A, Copenhagen NV 2400");
    //             phoneElement.find("span").text("+45 8877 4044");
    //             phoneElement.find("a").attr("href", "tel:+45 8877 4044");
    //             mailElement.find("span").text("contact@parent.cloud");
    //             mailElement.find("a").attr("href", "mailto:contact@parent.cloud");
    //         }else{
    //             countryNameElement.text("Country");
    //             addressElement.find("span").text("Address");
    //             phoneElement.find("span").text("phone");
    //             phoneElement.find("a").attr("href", "tel:+45 8877 4044");
    //             mailElement.find("span").text("email");
    //             mailElement.find("a").attr("href", "mailto:email");
    //         }
    //     });
    // }


})(jQuery); // End of use strict

