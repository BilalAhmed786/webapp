<?php

    	if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
    
if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $item_array_id = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["cart"]);
               $item_array = array(
                 'product_id' => $_GET["id"],
                  'item_name' => $_POST["hidden_name"],
                  'image_name' => $_POST["image"],
                  'product_price' => $_POST["hidden_price"],
                  'quantity' => $_POST["hidden_qty"],
                  'productqty'=>1
                    
                );

            
        $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="shop.php"</script>';
            }else{
                echo '<script>window.location="shop.php"</script>';
            }
        }else{

            $item_array = array(
                'product_id' => $_GET["id"],
               'item_name' => $_POST["hidden_name"],
               'image_name' => $_POST["image"],
                'product_price' => $_POST["hidden_price"],
                'quantity' => $_POST["hidden_qty"],
                'productqty'=>1
                
            );
            
            $_SESSION["cart"][0] = $item_array;
        }

    setcookie('cart', $_SESSION("cart"), time() + (86400 * 60));
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>window.location="cart.php"</script>';
                }
            }
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
               $quantrest='<p style=color:red;> <b style=color:black>'.$_POST['item_name'].'</b> is less than your desired qunatity "'.$_POST['mod_qty'].'"</p>';
            }
        }
    }
}



?>



<div style=""></div>
        <h3 class="title2">Shopping Cart Details</h3>
        <?php echo $quantrest;?>
        <div style=width:150% class="table-responsive">
            <table  class="table table-bordered">
            <tr>
                <th width="50%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">UnitPrice</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    
                foreach ($_SESSION["cart"] as $key => $value) {
                ?>

                        <tr>
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

