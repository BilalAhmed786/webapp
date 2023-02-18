<?php require_once(dirname(dirname(__FILE__)) . '/Database/database.php'); ?>
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (($_SESSION['role']) !== 'subscriber') {
    header("Location: http://localhost/webapp/auth/login.php");
}


?>
<div class=" pure-menu custom-display">
    <ul class="pure-menu-list">
        <li class="pure-menu-heading">
             Dashboard
        </li>
     

    
        <li class="pure-menu-item">
            <a href="http://localhost/webapp/customer/profile.php" class="pure-menu-link">
                Profile
            </a>

        </li>

        <li class="pure-menu-item">
            <a href="http://localhost/webapp/customer/changebillingaddress.php" class="pure-menu-link">
              Change Billing Address
            </a>
        </li>
        <li class="pure-menu-item">
            <a href="http://localhost/webapp/customer/orderdetails.php" class="pure-menu-link">
             Order details
            </a>
      
        <li style=margin-top:10px !important class="pure-menu-item">
            <a href="http://localhost/webapp/customer/changepassword.php" class="pure-menu-link">
                Reset password
            </a>
        </li>

    </ul>
</div>