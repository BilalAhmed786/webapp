<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../css/style.css">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
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
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src="js/carousel-slider.js"></script>
</body>
</html>