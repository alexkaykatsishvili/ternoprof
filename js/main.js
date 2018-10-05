(function($) {
    /* Mobile menu's functions */
    $(".header__nav_icon").on("click", function() {
        $("nav.header__nav--mobile").toggleClass("mobile-active");
        $(".header__nav_icon").toggleClass("header__nav_icon--transform");
    });

    $(window).on('resize', function() {
        var win = $(this);
        if (win.width() > 768) {
            if ($("nav.header__nav--mobile").hasClass("mobile-active")) {
                $("nav.header__nav--mobile").removeClass("mobile-active");
            }
            if ($(".header__nav_icon").hasClass("header__nav_icon--transform")) {
                $(".header__nav_icon").removeClass("header__nav_icon--transform");
            }
        }
    });

    function showUp(on, what) {
        $(on).on("click", function() {
            $(what).toggleClass("show");
            $(".close-bg").show();
        });
    }

    function hideUp(what) {
        $(what).toggleClass("show");
        $(".close-bg").hide();
    }

    showUp("#play", ".video");
    showUp(".get-price", ".main__content_form");
    showUp(".conf-pol", ".confidence-policy");

    $(".close-bg").on("click", function() {
        if ($(".video").hasClass("show")) {
            hideUp(".video");
            pause();
        }
        if ($(".main__content_form").hasClass("show")) {
            hideUp(".main__content_form");
        } else {
            $(".main__content_form").hide();
            $(".close-bg").hide();
        }
        if ($(".confidence-policy").hasClass("show")) {
            hideUp(".confidence-policy");
        }
    });

    $(".download").on("click", function() {
        $(".status").delay(3000).hide();
        $(".status-close").delay(3000).hide();
    });

    $(".status-close").on("click", function() {
        $(".status-close").hide();
        $(".status").hide();
    });

    $('a').click(function() {
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top
        }, 500);
        return false;
    });

    // $("#my_nanogallery2").nanogallery2({
    //     items: [{
    //             src: 'berlin1.jpg', // image url
    //             srct: 'berlin1t.jpg', // thumbnail url
    //             title: 'Berlin 1', // title
    //             description: 'this is Berlin' // desceription
    //         },
    //         { src: 'berlin2.jpg', srct: 'berlin2t.jpg', title: 'Berlin 2' },
    //         { src: 'berlin3.jpg', srct: 'berlin3t.jpg', title: 'Berlin 3' }
    //     ],
    //     thumbnailWidth: 'auto',
    //     thumbnailHeight: 100,
    //     itemsBaseURL: 'https://nanogallery2.nanostudio.org/samples/',

    //     locationHash: false
    // });

})(jQuery);