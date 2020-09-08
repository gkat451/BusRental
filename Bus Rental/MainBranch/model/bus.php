<?php
class Bus implements JsonSerializable {
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

    function getRatePP(){
        return ($this->bRate / $this->bCapacity);
    }

    public function jsonSerialize(){
        return get_object_vars($this);
    }
}
?>