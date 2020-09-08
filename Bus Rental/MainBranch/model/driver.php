<?php
class Driver{
    private $drId;
    private $drfname;
    private $drlname;


    function __get($name){
        return $this->$name;
    }
    
    function __set($name,$value){
        $this->$name = $value;
    }
}
?>