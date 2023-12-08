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
    <title>Account Activation</title>
</head>
<body>
<?php
session_start();
include("connection.php");
//if the  email or activation key is  missing show an error
//else
if(!isset($_GET["email"])||!isset($_GET["key"])){
    echo "<div class='alert alert-danger'>Your account is not activated</div>";
    exit;
}
//else
//store them in two varialbles
$email=$_GET["email"];
$key=$_GET["key"];
//prepare the variable for the querry
$email=mysqli_real_escape_string($link,$email);

$key=mysqli_real_escape_string($link,$email);
$sql="UPDATE users SET activation='activated' WHERE email='$email'LIMIT 1";
$result=mysqli_query($link,$sql);
//if querry is successfull or not
if(mysqli_affected_rows($link)==1){
    echo "<div style='text-align: center' class='alert alert-success'>Your account has been  activated<br>Please click on the link to <a href='index.php'>login</a></div>";
}
else{
    echo "<div class='alert alert-success'>Your account could not activated please try again later</div>";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body></html>
