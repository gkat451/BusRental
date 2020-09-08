<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

$status = false;
$pickup = $_REQUEST["pickup"];
$dropoff = $_REQUEST["dropoff"];

$_SESSION["pickup"] = $pickup;
$_SESSION["dropoff"] = $dropoff;

if(!empty($_SESSION["basket"]) && isset($_SESSION["basket"])){
    $status = true;
} else {
    header("Refresh: 0, URL=../view/basket.php");
}

if ($status){
    header("Refresh: 0, URL=../view/checkout.php");
    exit();
}

?>