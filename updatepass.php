<?php
//start the session
session_start();
include "connection.php";
////errors
$errors="";
//get the user id
$user_id=$_SESSION['user_id'];
//get the password sent through the ajax call
$currnt_pass=$_POST['currentpass'];
$new_pass=$_POST['newpass'];
$confirm_pass=$_POST['newpass1'];
$wrongcrnPassword="<div class='alert alert-danger'><strong>The current password is not correct</strong></div>";
$missingPassword="<div class='alert alert-danger'><strong>Please enter a password</strong></div>";
$invalidPassword="<div class='alert alert-danger'><strong>Your password should be at least 6 characters long and include one capital letter and one number!</strong></div>";
$differentPassword="<div class='alert alert-danger'><strong>Passowrd don't match!</strong></div>";
$missingPassword2="<div class='alert alert-danger'><strong>Please confirm your password</strong></div>";

//check for the empty values of the passwords
if(empty($_POST["currentpass"])){
    $errors.=$missingPassword;
}
elseif(!(strlen($_POST["newpass"])>6 and preg_match("/[A-Z]/",$_POST["newpass"]) and preg_match("/[0-9]/",$_POST["newpass"]))){
    $errors.=$invalidPassword;
}else{
    $new_pass=filter_var($_POST["newpass"],FILTER_SANITIZE_STRING);
    if(empty($_POST["newpass1"])){
        $errors.=$missingPassword2;

    }else{
        $confirm_pass=filter_var($_POST["newpass1"],FILTER_SANITIZE_STRING);
        if($new_pass!==$confirm_pass){
            $errors.=$differentPassword;
        }
    }
}
$currnt_pass=mysqli_real_escape_string($link,$currnt_pass);
$new_pass=mysqli_real_escape_string($link,$new_pass);
$confirm_pass=mysqli_real_escape_string($link,$confirm_pass);
$currnt_pass=hash('sha256',$currnt_pass);
$sql="SELECT * FROM users WHERE user_id='$user_id'";
$result=mysqli_query($link,$sql);
if(!$result){
    echo "not";
    exit;
}
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$pw=$row['password'];
if(!hash_equals($currnt_pass,$pw)){
    $errors.=$wrongcrnPassword;
    echo "hi";
    echo $pw;
    exit;
}
if($errors){
    echo $errors;
    exit;
}
$sql="UPDATE users SET password='$currnt_pass'WHERE user_id='$user_id'";
$result=mysqli_query($link,$sql);
echo "<div class='alert alert-success'>password has been changed SuccessFully!</div>";
?>


