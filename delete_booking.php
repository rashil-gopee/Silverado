<?php
/**
 * Created by PhpStorm.
 * User: Isswarraj
 * Date: 10/7/2017
 * Time: 1:41 AM
 */

session_start();

if (!empty($_POST)) {
    
    if (isset($_SESSION['cart'])) {
        unset($_SESSION['cart'][$_POST['movie']]);
    }

    header("Location: cart.php");
    exit();
}

?>