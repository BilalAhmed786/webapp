<?php require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php');?>
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(($_SESSION['role'])!=='admin'){
    header("Location: http://localhost/webapp/auth/login.php");
}
$data='';
if(isset($_POST['submit'])){
$productname= htmlspecialchars($_POST['productname']);
$productcat= htmlspecialchars($_POST['productcat']);
$productshortdesc= htmlspecialchars($_POST['productshortdesc']);
$productdesc= htmlspecialchars($_POST['productdesc']);
$inventory= htmlspecialchars($_POST['inventory']);
$saleprice= htmlspecialchars($_POST['saleprice']);
$discountprice= htmlspecialchars($_POST['discountprice']);
$tempdest=$_FILES['singleimage']['name'];
$tempname=$_FILES['singleimage']['tmp_name'];
$destination="../../images/".$tempdest;
move_uploaded_file($tempname,$destination);

for($i=0;$i<count($_FILES['images']['name']);$i++){
    $multiimagesname=$_FILES['images']['name'][$i];
    $multiimagesdest=$_FILES['images']['tmp_name'][$i];
    $destmultiimag="../../images/".$multiimagesname;
    move_uploaded_file($multiimagesdest,$destmultiimag);
    $data .=$destmultiimag." ";
    
}
$q="insert into add_product(productname, productdescripton, productshortdescription, productcategory, productimage, productgallery, Inventory, saleprice, discountedprice) 
values('$productname', '$productshortdesc', '$productdesc', '$productcat', '$destination', ' $data', '$inventory', '$saleprice', '$discountprice' )";
mysqli_query($conn,$q);

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
    <div class=form-group>
<input type="text" name="productname" placeholder = "productname">
</div>
<select name="productcat" id="">
<div class="form-group">
<option value="shirts">shirts</option>
<option value="shoes">shoes</option>
<option value="ties">ties</option>
<option value="tshirts">tshirts</option>
</div>
</select>
<div class="form-group">
<textarea name="productshortdesc"  cols="30" rows="10"></textarea>
</div>  
<div class="form-group">
<textarea name="productdesc"  cols="30" rows="10"></textarea>
</div>
<div class="image">
<input type="button" id="loadFileXml" value="Product Image" onclick="document.getElementById('imgInp').click();" />    
<input  type="file" name="singleimage" id="imgInp" style=display:none>
<img id="blah" src="../../images/avatar.png" style=width:100px;height:100px/>
</div>

<div id="preview">
<input type="button" id="loadFileimage" value="Products Images" onclick="document.getElementById('files').click();" />
<input type="file" name="images[]" multiple id="files" style=display:none>
<img id="blahh" src="../../images/avatar.png" style=width:100px;height:100px/>
</div>

<div class=form-group>
<input type="text" name="inventory" placeholder = "inventory">
</div>
<div class=form-group>
<input type="text" name="saleprice" placeholder = "saleprice">
</div>
<div class=form-group>
<input type="text" name="discountprice" placeholder = "discountprice">
</div>
<button type=submit name="submit" >Submit</button>  
</div>


<script src="../admin.js"></script>
<script src="../../js/custom.js"></script>
</body>
</html>