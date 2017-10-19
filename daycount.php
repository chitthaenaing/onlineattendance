<?php
function MondayCount($startDate, $endDate)
{
    $MondayCount =0;
    $startTimestamp = strtotime($startDate);
    $endTimestamp = strtotime($endDate);

    for ($i = $startTimestamp; $i <= $endTimestamp; $i = $i + (60 * 60 * 24))
    {
        if (date('l', $i) =="Monday" )
        {

            $MondayCount = $MondayCount + 1;

        }
      
    }
    return $MondayCount;
}


function TuesdayCount($startDate, $endDate)
{
    $TuesdayCount =0;
    $startTimestamp = strtotime($startDate);
    $endTimestamp = strtotime($endDate);

    for ($i = $startTimestamp; $i <= $endTimestamp; $i = $i + (60 * 60 * 24))
    {
        if (date('l', $i) =="Tuesday" )
        {

            $TuesdayCount = $TuesdayCount + 1;

        }
      
    }
    return $TuesdayCount;
}


function WednesdayCount($startDate, $endDate)
{
    $WednesdayCount =0;
    $startTimestamp = strtotime($startDate);
    $endTimestamp = strtotime($endDate);

    for ($i = $startTimestamp; $i <= $endTimestamp; $i = $i + (60 * 60 * 24))
    {
        if (date('l', $i) =="Wednesday" )
        {

            $WednesdayCount = $WednesdayCount + 1;

        }
      
    }
    return $WednesdayCount;
}

function ThursdayCount($startDate, $endDate)
{
    $ThursdayCount =0;
    $startTimestamp = strtotime($startDate);
    $endTimestamp = strtotime($endDate);

    for ($i = $startTimestamp; $i <= $endTimestamp; $i = $i + (60 * 60 * 24))
    {
        if (date('l', $i) =="Thursday" )
        {

            $ThursdayCount = $ThursdayCount + 1;

        }
      
    }
    return $ThursdayCount;
}


function FridayCount($startDate, $endDate)
{
    $FridayCount =0;
    $startTimestamp = strtotime($startDate);
    $endTimestamp = strtotime($endDate);

    for ($i = $startTimestamp; $i <= $endTimestamp; $i = $i + (60 * 60 * 24))
    {
        if (date('l', $i) =="Friday" )
        {

            $FridayCount = $FridayCount + 1;

        }
      
    }
    return $FridayCount;
}
?>