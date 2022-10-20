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

<div class="searchbar">
<form action="search.php" method="get">
    <input type="text" name="search" placeholder="Search">
    <input type="submit" value="search">
</form>
</div>


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
