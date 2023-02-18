<?php
require_once(dirname(dirname(__FILE__)) . '/Database/database.php');

if (!isset($_SESSION)) {
    session_start();
}
if (($_SESSION['role']) !== 'subscriber'){
    header("Location: http://localhost/webapp/auth/login.php");
}
if (isset($_GET['id'])) {
    $billid = $_GET['id'];
    $sql = "DELETE from customer_billinfo where date=$billid";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
}

if (isset($_GET['id'])) {
    $billid = $_GET['id'];
    $sql = "DELETE from customers_order where date=$billid";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
}
//delete specific items from orderdetails and billerinfo table 
if (isset($_POST['del-btn']) && isset($_POST['delete'])) {
    for ($i = 0; $i < count($_POST['delete']); $i++) {
        $billid = $_POST['delete'][$i];

        $sql = "DELETE from customer_billinfo where date=$billid";
        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

        $sql = "DELETE from customers_order  where date=$billid";
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
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../admin/admin.css">
    <link rel="stylesheet" href="customer.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="topbar">
        <?php require_once(dirname(dirname(__FILE__)). '/inc/topbar.php'); ?>
    </div>
    <div class="header">
        <header>
            <?php require_once(dirname(dirname(__FILE__)) . '/inc/header.php'); ?>
        </header>
    </div>
    <div class="rows">
        <div class="adminsidenav">
            <?php require 'customerdashboard.php'; ?>
        </div>




        <?php
        $email=$_SESSION['email'];
        $n = 1;
        $sql = "SELECT * from  customer_billinfo where email='$email'";
        $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
        if ($result->num_rows > 0) {
            ?>
            <div style=width:100%; class="shopdisplay">
                <h2>All Biller detail</h2>
                <form method="post" action="orderdetails.php">
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
                                            href="orderbilldet.php?order=<?php echo $results['date'] ?>"><input id="checkItem"
                                                type="checkbox" name="delete[]" value="<?php echo $results['date'] ?>"> <?php
                                                  echo $results['firstname'] ?>         <?php echo $results['lastname'] ?></a></td>
                                    <td><a style=text-decoration:none;color:black
                                            href="orderbilldet.php?order=<?php echo $results['date'] ?>"><?php echo date('l jS, F Y h:i:s A', $results['date']) ?></a></td>
                                           
                                            <td style=padding:10px><a style=text-decoration:none;color:black;
                                            href="orderbilldet.php?order=<?php echo $results['date'] ?>"></a><?php echo $results['status'] ?></td>



                                    <td><a style=color:red;text-decoration:none
                                            href="orderdetails.php?id=<?php echo $results['date'] ?>">Delete</a></td>

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

<script src="../auth.js"></script>
<script src="../js/custom.js"></script>
</body>

</html>