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
<div class=searchmain>
<div class ="searchresult">

    <h1> search result for "<?php echo $_GET['search'];?>"</h1>
  <?php
  $homedata =file_get_contents('http://localhost/webapp/partials/homework.php');
 $homepage='<a href="home.php" style=text-decoration:none;color:red;>HOME</a>';
 $newsdata =file_get_contents('http://localhost/webapp/partials/newswork.php');
 $newspage='<a href="news.php" style=text-decoration:none;color:red;>NEWS</a>';
$search = $_GET['search'];
if(isset($_GET['searchsubmit'])){
if((stripos($homedata, $search) == true  && (stripos($newsdata, $search) == true && (!empty($_GET['search']))))){
    echo mb_strimwidth("$homedata", 0, 500, "..."),"    ",$homepage;
   echo mb_strimwidth("$newsdata", 0, 500, "..."),"    ",$newspage;
    

  }
    
elseif (stripos($homedata, $search) == true  &&(!empty($_GET['search']))) {
        echo mb_strimwidth("$homedata", 0, 500, "..."),"    ",$homepage;
}
  elseif(stripos($newsdata, $search) == true && (!empty($_GET['search']))){
         echo mb_strimwidth("$newsdata", 0, 500, "..."),"    ",$newspage;
      
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
}
    ?>  
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
