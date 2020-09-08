<?php
require_once "../model/customer.php";
require_once "../model/dataAccess.php";
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
$status = false;

$cId = htmlentities($_REQUEST["id"]);
$cFirName = htmlentities($_REQUEST["fname"]);
$cSurName = htmlentities($_REQUEST["sname"]);

updateCustomerName($cFirName,$cSurName,$cId);
$status = true;

if ($status){
    header("Refresh: 0, URL=../view/admin.php");
    exit();
}

?>