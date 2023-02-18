<?php require_once(dirname(dirname(__FILE__)). '/Database/database.php');
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(!isset($_SESSION['role'])){
    header("Location: http://localhost/webapp/auth/login.php");
}

$update="";
if(isset($_POST['profileupdate'])){
$firstname=htmlspecialchars($_POST['firstname']);
$lastname=htmlspecialchars($_POST['lastname']);
$email=htmlspecialchars($_POST['email']);
$country=htmlspecialchars($_POST['country']);
$city=htmlspecialchars($_POST['city']);
$phone=htmlspecialchars($_POST['phone']);
$address=htmlspecialchars($_POST['address']);
$userid=htmlspecialchars($_POST['userid']);
$useremail=htmlspecialchars($_POST['useremail']);
$orderemail=htmlspecialchars($_POST['orderemail']);




     $q = "UPDATE biller_info SET firstname='$firstname', lastname='$lastname', country='$country' ,city='$city', phone='$phone', email='$email',  address='$address' where email ='$useremail'";
        $result = mysqli_query($conn, $q) or die(mysqli_error($conn));

    $q = "UPDATE customer_billinfo SET firstname='$firstname', lastname='$lastname', country='$country' ,city='$city', phone='$phone', email='$email',  address='$address' where email ='$useremail'";
        $result = mysqli_query($conn, $q) or die(mysqli_error($conn));




    $q = "UPDATE order_details SET email='$email' where email ='$orderemail'";
    $result = mysqli_query($conn, $q) or die(mysqli_error($conn));

    $q = "UPDATE customers_order SET email='$email' where email ='$orderemail'";
    $result = mysqli_query($conn, $q) or die(mysqli_error($conn));

    $q = "UPDATE users_role SET email='$email' where email ='$useremail'";
    $result = mysqli_query($conn, $q) or die(mysqli_error($conn));




    $update="<p style=color:green;margin:auto;padding:auto;margin-top:10px>updated successfully</p>";
}






?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../admin/admin.css">
    <link rel="stylesheet" href="customer.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div class="topbar">
<?php require_once(dirname(dirname(__FILE__)) . '/inc/topbar.php');?>
</div>
<div class="header">
<header>
<?php require_once(dirname(dirname(__FILE__)) . '/inc/header.php');?>
</header>
</div>
<div class="rows">
    <div class="customersidenav">
        <?php require 'customerdashboard.php';?>
    </div>
    
     <div class="adminmain">
 
<div style=padding:15px class="cutomerprofile">

<?php
    $id=$_SESSION['profile'];
    $q = "SELECT * from users_role where id='$id'";
    $result = mysqli_query($conn, $q) or die(mysqli_error($conn));
    $results=mysqli_fetch_array($result);
   $useremail=$results['email'];
  
 
   
   
   $q = "SELECT * from biller_info where email='$useremail'";
   $result1 = mysqli_query($conn, $q) or die(mysqli_error($conn));
   $results1=mysqli_fetch_array($result1);

  
 

   $q = "SELECT * from order_details where email='$useremail'";
   $result2 = mysqli_query($conn, $q) or die(mysqli_error($conn));
   $results2=mysqli_fetch_array($result2);
   
   $orderemail=$results2['email'];

  
?>

    

<form action="changebillingaddress.php" method="post">
<div style=padding:25px  class=form-control>
    <label for="name">FirstName</label><br>
<input style=width:35%;text-align:center;margin-top:8px type="text" name="firstname" value="<?php echo $results1['firstname']?>" required>
</div>
<div style=padding:25px  class=form-control>
    <label for="name">lastName</label><br>
<input style=width:35%;text-align:center;margin-top:8px type="text" name="lastname" value="<?php echo $results1['lastname']?>" required>
</div>
<div class="form-control">
<label for="email">Email</label><br>
<input style=width:35%;text-align:center;margin-top:8px type="text" name="email" value="<?php echo $results1['email'];?>" required><br>
    <p style=color:red;margin:auto;margin-top:7px>email change your registration email as well</p>
</div>
<div style=padding:25px  class=form-control>
<label for="country">Country</label><br>
<input style=width:35%;text-align:center;margin-top:8px type="text" name="country" value="<?php echo $results1['country'];?>" required>
</div>
<div style=padding:25px  class=form-control>
<label for="city">City</label><br>
<input style=width:35%;text-align:center;margin-top:8px type="text" name="city" value="<?php echo $results1['city'];?>" required>
</div>
<div style=padding:25px  class=form-control>
<label for="phone">Phone</label><br>
<input style=width:35%;text-align:center;margin-top:8px type="text" name="phone" value="<?php echo $results1['phone'];?>" required>
</div>
<div style=padding:25px  class=form-control>
<label for="address">Address</label><br>
<textarea style=width:35%;text-align:center;margin-top:15px;padding:10px type="text" name="address" value="<?php echo $results1['address']?>" required><?php echo $results1['address']?></textarea>
</div>

<input type="hidden" name=userid value="<?php echo $results1['id']?>">
<input type="hidden" name=orderemail value="<?php echo $orderemail;?>">
<input type="hidden" name=useremail value="<?php echo $useremail;?>">
<input style=color:white;background:red;padding:8px;border:none;cursor:pointer;margin-top:25px type="submit" name="profileupdate" value="Update">
</form>
           <?php echo $update;?>

</div>
</div>
       
</div>
<script src="../auth.js"></script>
<script src="../js/custom.js"></script>
</body>
</html>



