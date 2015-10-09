<?php
class HotelAvailGetter{
    
    function getHotelAvail($checkIn, $checkOut, $city){
        //Returns the name and price of the cheapest/first result of the Sandbox output
        
        $api="https://api.sandbox.amadeus.com/v1.2/hotels/search-airport?apikey=rCkjdp9O1agnjKAtDsTw7nK2m0H7gSeU&location=".$city.
             "&check_in=".$checkIn.
             "&check_out=".$checkOut.
             "&currency=INR&number_of_results=1";
                 
        $hotels = file_get_contents($api);
        
        $hotels = json_decode($hotels,true);
        
        
    }
}
?>