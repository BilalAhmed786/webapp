<?php
require_once(dirname(dirname(__FILE__)) . '/Database/database.php');
$firstname='';$lastname ='';$country ='';$streetaddress='';$city ='';
$postcode=''; $phone ='';$email = '';$productnamqty='';
$productname='';$productimage=''; $productqty=''; 
$costprice = '';$subtotal = '';$shipamount = '';$nettotal ='';$paymentmethod = '';

if (isset($_POST['placeorder'])){
    //billing detail
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $country = htmlspecialchars($_POST['country']);
    $streetaddress = htmlspecialchars($_POST['streetaddress']);
    $city = htmlspecialchars($_POST['city']);
    $postcode = htmlspecialchars($_POST['postcode']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $productnamqty =$_POST['pronameqty'];
    
   
   
    //order details in array
    $productname = json_encode($_POST['productname']);
    $productimage = json_encode($_POST['productimage']);
    $productqty = json_encode($_POST['productqty']);
    $costprice = json_encode($_POST['costprice']);
    $subtotal = htmlspecialchars($_POST['subtotal']);
    $shipamount = htmlspecialchars($_POST['shipamount']);
    $nettotal = htmlspecialchars($_POST['nettotal']);
    $paymentmethod = htmlspecialchars($_POST['cashupon']);

    $sql = "INSERT INTO order_details(firstname, lastname, country, address, city, postcode, phone, email, 
 productname, productqty, productimage, cost, subtotal, shipping, total, paymentmethod	)
    VALUES ('$firstname', '$lastname', '$country', '$streetaddress', '$city', '$postcode', '$phone', '$email',
               '$productname', '$productqty', '$productimage', '$costprice', '$subtotal', '$shipamount','$nettotal', '$paymentmethod')";
    mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
}


//update inventory from database

if (isset($_POST['placeorder'])) {
    $actualqty = $_POST['actualqty']; // use for update quantity
    $productid = $_POST['productid'];
    $databaseqty = $_POST['productqty'];

    $subtracted = array_map(function ($x, $y) { //subtract two arrays
        return $y - $x;
    }, $databaseqty, $actualqty);
    $invent = array_combine(array_keys($databaseqty), $subtracted);


    foreach ($productid as $key => $value) { //inventory manage 
        $q = "UPDATE add_product SET Inventory=$invent[$key] WHERE id=$productid[$key]";
        mysqli_query($conn, $q);
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if($firstname){
        ?>
    <div class="rowbill">
        <div class=col-1bill>
        <h4 style=display:block;text-align:left;padding-left:10px>Biller information</h4>
                <table style=width:70%>
                    <tr>
                        <td style=padding:6px;text-align:left>firstname</td>
                        <td><?php echo $firstname ?></td>
                    </tr>
                    <tr>
                        <td style=padding:6px;text-align:left>lastname</td>
                        <td><?php echo $lastname ?></td>
                    </tr>
                    <tr>
                        <td style=padding:6px;text-align:left>country</td>
                        <td><?php echo $country ?></td>
                    </tr>
                    <tr>
                        <td style=padding:6px;text-align:left>address</td>
                        <td> <?php echo $streetaddress ?></td>
                    </tr>
                    <tr>
                        <td style=padding:6px;text-align:left>city</td>
                        <td><?php echo $city ?></td>
                    </tr>
                    <tr>
                        <td style=padding:6px;text-align:left>postcode</td>
                        <td><?php echo $postcode ?></td>
                    </tr>
                    <tr>
                        <td style=padding:6px;text-align:left>phone</td>
                        <td><?php echo $phone ?></td>
                    </tr>
                    <tr>
                        <td style=padding:6px;text-align:left>email</td>
                        <td><?php echo $email?></td>
                    </tr>
                </table>
        </div>
        <div class=col-2bill>
           <h4 style=display:block;>Billing details</h4>
                <table>
                    <tr>
                        <td style=text-align:left;padding:6px>productname</td>
                        <?php if (is_array($productnamqty) || is_object($productnamqty)) 
                        foreach($productnamqty as $productfor){
                            echo '<td style=display:flex;width:100%;padding-left:20px>'.$productfor.'</td>';
                        }
                        ?>
                    </tr>
                    <tr>
                        <td style=padding:6px;text-align:left>subtotal</td>
                        <td><?php echo $subtotal ?></td>
                    </tr>
                    <tr>
                        <td style=padding:6px;text-align:left>shipping</td>
                        <td> <?php echo $shipamount ?></td>
                    </tr>
                    <tr>
                        <td style=padding:6px;text-align:left>total</td>
                        <td>Rs.<?php echo $nettotal ?></td>
                    </tr>
                   </table>
        </div>
    </div>
                   
<?php
}else{
        
    echo '<script>window.location="cart.php"</script>';
}
  ?>      
    
</body>

</html>