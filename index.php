Testing Sushant S. Lokhande's application - Meet, Greet and Retreat! <br/>
<hr/>
<?php
include 'DateGenerator.php';
include 'FlightAvailGetter.php';
include 'HotelAvailGetter.php';

ini_set('max_execution_time', 300);

$numberOfWeekends = 4;
//Read user's cities
$userOriginCity = 'BLR';
//TODO: Get this data from the DB. Hardcode for now
$userDesitinationCities = array();
$userDesitinationCities[0]='DEL';

//Get all future dates
$theDateGenerator = new DateGenerator;

$listSaturdays = array();
$listSaturdays[0] = $theDateGenerator->getNextSaturday();

for ($i=1 ; $i <= $numberOfWeekends ; $i++){
    $listSaturdays[$i] = $theDateGenerator->getNextWeekDate( $listSaturdays[($i-1)]);
}

$listSundays = array();
$listSundays[0] = $theDateGenerator->getNextSunday();

for ($i=1 ; $i <= $numberOfWeekends ; $i++){
    $listSundays[$i] = $theDateGenerator->getNextWeekDate( $listSundays[($i-1)]);
}

//Get air avails for all future dates
$theFlightAvailGetter = new FlightAvailGetter;
$filledFlightAvailBoms = array();

for ($i=0 ; $i < count($userDesitinationCities) ; $i++){
    for ($j=0 ; $j < $numberOfWeekends ; $j++){
        $leavingDate = date("Y-m-d",$listSaturdays[$j]);
        $returningDate = date("Y-m-d",$listSundays[$j]);
        $aFlightAvailBom = $theFlightAvailGetter->getFlightAvail($leavingDate, $returningDate, $userOriginCity, $userDesitinationCities[$i]);
        array_push($filledFlightAvailBoms,$aFlightAvailBom);
    }
    foreach ($filledFlightAvailBoms as $bom){
        echo "Airline: ".$bom->getAirline()."<br/>";
        echo "Flight number: ".$bom->getFlightNumber()."<br/>";
        echo "Departs at: ".$bom->getDeparture()."<br/>";
        echo "Arrives at: ".$bom->getArrival()."<br/>";
        echo "Class: ".$bom->getClass()."<br/>";
        echo "Total fare: ".$bom->getFare()."<br/>";
        echo "<hr/>";
    }
}

//Get hotel avails for all future dates
$theHotelAvailGetter = new HotelAvailGetter;
$filledHotelAvailBoms = array();

for ($i=0 ; $i < count($userDesitinationCities) ; $i++){
    for ($j=0 ; $j < $numberOfWeekends ; $j++){
        $checkIn = date("Y-m-d",$listSaturdays[$j]);
        $checkOut = date("Y-m-d",$listSundays[$j]);
        $aHotelAvailBom = $theHotelAvailGetter->getHotelAvail($checkIn, $checkOut, $userDesitinationCities[$i]);
        array_push($filledHotelAvailBoms,$aHotelAvailBom);
    }
    foreach ($filledHotelAvailBoms as $bom){
        echo "Property Name: ".$bom->getPropertyName()."(".$bom->getPropertyCode().")"."<br/>";
        echo "Address: ".$bom->getAddress()."<br/>";
        echo "City: ".$bom->getCity()."<br/>";
        echo "Price:".$bom->getPrice()."<br/>";
        echo "<hr/>";
    }
}

//Consolidate results city-wise
//Organize output by associating friend to city and results

?>