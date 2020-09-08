<?php
require_once "../model/promotion.php";
require_once "../model/dataAccess.php";
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
$status = false;
$promo = $_REQUEST["input"];

removePromotion($promo);
$status = true;

if ($status){
    header("Refresh: 0, URL=../view/admin.php");
    exit();
}

?>