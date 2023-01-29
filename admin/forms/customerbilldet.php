<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php');

if (!isset($_SESSION)) {
    session_start();
}

if (($_SESSION['role']) !== 'admin') {
    header("Location: http://localhost/webapp/auth/login.php");
}
if (isset($_GET['order'])) {
    $orderno = $_GET['order'];

}

if (isset($_GET['productname'])) {
    $productname = $_GET['productname'];
    $sql = "DELETE from  product_gallery where productname='$productname'";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
}
//delete specific items from products details and product image gallery 
if (isset($_POST['del-btn']) && isset($_POST['delete'])) {
    for ($i = 0; $i < count($_POST['delete']); $i++) {
        $deleteitems = $_POST['delete'][$i];
        print_r($deleteitems);
        $sql = "DELETE from  add_product where productname='$deleteitems'";
        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
        $sql = "DELETE from  product_gallery where productname='$deleteitems'";
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
        <?php require_once(dirname(dirname(dirname(__FILE__))) . '/inc/topbar.php'); ?>
    </div>
    <div class="header">
        <header>
            <?php require_once(dirname(dirname(dirname(__FILE__))) . '/inc/header.php'); ?>
        </header>
    </div>
    <div class="rows">
        <div class="adminsidenav">
            <?php require '../admindashboard.php'; ?>
        </div>




        <?php
        $n = 1;
        $sql = "SELECT * from  biller_info where date='$orderno'";
        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
        $results = mysqli_fetch_array($result);
        if ($result->num_rows > 0) {
            ?>
            <div style=width:100%;text-align:left;>
                <h4 style=width:100%;text-align:center;>Biller information</h4>
                <table style=margin-bottom:50px;margin-left:auto;margin-right:auto>
                    <tr>
                        <td style=padding:6px;text-align:left>name</td>
                        <td>
                            <?php echo $results['firstname'] ?>
                            <?php echo $results['lastname'] ?>
                        </td>
                    </tr>

                    <tr>
                        <td style=padding:6px;text-align:left>country</td>
                        <td>
                            <?php echo $results['country'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>address</td>
                        <td>
                <?php echo '<p style=width:50%;margin-left:auto;margin-right:auto>'.$results["address"].'</p>' ?>
                        </td>
                    </tr>
                    <tr>
                        <td style=padding:6px;text-align:left>city</td>
                        <td>
                            <?php echo $results['city'] ?>
                        </td>
                    </tr>

                    <tr>
                        <td style=padding:6px;text-align:left>phone</td>
                        <td>
                            <?php echo $results['phone'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td style=padding:6px;text-align:left>email</td>
                        <td>
                            <?php echo $results['email'] ?>
                        </td>
                    </tr>
                </table>
<?php

$sql = "SELECT * from  order_details where date='$orderno'";
$result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
$results = mysqli_fetch_array($result);

        $shipment = $results['shipping'];
        $subtotal = $results['subtotal'];
        $nettotal = $results['total'];
        $paymentmethod = $results['paymentmethod'];

?>

                <div style=width:100% class="biller info">
                    <h2 style=width:100%>Billing detail</h2>
                    <form style=width:100% method="post" action="customerorddet.php">
                        <table style=width:100%;margin-bottom:60px>
                            <thead>
                                <input type="hidden" name="orderid" value="<?php echo $results['date'] ?>">
                                <th>
                                <select name="reviewstatus" value="">
                                <option value="">Order status</option>
                                <option value="complete">complete</option>
                                <option value="failed">failed</option> 
                                <option value="return">return</option> 
                                </select>
                                <button style=color:white;background:red;padding:8px;border:none;cursor:pointer; name="order-btn" class="saifidelbtn" >Apply</button></th>
                                <tr>
                                    <th>item</th>
                                    <th>cost</th>
                                    <th>qty</th>
                                    <th>total</th>
                                </tr>

                            
                            </thead>
                            
                            <?php
                            foreach ($result as $results) {
                                ?>   
                           
                                <tbody>
                                    <tr style=padding:15px>
                                    <td style=width:40%;><img style=width:40px;margin-left:-40px src="../<?php echo $results['productimage']?>"> <div><?php echo $results['productname']?><input type="hidden" name="proname[]" value="<?php echo $results['productname']?>"></div></td>
                                    <td><?php echo $results['cost'] ?></td>
                                    <td><?php echo $results['productqty'] ?><input type="hidden" name="proqty[]" value="<?php echo $results['productqty']?>"></td>
                                    <td><?php echo (int)$results['cost'] * $results['productqty'] ?> Rs</td>

                                    </tr>

                                </tbody>
                                <?php
                            }
                            ?>
                       
                        </table>
                        </form>

 <table style=float:right;display:block;width:30%;margin-bottom:150px>
 <tr style=padding:6px;margin-bottom:20px>
     <th style=padding:6px;margin-bottom:20px>Subtotal</th>
        <td style=padding-left:80px;padding-bottom;>
        <?php echo $subtotal; ?>
        </td>
</tr> 

<tr style=padding:6px;margin-bottom:20px>
     <th style=padding:6px;margin-bottom:20px>Shipping</th>
        <td style=padding-left:80px;>
            <?php echo $shipment; ?>
        </td>
</tr>

<tr style=padding:6px;margin-bottom:20px>
     <th style=padding:6px;margin-bottom:20px>Total</th>
        <td style=padding-left:80px;>
        Rs.<?php echo $nettotal; ?>
        </td>
</tr> 
<tr>
     <td style=padding:15px;margin-bottom:20px>Shipment via</td>
        <td style=padding-left:20px;>
        <?php echo $paymentmethod;?>
        </td>
</tr> 
</table>

                    </div>
            </div>






<?php

        } else {
            echo "<p style=color:red;padding:5px;margin-left:3px;width:100%;height:50%;background:lightgray;text-align:center> No product added yet</p>";
        }


        ?>

 <script>
            $("#checkAll").click(function () {
                $('input:checkbox').not(this).prop('checked', this.checked);
            });
        </script>


</body>

</html>