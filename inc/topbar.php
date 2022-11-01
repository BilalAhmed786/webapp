
<div class="socialicon">
<a href="#" class="fa fa-facebook"></a>
<a href="#" class="fa fa-instagram"></a>
</div>
<div class="authnav">
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 


 if(isset($_SESSION['username']) && !empty($_SESSION['username']) )
{
?>
<div class ="welcomenote"> <?php echo "welcome  ".($_SESSION['username'])?></div>
<?php if(($_SESSION['role'])=='admin'){
     echo '<a href="http://localhost/webapp/admin/controlpanel.php">Dashboard</a>
           <a href="http://localhost/webapp/auth/logout.php">Logout</a>';
}
     
   elseif(($_SESSION['role'])!='admin'){
echo '<a href="http://localhost/webapp/auth/logout.php">Logout</a>';
}
     }else{
      echo '<a href="http://localhost/webapp/auth/login.php">Login</a>
     <a href="http://localhost/webapp/auth/registration.php">Register</a>';
     }
 
 ?>
</div>
     