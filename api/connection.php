<?php
$link=mysqli_connect("localhost","root","","karannak_onlinenotes");
if(mysqli_connect_error()){
    die("<div class='alert alert-danger'>cannot able to connect to the database ERROR:".mysqli_connect_error()."</div>");
}
?>