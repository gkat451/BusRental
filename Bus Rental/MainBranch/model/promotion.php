<?php
class Promotion{
    private $pId;
    private $pAmount;
    private $pExpiry;
    private $pBus;

    function __get($name){
        return $this->$name;
    }
    
    function __set($name,$value){
        $this->$name = $value;
    }
}
?>