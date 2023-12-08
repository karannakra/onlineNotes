<?php
session_start();
include "connection.php";
//get the user id
$user_id=$_SESSION['user_id'];
//run a querry to delete empty notes
$sql="DELETE FROM notes WHERE note='' ";
$result=mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>cannot execute querry delete empty note</div>";
    exit;
}
//run querry to look for notes corresponding for user id
$sql="SELECT * FROM notes WHERE user_id='$user_id'ORDER BY time DESC ";
$result=mysqli_query($link,$sql);
if(!$result){
    echo "<div class='alert alert-danger'>cannot execute querry to pick user id from table</div>";
    exit;
}
if(mysqli_num_rows($result)>0){
    while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        $note_id=$row['id'];
        $note=$row['note'];
        $time=$row['time'];
        $time=date("F d,Y H:i:s",$time);
        echo "<div class='note'>
        <div class='delete'>
        <button  class='btn btn-danger btn-lg col-lg-2 col-3' style='width:100%'>delete</button>
        </div>
        <div class='noteheader' id='$note_id'>
<div class='text'>$note</div>
<div class='time-text'>$time</div>
</div></div>";
    }
}else{
    echo "<div class='alert alert-info'>you have not created any notes yet</div>";
}
//show notes or alert message
?>
