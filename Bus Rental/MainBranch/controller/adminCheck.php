<?php 
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION["validation"])){
    $_SESSION["validation"] = false;
}

if (!$_SESSION["validation"]){
    header("Refresh: 0, URL=../view/login.php");
    exit();
}
?>