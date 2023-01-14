<?php require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php');?>
<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(($_SESSION['role'])!=='admin'){
    header("Location: http://localhost/webapp/auth/login.php");
}
//insert data of free shipping
$freeamount = "";
if (isset($_POST['free_ship'])){
    $freeamount = $_POST['free_ship'];


$sql="INSERT INTO free_shipping(amount)
VALUES ('$freeamount')";
mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
}



//insert data of regional shipping
$cityname = "";
$regamount = "";
if(isset($_POST['regional_amount'])){
$cityname = $_POST['city_name'];
$regamount = $_POST['regional_amount'];

$sql="INSERT INTO regional_shipping(cityname, amount)
VALUES ('$cityname','$regamount')";
mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
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
  <h3> Add shipment method</h3>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Free shipping
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Regional shipping
  </label>
</div>

<form id='freeshipment' action="">
<div class=form-group>
<label class="" for="">
  Amount
  </label>
<input class="form-control" type="input" name="freshipment" id="freeship" required>
</div> 
<div class=form-group>
<input class="form-control" type="submit" name="freeshipform" id="freeshipmentform" value="save">
</div> 
<div id="formvalid" style=color:red;margin-bottom:10px></div>
</form>

<form id='reginalshiping' action="">
<div class=form-group>
<label class="" for="">
  City Name
  </label>
<input class="form-control" type="input" name="cityname" id="cityname">
</div>  
<div class=form-group>
<label class="" for="">
  Amount
  </label>
<input class="form-control" type="input" name="regionalamount" id="regionamount">
</div>
<div class=form-group>
<input class="form-control" type="submit" name="regionalshipform" id="regionalshipmentform" value="save">
</div> 
<div id="regionalform" style=color:red;margin-bottom:10px></div>
</form>
</div>

<div class="adminmain">
  <h3> Select shipment method</h3>
  <div class="form-check">
  <input class="freeshipadmin" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
  <label class="form-check-label" for="flexRadioDefault1">
    Free shipping
  </label>
</div>
<div class="form-check">
  <input class="regshipadmin" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    Regional shipping
  </label>
  <div class="form-check">
  <input class="noshipadmin" type="radio" name="flexRadioDefault" id="NoflexRadioDefault2" checked>
  <label class="form-check-label" for="flexRadioDefault2">
    No shipping
 </label>
</div>
<script>

$("#flexRadioDefault1").click(function(){
  $("#freeshipment").css('display','block');
  $("#reginalshiping").css('display','none'); 

});
$("#flexRadioDefault2").click(function(){
  $("#freeshipment").css('display','none');
  $("#reginalshiping").css('display','block');

});

//free shipping 

$("#freeshipmentform").click(function(e){
e.preventDefault();
var freeship= $('#freeship').val(); 
if(freeship){
    $.ajax({
        url:"shipment.php",
        method:"POST",
        data:{free_ship:freeship},
        success:function(data){    
           
            $("#formvalid").html("insert data successfully");
            
          
                    }
                });
    }
                else{
                $("#formvalid").html("input field required");
                
                }
    
            });


//free shipping 

$("#regionalshipmentform").click(function(e){
e.preventDefault();
var cityname= $('#cityname').val();
var regionamount= $('#regionamount').val(); 
if(cityname && regionamount){
    $.ajax({
        url:"shipment.php",
        method:"POST",
        data:{city_name:cityname,regional_amount:regionamount},
        success:function(data){    
           
            $("#regionalform").html("insert data successfully");
            
          
                    }
                });
    }
                else{
                $("#regionalform").html("input fields required");
                
                }
    
            });


</script>
</div>
</div>
<script src="../../js/custom.js"></script>
<script src="../admin.js"></script>
</body>
</html>


