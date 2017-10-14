<?php
/**
 * Created by PhpStorm.
 * User: Isswarraj
 * Date: 10/15/2017
 * Time: 1:29 AM
 */

error_reporting(0);

//Starting console log code sourced from Lecture 11

function myConsoleLog($errno, $errstr)
{
    echo "<script>console.log(PHP Error #" . json_encode($errno) . ":" . json_encode($errstr) . ");</script>";
}

set_error_handler('myConsoleLog');

//End of console log code

?>