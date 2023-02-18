<?php

require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php');

if (!isset($_SESSION)) {
    session_start();
}

if (($_SESSION['role']) !== 'admin') {
    header("Location: http://localhost/webapp/auth/login.php");
}

if (isset($_POST['updatesiteinfo'])) {
    $sitetagline = $_POST['tagline'];
    $tempdest = $_FILES['singleimage']['name'];
    $tempname = $_FILES['singleimage']['tmp_name'];
    $destination = "../../images/" . $tempdest;
    move_uploaded_file($tempname, $destination);
    
    
    $q = "SELECT * from site_info";
    $result = mysqli_query($conn, $q) or die(mysqli_error($conn));
    $results = mysqli_fetch_array($result);
    $sitelogo = $results['sitelogo'];

    if ($tempdest == '') {

        $q = "UPDATE site_info SET sitelogo='$sitelogo', tagline='$sitetagline' where id =1";
        $result = mysqli_query($conn, $q) or die(mysqli_error($conn));
    } elseif ($tempdest != '') {

        $q = "UPDATE site_info SET sitelogo='$tempdest', tagline='$sitetagline' where id =1";
        $result = mysqli_query($conn, $q) or die(mysqli_error($conn));

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
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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

        <div style=margin-bottom:30px;margin:auto;padding:auto;width:100% class="">
            <h2>Site info</h2>
            <div style=margin:auto;padding:auto;text-align:center>
            <?php
$q = "SELECT * from site_info";
$result = mysqli_query($conn, $q) or die(mysqli_error($conn));
$results=mysqli_fetch_array($result);

?>


<form  method="post" action="siteinfo.php" enctype="multipart/form-data">
     <div class="image">
    <img id="blah" class="productimage"  src="../../images/<?php echo $results['sitelogo']?>"/></br>
    <input type="file" name="singleimage" id="imgInp" style=display:none >
                </div>
                <input type="button" id="loadFileXml" class="addbutton" value="Select logo"
                    onclick="document.getElementById('imgInp').click();" />

                <div id="preview">
           
            <div style=margin-top:30px class="form-control">
            <label for="tagline"><b>tagline</b></label></br>
            </div>
            <div style=margin-top:10px class="form-control">
            <input style=width:50%;text-align:center type="text" name="tagline" value="<?php echo $results['tagline']?>">
            </div>
            <div style=margin-top:10px class="form-control">
            <input style=color:white;background:red;padding:8px;border:none;cursor:pointer;margin-bottom:100px type="submit" name="updatesiteinfo" value="update">
            </div>
            </form>
            </div>




        </div>
    </div>


    <script src="../admin.js"></script>
    
</body>

</html>