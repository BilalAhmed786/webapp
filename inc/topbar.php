
<div class="socialicon">
<a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-instagram"></a>
</div>
<div class="authnav">
<?php
session_start();

 if(isset($_SESSION['username']) && !empty($_SESSION['username']) )
{
?>
<div class ="welcomenote"> <?php echo "welcome  ".($_SESSION['username'])?></div>
<a href="http://localhost/webapp/auth/logout.php">Logout</a>
<?php }else{ ?>
     <a href="http://localhost/webapp/auth/login.php">Login</a>
     <a href="http://localhost/webapp/auth/registration.php">Register</a>
<?php } ?>
</div>