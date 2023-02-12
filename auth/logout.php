<?php
session_start();
unset($_SESSION['email']);
unset($_SESSION['username']);
session_destroy();
  header("Location: http://localhost/webapp/auth/login.php");
?>  