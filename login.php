<?php
//<!--start the session-->
session_start();
include "connection.php";
$errors="";
//check the user inputs
//Define error messages
$missingEmail="<div class='alert alert-danger'><strong>Please enter the email address</strong></div>";
$missingPassword="<div class='alert alert-danger'><strong>Please enter the password</strong></div>";
$invalidEmail="<div class='alert alert-danger'><strong>Please enter a valid email address</strong></div>";
//get email and the password
if(empty($_POST["loginemail"])){
    $errors.=$missingEmail;
}
else{
    $Email=filter_var($_POST["loginemail"],FILTER_SANITIZE_EMAIL);
}

if(empty($_POST["loginpaswd"])){
    $errors.=$missingPassword;
}
else{
    $password=filter_var($_POST["loginpaswd"],FILTER_SANITIZE_STRING);
}
//if there are any errors
if($errors){
    //print error message
    print_r($errors);
    exit;
}
//prepare the variable for the querry
$Email=mysqli_real_escape_string($link,$Email);
$password=mysqli_real_escape_string($link,$password);
$password=hash('sha256',$password);
$sql="SELECT * from users WHERE email='$Email' AND password='$password' and activation='activated'";
$result=mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>Error Running the Querry!</div>";
    exit;
}
$count=mysqli_affected_rows($link);
if($count!==1){
    echo "<div class='alert alert-danger'>The email and password combination doesnot match please check your email and password again</div>";
}
else {
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $_SESSION['user_id'] = $row["user_id"];
    $_SESSION['username'] = $row["username"];
    $_SESSION['email'] = $row["email"];
    if(empty($_POST['rememberme'])) {
        echo "success";
    }
    else{
        //create two variable
        $authentificator1=bin2hex(openssl_random_pseudo_bytes(10));
        $authentificator2=openssl_random_pseudo_bytes(20);
        //store them in a cookie
        function f1($a,$b){
            $c=$a.",".bin2hex($b);
            return $c;
        }
        $cookieValue=f1($authentificator1,$authentificator2);
        setcookie("remmeberme",$cookieValue,time()+1296000);
        //run querry to store them in remmember me table
        function f2($a){
           $b= hash("sha256",$a);
           return $b;
        }
        $user_id=$_SESSION['user_id'];
        $authentificator2=f2($authentificator2);
        $expiration=date("Y-m-d H:i:s",time()+1296000);
        $sql="INSERT INTO rememberme (`authenticator`,`f2authenticator2`,`user_id`,`expires`)VALUES ('$authentificator1','$authentificator2','$user_id','$expiration')";
        $result=mysqli_query($link,$sql);
            if(!$result){
                echo "<div class='alert alert-danger'>There was an error storing data remember you next time</div>";
            }
            else{
                echo "success";
            }
    }

}


