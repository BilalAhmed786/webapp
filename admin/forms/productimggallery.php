<?php 

require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php');

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(($_SESSION['role'])!=='admin'){
    header("Location: http://localhost/webapp/auth/login.php");
}
if (isset($_GET['id'])){
    $productid = $_GET['id'];
    $sql = "DELETE from  product_gallery where id=$productid";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
}
//delete specific items
if (isset($_POST['del-btn']) && isset($_POST['delete'])) {
    for($i=0;$i<count($_POST['delete']);$i++){
        $deleteitems = $_POST['delete'][$i];
        $sql = "DELETE from  product_gallery where id=$deleteitems";
        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
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


  
   
<?php
$n=1;
$sql = "SELECT * from  product_gallery";
$results = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
if($results->num_rows>0) {
    ?>
<div style=width:100% class="shopdisplay"> 
<h2 style=width:100%>product image gallery</h2>
<form method="post" action="productimggallery.php">  
<table style=width:100%>
<thead>
<th><input id='checkAll' type="checkbox"/>   <button 
style=color:white;background:red;padding:8px;border:none;cursor:pointer;
 name="del-btn" class="saifidelbtn">Delete</button></th>     
<tr>
<th>sr#</th>
<th>productname</th>
<th>images</th>
<th>delete</th>
<th>edit</th>
  </tr>
    </thead>
 <?php
       foreach ($results as $result) {
?>   
<tbody> 
<tr>
<td><?php echo $n++; ?></td>
<td><input id="checkItem" type="checkbox" name="delete[]" value="<?php echo $result['id'];?>">  <?php echo $result['productname'] ?></td>
<td><img style=width:80px src="<?php echo $result['productgallery']?>"></td>
<td><a style=color:red;text-decoration:none href="productimggallery.php?id=<?php echo $result['id'] ?>">Delete</a></td>
<td><a style=color:red;text-decoration:none  href=#>Edit</a></td>
   </tr>
    </tbody>
    <?php
       }
       ?>
</table>
</form>
<?php
}else{
         echo "<p style=color:red;padding:5px;margin-left:3px;width:100%;height:50%;background:lightgray;text-align:center> No product added yet</p>";
}


?>
 </div>
</div>


<script>
 $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
 });
</script>
</body>
</html>