<?php
class DateGenerator{
  
    function getNextWeekDate($baseDate)
    {
        return date("Y-m-d", $baseDate+86400);
    }
}
?>