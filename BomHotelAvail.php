<?php
class BomHotelAvail{
    var $propertyCode;
    var $propertyName;
    var $address;
    var $city;
    var $price;
    var $bestOptionIndicator;

    function getPropertyCode(){
        return $this->propertyCode;
    }
    function setPropertyCode($code){
        $this->propertyCode = $code;
    }
    function getPropertyName(){
        return $this->propertyName;
    }
    function setPropertyName($name){
        $this->propertyName = $name;
    }
    function getAddress(){
        return $this->address;
    }
    function setAddress($address){
        $this->address = $address;
    }
    function getCity(){
        return $this->city;
    }
    function setCity($city){
        $this->city = $city;
    }
    function getPrice(){
        return $this->price;
    }
    function setPrice($price){
        $this->price = $price;
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