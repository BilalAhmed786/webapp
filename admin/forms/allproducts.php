<?php require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php');?>
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(($_SESSION['role'])!=='admin'){
    header("Location: http://localhost/webapp/auth/login.php");
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
<div class="shopdisplay">

<?php
$i="";
$q="select * from add_product";
$fetch=mysqli_query($conn,$q);
while($data=mysqli_fetch_array($fetch)){
$res= $data['productgallery'];
$res=explode(",",$res);
$count=count($res)-1;

for($i=0;$count>$i;$i++){
    echo "<img style=width:100px;padding:5px src='$res[$i]'>";
}
}
?>




</div>
</div>