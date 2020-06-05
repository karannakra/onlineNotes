<?php
session_start();
include "connection.php";
$errors="";
$user_id=$_SESSION['user_id'];
$missingemail="<div class='alert alert-danger'><strong>Please enter a Email address</strong></div>";
$invalidEmail="<div class='alert alert-danger'><strong>Please enter a valid email address</strong></div>";
if(!empty($_POST["update_email"])){
    $errors.=$missingEmail;
}
else{
    $Email=filter_var($_POST["update_email"],FILTER_SANITIZE_EMAIL);
    if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
        $errors.=$invalidEmail;
    }
}
$Email=mysqli_real_escape_string($link,$Email);
echo $errors;
echo $_POST["update_email"];
echo "ji";
exit;
if($errors){
    echo $errors;
    exit;
}
exit;
$sql= "SELECT * FROM  users WHERE email='$Email'";
$result=mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error running the querry</div>";
    exit;
}
$results=mysqli_num_rows($result);
if($results){
    echo "<div class='alert alert-danger'>That Email is already taken</div>";
    exit;
}
$sql="UPDATE users SET email='$Email'WHERE user_id='$user_id'";
$result=mysqli_query($link,$sql);
if(!$result){
    echo "error while updating the email";
}
$sql="SELECT * FROM users WHERE user_id='$user_id'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result);
$_SESSION['email']=$row['email'];
?>