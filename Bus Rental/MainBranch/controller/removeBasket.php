<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
$status = false;

if(isset($_REQUEST["input"])){
    
    $id = $_REQUEST["input"];
    $basket = $_SESSION["basket"];

    $found = array_search($id,$basket);
    unset($basket[$found]);

    $_SESSION["basket"] = $basket;

    if(empty($basket) || empty($_SESSION["basket"])){
        unset($_SESSION["basket"]);
        unset($_SESSION["discounts"]);
    }

    $status = true;
}

if ($status){
    header("Refresh: 0, URL=../view/basket.php");
    exit();
}

?>