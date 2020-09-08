<?php
require_once "../model/customer.php";
if (session_status() == PHP_SESSION_NONE){
    session_start();
}
$status = false;

if(isset($_REQUEST["firName"])){
    
    $cFirName = $_REQUEST["firName"];
    $cSurName = $_REQUEST["surName"];
    $cEmail = $_REQUEST["email"];
    $cPhone = $_REQUEST["phone"];

    $customer = new customer();
    $customer->cFirName = htmlentities($cFirName);
    $customer->cSurName = htmlentities($cSurName);
    $customer->cEmail = htmlentities($cEmail);
    $customer->cPhone = htmlentities($cPhone);
}
require_once "../model/dataAccess.php";
addUpdateCustomer($customer);
$status = true;

if ($status){
    header("Refresh: 0, URL=../view/admin.php");
    exit();
}

?>