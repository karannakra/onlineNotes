<?php
session_start();
include "connection.php";
//check the user inputs
$errors="";
$missingEmail="<div class='alert alert-danger'><strong>Please enter your email address</strong></div>";
$invalidEmail="<div class='alert alert-danger'><strong>Please enter a valid email address</strong></div>";
$Email=$_POST["forgotemail"];
if(empty($_POST["forgotemail"])){
    $errors.=$missingEmail;
}
else{
    $Email=filter_var($_POST["forgotemail"],FILTER_SANITIZE_EMAIL);
    if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
        $errors.=$invalidEmail;
    }
}
if($errors){
    echo "<div class='alert alert-danger'>$errors</div>";
    exit;
}
//prepare the variable for the querry
$Email=mysqli_real_escape_string($link,$Email);
$sql="SELECT * FROM users WHERE email='$Email' ";
$result=mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>There is an error with the querry".mysqli_error($link)."</div>";
    exit;
}
$count=mysqli_num_rows($result);
if(!$count){
    echo "<div class='alert alert-danger'>Email doesnot exist on our database please signup!</div>";
    exit;
}
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$activationkey=bin2hex(openssl_random_pseudo_bytes(10));
$user_id=$row['user_id'];
//insert user details and activation code in the forgotpassword table
$time=time();
$status="pending";
$sql="INSERT INTO forgotpassword (`user_id`,`keys1`,`time`,`status`) VALUES ('$user_id','$activationkey','$time','$status')";
$result=mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>There is an error with the querry".mysqli_error($link)."</div>";
    exit;
}
//send mail to the users mail
$message="Please click on this link to Reset your password:\n\n";
$message.="http://www.karannakra.host20.uk/resetpassword.php?user_id=".$user_id."&key=$activationkey";
mail($Email,'Reset your Password',$message);
if(!mail($Email,'Reset your Password',$message)){
    echo "<div class='alert alert-danger'>There is an error with the Email</div>";
    exit;
}
echo "<div class='alert alert-success'>An email has been sent to $Email.Please click on the link to reset Your password</div>";
?>
