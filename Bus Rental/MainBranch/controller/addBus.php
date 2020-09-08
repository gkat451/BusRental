<?php
require_once "../model/bus.php";
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

$status = false;

if(isset($_REQUEST["capacity"])){
    
    $bCapacity = $_REQUEST["capacity"];
    $bRate = $_REQUEST["rate"];
    $bColour = $_REQUEST["colour"];
    $bLocation = $_REQUEST["location"];
    $bBookStart = $_REQUEST["start"];
    $bBookEnd = $_REQUEST["end"];

    $bus = new bus();
    $bus->bCapacity = htmlentities($bCapacity);
    $bus->bRate = htmlentities($bRate);
    $bus->bColour = htmlentities($bColour);
    $bus->bLocation = htmlentities($bLocation);
    $bus->bBookStart = htmlentities($bBookStart);
    $bus->bBookEnd = htmlentities($bBookEnd);
}
require_once "../model/dataAccess.php";
addUpdateBus($bus);
$status = true;

if ($status){
    header("Refresh: 0, URL=../view/admin.php");
    exit();
}

?>