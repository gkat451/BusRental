<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

$status = false;

if(isset($_REQUEST["input"])){
    unset($_SESSION["basket"]);
    unset($_SESSION["discounts"]);
    unset($_SESSION["sum"]);
    $status = true;
}

if ($status){
    if($_REQUEST["origin"] == "search.php"){
        header("Refresh: 0, URL=../view/search.php");
        exit();
    }
    if ($_REQUEST["origin"] == "basket.php"){
        header("Refresh: 0, URL=../view/basket.php");
        exit();
    }
}

?>