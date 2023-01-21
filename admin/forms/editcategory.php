<?php require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php'); ?>
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (($_SESSION['role']) !== 'admin') {
    header("Location: http://localhost/webapp/auth/login.php");
}

if (isset($_POST['catsub'])){
    $editcat = htmlspecialchars($_POST['editcat']);
    $catid = htmlspecialchars($_POST['catid']);
    $sql = "update product_cat set category='$editcat' where id=$catid";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    echo '<script>window.location="addnewcat.php"</script>';
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

        <div class="adminmain">
            <div class="">
                <form action="editcategory.php" method="post">
                    <?php
                    $catid = $_GET['id'];
                    $sql = "select * from product_cat where id=$catid";
                    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
                    $results = mysqli_fetch_array($result);
                    ?>
                    <h3 style=text-align="center">Edit Category</h3>
                    <div class=form-group>
                        <input style=height:33px;text-align:center class="procat" type="text" name="editcat"
                            value="<?php echo $results['category'] ?>">
                        <input type="hidden" name="catid" value="<?php echo $results['id'] ?>">
                        <button class="addbutton" type=submit name="catsub">Update</button>

                    </div>
            </div>
            </form>


        </div>
    </div>




    <script src="../admin.js"></script>
    <script src="../../js/custom.js"></script>
</body>

</html>