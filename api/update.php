<?php
//start the session
session_start();
include "connection.php";
//get the user id
$user_id=$_SESSION['user_id'];
//get the username sent through the ajax call
$user_name=$_POST['updateusername'];
//update username and run the querry
$sql="UPDATE users SET username='$user_name' WHERE user_id=$user_id";
$result=mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>this querry cannot executed</div>";
    exit;
}
$sql="SELECT * FROM users WHERE user_id='$user_id'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result);
$_SESSION['username']=$row['username'];
echo $_SESSION['username'];
?>
