<?php
session_start();
if(isset($_SESSION["user_id"]) && $_GET['logout']==1){
    session_destroy();
    setcookie("remmeberme","",time()-3600);
}

?>