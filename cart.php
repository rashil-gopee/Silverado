<?php

session_start();

include 'functions.php';

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

<main id="cart">
    <section>
        <h1>Cart</h1>
        <?php
        if (isset($_SESSION['cart'])) {

            $grandTotal = 0;
            foreach ($_SESSION['cart'] as $key => $value) {
                echo getMovie($key) . "<br>";
                echo "<form method='post' action='delete_booking.php'>";
                echo "<input hidden name='movie' value='" . $key . "'></input>";
                echo "<button type='submit'>Delete from Cart</button>";
                echo "</form>";

                foreach ($value as $movie => $movieDetail) {
                    $total = 0;
                    if (!(is_array($movieDetail))) {
                        $session = $movieDetail;
                        echo getDay($session) . ' ' . getTime($session) . ' pm';
                    } else {

                        echo "<table><thead><tr><th>Ticket Type</th><th>Cost</th><th>Qty</th><th>Subtotal</th></tr></thead>";
                        echo "<tbody>";
                        foreach ($movieDetail as $seatType => $amount) {
                            $subtotal = $amount * getTicketPrice($seatType, $session);
                            $total = $total + $subtotal;
                            if ($amount > 0) {
                                echo "<tr>";
                                echo "<td>" . getSeat($seatType) . "</td>";
                                echo "<td>$" . getTicketPrice($seatType, $session) . "</td>";
                                echo "<td>" . $amount . "</td>";
                                echo "<td>$" . number_format($subtotal, 2) . "</td>";
                                echo "</tr>";
                            }
                        }
                        logMessage($total);
                        echo "<tr><td colspan='3'><label>Total:</label></td><td>$" . number_format($total, 2) . "</td></tr>";
                        echo "</tbody>";
                        echo "</table><br>";

                    }
                    $grandTotal = $grandTotal + $total;
                };

            };
            echo "<label>Grand Total: </label>$" . $grandTotal . "<br>";
            echo "<a href='customer_details.php'>Proceed to checkout</a>";
        }

        ?>
    </section>

    <section>
        <form action="checkout.php" name="form" method="post" onsubmit="return validateForm();">
            <p><label>Your name</label></p>
            <p><input type="text" name="name" required>
            <p><label>Phone number</label></p>
            <p><input type="text" name="phone" required></p>
            <p><label>Email</label></p>
            <p><input type="email" name="email" required></p>
            <p style="text-align: center;"><input type="submit" value="Proceed to Checkout" name="submit" class="button"
                                                  onclick="javascript:return validateMyForm();"/></p>
        </form>
    </section>
</main>
<?php

include_once('./tpl/footer.tpl.php');

?>

<script type="text/javascript">
    function validateForm() {
        var phone = document.forms["form"]["phone"].value;
        var phonepattern = /^0[0-8]\d{8}$/g;
        if (phone.match(phonepattern)) {
            return true;
        } else {
            alert("phone number is invalid. Please Enter an australian mobile number ");
            return false;
        }
    }
</script>

</body>
</html>
