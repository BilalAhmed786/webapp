<?php
session_start();
unset($_SESSION['cart']);
    header("Location: http://localhost/webapp/pages/shop.php");
?>
