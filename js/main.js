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

    // $("#play").on("click", function() {
    //     $(".video").toggleClass("show");
    //     $(".close-bg").show();
    // });

    // $(".get-price").on("click", function() {
    //     $(".main__content_form").toggleClass("show");
    //     $(".close-bg-btn").show();
    // });

    // $(".conf-pol").on("click", function() {
    //     $(".confidence-policy").toggleClass("show");
    //     $(".close-bg-policy").show();
    // });

    $("#play").on("click", function() {
        $(".video").toggleClass("show");
        $(".close-bg").show();
    });

    $(".get-price").on("click", function() {
        $(".main__content_form").toggleClass("show");
        $(".close-bg").show();
    });

    $(".conf-pol").on("click", function() {
        $(".confidence-policy").toggleClass("show");
        $(".close-bg").show();
    });

    // $(".close-bg").on("click", function() {
    //     $(".video").toggleClass("show");
    //     $(".close-bg").hide();
    // });

    $(".close-bg").on("click", function() {
        if ($(".video").hasClass("show")) {
            $(".close-bg").hide();
        }
        if ($(".main__content_form").hasClass("show")) {
            $(".close-bg").hide();
        }
        if ($(".confidence-policy").hasClass("show")) {
            $(".close-bg").hide();
        }
    });

    // $(".close-bg-btn").on("click", function() {
    //     $(".main__content_form").toggleClass("show");
    //     $(".close-bg-btn").hide();
    // });

    //  $(".close-bg-policy").on("click", function() {
    //     $(".confidence-policy").toggleClass("show");
    //     $(".close-bg-policy").hide();
    // });

    $(".download").on("click", function() {
        $(".status").delay(3000).hide("slow");
    });

})(jQuery);