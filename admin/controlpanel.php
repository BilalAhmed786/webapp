<?php
require_once(dirname(dirname(__FILE__)) . '/Database/database.php');
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(!isset($_SESSION['role'])){
    header("Location: http://localhost/webapp/auth/login.php");
}

if(isset($_GET['userid'])){
    $adminid= $_GET['userid'];
    $sql = "SELECT * FROM users_role where id=$adminid";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    $results=mysqli_fetch_array($result);


$_SESSION['adminid']=$results['id'];


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
    <link rel="stylesheet" href="admin.css">
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
    <div class="adminsidenav">
        <?php require 'admindashboard.php';?>
    </div>
    
     <div class="adminmain">
      
     <div  class= "thrif ">
<h1> Welcome <?php echo $_SESSION['username']?> to Thrifters'Point.</h1>
</div>
</div>
       
</div>
<script src="auth.js"></script>
<script src="../js/custom.js"></script>
</body>
</html>



