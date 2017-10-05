<?php
// It will display the data that it was received from the form called name
echo ($_POST['movie']);
echo ($_POST['session']);
$seats = ($_POST['seats']);

foreach($seats as $key => $value ) {

    echo $key . "&nbsp;" . $value . "<br>";

}
//echo ($_GET['movie']);
//echo ($_GET['movie']);
//echo ($_GET['movie']);
?>