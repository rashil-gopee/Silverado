<?php

// Start the session
session_start();

//// remove all session variables
//session_unset();
//
//// destroy the session
//session_destroy();

if (!empty($_POST)) {
    $booking = array($_POST['session'], $_POST['seats']);

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $_SESSION['cart'][$_POST['movie']] = array();
    $_SESSION['cart'][$_POST['movie']] = $booking;
}

?>
<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="./css/general.css"/>
    <link type="text/css" rel="stylesheet" href="./css/style.css"/>
    <title>Silverado | Your new Dolby cinema</title>
</head>

<body>
<?php

include_once('./tpl/menu.tpl.php');

?>

<main id="showing">
    <section>

        <?php
        if (isset($_SESSION['cart'])) {

//            foreach ($_SESSION['cart'] as $key => $value) {
//
//                echo $key . "&nbsp;";
//
//                foreach ($value as $pkey => $pvalue) {
//                    if (!(is_array($pvalue)))
//                        echo $pkey . '-' . $pvalue;
//                    else {
//                        foreach ($pvalue as $qkey => $qvalue) {
//                            echo $qkey . '-' . $qvalue;
//                        }
//                    }
//                };
//
//            };

            $grandTotal = 0;
            foreach ($_SESSION['cart'] as $key => $value) {
                echo $key . "<br>";


                foreach ($value as $movie => $movieDetail) {
                    $total = 0;
                    if (!(is_array($movieDetail))) {
                        echo $movie . '-' . $movieDetail;
                        $session = $movieDetail;
                    } else {

                        echo "<table><thead><tr><th>Ticket Type</th><th>Cost</th><th>Qty</th><th>Subtotal</th></tr></thead>";
                        echo "<tbody>";
                        foreach ($movieDetail as $seatType => $amount) {
                            $subtotal = $amount * getTicketPrice($seatType, $session);
                            $total = $total + $subtotal;
                            if ($amount > 0) {
                                echo "<tr>";
                                echo "<td>" . $seatType . "</td>";
                                echo "<td>$" . getTicketPrice($seatType, $session) . "</td>";
                                echo "<td>" . $amount . "</td>";
                                echo "<td>$" . number_format($subtotal, 2) . "</td>";
                                echo "</tr>";
                            }
                        }
                        logMessage($total);
                        echo "<tr><td colspan='3'><label>Total:</label></td><td>$" . number_format($total, 2) . "</td></tr>";
                        echo "</tbody>";
                        echo "</table>";

                    }
                    $grandTotal = $grandTotal + $total;
                };

            };
            echo "<label>Grand Total: </label>$" . $grandTotal;
        }

        //        // remove all session variables
        //        session_unset();
        //
        //        // destroy the session
        //        session_destroy();
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

        function logMessage($text)
        {
            echo "<script>console.log(\"$text\")</script>";
        }

        ?>
    </section>
</main>
<?php

include_once('./tpl/footer.tpl.php');

?>
</body>
</html>
