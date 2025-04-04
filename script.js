$(document).ready(function() {
    $(".octagon, .octagondubler ").on("mouseenter", function() {
        $(".sidemenu").css({
            transform: "translateX(570%)",
            transition: "transform 0.8s"
        });
    }).on("mouseleave", function() {
        if (!$(".sidemenu:hover").length) {
            $(".sidemenu").css({
                transform: "translateX(700%)",
                transition: "transform 0.8s"
            });
        }
    });

    $(".sidemenu").on("mouseenter", function() {
        $(".sidemenu").css({
            transform: "translateX(570%)",
            transition: "transform 0.8s"
        });
    }).on("mouseleave", function() {
        if (!$(".octagon:hover").length) {
            $(".sidemenu").css({
                transform: "translateX(700%)",
                transition: "transform 0.8s"
            });
        }
    });

    setTimeout(function(){
        $(".postsend").addClass("animate__pulse");
    }, 1000);


    let form = $(".contact-form")

    $(".postsend").click(function(){
        form.addClass("show-form")
    });

    $("#close").click(function(){
        form.removeClass("show-form")
    });
});
