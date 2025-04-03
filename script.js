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

    $("#sendButton").click(function() {
        var name = $("#name").val().trim();
        var surname = $("#surname").val().trim();
        var email = $("#email").val().trim();
        var company = $("#company-name").val().trim();
        var csrfToken = $("input[name='csrf_token']").val();
        
        if (name === "" || surname === "" || email === "") {
            $("#responseMessage").html("Please fill in all required fields!").css("color", "red");
            return; 
        }
        
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            $("#responseMessage").html("Please enter a valid email!").css("color", "red");
            return;
        }

        var formData = $("#contactForm").serialize(); 

        $("#sendButton").prop("disabled", true);
        setTimeout(function() {
            $("#sendButton").prop("disabled", false);
        }, 5000);

        $.ajax({
            url: 'send_mail.php',  
            type: 'POST',
            data: formData,  
            success: function(response) {
                $('#responseMessage').html(response).css("color", "green");
                $("#contactForm")[0].reset();
            },
            error: function() {
                $('#responseMessage').html("There was an error sending your message. Please try again.").css("color", "red");
            }
        });
        var submitButton = $(".form-button")
        submitButton.css({
             "border-color" : "red"
        });

        setTimeout(function() {
            submitButton.css({
                 "border-color" : "transparent"
            }); 
        }, 5000);
    });
});
