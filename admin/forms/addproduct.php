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
print_r($productname);
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
    $destmultiimage="../../images/".$multiimagesname;
    move_uploaded_file($multiimagesdest,$destmultiimage);
    $data.=$destmultiimage.",";
    }
$q="insert into add_product(productname, productdescripton, productshortdescription, productcategory, productimage, productgallery, Inventory, saleprice, discountedprice) 
values('$productname', '$productshortdesc', '$productdesc', '$productcat', '$destination', '$data', '$inventory', '$saleprice', '$discountprice' )";
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
    <h3 style=text-align="center">Add product</h3>
    <div class=form-group>
    <input class="prdouctaddinput" type="text" name="productname" placeholder = "productname">
 </div>
<div class="form-group">
    <label class="productaddlab" for="productcat">productcategory</label></br>
    <select id="productcat" name="productcat">
  <?php
  $q="SELECT * FROM product_cat";
  $result=mysqli_query($conn,$q);
       while($categories=mysqli_fetch_array($result)){
    $categoriesresult=$categories['Category'];
    echo "<option value='$categoriesresult'>$categoriesresult</option>";
 }
?> 
 </select>
</div>

<div class="form-group">
    <label class="productaddlab" for="shortdesc">Short description</label></br>
<textarea name="productshortdesc"  cols="50" rows="10"></textarea>
</div>  
<div class="form-group">
<label class="productaddlab" for="longdesc">Description</label></br>
<textarea name="productdesc"  cols="50" rows="10"></textarea>
</div>
<div class="image">
<img id="blah" class="productimage" src="../../images/avatar.png" /></br>
  <input  type="file" name="singleimage" id="imgInp" style=display:none>
</div>

<input type="button" id="loadFileXml" class="addbutton" value="ProductImage" onclick="document.getElementById('imgInp').click();" />
  
<div id="preview">
<img id="blahh"  src="../../images/avatar.png"></br>
<input type="file" name="images[]" multiple id="image"  onchange="image_select()" ></br>
<div class="card-body d-flex flex-wrap justify-content-start" id="container">
</div>
<input  type="button" id="loadFileimage" class="addbutton" value="Gallery Images" onclick="document.getElementById('image').click();" />
<div class=form-group>
<input class="prdouctaddinput" type="text" name="inventory" placeholder = "inventory">
</div>
<div class=form-group>
<input class="prdouctaddinput" type="text" name="saleprice" placeholder = "saleprice">
</div>
<div class=form-group>
<input class="prdouctaddinput" type="text" name="discountprice" placeholder = "discountprice">
</div>
<div class=form-group>
<button class="addbutton" type=submit name="submit" >Submit</button>  
</div>
</form>
</div>
<script src="../admin.js"></script>
<script src="../../js/custom.js"></script>
</body>
</html>