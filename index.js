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
$("#logout").submit(function (event) {
    event.preventDefault();
    window.location="onlineNotes.php";
});