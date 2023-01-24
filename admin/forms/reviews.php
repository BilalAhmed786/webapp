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
    $sql = "DELETE from review_table where review_id=$productid";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
}

//delete specific items from products details and product image gallery 
if (isset($_POST['del-btn']) && isset($_POST['edit'])) {
    for($i=0;$i<count($_POST['edit']);$i++){
$deleteitems=$_POST['edit'][$i];
        $sql = "DELETE from  review_table where review_id='$deleteitems'";
        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
      
        }

}

if (isset($_POST['edit-btn']) && isset($_POST['edit']) && $_POST['reviewstatus']!='') {//selected items status changed
    for($i=0;$i<count($_POST['edit']);$i++){
        $selecteditems = $_POST['edit'][$i];
       $statusitems = $_POST['reviewstatus'];
        $sql = "update review_table set status='$statusitems' where review_id=$selecteditems";
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
$sql = "SELECT * from  review_table";
$result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
if($result->num_rows>0) {
    ?>
<div style=width:100%;display:block class="shopdisplay"> 
    <h2>Reviews</h2> 
<form method="post" action="reviews.php">
    <table style=width:100%;display:block >
    <thead>
    <th style=width:8%><input id='checkAll' type="checkbox"/> <button style=color:white;background:red;padding:8px;border:none;cursor:pointer; name="del-btn" class="saifidelbtn">Delete</button></th>
    <th style=width:20%><input id='checkAll2' type="checkbox"/>
    <select name="reviewstatus" value="">
    <option value="">select</option>
    <option value="pending">Pending</option>
    <option value="approved">Approved</option>      
</select>  <button style=color:white;background:red;padding:8px;border:none;cursor:pointer; name="edit-btn" class="saifidelbtn">Apply</button></th>  
<tr>
    <th>sr#</th>
    <th>username</th>
    <th>productname</th>
    <th>userrating</th>
    <th>userreview</th>
    <th>date</th>
    <th>status</th>
    <th>delete</th>
</tr>
    </thead>

<?php
       foreach ($result as $results) {
?>   
<tbody> 
<tr>
<td><?php echo $n++; ?></td>
<td><div style=text-align:left><input id="checkItem" type="checkbox" name="edit[]" value="<?php echo $results['review_id'];?>"> <?php echo $results['user_name']?></div></td>
<td><?php echo $results['product_name'] ?></td>
<td style=width:10%><?php if($results['user_rating']==1){
echo "<span style=color:gold class='fa fa-star'></span>
<span class='fa fa-star'></span>
<span class='fa fa-star'></span>
<span class='fa fa-star'></span>
<span class='fa fa-star'></span>";
}elseif($results['user_rating']==2){
    echo "<span style=color:gold class='fa fa-star'></span>
    <span style=color:gold class='fa fa-star'></span>
    <span class='fa fa-star'></span>
    <span class='fa fa-star'></span>
    <span class='fa fa-star'></span>";
}elseif($results['user_rating']==3){
    echo "<span style=color:gold class='fa fa-star'></span>
    <span style=color:gold class='fa fa-star'></span>
    <span style=color:gold class='fa fa-star'></span>
    <span class='fa fa-star'></span>
    <span class='fa fa-star'></span>";
}elseif($results['user_rating']==4){
    echo "<span style=color:gold class='fa fa-star'></span>
    <span style=color:gold class='fa fa-star'></span>
    <span style=color:gold class='fa fa-star'></span>
    <span style=color:gold class='fa fa-star'></span>
    <span class='fa fa-star'></span>";
}elseif($results['user_rating']==5){
    echo "<span style=color:gold class='fa fa-star'></span>
    <span style=color:gold class='fa fa-star'></span>
    <span style=color:gold  class='fa fa-star'></span>
    <span style=color:gold class='fa fa-star'></span>
    <span style=color:gold class='fa fa-star'></span>";
}
?></td>
<td><?php echo $results['user_review'] ?></td>
<td><?php echo date('l jS, F Y h:i:s A', $results["datetime"]) ?></td>
<td><?php echo $results['status'];?></td>
<td><a style=color:red;text-decoration:none href="reviews.php?id=<?php echo $results['review_id']?>">Delete</a></td>

   </tr>
    </tbody>
<?php
       }
?>
  </table> 
    </form>    
<?php

}else{
         echo "<p style=color:red;padding:5px;margin-left:3px;width:100%;height:50%;background:lightgray;text-align:center> No review yet</p>";
}


?>
 </div>
</div>


<script>
 $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
     $('#checkAll2').prop('checked',false);
 })

 $("#checkAll2").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
     $('#checkAll').prop('checked',false);
 });


</script>


</body>
</html>