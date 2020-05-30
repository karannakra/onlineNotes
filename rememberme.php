<?php
session_start();
if(!isset($_SESSION['user_id']) && !empty($_COOKIE['remmeberme'])){
    //extract $authentificator 1&2 from the cookie
    list($authentificator1,$authentificator2)=explode(',',$_COOKIE['remmeberme']);
    $sql="SELECT * FROM rememberme WHERE authenticator='$authentificator1'";
    $result=mysqli_query($link,$sql);
    if(!$result){
        echo "<div class='alert alert-danger'>cannot execute the querry of cookie</div>";
        exit;
    }
    $count=mysqli_num_rows($result);
    if($count!==1){
        echo "<div class='alert alert-danger'>remember me process failed of cookie</div>";
        exit;
    }
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    //generate the tokens and regenrate the cookies value
    //create two variable
    $authentificator11=bin2hex(openssl_random_pseudo_bytes(10));
    $authentificator22=bin2hex(openssl_random_pseudo_bytes(20));
    //store them in a cookie
    function f1($a,$b){
        $c=$a.",".$b;
        return $c;
    }
    $cookieValue=f1($authentificator11,$authentificator22);
    setcookie("remmeberme",$cookieValue,time()+1296000);
    //run querry to store them in remmember me table
    $_SESSION['user_id']=$row['user_id'];
    $user_id=$_SESSION['user_id'];
    $expiration=date("Y-m-d H:i:s",time()+1296000);
    $sql="INSERT INTO rememberme (`authenticator`,`f2authenticator2`,`user_id`,`expires`)VALUES ('$authentificator11','$authentificator22','$user_id','$expiration')";
    $result=mysqli_query($link,$sql);
    if(!$result){
        echo "<div class='alert alert-danger'>There was an error storing data remember you next".mysqli_error($link)."time $user_id</div>";
    }
    //log in the user without asking the password
    header("location:loggedin.php");
}
