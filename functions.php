<?php
/**
 * Created by PhpStorm.
 * User: Isswarraj
 * Date: 10/13/2017
 * Time: 2:47 AM
 */

function getTicketPrice($seatType, $session)
{
    $price = 0;
    if (isCheap($session)) {
        if ($seatType == 'SF')
            $price = 12.50;
        else if ($seatType == 'SP')
            $price = 10.50;
        else if ($seatType == 'SC')
            $price = 8.50;
        else if ($seatType == 'FA')
            $price = 25.00;
        else if ($seatType == 'FC')
            $price = 20.00;
        else if ($seatType == 'BA')
            $price = 22.00;
        else if ($seatType == 'BF')
            $price = 20.00;
        else if ($seatType == 'BC')
            $price = 20.00;
    } else {
        if ($seatType == 'SF')
            $price = 18.50;
        else if ($seatType == 'SP')
            $price = 15.50;
        else if ($seatType == 'SC')
            $price = 12.50;
        else if ($seatType == 'FA')
            $price = 30.00;
        else if ($seatType == 'FC')
            $price = 25.00;
        else if ($seatType == 'BA')
            $price = 33.00;
        else if ($seatType == 'BF')
            $price = 30.00;
        else if ($seatType == 'BC')
            $price = 30.00;
    }
    return number_format($price, 2);
}

function isCheap($session)
{
    $day = substr($session, 0, 3);
    $time = (int)substr($session, 4, 2);

    if ($day == 'MON' || $day == 'TUE')
        return true;
    else if (($day == 'WED' || $day == 'THU' || $day == 'FRI') && $time <= 13)
        return true;
    else
        return false;
}

function getMovie($movieType)
{
    if ($movieType == 'CH')
        return 'Lego Batman';
    else if ($movieType == 'AF')
        return 'A Quiet Passion';
    else if ($movieType == 'RC')
        return 'La La Land';
    else if ($movieType == 'AC')
        return 'John Rambo';
}

function getSeat($seat)
{
    $seatType = substr($seat, 0, 1);
    $seatOption = substr($seat, 1, 1);

    logMessage('$seat' . $seat);
    logMessage('$seatType' . $seatType);
    logMessage('$seatOption' . $seatOption);

    $type = '';
    $option = '';

    if ($seatType == 'S')
        $type = 'Standard';
    else if ($seatType == 'B')
        $type = 'Bean Bags';
    else if ($seatType == 'F')
        $type = 'First Class';

    if ($seatOption == 'P')
        $option = 'Concession';
    else if ($seatOption == 'F')
        $option = 'Full';
    else if ($seatOption == 'A')
        $option = 'Adult';
    else if ($seatOption == 'C')
        $option = 'Child';

    return $type . ' (' . $option . ')';

}

function getDay($session)
{
    $day = substr($session, 0, 3);

    if ($day == 'MON')
        return 'Monday';
    else if ($day == 'TUE')
        return 'Tuesday';
    else if ($day == 'WED')
        return 'Wednesday';
    else if ($day == 'THU')
        return 'Thursday';
    else if ($day == 'FRI')
        return 'Friday';
    else if ($day == 'SAT')
        return 'Saturday';
    else if ($day == 'SUN')
        return 'Sunday';
}

function getTime($session)
{
    $time = (int)substr($session, 4, 2);
    return $time;
}

function logMessage($text)
{
    echo "<script>console.log(\"$text\")</script>";
}

?>