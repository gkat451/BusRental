<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

$status = false;

if(!isset($_SESSION["basket"])){
    $basket = [];
    $_SESSION["basket"] = $basket;
} else {
    $basket = $_SESSION["basket"];
}

if(!isset($_SESSION["discounts"])){
    $discounts = [];
    $_SESSION["discounts"] = $discounts;
} else {
    $discounts = $_SESSION["discounts"];
}

if(isset($_REQUEST["discount"])){
    $discount = $_REQUEST["discount"];
} else {
    $discount = 0;
}

if(isset($_REQUEST["input"])){
    $id = $_REQUEST["input"];

    array_push($basket,$_SESSION["basket"],htmlentities($id));
    array_push($discounts,$_SESSION["discounts"],htmlentities($discount));

    $_SESSION["basket"] = array_unique($basket, SORT_REGULAR);
    $_SESSION["discounts"] = array_unique($discounts, SORT_REGULAR);

    $status = true;
}

if ($status){
    if($_REQUEST["origin"] == "index.php"){
        header("Refresh: 0, URL=../view/index.php");
        exit();
    }
    if ($_REQUEST["origin"] == "search.php"){
        header("Refresh: 0, URL=../view/search.php");
        exit();
    }
}

?>