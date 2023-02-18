<?php require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php'); ?>
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (($_SESSION['role']) !== 'admin') {
    header("Location: http://localhost/webapp/auth/login.php");
}


    $curr = "";
    $currsuccess='';
    
if (isset($_POST['submit']) && $_POST['currency']!='') {
$currency=$_POST['currency'];
    $q = "UPDATE currency_tab SET currency='$currency' where currency_id =5";
    $result = mysqli_query($conn, $q) or die(mysqli_error($conn));
$currsuccess= "<p style=color:green>updated</p>";
}elseif(isset($_POST['submit'])){
     $curr= "<p style=color:red>field is required</p>";
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
<?php
$q = "SELECT * from currency_tab";
$result = mysqli_query($conn, $q) or die(mysqli_error($conn));
$results=mysqli_fetch_array($result);
$currency=$results['currency'];
?>

                <form action="currency.php" method="post">
                    <h3 style=text-align="center">Current currency</h3>
                    <div class=form-group>
                        <input style=width:20%;margin:auto;padding;auto class="prdouctaddinput" type="text" name="currency" value="<?php echo $currency;?>">
                        <button class="addbutton" type=submit name="submit">Update</button>
                        <?php echo $curr; ?><?php echo $currsuccess; ?>
                        
                    </div>
            </div>
            </form>

            <?php
           


            ?>
    
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