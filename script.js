$(document).ready(function() {
    function banscroll() {
        $("body").css({
            "overflow-y" : "hidden"
        });
    }
    function allowscroll() {
        $("body").css({
            "overflow-y" : "auto"
        });
    }
    $(".octagon, .octagondubler ").on("mouseenter", function() {
        banscroll();
        $("body").css({
            transform: "translateX(-15%)",
            transition: "transform 0.5s"
        });
    }).on("mouseleave", function() {
        allowscroll();
        if (!$(".sidemenu:hover").length) {
            $("body").css({
                transform: "translateX(0%)",
                transition: "transform 0.5s"
            });
        }
    });

    $(".sidemenu").on("mouseenter", function() {
        banscroll();
        $("body").css({
            transform: "translateX(-15%)",
            transition: "transform 0.5s"
        });
    }).on("mouseleave", function() {
        allowscroll();
        if (!$(".octagon:hover").length) {
            $("body").css({
                transform: "translateX(0%)",
                transition: "transform 0.5s"
            });
        }
    });
});