<?php require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php'); ?>
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (($_SESSION['role']) !== 'admin') {
    header("Location: http://localhost/webapp/auth/login.php");
}



 if(isset($_POST['edituser'])){
    $userid =$_POST['id'];
    print_r($userid);     
    $name = htmlspecialchars($_POST['name']);
    print_r($name);   
    $email = htmlspecialchars($_POST['email']);
    $role = htmlspecialchars($_POST['role']);

    $sql = "UPDATE users_role SET name='$name', email='$email', role='$role' where id=$userid";
    mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    echo '<script>window.location="users.php"</script>';
}

$userid = '';
   
if (isset($_GET['id'])) {
    $userid = $_GET['id'];

}

$sql = "SELECT * from  users_role where id=$userid";
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
        <div style=margin:auto;padding:auto class="">
            <form  method="post" action="edituser.php">
                <h3 style=text-align="center">Edit user</h3>
                <div class=form-group>
                    <div style=margin-bottom:15px class="productname">
                        <label for="productname">Name</label>
                    </div>
                    <input style=width:100% class="form-control" type="text" name="name" value="<?php echo $results['name']?>">
                    <div style=margin-bottom:15px;margin-top:15px class="productdesc">
                        <label for="productname">Email</label>
                    </div>
                   
                    <input style=width:100% class="form-control" type="text" name="email" value="<?php echo $results['email']?>">

                    <div style=margin-bottom:15px;margin-top:15px class="invent">
                        <label for="productname">Role</label>
                    </div>
                    <input style=width:100% class="form-control" type="text" name="role" value="<?php echo $results['role']?>">
                    <input type="hidden" name="id" value="<?php echo $results['id']?>">
                    <input style=margin:auto;padding:auto;margin-top:20px;color:white;background:red;padding:7px;cursor:pointer 
                    class="imageupdate" type=submit name="edituser" value="update">
                </div>
        </form>
    </div>

    <script src="../admin.js"></script>
    <script src="../../js/custom.js"></script>
</body>

</html>