<?php
require_once "../model/dataAccess.php";
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

$allBuses = getAllBuses();
$_SESSION["sum"] = 0;

if(!isset($_SESSION["basket"])){
    $temp = [];
} else {
    $temp = $_SESSION["basket"];
}

$foundBuses = [];

foreach($temp as $id){
    foreach($allBuses as $bus){
        if($bus->bId == $id){
            $foundBuses[] = $bus;
        }
    }
}

foreach($foundBuses as $item){   
    $_SESSION["sum"] += $item->bRate;
}

?>