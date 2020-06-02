<?php
session_start();
$user_id=$_SESSION['user_id'];
include "connection.php";
$sql="SELECT * FROM users WHERE user_id='$user_id'";
$result=mysqli_query($link,$sql);
$row=mysqli_fetch_array($result);
$name=$row['username'];
echo $name;
?>