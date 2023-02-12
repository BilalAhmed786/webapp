<?php
require_once(dirname(dirname(__FILE__)) . '/Database/database.php');
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Adding products to the basket:
if (isset($_POST['add']) && $_POST["hidden_qty"] != 0 && $_POST["discounted_price"] == 0) {
    $_SESSION['cart'][$_POST['hidden_id']] = array(
        'product_id' => $_POST["hidden_id"],
        'item_name' => $_POST["hidden_name"],
        'image_name' => $_POST["image"],
        'product_price' => $_POST["hidden_price"],
        'quantity' => $_POST["hidden_qty"],
        'productqty' => 1
    );
    echo '<script>window.location="shop.php"</script>';
} elseif (isset($_POST['add']) && $_POST["hidden_qty"] != 0 && $_POST["discounted_price"] != 0) {

    $_SESSION['cart'][$_POST['hidden_id']] = array(
        'product_id' => $_POST["hidden_id"],
        'item_name' => $_POST["hidden_name"],
        'image_name' => $_POST["image"],
        'product_price' => $_POST["discounted_price"],
        'quantity' => $_POST["hidden_qty"],
        'productqty' => 1
    );
    echo '<script>window.location="shop.php"</script>';


}





// Removing products from the basket:
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    if (isset($_SESSION['cart'][$_GET['id']])) {
        unset($_SESSION['cart'][$_GET['id']]);
        echo '<script>window.location="cart.php"</script>';
    }
}
$quantrest = "";
if (isset($_POST['mod_qty'])) {
    $total = 0;
    foreach ($_SESSION['cart'] as $keys => $value) {


        if ($value['item_name'] == $_POST['item_name']) {
            if ($value['quantity'] >= $_POST['mod_qty']) {
                $_SESSION['cart'][$keys]['productqty'] = $_POST['mod_qty'];

            } else {
                $quantrest = '<p class="cartnote"> <b>' . $_POST['item_name'] . '</b> is less than your desired qunatity "' . $_POST['mod_qty'] . '"</p>';
            }
        }
    }
}



?>
<?php
if ($_SESSION["cart"] != []) {
    ?>
    <h3 class="title2">Shopping Cart Details</h3>
    <?php echo $quantrest; ?>
    <div style=width:100% class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th width="10%">Sr</th>
                <th width="50%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">UnitPrice</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
            if (!empty($_SESSION["cart"])) {
                $n = 1;
                foreach ($_SESSION["cart"] as $keys => $value) {
                    ?>

                    <tr>
                        <td>
                            <?php echo $n++ ?>
                        </td>
                        <td><img style=width:50px class="cartimage" src='<?php echo $value["image_name"]; ?>'></br>
                            <?php echo $value["item_name"]; ?>
                        </td>
                        <td>
                            <form method="post" action="cart.php">
                                <input class='qtyname' type='number' name='mod_qty' onchange='this.form.submit();'
                                    value="<?php echo $value["productqty"] ?>" min=1 max=10>
                                <input type='hidden' name='item_name' value="<?php echo $value["item_name"] ?>">
                            </form>
                        </td>
                        <td>
                            <?php echo $value["product_price"]; ?><input class='itemprice' type='hidden'
                                value="<?php echo $value["product_price"] ?>">
                        </td>
                        <td class='total'></td>
                        <td><a href="cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span class="text-danger"><i
                                        class="fa fa-trash" aria-hidden="true"></i></span></a></td>

                    </tr>
                    <?php

                }


                ?>
                <tr>
                    <td colspan="3" align="right"><b>Sub total</b></td>
                    <?php 
                $query = "SELECT * FROM currency_tab"; 
                $result = mysqli_query($conn, $query);
                $results=mysqli_fetch_array($result);
                $currency=$results['currency']
                    ?>

                    <th id="gtotal"><input id="currency" type=hidden value="<?php echo $currency;?>"></th>

                    
                    <td></td>
                </tr>
                <?php

            }

            ?>
        </table>

        <div class="shiptable" style=display:inline-block;margin:0;padding:0;float:right;width:50%>
            <h3 class="title2" style=>cart total</h3>
            <form id="shipform" action="cart.php" method="post">
                <div style=margin-left:-160px class="selectcity">
                    <div style=margin-bottom:10px>
                        <label for="">Regional shipping</label>
                    </div>
                    <select style="width:100px" name="cityname" id="city" onchange=this.form.submit();>
                        <option value="">select city</option>
                        <?php
                        $sql = "SELECT * from regional_shipping";
                        $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
                        while ($row = mysqli_fetch_array($resultset)) {
                            $cityname = $row['cityname'];
                            ?>
                            <option value="<?php echo $cityname ?>" <?php if (isset($_POST['cityname']) && $_POST['cityname'] == "$cityname")
                                  echo 'selected="selected"'; ?>><?php echo $cityname ?></option>;
                            <?php
                        }
                        $city = $_POST['cityname'];
                        ?>
                    </select>
                </div>
            </form>
            <table style=width:100%>
                <tr style=padding:80px;>
                    <td>Sub total</td>
                    <td></td>
                    <td id="cartship"></td>
                </tr>
                <tr>
                    <td class="freeship"></td>
                    <td class="freeship">amount</td>
                </tr>
                <tr>

                    <?php
                    $cityship = "";
                    $cityamount = "";
                    $sql = "SELECT * from regional_shipping where cityname='$city'";
                    $resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
                    $row = mysqli_fetch_array($resultset);
                    if (isset($row['cityname']) && ($row['amount'])) {
                        $cityship = $row['cityname'];
                        $cityamount = $row['amount'];
                    }
                    ?>
                    <td style=padding:20px;>Shipment</td>
                    <td style=padding:20px;><?php echo $cityship ?></td>
                    <td style=padding:20px;><?php echo $cityamount ?><input id="shipmentcharge" type="hidden"
                            value="<?php echo $cityamount ?>"></td>
                </tr>
                <tr>
                    <td style=display:block;text-align:center;margin-top:10px><b>Total</b></td>
                    <td id="nettotal" style=background:#efefef;padding:2px></td>

                </tr>
            </table>
            <?php if ($cityamount != '') {
                ?>
                <form action="checkout.php" method="POST">
                    <input type="hidden" name="shipamount" value="<?php echo $cityamount ?>">
                    <input class="cartsubmitbtn" type="submit" value="proceed to checkout">
                </form>
                <?php
            } else {
                echo "<p style=color:red;margin-left:200px;background:lightgray;width:30%;padding:10px>select shipping</p>";

            }
} else {
    echo "<p style=color:red;font-size:18px;background:lightgray;margin-left:15px;padding-left:15px;width:50%

    ><i class='fa fa-info-circle' style=color:blue;padding:7px></i>Cart is empty</p>";
}
?>
    </div>
</div>