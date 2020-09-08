<?php
class PromotionBus{
    private $pId;
    private $pAmount;
    private $pExpiry;
    private $bId;
    private $bCapacity;
    private $bRate;
    private $bColour;
    private $bLocation;
    private $bBookStart;
    private $bBookEnd;

    function __get($name){
        return $this->$name;
    }
    
    function __set($name,$value){
        $this->$name = $value;
    }
}
?>