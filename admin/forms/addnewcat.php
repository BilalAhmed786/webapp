<?php require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php');?>
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(($_SESSION['role'])!=='admin'){
    header("Location: http://localhost/webapp/auth/login.php");
}
$catadded="";
$productcat="";
if(isset($_POST['submit'])){
$productcat= htmlspecialchars($_POST['productcat']);

if(!empty($productcat)){
    $q="insert into product_cat(Category)
    values('$productcat')";
    $result=mysqli_query($conn,$q);
    $catadded="<p>Added succesfully</p>";
}else
{
   $catadded="<p>Field is required</p>";
}

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div class="topbar">
<?php require_once(dirname(dirname(dirname(__FILE__))) . '/inc/topbar.php');?>
</div>
<div class="header">
<header>
<?php require_once(dirname(dirname(dirname(__FILE__))) . '/inc/header.php');?>
</header>
</div>
<div class="rows">
    <div class="adminsidenav">
        <?php require '../admindashboard.php';?>
    </div>
    
  <div class="adminmain">
<form action="" method="post" enctype="multipart/form-data">
<h3 style=text-align="center">Add Category</h3>
    <div class=form-group>
<input class="prdouctaddinput" type="text" name="productcat" placeholder = "addnew catgeory">
<button class="addbutton" type=submit name="submit" >Submit</button> 
   <?php echo $catadded;?>
</div>

<script src="../admin.js"></script>
<script src="../../js/custom.js"></script>
</body>
</html>