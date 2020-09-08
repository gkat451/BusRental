<?php
require_once "../model/dataAccess.php";
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

$firstname = htmlentities($_REQUEST["firstName"]);
$lastname = htmlentities($_REQUEST["lastName"]);
$email = htmlentities($_REQUEST["email"]);
$pnumber = htmlentities($_REQUEST["phoneNumber"]);
$pickup = htmlentities($_SESSION["pickup"]);
$dropoff = htmlentities($_SESSION["dropoff"]);

$_SESSION["fname"] = $firstname;
$_SESSION["lname"] = $lastname;
$_SESSION["email"] = $email;
$_SESSION["pnumber"] = $pnumber;

if (isset($_REQUEST["licence"])){
    $licence = $_REQUEST["licence"];
} else {
    $licence = null;
}

if($licence == "yes"){
    $licence = true;
    require_once "../view/receipt.php";
    
} else if ($licence == "no"){
    $licence = false;
    $allDrivers = getAllDrivers();    
    require_once "../view/choosedriver.php";

} else {
    header("Refresh: 0, URL=../view/checkout.php");
}

?>
