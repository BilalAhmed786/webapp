<?php require_once(dirname(dirname(__FILE__)) . '/Database/database.php'); ?>
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (($_SESSION['role']) !== 'subscriber') {
    header("Location: http://localhost/webapp/auth/login.php");
}



$mismatch = '';
$requirefiled = '';
$changepass = '';
$falseold = '';

if (isset($_POST['regional'])) {

    $email = $_POST['email'];
    $oldpass = htmlspecialchars($_POST['oldpassword']);
    $oldpass = md5($oldpass);
    $newpass = htmlspecialchars(md5($_POST['newpassword']));
    $retype = htmlspecialchars(md5($_POST['retypenewpass']));

    $query = "SELECT * FROM users_role where email='$email'";
    $result = mysqli_query($conn, $query);
    $results = mysqli_fetch_array($result);

    if ($oldpass == 'd41d8cd98f00b204e9800998ecf8427e' || $newpass == 'd41d8cd98f00b204e9800998ecf8427e' || $retype == 'd41d8cd98f00b204e9800998ecf8427e') {
        $requirefiled = '<p style=color:red;margin-top:-100px;margin-left:260px;margin-bottom:100px>all field required</p>';
    } elseif ($newpass != $retype) {

        $mismatch = '<p style=color:red;margin-top:-100px;margin-left:240px;margin-bottom:100px>Mismatch type password</p>';

    } elseif ($oldpass != $results['password']) {
        $falseold = '<p style=color:red;margin-top:-100px;margin-left:240px;margin-bottom:100px>old password is incorrect</p>';
    } else {

        $query = "update users_role set password='$newpass' where email='$email'";
        $result = mysqli_query($conn, $query);
        $changepass = '<p style=color:green;margin-top:-100px;margin-left:260px;margin-bottom:100px>password change successfully</p>';
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
    <link rel="stylesheet" href="../admin.css">
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

        <div style=margin:auto;width:50%;margin-top:30px class="resetpass">
            <h4>Reset password</h4>

            <form id="resetpassword" method="post" action="changepassword.php">
                <div class=form-group>

                    <input style=margin-left:150px id="oldpass" class="form-control" type="password" name="oldpassword"
                        placeholder="Oldpassword">
                </div>
                <div class=form-group>

                    <input style=margin-left:150px class="form-control" type="password" name="newpassword" placeholder="New-password">
                </div>
                <div class=form-group>

                    <input style=margin-left:150px class="form-control" type="password" name="retypenewpass" placeholder="retype new-password">
                </div>
                <div class=form-group>
                    <input type="hidden" name="email" value="<?php echo $_SESSION['email'] ?>">
                </div>
                <div class=form-group>
                    <input class="retypo" type="submit" name="regional" value="Submit">
                </div>
                <?php echo $requirefiled, $mismatch, $falseold, $changepass ?>

            </form>


        </div>
    </div>

    <style>
        .retypo {
            display: block;
            margin: auto;
            margin-top: -43px;
            background: red;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            margin-bottom: 120px;
        }
    </style>


    <script src="../../js/custom.js"></script>
    <script src="../admin.js"></script>
</body>

</html>