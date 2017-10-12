<?php
// Start the session
session_start();

if (!isset($_SESSION['cart'])) {
    header("Location: showing.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="./css/general.css"/>
    <link type="text/css" rel="stylesheet" href="./css/customer-details.css"/>
    <title>Silverado | Your new Dolby cinema</title>
</head>

<body>

<?php

include_once('./tpl/menu.tpl.php');

?>

<main id="checkout">

    <?php
    $list = array
    (
        "Peter,Griffin,Oslo,Norway",
        "Glenn,Quagmire,Oslo,Norway",
    );

    $filename = 'orders.csv';
    $fp = fopen($filename, 'w');

    foreach ($list as $line) {
        fputcsv($fp, explode(',', $line));
    }

    fclose($fp);

    ?>

</main>

<?php

include_once('./tpl/menu.tpl.php');

?>

</body>

</html>