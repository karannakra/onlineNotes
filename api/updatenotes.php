<?php
session_start();
include "connection.php";

//get the id of the notes sent through the ajax call
$id=$_POST['id'];
//get the new contents of the call
$note=$_POST['note'];
//get the time as well
$time=time();
//using all the notes run the queryy
$sql="UPDATE notes SET note='$note',time ='$time' WHERE id='$id'";
$result=mysqli_query($link,$sql);
if(!$result){
    echo "error";
    exit;
}

?>
