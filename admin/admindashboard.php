<?php require_once(dirname(dirname(__FILE__)) . '/Database/database.php'); ?>
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (($_SESSION['role']) !== 'admin') {
    header("Location: http://localhost/webapp/auth/login.php");
}
$countreview = 0; //counter for reviews
$q = "SELECT COUNT(*) FROM review_table";
$result = mysqli_query($conn, $q);
while ($row = mysqli_fetch_array($result)) {
    $countreview = $row['COUNT(*)'];
}

$countorder = 0; //counter for orders
$q = "SELECT COUNT(*) FROM biller_info";
$result = mysqli_query($conn, $q);
while ($row = mysqli_fetch_array($result)) {
    $countorders = $row['COUNT(*)'];
}




?>
<div class=" pure-menu custom-display">
    <ul class="pure-menu-list">
        <li class="pure-menu-heading">
            Admin Dashboard
        </li>
        <li class="pure-menu-item">
            <a href="http://localhost/webapp/admin/forms/siteinfo.php" class="pure-menu-link">
                Site logo
            </a>

        </li>

        <li class="pure-menu-item
                       pure-menu-has-children
                       pure-menu-allow-hover">
            <a href="#" class="pure-menu-link">
                products
            </a>    

            <ul class="pure-menu-children">
                <li class="pure-menu-item">
                    <a href="http://localhost/webapp/admin/forms/allproducts.php" class="pure-menu-link">
                        All products
                    </a>
                </li>
                <li class="pure-menu-item">
                    <a href="http://localhost/webapp/admin/forms/addproduct.php" class="pure-menu-link">
                        Add New
                    </a>
                </li>
                <li class="pure-menu-item">
                    <a href="http://localhost/webapp/admin/forms/productimggallery.php" class="pure-menu-link">
                        product image gallery
                    </a>
                </li>
                <li class="pure-menu-item">
                    <a href="http://localhost/webapp/admin/forms/addgalleryimages.php" class="pure-menu-link">
                        Add gallery images
                    </a>
                </li>
            </ul>
        </li>
        <li class="pure-menu-item">
            <a href="http://localhost/webapp/admin/forms/currency.php" class="pure-menu-link">
                currency
            </a>

        </li>

        <li class="pure-menu-item">
            <a href="http://localhost/webapp/admin/forms/addnewcat.php" class="pure-menu-link">
                Categories
            </a>

        </li>
        <li class="pure-menu-item">
            <a href="http://localhost/webapp/admin/forms/shipment.php" class="pure-menu-link">
                Shipments
            </a>
        </li>
        <li class="pure-menu-item">
            <a href="http://localhost/webapp/admin/forms/reviews.php" class="pure-menu-link">
                <?php
                if ($countreview != 0) {
                    echo '<p style=color:red;float:right;margin-right:30px;margin-top:-16px;background:green;color:white;border-radius:8px;padding:4px
                   > ' . $countreview . '</P>';
                }
                ?>
                product reviews
            </a>
        </li>
        <li style=margin-top:10px !important class="pure-menu-item">
            <a href="http://localhost/webapp/admin/forms/customerorddet.php" class="pure-menu-link">
                <?php
                if ($countorders != 0) {
                    echo '<p style=color:red;float:right;margin-right:50px;margin-top:-16px;background:green;color:white;border-radius:8px;padding:4px
                   > ' . $countorders . '</P>';
                }
                ?>
                Order details
            </a>
        </li>
        <li style=margin-top:10px !important class="pure-menu-item">
            <a href="http://localhost/webapp/admin/forms/users.php" class="pure-menu-link">
                Users
            </a>
        </li>

    </ul>
</div>