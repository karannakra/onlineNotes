<?php
//start a session
session_start();
//connect to the database
include ("connection.php");
//check userinputs
$errors="";
$missingUsername="<div class='alert alert-danger'><strong>Please enter username</strong></div>";
$missingEmail="<div class='alert alert-danger'><strong>Please enter your email address</strong></div>";
$invalidEmail="<div class='alert alert-danger'><strong>Please enter a valid email address</strong></div>";
$missingPassword="<div class='alert alert-danger'><strong>Please enter a password</strong></div>";
$invalidPassword="<div class='alert alert-danger'><strong>Your password should be at least 6 characters long and include one capital letter and one number!</strong></div>";
$differentPassword="<div class='alert alert-danger'><strong>Passowrd don't match!</strong></div>";
$missingPassword2="<div class='alert alert-danger'><strong>Please confirm your password</strong></div>";
//get username email and passowrd
//get username
if(empty($_POST["username"])){
    $errors.=$missingUsername;
}
else{
    $username=filter_var($_POST["username"],FILTER_SANITIZE_STRING);
}
//get email
if(empty($_POST["email"])){
    $errors.=$missingEmail;
}
else{
    $Email=filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
    if(!filter_var($Email,FILTER_VALIDATE_EMAIL)){
        $errors.=$invalidEmail;
    }
}
//get password
if(empty($_POST["signuppswd"])){
    $errors.=$missingPassword;
}
elseif(!(strlen($_POST["signuppswd"])>6 and preg_match("/[A-Z]/",$_POST["signuppswd"]) and preg_match("/[0-9]/",$_POST["signuppswd"]))){
    $errors.=$invalidPassword;
}else{
    $password=filter_var($_POST["signuppswd"],FILTER_SANITIZE_STRING);
    if(empty($_POST["signuppswd1"])){
        $errors.=$missingPassword2;

    }else{
        $password2=filter_var($_POST["signuppswd1"],FILTER_SANITIZE_STRING);
        if($password!==$password2){
            $errors.=$differentPassword;
        }
    }
}
//if there are any errors print error
if($errors){
    print_r($errors);
    exit;
}
//no errors
//prepare variables
$username=mysqli_real_escape_string($link,$username);
$Email=mysqli_real_escape_string($link,$Email);
$password=mysqli_real_escape_string($link,$password);
$password=hash('sha256',$password);
//if usernameexist in the user table print error
$sql="SELECT * FROM  users WHERE username='$username'";

$result=mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error running the querry".mysqli_error($link)."</div>";
    exit;
}
$results=mysqli_num_rows($result);
if($results){
    echo "<div class='alert alert-danger'>That username is already registered</div>";
    exit;
}
//if email exist in the users table print error
$sql= "SELECT * FROM  users WHERE email='$Email'";
$result=mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error running the querry</div>";
    exit;
}
$results=mysqli_num_rows($result);
if($results){
    echo "<div class='alert alert-danger'>That Email is already registered.Do You Want to login?</div>";
    exit;
}
//create a unique activation code
$activationkey=bin2hex(openssl_random_pseudo_bytes(16));
//byte:unit of data=8bits
//insert user details and activation code in the users table
$sql="INSERT INTO users (`username`,`email`,`password`,`activation`) VALUES('$username','$Email','$password','$activationkey')";
$result=mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>There was an error inserting the details in the database".mysqli_error($link)."</div>";
    exit;
}
else{
    echo "<div class='alert alert-success'>thankyou for your registration a mail has been sent to<strong> $Email</strong> along with the
 activation key please click on the link to activate your account!<br><strong>NOTE:</strong>please check in spam folder if not able to 
 find the link in Inbox</div>";
}
//send the mail to the user to make sure they own the email address
$message="Please click on this link to activate your account:\n\n";
$message.="http://www.karannakra.host20.uk/activate.php?email=".urlencode($Email)."&key=$activationkey";
mail($Email,'Confirm Your Registration',$message);
if(!mail($Email,'Confirm Your Registration',$message)){
    echo "<div>".mysqli_error($link)."</div>";
}
?>

