<?php require_once(dirname(dirname(__FILE__)) . '/Database/database.php');?>

<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<h2>Shop</h2>
<div class=filtercontain>
    <form id="formshop" method="post" action="shop.php">
        <select style=height:30px;padding:4px;margin-left:25px name="productorder">
            <option value="order by a-z" <?php if (isset($_POST['productorder']) && $_POST['productorder'] == 'order by a-z')
                echo 'selected="selected"' ?>>order by a-z</option>
                <option value="order by z-a" <?php if (isset($_POST['productorder']) && $_POST['productorder'] == 'order by z-a')
                echo 'selected="selected"' ?>>order by z-a</option>
                <option value="order by high-low price" <?php if (isset($_POST['productorder']) && $_POST['productorder'] == 'order by high-low price')
                echo 'selected="selected"' ?>>order by high-low price
                </option>
                <option value="order by low-high price" <?php if (isset($_POST['productorder']) && $_POST['productorder'] == 'order by low-high price')
                echo 'selected="selected"' ?>>order by low-high price
                </option>
            </select>
            <input
                style=color:white;background:red;padding:8px;border:none;cursor:pointer;margin-left:10px;margin-bottom:40px
                type="submit" name="filterpro" value=Filter>
        </form>


<?php
$query = "SELECT * FROM product_cat";
$result = mysqli_query($conn, $query);

?>


        <div style=display:block;float:right;margin-top:-100px;margin-right:40px class="shotcat">
    <form action="shop.php" method="post">
                <h4>categories</h4>
<?php
while($results = mysqli_fetch_array($result)){
    $cat=$results['category'];
?>
<input type='radio'  name="procat" value="<?php echo $cat ?>"<?php if(isset($_POST['procat']) && $_POST['procat']=="$cat") {echo "checked='checked'";}?> onclick="this.form.submit()">
<label for='radio'><?php echo $cat ?></label><br>

<?php
}
?>

               
        </div>
        </form>
    </div>
<?php
?>
    <?php
            if (isset($_POST['filterpro']) && $_POST['productorder'] == 'order by a-z') {
                $query = "SELECT * FROM add_product,currency_tab ORDER BY productname ASC";
            } elseif (isset($_POST['filterpro']) && $_POST['productorder'] == 'order by z-a') {
                $query = "SELECT * FROM add_product,currency_tab ORDER BY productname DESC";
            } elseif (isset($_POST['filterpro']) && $_POST['productorder'] == 'order by high-low price') {
                $query = "SELECT * FROM add_product,currency_tab ORDER BY saleprice DESC";
            } elseif (isset($_POST['filterpro']) && $_POST['productorder'] == 'order by low-high price') {
                $query = "SELECT * FROM add_product,currency_tab ORDER BY saleprice ASC";
            } elseif(isset($_POST['procat'])) {
                    $category=$_POST['procat'];
                $query = "SELECT * FROM add_product,currency_tab where productcategory='$category'";

            }else{
                $query = "SELECT * FROM add_product,currency_tab"; 
            }
            $result = mysqli_query($conn, $query);


            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                    
                    $image = substr($row["productimage"], 3);

                    ?>
        <div class="col-md-3">
            <form id="myform" method="post" action="cart.php">
                <div class="product">
                    <a
                        href="productpage.php?id=<?php echo $row["id"] ?> && productname=<?php echo urlencode($row["productname"]); ?>"><img
                            style=width:200px src="<?php echo $image; ?>" class="img-responsive"></a>
                    <h5 class="text-info">
                        <?php echo $row["productname"]; ?>
                    </h5>
                    <h5 style=color:red class="text-danger">
                
                        <?php if ($row["discountedprice"] == '') {
                            echo '<P style=color:black>' .(int) $row["saleprice"].$row['currency'].'</p>';
                        } else {
                            echo '<s style=color:red>' . (int) $row["saleprice"].$row['currency'].'</s>';
                        } ?>
                    </h5>
                    <h5 class="text-danger">
                        <?php if ($row['discountedprice'] != '') {
                            echo '<p>'.(int)$row['discountedprice'].$row['currency'].'</p>';
                        }
                        ; ?>
                    </h5>
                    <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>">
                    <input type="hidden" name="hidden_name" value="<?php echo $row["productname"]; ?>">
                    <input type="hidden" name="image" value="<?php echo $image; ?>">
                    <input type="hidden" name="hidden_qty" value="<?php echo $row["Inventory"]; ?>">
                    <input type="hidden" name="hidden_price" value="<?php echo $row["saleprice"]; ?>">
                    <input type="hidden" name="discounted_price" value="<?php echo (int) $row["discountedprice"]; ?>">
                    <?php if ($row["Inventory"] != 0) {
                        ?>
                        <input id="addtocart" type="submit" name="add" style="margin-top: 5px;" class="btn btn-success"
                            value="Add to Cart"></br></br>

                        <?php
                    } else {
                        echo '<p style=color:red;margin-top:-10px>out of stock</p>';
                    }
                    ?>
                </div>
            </form>
        </div>
        <?php

                }
            } else {
                echo '<p style=color:red;padding:5px;margin-left:3px;width:100%;background:lightgray;text-align:center>No product added yet</p>';
            }
            ?>