<?php require_once(dirname(dirname(__FILE__)) . '/Database/database.php');
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['role'])) {
    header("Location: http://localhost/webapp/auth/login.php");
}

$update = "";
$miss = "";
if (isset($_POST['profileupdate'])) {
    $name = htmlspecialchars($_POST['name']);
    $useremail = htmlspecialchars($_POST['email']);
    $userid = $_POST['id'];




    if ($name == '' || $useremail == '') {

        $miss = "<p style=color:;margin:auto;padding:auto>one or more field missing<p>";
    } else {

        $q = "UPDATE users_role SET name='$name',email='$useremail' where id ='$userid'";
        $result = mysqli_query($conn, $q) or die(mysqli_error($conn));
        $update = "<p style=color:green;margin:auto;padding:auto;margin-top:10px>updated successfully</p>";
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
        <?php require_once(dirname(dirname(__FILE__)) . '/inc/topbar.php'); ?>
    </div>
    <div class="header">
        <header>
            <?php require_once(dirname(dirname(__FILE__)) . '/inc/header.php'); ?>
        </header>
    </div>
    <div class="rows">
        <div class="customersidenav">
            <?php require 'customerdashboard.php'; ?>
        </div>

        <div class="adminmain">

            <div style=padding:15px class="cutomerprofile">

                <?php
                $email = $_SESSION['profile'];
                $q = "SELECT * from users_role where id='$email'";
                $result = mysqli_query($conn, $q) or die(mysqli_error($conn));
                $results = mysqli_fetch_array($result);
                $useremail = $results['email'];




                $q = "SELECT * from biller_info where email='$useremail'";
                $result1 = mysqli_query($conn, $q) or die(mysqli_error($conn));
                $results1 = mysqli_fetch_array($result1);

                ?>




                <div style=padding:20px class=form-control>
                    <label for="name"><b>Name</b></label><br>
                    <p style=margin-top:10px><?php echo $results1['firstname'] . ' ' . $results1['lastname'] ?></p>
           
                    <label for="email"><b>Email</b></label><br>
                    <p style=margin-top:10px> <?php echo $results1['email']; ?></p>
                
                    <label for="country"><b>Country</b></label><br>
                    <p style=margin-top:10px><?php echo $results1['country']; ?></p>
              
                    <label for="city"><b>City</b></label><br>
                    <p>
                        <?php echo $results1['city']; ?>
                    </p>
             
                    <label for="phone"><b>Phone</b></label><br>
                    <P>
                        <?php echo $results1['phone']; ?>
                    </p>
                
                    <label for="address"><b>Address</b><br>
                        <P style=margin:auto;padding-top:10px;margin-bottom:50px;width:30%><?php echo $results1['address'] ?></p>
                </div>

            </div>
        </div>

    </div>
    <script src="../auth.js"></script>
    <script src="../js/custom.js"></script>
</body>

</html>