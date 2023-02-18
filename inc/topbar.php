<?php if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
?>
<?php
$countcart =0;
$total = 0;
if (isset($_SESSION["cart"])) {
    $countcart = count($_SESSION["cart"]);
}
?>

<div class="socialicon">
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-instagram"></a>
    <a href="http://localhost/webapp/pages/cart.php"><i class="fa fa-cart" style="font-size:24px">&#xf07a;</i></a>
    <span class='badge badge-warning' id='lblCartCount'><?php echo $countcart;?></span> 
    <span id='storagetotal' style=color:white;></span> 
   
     
</div>
  
<div class="authnav">
<?php
if(isset($_SESSION['username']) && !empty($_SESSION['username']) )
{
?>
<div class ="welcomenote"> <?php echo "welcome  ".($_SESSION['username'])?></div>
<?php if(($_SESSION['role'])=='admin'){
     echo '<a href="http://localhost/webapp/admin/controlpanel.php">Dashboard</a>
           <a href="http://localhost/webapp/auth/logout.php">Logout</a>';
}elseif(($_SESSION['role'])=='subscriber'){
    echo '<a href="http://localhost/webapp/customer/customer.php">Dashboard</a>
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
