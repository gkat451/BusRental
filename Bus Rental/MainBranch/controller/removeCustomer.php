<?php
require_once "../model/customer.php";
require_once "../model/dataAccess.php";
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
$status = false;
$customer = $_REQUEST["input"];

removeCustomerById($customer);
$status = true;

if ($status){
    header("Refresh: 0, URL=../view/admin.php");
    exit();
}

?>