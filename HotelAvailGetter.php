<?php
class HotelAvailGetter{
    function getHotelAvail($checkIn, $checkOut, $city){
        //Returns the name and price of the cheapest/first result of the Sandbox output
        $api="http://api.sandbox.amadeus.com/v1.2/hotels/search-airport?apikey=rCkjdp9O1agnjKAtDsTw7nK2m0H7gSeU&location=".$city.
             "&check_in=".$checkIn.
             "&check_out=".$checkOut.
             "&currency=INR&number_of_results=1";
        $hotels = file_get_contents($api);
        $hotels = json_decode($hotels,true);
        $response = "";
        foreach ($hotels['results'] as $results){
            echo "Property Name: ".$results['property_name']."(".$results['property_code'].")"."<br/>";
            echo "Address: ".$results['address']['line1']."<br/>";
            echo "City: ".$results['address']['city']."<br/>";
            echo "Price:".$results['total_price']['amount']."<br/>";
        }
    }
}
?>