<?php
require_once "../model/dataAccess.php";
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

$status = false;

if(isset($_REQUEST["id"])){
    
    $bId = $_REQUEST["id"];
    $bRate = $_REQUEST["rate"];
    $bLocation = $_REQUEST["location"];

}

updateBus($bId,$bRate,$bLocation);
$status = true;

if ($status){
    header("Refresh: 0, URL=../view/admin.php");
    exit();
}

?>