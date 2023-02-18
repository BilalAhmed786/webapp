<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php');

if (!isset($_SESSION)) {
    session_start();
}

if (($_SESSION['role']) !== 'admin') {
    header("Location: http://localhost/webapp/auth/login.php");
}


$update='';
if (isset($_POST['submit'])) {
    $adminname = htmlspecialchars($_POST['adminname']);
    $adminemail = htmlspecialchars($_POST['adminemail']);
    $dataemail = htmlspecialchars($_POST['dataemail']);
    $sql = "update users_role set name='$adminname', email='$adminemail' where email='$dataemail'";
    $result = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

        $update='<p style=color:red>update successfully</p>';
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

            <div style=padding:15px class="cutomerprofile">

                <?php

                $adminid = $_SESSION['adminid'];



                $q = "SELECT * from users_role where id='$adminid'";
                $result1 = mysqli_query($conn, $q) or die(mysqli_error($conn));
                $results1 = mysqli_fetch_array($result1);


                ?>



                <form  method="post" action="adminprofile.php">
                    <div style=padding:20px class=form-control>
                        <label for="name"><b>Name</b></label><br>
                        <input style=margin-top:15px;text-align:center;width:30% type="text" name="adminname"
                            value="<?php echo $results1['name'] ?>" required>
                    </div>
                    <div style=padding:20px class=form-control>
                        <label tyle=margin-bottom:15px; for="email"><b>Email</b></label><br>
                        <input style=margin-top:15px;text-align:center;width:30% type="text" name="adminemail"
                            value="<?php echo $results1['email'] ?>" required>
                    </div>
                    <input type="hidden" name="dataemail" value="<?php echo $results1['email'] ?>">
                    <input
                        style=margin:auto;margin-top:15px;border:none;color:white;background:red;padding:7px;cursor:pointer;
                        type="submit" name="submit" value="update">
                </form>

                    <?php echo $update;?>


            </div>
        </div>

    </div>
    <script src="../auth.js"></script>
    <script src="../js/custom.js"></script>
</body>

</html>