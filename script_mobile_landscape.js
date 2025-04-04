$(document).ready(function() {
    $(".octagon, .octagondubler, .octim").click(function() {
        $(".sidemenu").css({
            transform: "translateX(233.5%)",
            transition: "transform 0.8s"
        });
    })

    $(".backbtn").click(function() {
        $(".sidemenu").css({
            transform: "translateX(333.5%)",
            transition: "transform 0.8s"
        });
    })

    

    setTimeout(function(){
        $(".postsend").addClass("animate__pulse");
    }, 1000);
    window.addEventListener('load', function() {
        document.querySelector('.contact-form').offsetHeight;
      });

    let form = $(".contact-form")

    $(".postsend").click(function(){
        form.addClass("show-form")
    });

    $("#close").click(function(){
        form.removeClass("show-form")
    });
});
