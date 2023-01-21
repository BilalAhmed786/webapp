<?php require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php'); ?>
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (($_SESSION['role']) !== 'admin') {
    header("Location: http://localhost/webapp/auth/login.php");
}

if(isset($_POST['submit'])){
    $proid = htmlspecialchars($_POST['productid']);
     $productname = htmlspecialchars($_POST['productname']);
     $productdataname = htmlspecialchars($_POST['productdataname']);
       
        $productdesc = htmlspecialchars($_POST['productdesc']);
        $productshort = htmlspecialchars($_POST['productshort']);
        $productcat = htmlspecialchars($_POST['productcat']);
        $inventory = htmlspecialchars($_POST['inventory']);
        $saleprice = htmlspecialchars($_POST['saleprice']);
        $discountprice = htmlspecialchars($_POST['discountprice']);
        $tempdest =$_FILES['productimage']['name'];
        $tempname = $_FILES['productimage']['tmp_name'];
        $destination = "../../images/" . $tempdest;
        move_uploaded_file($tempname, $destination);
    
    
    
if ($destination != '../../images/') {//if image is not selected fire this query
        $sql = "UPDATE add_product SET productname='$productname', productdescripton='$productdesc', productshortdescription='$productshort', productcategory='$productcat',
        productimage='$destination', Inventory='$inventory', saleprice='$saleprice', discountedprice='$discountprice' WHERE id=$proid";
        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
       // update gallery image name
        $sql = "UPDATE product_gallery SET productname='$productname' where productname='$productdataname'";
        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    }
else{// if image is selected fire this query
    $sql = "UPDATE add_product SET productname='$productname', productdescripton='$productdesc', productshortdescription='$productshort', productcategory='$productcat',
    Inventory='$inventory', saleprice='$saleprice', discountedprice='$discountprice' WHERE id=$proid";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
     // update gallery image name
    $sql = "UPDATE product_gallery SET productname='$productname' where productname='$productdataname'";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

}



                echo '<script>window.location="allproducts.php"</script>';
}

      

?>



