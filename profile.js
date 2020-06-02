//ajax call to update username.php
$("#updatenameform").submit(function (event) {
    event.preventDefault();
    $.ajax({
        url:"update.php",
        type:"POST",
        data:datatopost,
        success:function (data){
                if(data){
                    
                }
        }
    })

})


//update call to update password.php



//update call to update email.php