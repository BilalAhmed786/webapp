<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['username']);
unset($_SESSION['role']);
    header("Location: http://localhost/webapp/auth/login.php");
?>