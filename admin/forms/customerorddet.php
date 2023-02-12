<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php');

if (!isset($_SESSION)) {
    session_start();
}
if (($_SESSION['role']) !== 'admin'){
    header("Location: http://localhost/webapp/auth/login.php");
}
if (isset($_GET['id'])) {
    $billid = $_GET['id'];
    $sql = "DELETE from biller_info where date=$billid";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
}

if (isset($_GET['id'])) {
    $billid = $_GET['id'];
    $sql = "DELETE from order_details where date=$billid";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
}
//delete specific items from orderdetails and billerinfo table 
if (isset($_POST['del-btn']) && isset($_POST['delete'])) {
    for ($i = 0; $i < count($_POST['delete']); $i++) {
        $billid = $_POST['delete'][$i];

        $sql = "DELETE from biller_info where date=$billid";
        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

        $sql = "DELETE from order_details  where date=$billid";
        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    }
}


if (isset($_POST['order-btn'])) {
    $reviewstatus = $_POST['reviewstatus'];
    $productqty = $_POST['proqty'];
    $orderid = $_POST['orderid'];

    $sql = "SELECT * from biller_info where date=$orderid";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    $results = mysqli_fetch_array($result);
    $actualstatus = $results['status'];
   

if ($reviewstatus != '') {

        $sql = "UPDATE biller_info SET status='$reviewstatus' where date=$orderid";
        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

    }

    if (($reviewstatus == "complete" && $actualstatus == "return") || ($reviewstatus == "complete" && $actualstatus == "failed")) {
        for ($i = 0; count($_POST['proname']) > $i; $i++) {
            $productname = $_POST['proname'][$i];
            $productqty = $_POST['proqty'][$i];

            $sql = "SELECT * from add_product where productname='$productname'";

            $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
            while ($results = mysqli_fetch_array($result)) {

                $inventory = $results['Inventory'];
                $updateinventory = $inventory - $productqty;
                

            }
            $sql = "UPDATE add_product SET Inventory=$updateinventory where productname='$productname'";
            $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));


        }
    } elseif (
        ($reviewstatus == "failed" && $actualstatus == "processing")
        || ($reviewstatus == "failed" && $actualstatus == "complete")
        || ($reviewstatus == "return" && $actualstatus == "processing")
        || ($reviewstatus == "return" && $actualstatus == "complete")
    ) {

        for ($i = 0; count($_POST['proname']) > $i; $i++) {
            $productname = $_POST['proname'][$i];
            $productqty = $_POST['proqty'][$i];

            $sql = "SELECT * from add_product where productname='$productname'";

            $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
            while ($results = mysqli_fetch_array($result)) {

                $inventory = $results['Inventory'];
                $updateinventory = $productqty + $inventory;
                
            }

            $sql = "UPDATE add_product SET Inventory=$updateinventory where productname='$productname'";
            $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

        }


    } elseif (
        ($reviewstatus =="complete" && $actualstatus == "complete")
        || ($reviewstatus == "failed" && $actualstatus == "failed")
        || ($reviewstatus == "return" && $actualstatus == "return")
        || ($reviewstatus == "failed" && $actualstatus == "return")
        || ($reviewstatus == "return" && $actualstatus == "failed")) {

        for ($i = 0; count($_POST['proname']) > $i; $i++) {
            $productname = $_POST['proname'][$i];
            $productqty = $_POST['proqty'][$i];

            $sql = "SELECT * from add_product where productname='$productname'";

            $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
            while ($results = mysqli_fetch_array($result)) {

                $inventory = $results['Inventory'];
             
            }
            $sql = "UPDATE add_product SET Inventory=$inventory where productname='$productname'";
            $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));


        }



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




        <?php
        $n = 1;
        $sql = "SELECT * from  biller_info";
        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
        if ($result->num_rows > 0) {
            ?>
            <div style=width:100%; class="shopdisplay">
                <h2>All Biller detail</h2>
                <form method="post" action="customerorddet.php">
                    <table style=width:100%>
                        <thead>
                            <th><input id='checkAll' type="checkbox" /> <button
                                    style=color:white;background:red;padding:8px;border:none;cursor:pointer; name="del-btn"
                                    class="saifidelbtn">Delete</button></th>
                            <tr>
                                <th>sr#</th>
                                <th>Name</th>
                                <th>date</th>
                                <th>status</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <?php
                        foreach ($result as $results) {
                            ?>
                            <tbody>

                                <tr>

                                    <td>
                                        <?php echo $n++; ?>
                                    </td>
                                    <td style=padding:10px><a style=text-decoration:none;color:black;
                                            href="customerbilldet.php?order=<?php echo $results['date'] ?>"><input id="checkItem"
                                                type="checkbox" name="delete[]" value="<?php echo $results['date'] ?>"> <?php
                                                  echo $results['firstname'] ?>         <?php echo $results['lastname'] ?></a></td>
                                    <td><a style=text-decoration:none;color:black
                                            href="customerbilldet.php?order=<?php echo $results['date'] ?>"><?php echo date('l jS, F Y h:i:s A', $results['date']) ?></a></td>
                                    <td><a style=text-decoration:none;color:black
                                            href="customerbilldet.php?order=<?php echo $results['date'] ?>"><?php echo $results['status'] ?></a></td>
                                    <td><a style=color:red;text-decoration:none
                                            href="customerorddet.php?id=<?php echo $results['date'] ?>">Delete</a></td>

                                </tr>

                            </tbody>
                            <?php
                        }
                        ?>
                    </table>
                </form>
                <?php

        } else {
            echo "<p style=color:red;padding:5px;margin-left:3px;width:100%;height:50%;background:lightgray;text-align:center> No order placed yet</p>";
        }


        ?>
        </div>
    </div>


    <script>
        $("#checkAll").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>


</body>

</html>