
<div class="navbar">
 <a href="http://localhost/webapp/pages/home.php">Home</a>
  <a href="http://localhost/webapp/pages/news.php">News</a>
  <div class="dropdown">
    <button class="dropbtn">Dropdown
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      
      <div class="row">
        <div class="column">
          <h3>Category 1</h3>
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
        <div class="column">
          <h3>Category 2</h3>
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
        <div class="column">
          <h3>Category 3</h3>
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div class="searchbar">
<form action="search.php" method="GET">
    <input type="text" name="search" value= "<?php if(isset($_POST['firstname'])) echo $_POST['firstname'];?>">
    <button type="Submit" name="searchsubmit">Search</button>
</form>
</div>
</body>
</html>



<div id="mySidenav" class="sidenav1">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
<a class="dropdown-btn">Dropdown 
   
</a>
  <div class="dropdown-container">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
  <a class="dropdown-btn">Dropdown 
   
</a>
  <div class="dropdown-container">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>

<!-- Use any element to open the sidenav -->
<div class="navigaionbar">
<span style="font-size:30px;cursor:pointer"  onclick="openNav()">&#9776;</span>
</div>
<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
