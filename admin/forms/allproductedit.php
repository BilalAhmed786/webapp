<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php');

if (!isset($_SESSION)) {
    session_start();
}

if (($_SESSION['role']) !== 'admin') {
    header("Location: http://localhost/webapp/auth/login.php");
}


$product = "";
if (isset($_POST['updaterec']) && isset($_POST['product']) && !empty($_POST['procat'])) {

    $products = $_POST['product'];
    $procat = $_POST['procat'];

    foreach ($products as $product) {
        $sql = "UPDATE add_product SET productcategory='$procat' where id=$product";
        mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

    }

}

$integer = '';

if (isset($_POST['option']) && isset($_POST['updaterec']) && isset($_POST['product'])) {
    if (is_numeric($_POST['value'])) {



        $products = $_POST['product'];

        foreach ($products as $product) {
            $sql = "select * from add_product where id=$product";
            $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
            $results = mysqli_fetch_array($result);
            $percentage = (int) $results['saleprice'] * $_POST['value'] / 100;
            $proresult = (int) $results['saleprice'] + $percentage . 'Rs';
            $prorest = (int) $results['saleprice'] - $percentage . 'Rs';
            $saleprice = (int) $results['saleprice'] - $_POST['value'];
            $soldprice = (int) $results['saleprice'] + $_POST['value'];
            $discountedprice = (int) $results['saleprice'] - $percentage;
            

            if ($_POST['option'] == "increase sale price in %") {
                $sql = "update add_product set saleprice='$proresult' where id=$product";
                $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));


            } elseif ($_POST['option'] == "decrease sale price in %") {

                $sql = "update add_product set saleprice='$prorest' where id=$product";
                $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));



            } elseif ($_POST['option'] == "decrease sale price in unit") {

                $sql = "update add_product set saleprice='$saleprice' where id=$product";
                $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

            } elseif ($_POST['option'] == "increase sale price in unit") {

                $sql = "update add_product set saleprice='$soldprice' where id=$product";
                $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

            } elseif ($_POST['option'] == "discount in %") {

                $sql = "update add_product set discountedprice='$discountedprice' where id=$product";
                $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));


            } elseif ($_POST['option'] == "discount in unit") {

                $sql = "update add_product set discountedprice='$saleprice' where id=$product";
                $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));


            }
        }
    } elseif ($_POST['value'] != '') {

        $integer = "<p style=color:red;margin-left:15px>only numerice value allowed</p>";
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

        <div style=margin-left:80px>
            <h3>Edit products</h3>


            <style>
                .hide {
                    position: absolute;
                    top: -1px;
                    left: -1px;
                    width: 1px;
                    height: 1px;
                }
            </style>


            <form method="post" action="allproductedit.php">

                <select id="bulkedit" style=height:35px name="option">

                    <option value="selected">select</option>
                    <option value="increase sale price in %">increase sale price in %</option>
                    <option value="decrease sale price in %">decrease sale price in %</option>
                    <option value="increase sale price in unit">increase sale price in unit</option>
                    <option value="decrease sale price in unit">decrease sale price in unit</option>
                    <option value="discount in %">discount in %</option>
                    <option value="discount in unit">discount in unit</option>

                </select>

                </br>
                <input id="updateval" style=text-align:center;margin-top:20px;height:30px type="text" name="value"
                    placeholder="input value"><br>
                <?php echo $integer; ?>
                <?php
                if (isset($_POST['delete'])) {
                    $proid = $_POST['delete'];
                    foreach ($proid as $id) {
                        $q = "SELECT * from add_product where productname='$id'";
                        $result = mysqli_query($conn, $q) or die(mysqli_error($conn));
                        $results = mysqli_fetch_array($result);

                        ?>
                        <input id="proinfo" type=hidden name="product[]" value="<?php echo $results['id'] ?>">

                        <?php
                    }

                }
                ?>

                <h3 style=margin-right:100px;margin-top:45px>Change category</h3>


                <select id="procat" style=height:35px;text-align:left;width:80% name="procat">
                    <option value="">select</option>
                    <?php
                    $q = "SELECT * from product_cat";
                    $results = mysqli_query($conn, $q) or die(mysqli_error($conn));
                    foreach ($results as $result) {
                        $procat = $result['category'];
                        ?>
                        <option value="<?php echo $procat ?>" <?php echo $procat ?>     <?php if (isset($_POST['procat']) && $_POST['procat'] == "$procat")
                                       echo 'selected="selected"'; ?>><?php echo $procat ?></option>;
                        <?php
                    }
                    ?>

                </select></br></br>
                <button id="updaterec"
                    style=color:white;background:red;padding:8px;border:none;cursor:pointer;margin-left:70px
                    type="submit" name="updaterec">update</button></br>


            </form>

        </div>


        <div style=margin:auto;padding;auto;margin-top:10px>
            <h3>Selected products</h3>


            <?php
            if (isset($_POST['delete']) != '') {
                $n = 1;
                foreach ($_POST['delete'] as $pro) {
                    ?>
                    <table>
                        <tr>
                            <td>
                                <?php echo $n++ ?>.
                            </td>
                            <td>
                                <?php echo $pro; ?>
                            </td>

                        </tr>

                    </table>
                    <?php
                }

            } else {
                echo '<p style=color:red>no prodcut select</p>';

            }


            ?>


        </div>



</body>

</html>