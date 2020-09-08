<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();
}

require_once "customer.php";
require_once "bus.php";
require_once "booking.php";
require_once "promotion.php";
require_once "promoBus.php";
require_once "driver.php";


$pdo = new PDO("mysql:host=kunet;dbname=db_k1748796","k1748796","standbridgeg");

function getAllCustomers(){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM customer");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS,"customer");
    return $results;
}

function getAllDrivers(){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM driver");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS,"driver");
    return $results;
}


function getAllBuses(){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM bus");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS,"bus");
    return $results;
}

function getAllBookings(){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM booking");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS,"booking");
    return $results;
}

function getCustomerBySurname($surname){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM customer WHERE cSurName = ?");
    $statement->execute([$surname]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS,"customer");
    return $results;
}

function getBusById($bus){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM bus WHERE bId = ?");
    $statement->execute([$bus]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS,"bus");
    return $results;
}

function getBookingById($booking){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM booking WHERE boId = ?");
    $statement->execute([$booking]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS,"booking");
    return $results;
}

function getBusByCapacity($bus){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM bus WHERE bCapacity >= ?");
    $statement->execute([$bus]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS,"bus");
    return $results;
}

function addUpdateCustomer($customer){
    global $pdo;
    $statement = $pdo->prepare("
        INSERT INTO customer (cFirName,cSurName,cEmail,cPhone) 
        VALUES (:cFirName,:cSurName,:cEmail,:cPhone)
        ON DUPLICATE KEY UPDATE 
        cFirName=:cFirName,cSurName=:cSurName,cEmail=:cEmail,cPhone=:cPhone");
    $statement->bindValue(":cFirName",$customer->cFirName,PDO::PARAM_STR);
    $statement->bindValue(":cSurName",$customer->cSurName,PDO::PARAM_STR);
    $statement->bindValue(":cEmail",$customer->cEmail,PDO::PARAM_STR);
    $statement->bindValue(":cPhone",$customer->cPhone,PDO::PARAM_STR);
    $newCustomerId = $pdo->lastInsertId();
    $statement->execute();
}

function removeCustomerById($removed){
    global $pdo;
    $statement = $pdo->prepare("DELETE FROM customer WHERE cId = ?");
    $statement->execute([$removed]);
}

function addUpdateBus($bus){
    global $pdo;
    $statement = $pdo->prepare("
        INSERT INTO bus (bCapacity,bRate,bColour,bLocation,bBookStart,bBookEnd) 
        VALUES (:bCapacity,:bRate,:bColour,:bLocation,:bBookStart,:bBookEnd)
        ON DUPLICATE KEY UPDATE 
        bCapacity=:bCapacity,bRate=:bRate,bColour=:bColour,bLocation=:bLocation,bBookStart=:bBookStart,bBookEnd=:bBookEnd");
    $statement->bindValue(":bCapacity",$bus->bCapacity,PDO::PARAM_STR);
    $statement->bindValue(":bRate",$bus->bRate,PDO::PARAM_STR);
    $statement->bindValue(":bColour",$bus->bColour,PDO::PARAM_STR);
    $statement->bindValue(":bLocation",$bus->bLocation,PDO::PARAM_STR);
    $statement->bindValue(":bBookStart",$bus->bBookStart,PDO::PARAM_STR);
    $statement->bindValue(":bBookEnd",$bus->bBookEnd,PDO::PARAM_STR);
    $newBusId = $pdo->lastInsertId();
    $statement->execute();
}

function removeBusById($removed){
    global $pdo;
    $statement = $pdo->prepare("DELETE FROM bus WHERE bId = ?");
    $statement->execute([$removed]);
}

function updateCustomerContact($cEmail,$cPhone,$cId){
    global $pdo;
    $statement = $pdo->prepare("UPDATE customer SET cEmail = ?, cPhone = ? WHERE cId = ?");
    $statement->execute([$cEmail,$cPhone,$cId]);
}

function updateCustomerName($cFirName,$cSurName,$cId){
    global $pdo;
    $statement = $pdo->prepare("UPDATE customer SET cFirName = ?, cSurName = ? WHERE cId = ?");
    $statement->execute([$cFirName,$cSurName,$cId]);
}

function getLastThreeBuses(){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM bus ORDER BY bId DESC LIMIT 3");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS,"bus");
    return $results;
}

function getPromotions(){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM promotion");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS,"promotion");
    return $results;
}

function addPromotion($promotion){
    global $pdo;
    $statement = $pdo->prepare("
        INSERT INTO promotion (pAmount,pExpiry,pBus) 
        VALUES (:pAmount,:pExpiry,:pBus)
        ON DUPLICATE KEY UPDATE 
        pAmount=:pAmount,pExpiry=:pExpiry");
    $statement->bindValue(":pAmount",$promotion->pAmount,PDO::PARAM_STR);
    $statement->bindValue(":pExpiry",$promotion->pExpiry,PDO::PARAM_STR);
    $statement->bindValue(":pBus",$promotion->pBus,PDO::PARAM_INT);
    $newPromotionId = $pdo->lastInsertId();
    $statement->execute();
}

function removePromotion($removed){
    global $pdo;
    $statement = $pdo->prepare("DELETE FROM promotion WHERE pId = ?");
    $statement->execute([$removed]);
}

function getPromotionById($promotion){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM promotion WHERE pId = ?");
    $statement->execute([$promotion]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS,"promotion");
    return $results;
}

function getSpecificPromotionBus($promoBId){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM promotion INNER JOIN bus ON promotion.pBus = bus.bId WHERE bus.bId = ?");
    $statement->execute([$promoBId]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS,"promotionBus");
    return $results;
}

function getPromotionBus(){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM promotion INNER JOIN bus ON promotion.pBus = bus.bId");
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_CLASS,"promotionBus");
    return $results;
}

//this is used for the webservice of partial location for a search query
function getBusesByPartial($partial){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM bus WHERE bLocation LIKE ?");
    $statement->execute(["$partial%"]);
    $buses = $statement->fetchAll(PDO::FETCH_OBJ);
    return $buses;
}

function addBooking($booking)
{
    global $pdo;
    $statement = $pdo->prepare('INSERT INTO booking (boOrigin, boDepartDate, boTime, boReturnDate, boReturnTime) VALUES (?,?,?,?,?)');
    $statement->execute([
        $booking->boOrigin,
        $booking->boDepartDate,
        $booking->boTime,
        $booking->boReturnDate,
        $booking->boReturnTime
    ]);
}

function getSpecificDrivers($dr){
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM driver WHERE drId = ?");
    $statement->execute([$dr]);
    $results = $statement->fetchAll(PDO::FETCH_CLASS,"driver");
    return $results;
}

function updateBus($bId,$bRate,$bLocation){
    global $pdo;
    $statement = $pdo->prepare("UPDATE bus SET bRate = ?, bLocation = ? WHERE bId = ?");
    $statement->execute([$bRate,$bLocation,$bId]);
}

?>