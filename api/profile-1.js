//ajax call to update username.php
$("#updatenameform").submit(function (event) {
    event.preventDefault();
    var datatopost=$(this).serializeArray();
    //send them to update usernamephp
    $.ajax({
        url:"update.php",
        type:"POST",
        data:datatopost,
        success:function (data){
            if(data){
                $("#updatenamemsg").html(data);
            }
            else{
                location.reload();
            }
        },
        error:function () {
            $("#updatenamemsg").html("there is an issue with the ajax call");
        }
    })

});

//update call to update password.php
$("#updatepassform").submit(function (event) {
    event.preventDefault();
    var datatopot=$(this).serializeArray();
    //send them to update userpassphp
    $.ajax({
        url:"updatepass.php",
        type:"POST",
        data:datatopot,
        success:function (data){
            if(data){
                $("#updatepassmessage").html(data);
            }
            else{
                location.reload();
            }
        },
        error:function (data) {
            console.log(error);
            $("#updatepassmessage").html("there is an issue with the ajax call");
        }
    })

});

//update call to update email.php
$("#updateemailform").submit(function (event) {
    event.preventDefault();
    var datatopost1=$(this).serializeArray();
    //send them to update usernamephp
    $.ajax({
        url:"updateemail.php",
        type:"POST",
        data:datatopost1,
        success:function (data){
            if(data){
                $("#updateemailemsg").html(data);
            }
            else{
                location.reload();
            }
        },
        error:function () {
            $("#updateemailemsg").html("there is an issue with the ajax call");
        }
    })

});