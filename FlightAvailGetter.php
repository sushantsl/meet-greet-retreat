<?php
class FlightAvailGetter{
        
        function getAirAvail($onward, $return, $origin, $destination){
            //Returns the best price and flight number after parsing the Sandbox output    
            $api = "http://api.sandbox.amadeus.com/v1.2/flights/low-fare-search?apikey=rCkjdp9O1agnjKAtDsTw7nK2m0H7gSeU&origin=".$origin.
                "&destination=".$destination.
                "&departure_date=".$onward.
                "&return_date=".$return.
                "&non-stop=true&currency=INR&number_of_results=1";
            
            $allFlights = file_get_contents($api);
            $allFlights = json_decode($hotels,true);
        }
        
}
?>