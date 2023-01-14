<?php
session_start();
session_destroy();
    unset($_SESSION['cart']);
    header("Location: http://localhost/webapp/pages/shop.php");
?>
