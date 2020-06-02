<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        body{
            font-family: "Georgia", fantasy;
            background: url("dead.jpg") no-repeat center center;
            background-attachment: fixed;
            background-size: cover;
        }
        a{
            font-family: Georgia, serif;
        }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!--    <link href="main.css" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Password Reset</title>
</head>
<body>
<div id="messgae" style="margin-top:100px">

</div>
<div style="margin-top: 120px;border: 2px solid black">
    <?php
    session_start();
    include("connection.php");
    //if the  email or activation key is  missing show an error
    //else
    if(!isset($_GET["user_id"])||!isset($_GET["key"])){
        echo "<div class='alert alert-danger'>Your password cannot be reset please try again later</div>";
        exit;
    }

    //else
    //store them in two varialbles and prepare other variable for 24 hours
    $user_id=$_GET["user_id"];
    $key=$_GET["key"];
    $time=time()-86400;
    //prepare the variable for the querry
    $user_id=mysqli_real_escape_string($link,$user_id);
    $key=mysqli_real_escape_string($link,$key);
    //run the querry for the processing

    $sql="SELECT user_id FROM forgotpassword WHERE keys1='$key' AND user_id='$user_id' AND time>'$time'AND status ='pending'";
    $result=mysqli_query($link,$sql);
    //if querry is successfull or not
    if(!$result){
        echo "<div class='alert alert-danger'>your querry for password reset is invalid!</div>";
        exit;
    }

    $count=mysqli_num_rows($result);
    if($count!==1){
        echo "<div class='alert alert-danger'>Wrong parameters or Please try again</div>";
        exit;
    }

    //print the reset passform form with hidden user id
    echo "<form method='post' id='resetpass'>
<div class='form-group'>
<input type='hidden' name='key' value='$key'>
<input type='hidden' name='user_id' value='$user_id'>
<label for='respassword'>Enter your new password:</label>
<input type='password' name='respassword' id='respassword' placeholder='Enter password' class='form-control'>
<label for='respassword1'>Re-enter password</label>
<input type='password' name='respassword1' id='respassword1' placeholder='Re-enter password' class='form-control'>
<input type='submit' class='btn btn-success btn-lg' name='restpsbtn' value='Reset Password'>
</div>;
</form>";
    ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $("#resetpass").submit(function (event) {
        event.preventDefault();
        var resetdata=$(this).serializeArray();
        $.ajax({
            url:"storeresetpass.php",
            type:"POST",
            data:resetdata,
            success:function (data) {
                $("#messgae").html(data);
            },
            error:function () {
                $("#messgae").html("error");

            }
        });
    });
</script>
</body></html>
