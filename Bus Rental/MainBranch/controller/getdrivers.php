<?php
require_once "../model/dataAccess.php";

if (session_status() == PHP_SESSION_NONE){
    session_start();
}

if(!isset($_SESSION["drivers"]))
{
    $_SESSION["drivers"] = [];
}

$chosendrivers = [];
$driverArray = $_SESSION["drivers"];
if(!empty($driverArray)){
    for ($i = 0; $i < count($driverArray); $i++){
        $chosendrivers += getSpecificDrivers($driverArray[$i]); 
    }
}
?>