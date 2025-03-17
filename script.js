$(document).ready(function() {
    function blockScroll() {
        document.body.style.overflow = 'hidden';
    }
    function unblockScroll() {
        document.body.style.overflow = '';
    }
    function hideMenu() {
        setTimeout(function () {
            if (!$(".octagon:hover").length && !$(".sidemenu:hover").length) {
                $(".movement").css("transform", "translateX(0)");
                $(".sidemenu").css("left", "100%");
            }
        }, 350);
    }
    $(".octagon, .sidemenu").hover(
        function () {
            $(".movement").css("transform", "translateX(-16%)");
            $(".sidemenu").css("left", "84%");
            blockScroll();
        },
        function () {
            hideMenu();
            unblockScroll();
        }
    );
})