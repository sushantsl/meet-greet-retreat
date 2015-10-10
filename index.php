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
for ($i=0 ; $i < count($userDesitinationCities) ; $i++){
    for ($j=0 ; $j < $numberOfWeekends ; $j++){
        //TODO: Put this result in a Bom
        $leavingDate = date("Y-m-d",$listSaturdays[$j]);
        $returningDate = date("Y-m-d",$listSundays[$j]);
        $theFlightAvailGetter->getFlightAvail($leavingDate, $returningDate, $userOriginCity, $userDesitinationCities[$i]);
    }
}

//Get hotel avails for all future dates
$theHotelAvailGetter = new HotelAvailGetter;
for ($i=0 ; $i < count($userDesitinationCities) ; $i++){
    for ($j=0 ; $j < $numberOfWeekends ; $j++){
        //TODO: Put this result in a Bom
        $checkIn = date("Y-m-d",$listSaturdays[$j]);
        $checkOut = date("Y-m-d",$listSundays[$j]);
        $theHotelAvailGetter->getHotelAvail($checkIn, $checkOut, $userDesitinationCities[$i]);
    }
}

//Consolidate results city-wise
//Organize output by associating friend to city and results

?>