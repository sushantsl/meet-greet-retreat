<?php
class BomFlightAvail{
    var $airline;
    var $flightNumber;
    var $departure;
    var $arrival;
    var $duration;
    var $fare;
    var $class;
    var $bestOptionIndicator;

    function getAirline(){
        return $this->airline;
    }
    function setAirline($code){
        $this->airline = $code;
    }
    function getFlightNumber(){
        return $this->flightNumber;
    }
    function setFlightNumber($name){
        $this->flightNumber = $name;
    }
    function getDeparture(){
        return $this->departure;
    }
    function setDeparture($departure){
        $this->departure = $departure;
    }
    function getArrival(){
        return $this->arrival;
    }
    function setArrival($arrival){
        $this->arrival = $arrival;
    }
    function getDuration(){
        return $this->duration;
    }
    function setDuration($duration){
        $this->duration = $duration;
    }
    function getFare(){
        return $this->fare;
    }
    function setFare($fare){
        $this->fare = $fare;
    }
    function getClass(){
        return $this->class;
    }
    function setClass($class){
        $this->class = $class;
    }
    function isBestOption(){
        if($this->bestOptionIndicator == true){
            return true;
        }
        else{
             return false;
        }
    }
    function setBestOptionIndicator($value){
        $this->bestOptionIndicator = $value;
    }
}
?>