<?php
header("Content-Type: application/json");
require_once "../../model/bus.php";
require_once "../../model/dataAccess.php";

$loc = htmlentities($_REQUEST["locations"]);

if($loc == ""){
    $allBuses = getAllBuses();
    echo json_encode($allBuses); //blank array as ajaxSearch is empty
} else {
    $locations = getBusesByPartial($loc);
    if(empty($locations)){
        $allBuses = getAllBuses();
        echo json_encode($allBuses);
    } else {
        echo json_encode($locations);
    }
}

?>