<?php require_once(dirname(dirname(__FILE__)) . '/Database/database.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="titleproduct">
    <h2>SHOP</h2> 
    <?php
$i="";
$q="select * from add_product";
$fetch=mysqli_query($conn,$q);
while($data=mysqli_fetch_array($fetch)){
    $str2 = substr($data['productimage'], 3);
    
 echo    
'<div class="prorow">
         <div class="procol">
         <img style=width:300px src="'.$str2.'"></br>
         <p>'.$data['productname'].'</p></br>
        <p>'.$data['saleprice'].'</p>
        <a href="'.$data['id'].'">Add to cart</a>
         </div>
    </div>';
}

?>

</div>
 

</body>
</html>