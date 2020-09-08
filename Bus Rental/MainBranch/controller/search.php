<?php
require_once "../model/dataAccess.php";
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
//previous searchs
if (!isset($_SESSION["bPrevSearch"])){
    $_SESSION["bPrevSearch"] = [];
}

if (!empty($_REQUEST["bSearch"]) && isset($_REQUEST["bSearch"])){
    //searched table
    $bSearch = htmlentities($_REQUEST["bSearch"]);
    $_SESSION["bPrevSearch"][] = $bSearch;
    $busResults = getBusByCapacity($bSearch);
}
else {
    //default bus table
    $busResults = getAllBuses();
}
?>