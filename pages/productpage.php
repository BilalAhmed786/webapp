<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet">  
  <link rel="stylesheet" href="../css/style.css">
    
    
    
</head>
<body>
    
<div class="topbar">
<?php require_once(dirname(dirname(__FILE__)) . '/inc/topbar.php');?>
</div>
<div class="header">
<header>
<?php require_once(dirname(dirname(__FILE__)) . '/inc/header.php');?>
</header>
</div>
<div class="rows">
<div class="sidenav">
<?php require_once(dirname(dirname(__FILE__)) . '/inc/leftsidebar.php');?>
</div>
    <div class ="shopmain">
    <?php require_once(dirname(dirname(__FILE__)) . '/partials/productpagework.php');?>
</div>
</div>
<div class="footer">
<footer>
<?php require_once(dirname(dirname(__FILE__)) . '/inc/footer.php');?>
</footer>
</div>

<div class="copyright">

<?php require_once(dirname(dirname(__FILE__)) . '/inc/copyright.php');?>

</div>

<script src="../js/custom.js"></script>
<script src="js/carousel-slider.js"></script>
</body>
</html>