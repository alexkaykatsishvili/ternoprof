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

    $("#play").on("click", function() {
        $(".video").toggleClass("show");
        $(".close-bg").show();
    });

    $(".get-price").on("click", function() {
        $(".main__content_form").toggleClass("show");
        $(".close-bg-btn").show();
    });

    $(".close-bg").on("click", function() {
        $(".video").toggleClass("show");
        $(".close-bg").hide();
    });

    $(".close-bg-btn").on("click", function() {
        $(".main__content_form").toggleClass("show");
        $(".close-bg-btn").hide();
    });

    $(".download").on("click", function() {
        $(".status").delay(3000).hide("slow");
    });

})(jQuery);