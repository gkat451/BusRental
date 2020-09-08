<?php
require_once "../model/promotion.php";
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

$status = false;

if(isset($_REQUEST["percent"])){
    
    $pAmount = $_REQUEST["percent"];
    $pExpiry = $_REQUEST["date"];
    $pBus = $_REQUEST["busId"];


    $promo = new promotion();
    $promo->pAmount = htmlentities($pAmount);
    $promo->pExpiry = htmlentities($pExpiry);
    $promo->pBus = htmlentities($pBus);
}
require_once "../model/dataAccess.php";
addPromotion($promo);
$status = true;

if ($status){
    header("Refresh: 0, URL=../view/admin.php");
    exit();
}

?>