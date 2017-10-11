<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Encode+Sans" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="./css/general.css" />
    <link type="text/css" rel="stylesheet" href="./css/customer-details.css" />
    <title>Silverado | Your new Dolby cinema</title>
</head>

<body>

<?php

include_once ('./tpl/menu.tpl.php');

?>

<main id="customerDetails">
<script type="text/javascript">
function validateForm() {
    
    var phone= document.forms["form"]["phone"].value;
    var phonepattern = /^0[0-8]\d{8}$/g;
    if (phone.match(phonepattern)) {
    	return true;
    }else{
        alert("phone number is invalid. Please Enter an australian mobile number ");
        return false;
    }
    
    var email=document.forms["form"]["email"].value;
    var at=email.indexOf("@");
    var dot=email.lastIndexOf(".");
    if (at<1 || dot<at+2 || dot+2>=email.length) {
        alert("Email Address is Not Valid. Please provide your correct email address.");
        return false;
    }
}
</script>

<form action="" name="form" method="post" onsubmit="return validateForm();" >
Your name <input type="text" name="name" required>    </br>
Phone number <input type="text" name="phone" required> </br>
Email <input type="text" name="email" required>       </br>
<input type="submit" value="Submit" name="submit" class="button" onclick="javascript:return validateMyForm();" />
<input type="reset" value="Reset" class="resetbutton" />
</form>

    <!-- End of Starting form code -->
</main>

<?php

include_once ('./tpl/menu.tpl.php');

?>

</body>

</html>