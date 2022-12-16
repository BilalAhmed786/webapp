<?php
require_once(dirname(dirname(__FILE__)) . '/Database/database.php');
$imageid=$_GET['id'];
$sql = "SELECT * from add_product where id=$imageid";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$image_count = 0;
$button_html = '';		
$slider_html = '';	
$thumb_html = '';
$images = '';
while ($row = mysqli_fetch_array($resultset)) {
	$productid=$row['id'];
	$productname=$row['productname'];
	$res = $row['productgallery'];
    $res = explode(",", $res);
    $count = count($res)-1;
	for ($i=0;$count>$i; $i++) {
		$images = substr($res[$i], 3);
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
		$thumb_html .= "<li><img style=width:80px src='". $images ."'  class='thumbnail'></li>";
		// Button html
		$button_html .= "<li data-target='#carousel-example-generic' data-slide-to='" . $image_count . "' class='" . $active_class . "'></li>";
	
	}

}
?>

<div class="crouselcontainer">	
<h2><?php echo $productname;?></h2>	
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">	  
		<ol class="carousel-indicators">
		<?php echo $button_html; ?>		
		</ol>	  
		<div class="carousel-inner">	  
			<?php echo $slider_html; ?>
		</div>	 
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right"></span>
		</a>	 
		<ul style=cursor:pointer; class="thumbnails-carousel clearfix" href="#carousel-example-generic" role="button" data-slide="next">
			<?php echo $thumb_html; ?>
		</ul>
	</div>	
</div>