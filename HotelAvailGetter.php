<?php
include 'BomHotelAvail.php';

class HotelAvailGetter{
    function getHotelAvail($checkIn, $checkOut, $city){
        //Returns the name and price of the cheapest/first result of the Sandbox output
        $api="http://api.sandbox.amadeus.com/v1.2/hotels/search-airport?apikey=rCkjdp9O1agnjKAtDsTw7nK2m0H7gSeU&location=".$city.
             "&check_in=".$checkIn.
             "&check_out=".$checkOut.
             "&currency=INR&number_of_results=1";
        $hotels = file_get_contents($api);
        $hotels = json_decode($hotels,true);
        $filledBoms = array();
        foreach ($hotels['results'] as $results){
            $theBomHotelAvail = new BomHotelAvail;
            $theBomHotelAvail->setPropertyCode($results['property_code']);
            $theBomHotelAvail->setPropertyName($results['property_name']);
            $theBomHotelAvail->setAddress($results['address']['line1']);
            $theBomHotelAvail->setCity($results['address']['city']);
            $theBomHotelAvail->setPrice($results['total_price']['amount']);
            array_push($filledBoms,$theBomHotelAvail);
        }
        foreach ($filledBoms as $bom){
            echo "Property Name: ".$bom->getPropertyName()."(".$bom->getPropertyCode().")"."<br/>";
            echo "Address: ".$bom->getAddress()."<br/>";
            echo "City: ".$bom->getCity()."<br/>";
            echo "Price:".$bom->getPrice()."<br/>";
            echo "<hr/>";
        }
    }
}
?>
