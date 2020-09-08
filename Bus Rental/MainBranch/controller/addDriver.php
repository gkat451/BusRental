<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

$status = false;

if(!isset($_SESSION["drivers"])){
    $drivers = [];
    $_SESSION["drivers"] = $drivers;
} else {
    $drivers = $_SESSION["drivers"];
}

if(isset($_REQUEST["input"])){
    $_SESSION["drivers"] = $_REQUEST["input"];
    $status = true;
} else {
    header("Refresh: 0, URL=../view/checkout.php");
}

if ($status){
    header("Refresh: 0, URL=../view/receiptwithdriver.php");
    exit();
    
}

?>