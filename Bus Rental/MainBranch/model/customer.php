<?php 
class Customer{
    private $cId;
    private $cFirName;
    private $cSurName;
    private $cEmail;
    private $cPhone;

    function __get($name){
        return $this->$name;
    }
    
    function __set($name,$value){
        $this->$name = $value;
    }

    function getFullName(){
        return "$this->cSurName, $this->cFirName";
    }
}
?>