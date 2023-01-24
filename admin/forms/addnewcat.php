<?php require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php'); ?>
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (($_SESSION['role']) !== 'admin') {
    header("Location: http://localhost/webapp/auth/login.php");
}


    $catadded = "";
    $productcat = "";
if (isset($_POST['submit'])) {
    $productcat = htmlspecialchars($_POST['productcat']);
    $sql = "select * from  product_cat where category='$productcat'";
    $result1 = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    $results=mysqli_fetch_array($result1);
   if ($productcat!=isset($results['category'])) {
        $sql = "insert into product_cat(category) values('$productcat')";
        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

        $catadded = "<p style=color:green>Added succesfully</p>";
    } else {
        $catadded = "<p style=color:red>already added</p>";
    }
}


if (isset($_GET['id'])) {
    $productid = $_GET['id'];
    $sql = "DELETE from  product_cat where id=$productid";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
}
//delete specific items
if (isset($_POST['del-btn']) && isset($_POST['delete'])) {
    for ($i = 0; $i < count($_POST['delete']); $i++) {
        $deleteitems = $_POST['delete'][$i];
        $sql = "DELETE from  product_cat where id=$deleteitems";
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
                <form action="addnewcat.php" method="post">
                    <h3 style=text-align="center">Add Category</h3>
                    <div class=form-group>
                        <input class="prdouctaddinput" type="text" name="productcat" placeholder="addnew catgeory">
                        <button class="addbutton" type=submit name="submit">Submit</button>
                        <?php echo $catadded; ?>
                    </div>
            </div>
            </form>

            <?php
           


            ?>
            <div style=width:100%;margin-bottom:150px class="shopdisplay">
                <h2>product categories</h2>
                <form method="post" action="addnewcat.php">
                    <table style=width:100%>
                        <thead>
                            <th><input id='checkAll' type="checkbox" /> <button
                                    style=color:white;background:red;padding:8px;border:none;cursor:pointer;
                                    name="del-btn" class="saifidelbtn">Delete</button></th>
                            <tr>
                                <th>sr#</th>
                                <th>categories</th>
                                <th>delete</th>
                                <th>update</th>

                                <?php
                                $n = 1;
                                $sql = "SELECT * from  product_cat";
                                $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
                                while ($results=mysqli_fetch_assoc($result)) {
                                   
                                   ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $n++; ?></td>
                                    <td>
                                        <div style=text-align:left;margin-left:25px><input id="checkItem" type="checkbox" name="delete[]"
                                                value="<?php echo $results['id']; ?>">
                                            <?php echo $results['category'] ?>
                                        </div>
                                    </td>
                                    <td><a style=color:red;text-decoration:none
                                            href="addnewcat.php?id=<?php echo $results['id']?>">Delete</a></td>
                                    <td><a style=color:red;text-decoration:none
                                            href="editcategory.php?id=<?php echo $results['id']?>">Edit</a></td>
                                </tr>
                            </tbody>


                            <?php

                                }
                                ?>
                    </table>
                </form>
            </div>
        </div>


            <script>
                $("#checkAll").click(function () {
                    $('input:checkbox').not(this).prop('checked', this.checked);
                });


 </script>

            <script src="../admin.js"></script>
            <script src="../../js/custom.js"></script>
</body>

</html>