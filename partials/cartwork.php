<?php

    	if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
    
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Adding products to the basket:
        if (isset($_GET['id'])&& isset($_POST['add'])) {
            $_SESSION['cart'][$_GET['id']] = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'image_name' => $_POST["image"],
                'product_price' => $_POST["hidden_price"],
                'quantity' => $_POST["hidden_qty"],
                'productqty'=>1
            );
            echo '<script>window.location="shop.php"</script>';
        }
        
        // Removing products from the basket:
        if (isset($_GET['action']) && $_GET['action'] == 'delete') {
            if(isset($_SESSION['cart'][$_GET['id']])) {
                unset($_SESSION['cart'][$_GET['id']]);
        echo '<script>window.location="cart.php"</script>';
            }
        }
$quantrest="";
if (isset($_POST['mod_qty'])) {
    $total = 0;
    foreach ($_SESSION['cart'] as $keys => $value) {
       

    if ($value['item_name'] == $_POST['item_name']) {
            if ($value['quantity'] >= $_POST['mod_qty']){
                $_SESSION['cart'][$keys]['productqty'] = $_POST['mod_qty'];

            }else{
               $quantrest='<p class="cartnote"> <b>'.$_POST['item_name'].'</b> is less than your desired qunatity "'.$_POST['mod_qty'].'"</p>';
            }
        }
    }
}



?>



<div style=""></div>
        <h3 class="title2">Shopping Cart Details</h3>
        <?php echo $quantrest;?>
        <div style=width:100% class="table-responsive">
            <table  class="table table-bordered">
            <tr>
            <th width="10%">Sr</th>
                <th width="50%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">UnitPrice</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $n=1;
                foreach ($_SESSION["cart"] as $keys => $value) {
                ?>

                        <tr>
                            <td><?php echo $n++ ?></td>
                            <td><img style=width:50px class="cartimage" src='<?php echo $value["image_name"]; ?>'></br>
                            <?php echo $value["item_name"]; ?></td>
                            <td>
                        <form method="post" action="cart.php">
                            <input class='qtyname' type='number' name='mod_qty' onchange='this.form.submit();' value="<?php echo $value["productqty"]?>"  min=1  max=10> 
                            <input  type='hidden' name='item_name' value="<?php echo $value["item_name"]?>">
                        </form>
                    </td>
                            <td><?php echo $value["product_price"]; ?><input class='itemprice' type='hidden' value="<?php echo $value["product_price"]?>"></td>
                            <td class='total'></td>
                            <td><a href="cart.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                            class="text-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a></td>

                        </tr>
            <?php
                        
}
    
               
         ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th id='gtotal'></th>
                            <td></td>
                        </tr>
                        <?php
                        
                    }
                  
                ?>
            </table>
        </div>

    </div>