<?php
include 'BomFlightAvail.php';
class FlightAvailGetter{
        function getAirAvail($onward, $return, $origin, $destination){
            //Returns the best price and flight number after parsing the Sandbox output
            $api = "http://api.sandbox.amadeus.com/v1.2/flights/low-fare-search?apikey=rCkjdp9O1agnjKAtDsTw7nK2m0H7gSeU&origin=".$origin.
                "&destination=".$destination.
                "&departure_date=".$onward.
                "&return_date=".$return.
                "&non-stop=true&currency=INR&number_of_results=1";
            $allFlights = file_get_contents($api);
            $allFlights = json_decode($allFlights,true);
            $response = "";
            foreach ($allFlights['results'] as $results){
                foreach ($results['itineraries'] as $itineraries){
                    foreach ($itineraries['outbound'] as $outbound){
                        echo "Airline: ".$outbound[0]['marketing_airline']."<br/>";
                        echo "Flight number: ".$outbound[0]['flight_number']."<br/>";
                        echo "Departs at: ".$outbound[0]['departs_at']."<br/>";
                        echo "Arrives at: ".$outbound[0]['arrives_at']."<br/>";
                        echo "Class: ".$outbound[0]['booking_info']['travel_class']."<br/>";
                    }
                }
                echo "Total fare: ".$results['fare']['total_price']."<br/>";
            }
        }
}
?>