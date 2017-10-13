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

<main id="customerDetails">
    <section>
        <h1>Customer Details</h1>
        <form action="checkout.php" name="form" method="post" onsubmit="return validateForm();">
            <p><label>Your name</label></p>
            <p><input type="text" name="name" required>
            <p><label>Phone number</label></p>
            <p><input type="text" name="phone" required></p>
            <p><label>Email</label></p>
            <p><input type="email" name="email" required></p>
            <p><input type="submit" value="Confirm Booking" name="submit" class="button"
                      onclick="javascript:return validateMyForm();"/></p>
            <p><input type="reset" value="Reset" class="resetbutton"/></p>
        </form>

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

    </section>
</main>

<?php

include_once('./tpl/footer.tpl.php');

?>

</body>

</html>