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
<div id="preloader" class='allpre'></div>
<div class="topbar"> <?php include "inc/topbar.php";?></div>
<div class="header">
<header>
<?php include "inc/header.php";?>
</header>
</div>
<div class="rows">
<div class="sidenav">
    <?php include "inc/leftsidebar.php" ;?>
</div>
    <div class ="main">
    <?php include "partials/homework.php";?>
</div>
<div class="sidenav">
  <?php include "inc/rightsidebar.php" ;?>
</div>
</div>

<div class="footer">
<footer>
<?php include "inc/footer.php" ;?>
</footer>
</div>

<div class="copyright">

<?php include "inc/copyright.php" ;?>

</div>

<script src="./js/custom.js"></script>
</body>
</html>