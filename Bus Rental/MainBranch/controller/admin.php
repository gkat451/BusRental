<?php
require_once "../model/dataAccess.php";
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

//CUSTOMER
if (!isset($_SESSION["cPrevSearch"])){
    $_SESSION["cPrevSearch"] = [];
}
if (!isset($_REQUEST["cSearch"]) || empty($_REQUEST["cSearch"])){
    $customerResults = getAllCustomers();
} else {
    $cSearch = $_REQUEST["cSearch"];
    $_SESSION["cPrevSearch"][] = $cSearch;
    $customerResults = getCustomerBySurname($cSearch);
}

//BUS
if (!isset($_SESSION["bPrevSearch"])){
    $_SESSION["bPrevSearch"] = [];
}
if (!isset($_REQUEST["bSearch"]) || empty($_REQUEST["bSearch"])){
    $busResults = getAllBuses();
} else {
    $bSearch = $_REQUEST["bSearch"];
    $_SESSION["bPrevSearch"][] = $bSearch;
    $busResults = getBusById($bSearch);
}

//BOOKING
if (!isset($_SESSION["boPrevSearch"])){
    $_SESSION["boPrevSearch"] = [];
}
if (!isset($_REQUEST["boSearch"]) || empty($_REQUEST["boSearch"])){
    $bookingResults = getAllBookings();
} else {
    $boSearch = $_REQUEST["boSearch"];
    $_SESSION["boPrevSearch"][] = $boSearch;
    $bookingResults = getBookingById($boSearch);
}

//PROMOTIONS
if (!isset($_SESSION["pPrevSearch"])){
    $_SESSION["pPrevSearch"] = [];
}
if (!isset($_REQUEST["pSearch"]) || empty($_REQUEST["pSearch"])){
    $promotions = getPromotions();
} else {
    $pSearch = $_REQUEST["pSearch"];
    $_SESSION["pPrevSearch"][] = $pSearch;
    $promotions = getPromotionById($pSearch);
}


?>