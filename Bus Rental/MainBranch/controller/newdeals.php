<?php
require_once "../model/dataAccess.php";
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

//PROMOTIONS
$promotions = getPromotions();
$promotionBus = getPromotionBus();

//BUS
$newBus = getLastThreeBuses();
$allBuses = getAllBuses();

$foundPromoBuses = [];

foreach($allBuses as $bus){
    $promoBus = getSpecificPromotionBus($bus->bId);
    foreach($promoBus as $proBus){
        $foundPromoBuses = $proBus;
    }
}

?>