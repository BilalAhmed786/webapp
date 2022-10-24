<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<div class="topbar"> <?php include "inc/topbar.php";?></div>
<div class="header">
<header>
<?php include "inc/header.php";?>
</header>
</div>
<div class="breadcrumb">
<?php require 'inc/breadcrumb.php';?>
</div>
<div class="rows">
<div class="sidenav">
    <?php require 'inc/leftsidebar.php';?>
</div>
    <div class ="main">
    <?php require 'partials/contactform.php';?>
</div>
<div class="sidenav">
    <?php require 'inc/rightsidebar.php';?>
</div>
</div>

<div class="footer">
<footer>
<?php require 'inc/footer.php';?>
</footer>
</div>

<div class="copyright">

<?php require 'inc/copyright.php';?>

</div>

<script src="./js/custom.js"></script>
</body>
</html>


