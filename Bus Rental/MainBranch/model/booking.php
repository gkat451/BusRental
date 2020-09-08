<?php
class Booking{
    private $boId;
    private $boDepartDate;
    private $boReturnDate;
    private $boOrigin;
    private $boDestination;
    //private $boCustomer;

    function __get($name){
        return $this->$name;
    }
    
    function __set($name,$value){
        $this->$name = $value;
    }
}
?>