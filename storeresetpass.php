<!--this file recieves:user_id generated key to reset password  password1 and password2 -->
<!--this file then reset the password if all the checks are correct-->

<?php
session_start();
include "connection.php";
if(!isset($_POST["user_id"])||!isset($_POST["key"])) {
    echo "<div class='alert alert-danger'>Your password cannot be reset please try again later!storepass.php</div>";
    exit;
}
$errors="";
$missingPassword="<div class='alert alert-danger'><strong>Please enter a password</strong></div>";
$invalidPassword="<div class='alert alert-danger'><strong>Your password should be at least 6 characters long and include one capital letter and one number!</strong></div>";
$differentPassword="<div class='alert alert-danger'><strong>Passowrd don't match!</strong></div>";
$missingPassword2="<div class='alert alert-danger'><strong>Please confirm your password</strong></div>";
//else
//store them in two varialbles and prepare other variable for 24 hours
$user_id=$_POST["user_id"];
$key=$_POST["key"];
$time=time()-86400;


//get the values from the form
if(empty($_POST["respassword"])){
    $errors.=$missingPassword;
}
elseif(!(strlen($_POST["respassword"])>6 and preg_match("/[A-Z]/",$_POST["respassword"]) and preg_match("/[0-9]/",$_POST["respassword"]))){
    $errors.=$invalidPassword;
}else{
    $password=filter_var($_POST["respassword"],FILTER_SANITIZE_STRING);
    if(empty($_POST["respassword1"])){
        $errors.=$missingPassword2;

    }else{
        $password2=filter_var($_POST["respassword1"],FILTER_SANITIZE_STRING);
        if($password!==$password2){
            $errors.=$differentPassword;
        }
    }
}
if($errors){
    echo $errors;
    exit;
}
//prepare the variable for the querry
$user_id=mysqli_real_escape_string($link,$user_id);
$key=mysqli_real_escape_string($link,$key);
$password=mysqli_real_escape_string($link,$password);
$password2=mysqli_real_escape_string($link,$password2);
$password=hash('sha256',$password);
//run the querry for the processing
$sql="SELECT user_id FROM forgotpassword WHERE keys1='$key' AND user_id='$user_id' AND time>'$time' AND status='pending'";
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
$sql="UPDATE users SET password='$password' WHERE user_id='$user_id'";
$result=mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>your querry cannot run for reset is invalid!</div>";
    exit;
}
$status='used';
//update the key to used in the table to prevent to use the link again
$sql1="UPDATE forgotpassword SET status='$status'WHERE user_id='$user_id'";
$result=mysqli_query($link,$sql1);
if(!$result){
    echo "<div class='alert alert-danger'>cannot execute the querry regarding matching</div>";
    exit;
}
echo "<div class='alert alert-success'>Your password has been updated Successfully!<a href='index.php'>Login</a></div>";

?>