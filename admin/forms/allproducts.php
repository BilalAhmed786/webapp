<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php');

if (!isset($_SESSION)) {
    session_start();
}

if (($_SESSION['role']) !== 'admin') {
    header("Location: http://localhost/webapp/auth/login.php");
}
if (isset($_GET['id'])) {
    $productid = $_GET['id'];

    $sql = "SELECT  * from add_product where id=$productid";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    $results = mysqli_fetch_array($result);
    unlink($results['productimage']);
    $sql = "DELETE from add_product where id=$productid";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
}

if (isset($_GET['productname'])) {
    $productname = $_GET['productname'];

    $sql = "SELECT  * from product_gallery where productname='$productname'";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    while ($results = mysqli_fetch_array($result)) {

        unlink($results['productgallery']);
    }

    $sql = "DELETE from  product_gallery where productname='$productname'";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
}
//delete specific items from products details and product image gallery 
if (isset($_POST['del-btn']) && isset($_POST['delete'])) {
    for ($i = 0; $i < count($_POST['delete']); $i++) {
        $deleteitems = $_POST['delete'][$i];

        $sql = "SELECT  * from add_product where productname='$deleteitems'";
        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
        while ($results = mysqli_fetch_array($result)) {

            unlink($results['productimage']);

        }



        $sql = "DELETE from  add_product where productname='$deleteitems'";
        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));



        $sql = "SELECT  * from product_gallery where productname='$deleteitems'";
        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
        while ($results = mysqli_fetch_array($result)) {

            unlink($results['productgallery']);

        }




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
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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

        
            <div style=width:100%;display:block;margin-bottom:30px class="shopdisplay">
                <h2>Product detail</h2>

    <form method="post" action="allproducts.php">
                    <table id="myTable" style=width:100%;font-size:12px>
                        <thead>
                            <th><input id='checkAll' type="checkbox" /> 
                            <button style=color:white;background:red;padding:8px;border:none;cursor:pointer; name="del-btn"
                                    class="saifidelbtn">Delete</button>
                            <button style=color:white;background:red;padding:8px;border:none;cursor:pointer; type="submit" name="edit-btn"
                                   formaction="allproductedit.php" class="saifidelbtn">Bulk Edit</button>
                            </th>
                            <tr>
                                <th>productname</th>
                                <th>image</th>
                                <th>stock </th>
                                <th>product category</th>
                                <th>inventory</th>
                                <th>sale price</th>
                                <th>discount price</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql = "SELECT * from  add_product";
                        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
                        if ($result->num_rows > 0) {
                        foreach ($result as $results):?>
                                
                                <tr>
                                    <td style=text-align:left;><input id="checkItem" type="checkbox" name="delete[]"
                                            value="<?php echo $results['productname']; ?>"> <?php echo $results['productname'] ?>
                                           
                                        </td>

                                        <td><img style=width:60px src="<?php echo $results['productimage']; ?>"></td>
                                    <td>
                                        <?php if ($results['Inventory'] == 0) {
                                            echo "<p style=color:red>out of stock<p>";
                                        } else {
                                            echo "<P style=color:green>Instock</p>";
                                        } ?>
                                    </td>
                                    <td>
                                        <?php echo $results['productcategory'] ?>
                                    </td>
                                    <td>
                                        <?php echo $results['Inventory'] ?>
                                    </td>
                                    <td>
                                        <?php echo (int)$results['saleprice'] ?>
                                    </td>
                                    <td>
                                        <?php echo (int)$results['discountedprice'] ?>
                                    </td>
                                    <td><a style=color:red;text-decoration:none
                                            href="allproducts.php?id=<?php echo $results['id'] ?> && productname=<?php echo urlencode($results['productname']) ?>">Delete</a>
                                    </td>
                                    <td><a style=color:red;text-decoration:none
                                            href="editproduct.php?id=<?php echo $results['id'] ?>">Edit</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <tbody>
                    </table> 
                </form>
                
                <?php

        } else {
            echo "<p style=color:red;padding:5px;margin-left:3px;width:100%;height:50%;background:lightgray;text-align:center> No product added yet</p>";
        }


        ?>
        </div>
    </div>


    <script>

$(document).ready( function () {
    $('#myTable').DataTable();
} );

$("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
            $('#checkAll2').prop('checked',false);
        });

        $("#checkAll2").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
     $('#checkAll').prop('checked',false);
 });


    </script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</body>

</html>