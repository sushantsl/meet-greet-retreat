<?php
class DateGenerator{

    function getNextWeekDate($baseDate)
    {
        return ($baseDate+604800);
    }

    function getNextSaturday()
    {
        return strtotime("next Saturday");
    }

    function getNextSunday()
    {
        //This is done to avoid a bug.
        //When the code is run on Saturday, strtotime("next Sunday") would be smaller than strtotime("next Saturday")
        //Check-out date should be greater than Check-in and return flight date should be greater than onward
        $saturday=strtotime("next Saturday");
        return ($saturday+86400);
    }
}
?>