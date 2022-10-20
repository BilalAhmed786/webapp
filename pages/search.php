<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<header>
<?php require_once(dirname(dirname(__FILE__)) . '/inc/header.php');?>
</header>
<div class="rows">
<div class="sidenav">
    <?php require_once(dirname(dirname(__FILE__)) . '/inc/leftsidebar.php');?>
</div>

    <div class ="main">
    <h1> search result for "<?php echo $_GET['search'];?>"</h1>
  <?php
 $homedata =file_get_contents('http://localhost/webapp/partials/homework.php');
 $newsdata =file_get_contents('http://localhost/webapp/partials/newswork.php');
  
   $search = $_GET['search'];

  if((stripos($homedata, $search) == true  && (stripos($newsdata, $search) == true && (!empty($_GET['search']))))){
    echo "$homedata";
    echo "$newsdata";

  }
    
elseif (stripos($homedata, $search) == true  &&(!empty($_GET['search']))) {
        echo "$homedata";
}
  elseif(stripos($newsdata, $search) == true && (!empty($_GET['search']))){
      echo "$newsdata";
      
    }
    
  else{
if(isset($_GET['searchsubmit']) && (!empty($_GET['search']))){ 
$keywords=$_GET['search'];
echo 'Result not found if you want <h4>"'.$keywords.'"</h4> search on google then click on link below';echo "</br></br>";
echo '<a target=\"_blank\"  href = "http://www.google.com/search?q='.$keywords.'" style= text-decoration:none;color:red; >Google</a>';

    }
    else{
      echo "Result not found";
    }
  }

      ?>
    </div>
    
   <div class="sidenav">
    <?php require_once(dirname(dirname(__FILE__)) . '/inc/rightsidebar.php');?>
  </div>
  </div>
<div class="footer">
<footer>
<?php require_once(dirname(dirname(__FILE__)) . '/inc/footer.php');?>
</footer>
</div>
<script src="custom.js"></script>
</body>
</html>
