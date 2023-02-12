<?php 

require_once(dirname(dirname(dirname(__FILE__))) . '/Database/database.php');

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if(($_SESSION['role'])!=='admin'){
    header("Location: http://localhost/webapp/auth/login.php");
}




if (isset($_POST['galleryimage'])) {

    for ($i = 0; $i < count($_FILES['images']['name']); $i++) {
        $productname = htmlspecialchars($_POST['productname']);
        $multiimagesname = $_FILES['images']['name'][$i];
        $multiimagesdest = $_FILES['images']['tmp_name'][$i];
        $destmultiimage = "../../images/" . $multiimagesname;
        move_uploaded_file($multiimagesdest, $destmultiimage);

        $q = "insert into product_gallery(productname, productgallery) 
        values('$productname','$destmultiimage')";
        mysqli_query($conn, $q);

       }
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="topbar">
        <?php require_once(dirname(dirname(dirname(__FILE__))) . '/inc/topbar.php'); ?>
    </div>
    <div class="header">
        <header>
            <?php require_once(dirname(dirname(dirname(__FILE__))) . '/inc/header.php'); ?>
        </header>
    </div>
    <div class="rows">
        <div class="adminsidenav">
            <?php require '../admindashboard.php'; ?>
        </div>

        <div class="adminmain">




        <h2 style=width:100%>Add gallery images</h2>
            <form action="addgalleryimages.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                    <label class="productaddlab" for="productcat"><h4>Select product name</h4></label><br>
                    <select id="productcat" name="productname">
                        <?php
                        $q = "SELECT * FROM add_product";
                        $result = mysqli_query($conn, $q);
                        while ($results = mysqli_fetch_array($result)) {
                            $productname = $results['productname'];
                            echo "<option value='$productname'>$productname</option>";
                        }
                        ?>
                    </select>
                </div>

                <div id="preview">
                    <img id="blahh" src="../../images/avatar.png"></br>
                    <input type="file" name="images[]" id="image" style=display:none onchange="image_select()" multiple>
                    </br>
                    <div class="card-body d-flex flex-wrap justify-content-start" id="container">
                    </div>
                    <input type="button" id="loadFileimage" class="addbutton" value="Gallery Images"
                        onclick="document.getElementById('image').click();" />
                        <div class="galleryimage">
                    <input style=color:white;background:red;padding:6px;border:none;margin-top:35px;margin-bottom:80px;cursor:pointer
                     type="submit" name="galleryimage" value="update">
                    </div>
                    </form>


    </div>
        <script src="../admin.js"></script>
        <script src="../../js/custom.js"></script>
</body>

</html>