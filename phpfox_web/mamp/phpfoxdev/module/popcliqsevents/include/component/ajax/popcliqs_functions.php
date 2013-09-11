<?php 

function getTimeFrmStr($timeStr)
{
       
    $dateInfo = date_parse_from_format('m/d/Y:H:i', $timeStr);
       

    $ts = mktime(
          $dateInfo['hour'], $dateInfo['minute'], 0,
          $dateInfo['month'], $dateInfo['day'], $dateInfo['year']
    );

    return $ts;
       
}
?>