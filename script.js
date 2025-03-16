$(document).ready(function() {
    setTimeout(function(){
        $(".window1").css("background-color", "#E8AA00");
    }, 2700);
    setTimeout(function(){
        $(".window2").css("background-color", "#E8AA00");
    }, 2900);
    setTimeout(function(){
        $(".window3").css("background-color", "#E8AA00");
    }, 3100);
    function hideMenu() {
        setTimeout(function () {
            if (!$(".octagon:hover").length && !$(".sidemenu:hover").length) {
                $(".movement").css("transform", "translateX(0)");
                $(".sidemenu").css("left", "100%");
            }
        }, 350);
    }
})