<?php
session_start();
session_destroy();
    unset($_SESSION['email']);
    header("Location: http://localhost/webapp/auth/login.php");
?>