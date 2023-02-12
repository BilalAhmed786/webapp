<?php
require_once(dirname(dirname(__FILE__)) . '/Database/database.php');
if (!isset($_SESSION)) {
    session_start();
}

?>

<?php 
 if(isset($_POST['shipamount'])){
?>
<form name="checkout" method="post" action="orderdetail.php" enctype="multipart/form-data">
    <div class=row-checkout>
        <div class="col-1">
            <h4 style=display:block;text-align:left;margin-left:120px>Billing information</h4>
            <div class=form-group>
                <label for="firstname">Firstname</label><label style=margin-left:155px for="firstname">Lastname</label>
            </div>
            <div class="">
                <input style=margin-right:60px;margin-left:10px;padding-left:5px;height:35px type="text" name="firstname"
                    class="firstname" placeholder="firstname" required><input id="lastname" type="text" style=height:35px;padding-left:5px
                    class="lastname"  name="lastname" placeholder="lastname" required>
            </div>

            <div class=form-group>
                <label for="country/region">country/region</label>
            </div>
            <div class="">
                <input style=margin-right:60px;margin-left:10px;padding-left:5px;width:40%;height:35px type="text" name="country"
                    class="region" placeholder="country/region" required>
            </div>
            <div class=form-group>
                <label for="country/region">street adress</label>
            </div>
            <div class="">
                <textarea style=margin-left:7px;padding:5px name="streetaddress" required></textarea>
            </div>
            <div class=form-group>
                <label for="country/region">town/city</label>
            </div>
            <div class="">
                <input style=margin-right:60px;margin-left:10px;padding-left:5px;height:35px;width:40% type="text" name="city"
                    class="region" placeholder="town/city" required>
            </div>
            <div class=form-group>
                <label for="country/region">Postcode/zip</label>
            </div>
            <div class="">
                <input style=margin-right:60px;margin-left:10px;padding-left:5px;height:35px;width:40% type="text" name="postcode"
                    class="region" placeholder="postcode/zip" required>
            </div>
            <div class=form-group>
                <label for="country/region">Phone</label>
            </div>
            <div class="">
                <input style=margin-right:60px;margin-left:10px;padding-left:5px;height:35px;width:40% type="text" name="phone"
                    class="region" placeholder="phone" required>
            </div>
            <div class=form-group>
                <label for="country/region">Email</label>
            </div>
            <div class="">
                <input style=margin-right:60px;margin-left:10px;padding-left:5px;height:35px;width:40% type="text" name="email"
                    class="region" placeholder="Email" required>
            </div>

        </div>
      <div class=colmn-2>
            <h3>order details</h3>
            <table class="checkouttab">
                <tr style=padding:5px>
                <td style=background:#e8e6e6;padding:4px;>product name</td>
    <?php
    $nettotal = '';
    $shipamount = '';
    if (isset($_SESSION["cart"])) {
        $total = 0;
        foreach ($_SESSION["cart"] as $keys => $value) {
            $productname = $value['item_name'];
            $productqty = $value['productqty'];
            $productprice = $value['product_price'];
            $productimage = $value['image_name'];
            $productid = $value['product_id'];
            $actualqty = $value['quantity'];
            $pronameqty=$productname. " x ". $productqty;
            $total = $total + ((int)$productprice * $productqty);        
            echo '<td style=display:flex;padding:2px>'.$pronameqty.'</td>'
            ?>
            <input type=hidden name=pronameqty[] value="<?php echo $pronameqty?>">
            <input type=hidden name=productname[] value="<?php echo $productname?>">
            <input type=hidden name=productqty[] value="<?php echo $productqty?>">
            <input type=hidden name=costprice[] value="<?php echo $productprice?>">
            <input type=hidden name=productimage[] value="<?php echo $productimage?>">
            <input type=hidden name=productid[] value="<?php echo $productid?>">
            <input type=hidden name=actualqty[] value="<?php echo $actualqty?>">
            <?php
        
    }
        
        if (isset($_POST['shipamount'])) {
            $shipamount=((int)$_POST['shipamount']);
            $nettotal = $total + $shipamount;
            
        }
   
    }
?>
                </tr>
                <tr>
                <td style=background:#e8e6e6;padding:4px;margin:5px>sub total</td>
                <td><?php echo $total?><input id="subtotal" type=hidden name="subtotal" value="<?php echo $total?>"></td>
                </tr>
                <tr>
                <td style=background:#e8e6e6;padding:4px>shipping</td>
                <td><?php echo $shipamount;?><input id="shipamount" type=hidden name="shipamount" value="<?php echo $shipamount?>"></td>
                </tr>
                <tr>
                <td style=background:#e8e6e6;padding:4px>total</td>
                <td><?php echo $nettotal?><?php echo $_SESSION['currency']?><input id="nettotal" type=hidden name="nettotal" value="<?php echo $nettotal?>"></td>
                </tr>
            </table>
            
    <h3>payment method</h3>
    <div style=margin-left:90px>
      <input type="radio" id="huey" name="cashupon" value="Cash on delivery" required>
      <label >cash on delivery</label>
    </div>
    <input class="orderplace" type=submit name="placeorder" value="Place Order"></br>
    </div>
    </div>
</form>
<?php
}else{
    echo '<script>window.location="cart.php"</script>';
}


