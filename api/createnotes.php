<?php
session_start();
include "connection.php";
//get user id
$user_id=$_SESSION['user_id'];
//get the current time using time function
$time=time();
//run a querry to create  new notes
$sql="INSERT INTO notes(`user_id`,`note`,`time`)VALUES('$user_id','','$time')";
$result=mysqli_query($link,$sql);
if(!$result){
    echo "error";
    exit;
}
else{
    //this function will return auto generated id
   echo mysqli_insert_id($link);
}
?>