<?php
require_once "../model/bus.php";
require_once "../model/dataAccess.php";
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

$status = false;
$bus = $_REQUEST["input"];

removeBusById($bus);
$status = true;

if ($status){
    header("Refresh: 0, URL=../view/admin.php");
    exit();
}

?>