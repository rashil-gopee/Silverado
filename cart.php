<?php

include 'config.php';
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
    <?php

    include_once('./tpl/head.tpl.php');

    ?>
    <title>Silverado | Your new Dolby cinema - Cart</title>
</head>

<body>
<?php

include_once('./tpl/menu.tpl.php');

?>
<nav>
    <a href="./index.php">Home</a>
    <a href="./showing.php">Now showing</a>
    <a class="active" href="./cart.php">Cart</a>
</nav>

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
            echo "<strong><a href='./showing.php' style='text-decoration: underline; color: #68A691;'>Book session for another movie?</a></strong>";
        } else
            echo "<strong>You cart is empty. Please <a href='./showing.php' style='text-decoration: underline; color: #68A691;'>book a movie session</a> to continue.</strong>"

        ?>
    </section>

    <section>
        <h1>Customer Details</h1>
        <form action="checkout.php" name="form" method="post" onsubmit="return validateForm();">
            <p><label>Your name</label></p>
            <p><input type="text" name="name" required>
            <p><label>Phone number</label></p>
            <p><input type="number" name="phone" required></p>
            <p><label>Email</label></p>
            <p><input type="email" name="email" required></p>
            <p>
                <button type="submit" style="float: none;"
                        onclick="javascript:return validateMyForm();">Proceed to Checkout
                </button>
            </p>
        </form>
    </section>
</main>
<?php

include_once('./tpl/footer.tpl.php');

?>

<script type="text/javascript">
    function validateForm() {
        var phone = document.forms["form"]["phone"].value;
        var name = document.forms["form"]["name"].value;
        var namePattern = /^[a-zA-Z\s]+$/;
        var phonePattern = /[0-9]\d{7,9}/;

        if (!name.match(namePattern)) {
            alert("Invalid name!");
            return false;
        }

        if (!phone.match(phonePattern)) {
            alert("Phone number is invalid. Please Enter an Australian phone number ");
            return false;
        }
    }
</script>

</body>
</html>
