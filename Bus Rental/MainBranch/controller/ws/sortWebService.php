<?php
header("Content-Type: application/json");
require_once "../../model/bus.php";
require_once "../../model/dataAccess.php";

$select = htmlentities($_REQUEST["selection"]);

if($select == "location"){
    $select = "bLocation";
}else if($select == "colour"){
    $select = "bColour";
}else if($select == "rate"){
    $select = "bRate";
}

$selection = getBusesSorted($select);
echo json_encode($selection);

?>