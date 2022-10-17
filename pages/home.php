<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header>

<?php require_once(dirname(dirname(__FILE__)) . '/inc/header.php');?>

    </header>
    <div class="sidenav">
    <?php require_once(dirname(dirname(__FILE__)) . '/inc/sidebar.php');?>
</div>
<div class ="main">
    <?php require_once(dirname(dirname(__FILE__)) . '/partials/homework.php');?>
</div>
<footer>
<?php require_once(dirname(dirname(__FILE__)) . '/inc/footer.php');?>
</footer>
</body>


</html>