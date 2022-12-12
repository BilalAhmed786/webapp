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
    foreach ($_SESSION["cart"] as $key => $value) {

        $total = $total + ((int) $value['productqty'] * (int) $value['product_price']);


    }
  

}

?>

<div class="socialicon">
    <a href="#" class="fa fa-facebook"></a>
    <a href="#" class="fa fa-instagram"></a>
    <a href="cart.php"><i class="fa fa-cart" style="font-size:24px">&#xf07a;</i></a>
    <span class='badge badge-warning' id='lblCartCount'><?php echo $countcart;?></span> 
    <span class='totalcart' id='carttotal'><?php echo "Rs.",$total;?>  </span>  
    
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
     