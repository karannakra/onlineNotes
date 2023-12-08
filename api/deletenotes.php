<?php
session_start();
include "connection.php";

//get the id of the notes using the ajax call
$note_id=$_POST['id'];
//run a querry to delete the notes from the table
$sql="DELETE FROM notes WHERE id='$note_id'";
$result=mysqli_query($link,$sql);
//if anything goes wrong then return the error
if(!$result){
    echo "error";
    exit;
}
?>
