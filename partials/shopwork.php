<?php require_once(dirname(dirname(__FILE__)) . '/Database/database.php');?>

<h2>Shop</h2>

<?php        
        
        $query = "SELECT * FROM add_product ORDER BY id ASC ";
            $result = mysqli_query($conn,$query);
if (mysqli_num_rows($result) > 0) {

    while ($row = mysqli_fetch_array($result)) {
        $image = substr($row["productimage"], 3);

?>
<div class="col-md-3">

                  <form id="myform" method="post" action="cart.php" target="hiddenFrame">
                        <div class="product">
                               <a href="productpage.php?id=<?php echo $row["id"]; ?>" ><img style=width:200px src="<?php echo $image; ?>" class="img-responsive"></a>
                                <h5 class="text-info"><?php echo $row["productname"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["saleprice"]; ?></h5>
                                <input type="hidden" name="hidden_id" value="<?php echo $row["id"]; ?>">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["productname"]; ?>">
                                <input type="hidden" name="image" value="<?php echo $image; ?>">
                                <input type="hidden" name="hidden_qty" value="<?php echo $row["Inventory"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["saleprice"]; ?>">
                                <?php if($row["Inventory"]!=0){
                                ?>
                            <input id="addtocart" type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to Cart"></br></br>
                                 
                                <?php
                            }
                                else{
                                   echo '<p style=color:red;margin-top:-10px>out of stock</p>';
                                }
                                 ?>   
                            </div>
                        </form>
                        </div>
                    <?php
                
    }
}
        ?>





      

