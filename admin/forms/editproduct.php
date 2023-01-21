<?php require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php'); ?>
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (($_SESSION['role']) !== 'admin') {
    header("Location: http://localhost/webapp/auth/login.php");
}


   
        if (isset($_GET['id'])) {
            $productid = $_GET['id'];
        
        }
        
       $sql = "SELECT * from  add_product where id=$productid";
        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
        $results =mysqli_fetch_array($result);

        
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

        <div class="editpro">
            <form action="editpro.php" method="post" enctype="multipart/form-data">
                <h3 style=text-align="center">Edit product</h3>
                <div class=form-group>
                    <div style=margin-bottom:15px class="productname">
                        <label for="productname">productname</label>
                    </div>
                    <input style=width:80% class="form-control" type="text" name="productname" value="<?php echo $results['productname']?>">
                    <div style=margin-bottom:15px;margin-top:15px class="productdesc">
                        <label for="productname">productdesc</label>
                    </div>
                    <textarea class="form-control" type="text" name="productdesc" value=""><?php echo $results['productdescripton']?></textarea>
                    <div style=margin-bottom:15px;margin-top:15px class="productshort">
                        <label for="productname">productshortdesc</label>
                    </div>
                    <textarea class="form-control" type="text" name="productshort" value=""><?php echo $results['productshortdescription']?></textarea>
                    <div style=margin-bottom:15px;margin-top:15px class="productcat">
                        <label for="productname">productcat</label>
                    </div>
                    <input class="form-control" type="text" name="productcat" value="<?php echo $results['productcategory']?>">

                    <div style=margin-bottom:15px;margin-top:15px class="invent">
                        <label for="productname">inventory</label>
                    </div>
                    <input class="form-control" type="text" name="inventory" value="<?php echo $results['Inventory']?>">
                    <div style=margin-bottom:15px;margin-top:15px class="sprice">
                        <label for="productname">saleprice</label>
                    </div>
                    <input class="form-control" type="text" name="saleprice" value="<?php echo $results['saleprice']?>">
                    <div style=margin-bottom:15px;margin-top:15px class="dprice">
                        <label for="productname">discountprice</label>
                    </div>
                    <input class="form-control" type="text" name="discountprice" value="<?php echo $results['discountedprice']?>">
                    <input type="hidden" name="productid" value="<?php echo $results['id']?>">
                    <input type="hidden" name="productdataname" value="<?php echo $results['productname']?>">
                </br>
                    
                </div>
           
        </div>   
                <div style=margin-left:100px; class=imagediv>
                    
                   <h3 style=margin-right:100px>product image</h3>
                    <img style=width:150px;margin-bottom:80px;margin-top:20px;margin-left:120px src="<?php echo $results['productimage']?>" alt="">
                    <input style=margin-left:120px class="form-control" type="file" name="productimage" value="<?php if($results['productimage']!='../../images/'){
                        echo $results['productimage'];}?>"></br>
                    <button style=margin-left:140px;margin-top:30px;color:white;background:red;padding:7px;cursor:pointer 
                    class="imageupdate" type=submit name="submit">Update</button>
                </div>
        </form>
    </div>

    <script src="../admin.js"></script>
    <script src="../../js/custom.js"></script>
</body>

</html>