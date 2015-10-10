<?php
include 'BomFlightAvail.php';
class FlightAvailGetter{
        function getFlightAvail($onward, $return, $origin, $destination){
            //Returns the best price and flight number after parsing the Sandbox output
            $api = "http://api.sandbox.amadeus.com/v1.2/flights/low-fare-search?apikey=rCkjdp9O1agnjKAtDsTw7nK2m0H7gSeU&origin=".$origin.
                "&destination=".$destination.
                "&departure_date=".$onward.
                "&return_date=".$return.
                "&non-stop=true&currency=INR&number_of_results=1";
            $allFlights = file_get_contents($api);
            $allFlights = json_decode($allFlights,true);
            $filledBoms = array();

            foreach ($allFlights['results'] as $results){
                $theBomFlightAvail = new BomFlightAvail;
                foreach ($results['itineraries'] as $itineraries){
                    foreach ($itineraries['outbound'] as $outbound){
                        $theBomFlightAvail->setAirline($outbound[0]['marketing_airline']);
                        $theBomFlightAvail->setFlightNumber($outbound[0]['flight_number']);
                        $theBomFlightAvail->setDeparture($outbound[0]['departs_at']);
                        $theBomFlightAvail->setArrival($outbound[0]['arrives_at']);
                        $theBomFlightAvail->setClass($outbound[0]['booking_info']['travel_class']);
                    }
                }
                $theBomFlightAvail->setFare($results['fare']['total_price']);
                array_push($filledBoms,$theBomFlightAvail);
            }
            
            foreach ($filledBoms as $bom){
                echo "Airline: ".$bom->getAirline()."<br/>";
                echo "Flight number: ".$bom->getFlightNumber()."<br/>";
                echo "Departs at: ".$bom->getDeparture()."<br/>";
                echo "Arrives at: ".$bom->getArrival()."<br/>";
                echo "Class: ".$bom->getClass()."<br/>";
                echo "Total fare: ".$bom->getFare()."<br/>";
                echo "<hr/>";
            }
        }
}
?>
                       