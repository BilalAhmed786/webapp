<?php
require_once(dirname(dirname(__FILE__)) . '/Database/database.php');
$proname=$_GET['productname'];

$image_count = 0;
$button_html = '';		
$slider_html = '';	
$thumb_html = '';
$images = '';

$sql = "SELECT * from  product_gallery where productname='$proname'";
$resultgal = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
while ($rowgal = mysqli_fetch_array($resultgal)) {
	$images=$rowgal['productgallery'];
		$images = substr($images, 3);
		$active_class = "";
		if (!$image_count) {
			$active_class = 'active';
			$image_count = 1;
		}
		$image_count++;
		// slider image html
		$slider_html .= "<div class='item " . $active_class . "'>";
		$slider_html .= "<img src='" . $images . "' alt='1.jpg' class='img-responsive'>";
		$slider_html .= "<div class='carousel-caption'></div></div>";
		// Thumbnail html
		$thumb_html .= "<li><img style=width:80px src='" . $images . "'  class='thumbnail'></li>";
		// Button html
		$button_html .= "<li data-target='#carousel-example-generic' data-slide-to='" . $image_count . "' class='" . $active_class . "'></li>";
	}

//for product detail and reviews
$imageid=$_GET['id'];
$_SESSION['getid']=$imageid;
$sql = "SELECT * from add_product,currency_tab where id=$imageid";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
	$row = mysqli_fetch_array($resultset);
	$productid = $row['id'];
	$productname = $row['productname'];
    $image = $row['productimage'];
	$proddesc = nl2br($row['productdescripton']);
	$prodprice = $row['saleprice'];
	$disctprice = $row['discountedprice'];
	$inventorystatus = $row['Inventory'];
	$currency = $row['currency'];
	$proimage = substr($image, 3);
	


?>

<div class="crouselcontainer">	
<h2><?php echo $productname;?></h2>	
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">	  
		<ol class="carousel-indicators">
			<?php if ($images != '../images/') {
	            echo $button_html;
            }
			 ?>		
		</ol>	  
		<div class="carousel-inner">	  
			<?php echo $slider_html; ?>
		</div>	 
<?php if($images != '../images/'){
			?>
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
			</a>	 
			<ul style=cursor:pointer; class="thumbnails-carousel clearfix" href="#carousel-example-generic" role="button" data-slide="next">
			<?php echo $thumb_html; ?>
			</ul>
			
			<?php
		}
?>
</div>	
</div>

<div class='proddesc'>
<h3 class="prodname" ><?php echo $productname;?><h3>
<p class="desc" style=text-align:left;font-size:15px;><?php echo $proddesc;?></p>
<p class="desc" style=color:red;text-align:left;font-size:15px;><s><?php echo (int)$prodprice.$currency?></s></p>
<p class="desc" style=text-align:left;font-size:18px;><?php echo (int)$disctprice.$currency;?></p>

<?php if($inventorystatus==0){
	echo "<p style=color:red;text-align:left;font-size:15px;>Out of stock</p>";
}else{
	echo "<p style=color:green;text-align:left;font-size:15px;>In stock</p>";
}
?>
</div>		

<div class="col-md-3">
                  
                        <div class="">
						<style>
                                .hide { position:absolute; top:-1px; left:-1px; width:1px; height:1px; }
                        </style>

                            <iframe name="hiddenFrame" class="hide"></iframe>
                            <form action="cart.php" method="post" target="hiddenFrame">
                               <input  type="hidden" name="hidden_name" value="<?php echo $productname;?>">
								<input type="hidden" name="hidden_id" value="<?php echo $productid;?>">
                                <input type="hidden" name="image" value="<?php echo $proimage;?>">
                                <input type="hidden" name="hidden_qty" value="<?php echo $inventorystatus;?>">
                                <input type="hidden" name="hidden_price" value="<?php echo (int)$prodprice; ?>">
								<input type="hidden" name="discounted_price" value="<?php echo (int)$disctprice; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" onclick="reviewcart()" class="btn btn-success" value="Add to Cart"></br></br>
                                <a id="viewcart" style=color:red;font-size:15px;display:none;  href="cart.php">view cart</a>   
                            </div>
</form>
                </div>

<!-- Review sysytem html -->

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Review & Rating System in PHP & Mysql using Ajax</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="reviewcontainer">
    	<h1 style=color:blue;display:block;float:none;text-align:left;font-size:20px class="mt-5 mb-5">Review for <?php echo $productname;?> </h1>
    	<div class="card">
    		<div style=font-size:15px class="card-header"><?php echo $productname;?> </div>
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating">0.0</span> / 5</b>
    					</h1>
    					<div class="mb-3">
    						<i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
                            <i class="fas fa-star star-light mr-1 main_star"></i>
	    				</div>
    					<h3><span id="total_review">0</span> Review</h3>
    				</div>
    				<div class="col-sm-4">
    					<p>
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>               
                        </p>
    				</div>
    				<div class="col-sm-4 text-center">
    					<h3 class="mt-4 mb-3">Review Here</h3>
    					<button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
    				</div>
    			</div>
    		</div>
    	</div>
		<div class="mt-5" id="review_session"></div>
    	<div class="mt-5" id="review_content"></div>
    </div>
</body>
</html>
<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
              <div class="form-group">
	      		<h4 class="text-center mt-2 mb-4">
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
                </div>
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
                    </div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
                <div class="form-group">
	        		<input type="hidden" name="product_id" id="product_id" class="form-control" value="<?php echo $productid;?>"/>
					</div>

					<div class="form-group">
	        		<input type="hidden" name="product_name" id="product_name" class="form-control" value="<?php echo $productname;?>"/>
					</div>
              <div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>

