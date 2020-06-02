//ajax call for the signup function
//once the form is submitted
//collecting user inputs
$("#signupform").submit(function (event) {
    //prevent default processing
    event.preventDefault();
    var datatopost=$(this).serializeArray();
    //send them to signup.php using the ajax call
    $.ajax({
        url:"signup.php",
        type:"POST",
        data:datatopost,
        //if call is sucessfull then success messgage
        success:function (data) {
            if(data){
                $("#signupmessage").html(data)
            }

        },
        error:function () {
            $("#signupmessage").html("<div class='alert alert-danger'>failure</div>");

        }
    });

});
//ajax call for the login form
$("#signinform").submit(function (event) {
    //prevent default processing
    event.preventDefault();
    var logindatatopost=$(this).serializeArray();
    //send them to signup.php using the ajax call
    $.ajax({
        url:"login.php",
        type:"POST",
        data:logindatatopost,
        //if call is successful then success message
        success:function (data) {
                if(data=="success") {
                    window.location="loggedin.php";
                }
                else {
                    $("#signinmessage").html(data);
                }
        },
        error:function () {
            $("#signinmessage").html("<div class='alert alert-danger'>failure</div>");

        }
    });

});
$("#forgotpassform").submit(function (event) {
    //prevent default by php
    event.preventDefault();
    var datatonewpost=$(this).serializeArray();
    $.ajax({
        url:"forgot.php",
        type:"POST",
        data:datatonewpost,
        success:function (data) {
                $("#frgtpsw").html(data);

        },
        error:function () {
                    $("#frgtpsw").html("<div class='alert alert-danger'>cannot create the ajax call</div>");
        }
    })

});