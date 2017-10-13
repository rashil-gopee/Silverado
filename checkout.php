<?php

session_start();

include 'functions.php';

if (!isset($_SESSION['cart']) || empty($_POST)) {
    header("Location: showing.php");
}


$_SESSION['name'] = $_POST['name'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['email'] = $_POST['email'];

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
    <section>
        <h1>Checkout</h1>
        <?php
        $list = array();

        $session = '';
        $grandTotal = 0;

        foreach ($_SESSION['cart'] as $key => $value) {

            $category = $key;

            echo "<table width='100%'><thead><tr><td width='50%'>";
            echo $_SESSION['name'] . '<br>';
            echo $_SESSION['phone'] . '<br>';
            echo $_SESSION['email'] . '<br><br>';
            echo "</td>";

            foreach ($value as $movie => $movieDetail) {
                $total = 0;

                if (!(is_array($movieDetail))) {
                    $session = $movieDetail;
                    echo "<td width='50%' style='text-align: right;'>";
                    echo 'Silverado<br>';
                    echo getMovie($category) . '<br>';
                    echo getDay($session) . ' ' . getTime($session) . ' pm' . '<br><br>';
                    echo "</td></tr></thead>";
                } else {
                    echo "<tbody>";
                    foreach ($movieDetail as $seatType => $amount) {
                        $subtotal = $amount * getTicketPrice($seatType, $session);
                        $total = $total + $subtotal;

                        if ($amount > 0) {
                            $line = $_SESSION['name'] . "," . $_SESSION['phone'] . "," . $_SESSION['email'] . "," . getMovie($category) . "," . getDay($session) . "," . getTime($session) . " pm" . "," . getSeat($seatType) . "," . $amount;
                            array_push($list, $line);
                            logMessage($line);

                            echo "<tr><td width='50%' style='border-bottom: none;'>";
                            echo $amount . ' X ' . getSeat($seatType) . '<br>';
                            echo "</td><td width='50%' style='text-align: right; border-bottom: none;'>";
                            echo '$ ' . number_format($amount * getTicketPrice($seatType, $session), 2) . '<br>';
                            echo "</td></tr>";
                        }
                    }

                    echo "<tr><td colspan='2' style='text-align: right;'>";
                    echo 'Total: $ ' . number_format($total, 2) . '<br><br>';
                    echo "</td></tr>";

                    foreach ($movieDetail as $seatType => $amount) {
                        for ($i = 1; $i <= $amount; $i++) {
                            if ($amount > 0) {
                                echo "<tr><td colspan='2'> ";
                                echo 'Silverado <br>';
                                echo getDay($session) . ' ' . getTime($session) . ' pm' . '<br>';
                                echo getMovie($category) . '<br><br>';
                                echo getSeat($seatType) . '<br><br>';
                                echo "</td></tr>";
                            }
                        }
                    }
                    echo "</tbody></table>";

                }
                $grandTotal = $grandTotal + $total;
            }
        };

        $filename = 'orders.csv';
        $fp = fopen($filename, 'a');

        foreach ($list as $line) {
            fputcsv($fp, explode(',', $line));
        }

        fclose($fp);

        session_destroy();

        ?>
    </section>
</main>

<?php

include_once('./tpl/footer.tpl.php');

?>

</body>

</html>