<?php
require_once "../model/customer.php";
require_once "../model/dataAccess.php";
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
$status = false;

$cId = htmlentities($_REQUEST["id"]);
$cEmail = htmlentities($_REQUEST["email"]);
$cPhone = htmlentities($_REQUEST["phone"]);

updateCustomerContact($cEmail,$cPhone,$cId);
$status = true;

if ($status){
    header("Refresh: 0, URL=../view/admin.php");
    exit();
}

?>