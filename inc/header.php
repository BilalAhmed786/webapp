<div class="headercontaianer">
  <!-- Mobile view navmenu -->
<div class="collapsemenu" >
<div id="mySidenav" class="sidenav1">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  
  <div class="mobilesearchbar">
    <!-- Mobile view searchform -->
    
  <form action="" method="GET">
  <input type="text" name="search" required >
    <button type="Submit" name="searchsubmit">Search</button>
</form>
</div>
<!-- Mobile view menu links -->
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

<!-- openmenu button for navmenu -->
<div class="navigaionbar">
<span style="font-size:30px;cursor:pointer"  onclick="openNav()">&#9776;</span>
</div>
<!-- site logo -->


<div class="sitelogo">
   <!-- for full url path --> 
<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>
<?php
if($actual_link != "http://localhost/webapp/admin/forms/addproduct.php" 
  && $actual_link != "http://localhost/webapp/admin/forms/allproducts.php"
  && $actual_link != "http://localhost/webapp/admin/forms/editproduct.php"
  && $actual_link != "http://localhost/webapp/admin/forms/productimggallery.php"
  && $actual_link != "http://localhost/webapp/admin/forms/addgalleryimages.php"
  && $actual_link != "http://localhost/webapp/admin/forms/addnewcat.php"
  && $actual_link != "http://localhost/webapp/admin/forms/editcategory.php"
  && $actual_link != "http://localhost/webapp/admin/forms/reviews.php"
  && $actual_link != "http://localhost/webapp/admin/forms/shipment.php"){
echo '<a href="http://localhost/webapp/pages/home.php" ><img  class="logoimage" src="../images/sitelogo.png"></a>';
}else{
  echo '<a href="http://localhost/webapp/pages/home.php" ><img  class="logoimage" src="../../images/sitelogo.png"></a>';
} 
?>
</div>
<div class="navbar">
   <!--Desktop view Mega menu -->
<a href="http://localhost/webapp/pages/home.php">Home</a>
<a href="http://localhost/webapp/pages/news.php">News</a>
<a href="http://localhost/webapp/pages/shop.php">Shop</a>

  <div class="dropdown">
    <button class="dropbtn">Dropdown
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      
      <div class="row">
        <div class="column">
          <h3>Category 1</h3>
          <a href="#">Link 1</a>
          <a href="">Link 2</a>
          <a href="#">Link 3</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
        <div class="column">
          <h3>Category 2</h3>
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
        <div class="column">
          <h3>Category 3</h3>
          <a href="#">Link 1</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
          <a href="#">Link 2</a>
          <a href="#">Link 3</a>
        </div>
        </div>
    </div>
   </div>
   <a href="http://localhost/webapp/pages/contactus.php">Contact Us</a>
<div class="searchbar">
  <!-- Desktop view searchform -->
<form action="<?php echo 'http://localhost/webapp/pages/search.php' ?>" method="GET">
    <input style= height:20px type="text" name="search" required >
    <button  type="Submit" name="searchsubmit">Search</button>
</form>
</div>
</div>
