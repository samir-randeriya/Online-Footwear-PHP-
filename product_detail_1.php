<?php
session_start();
?>

<?php
	require_once('database_config/db.php');
	$id= $_GET['pro_id']; 
	$mobile_no = '9574787211';
	
	$select_qry = "select * from product where status = '0' and pro_id=$id";
	$result =  mysqli_query($link, $select_qry);
?>

<!DOCTYPE HTML>
<html>
	<head>

	<title>Online Footwear | Products Details</title>
	<!-- Header Part Start -->
	<?php
    	include("header_link.php");
	?>
	<!-- Header Part End -->
	
	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
        <!-- Header Part Start -->
		<?php
    		include("header.php");
		?>
		<!-- Header Part End -->
		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/cover-img-1.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Product Detail</h1>
				   					<h2 class="bread"><span><a href="home.php">Home</a></span><span><a href="category.php">/ Product</a></span><span>/ Product Detail</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<?php 
			while($row = mysqli_fetch_assoc($result)){ 
				$pro_name = $row['pro_name'];
				$pro_img = $row['pro_img'];
				$pro_price = $row['price'];
		?>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-detail-wrap">
							<div class="row">
								<div class="col-md-5">
									<div class="product-entry">
										<div class="product-img" style="background-image: url('Admin/images/product/<?php echo $row['pro_img']?>');height: 455px;">
											<p class="tag"><span class="sale">Sale</span></p>
										</div>
										<!-- <div class="thumb-nail">
											<a href="#" class="thumb-img" style="background-image: url(images/item-11.jpg);"></a>
											<a href="#" class="thumb-img" style="background-image: url(images/item-12.jpg);"></a>
											<a href="#" class="thumb-img" style="background-image: url(images/item-16.jpg);"></a>
										</div> -->
									</div>
								</div>
								<div class="col-md-7">
									<div class="desc">
										<h3><?php echo $row['pro_name']?></h3>
										<p class="price">
											<span>₹<?php echo $row['price']?></span> 
											<span class="rate text-right">
												<i class="icon-star-full"></i>
												<i class="icon-star-full"></i>
												<i class="icon-star-full"></i>
												<i class="icon-star-full"></i>
												<i class="icon-star-half"></i>
												(74 Rating)
											</span>
										</p>
										<p><?php echo $row['description']?></p>
										<div class="color-wrap">
											<p class="color-desc">
												Color: 
												<a href="#" class="color color-1"></a>
												<a href="#" class="color color-2"></a>
												<a href="#" class="color color-3"></a>
												<a href="#" class="color color-4"></a>
												<a href="#" class="color color-5"></a>
											</p>
										</div>
										<div class="size-wrap">
											<p class="size-desc">
												Size: 
												<a href="#" class="size size-1">xs</a>
												<a href="#" class="size size-2">s</a>
												<a href="#" class="size size-3">m</a>
												<a href="#" class="size size-4">l</a>
												<a href="#" class="size size-5">xl</a>
												<a href="#" class="size size-5">xxl</a>
											</p>
										</div>
									
									<div class="col-md-12" style="padding-left: 4px;">
			                  			<div class="form-group">
			                  				<label for="country">Select Quantitiy</label>
			                     			<div class="form-field">
			                     				<select id="qty" class="form-control" style="width: 75px;">
				                      				<option>1</option>
				                        			<option>2</option>
			                        			</select>
			                     			</div>
			                  			</div>
			               			</div>
										<p><button name="add_to_cart" class="btn btn-primary btn-addtocart" onclick="add_to_cart('<?php echo $row['pro_id'];?>','<?php echo $mobile_no;?>','<?php echo $pro_name;?>','<?php echo $pro_img;?>','<?php echo $pro_price;?>')"><i class="icon-shopping-cart"></i> Add to Cart</button></p>
										
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
				<!-- <div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row">
							<div class="col-md-12 tabulation">
								<ul class="nav nav-tabs">
									<li class="active"><a data-toggle="tab" href="#description">Description</a></li>
									<li><a data-toggle="tab" href="#manufacturer">Manufacturer</a></li>
									<li><a data-toggle="tab" href="#review">Reviews</a></li>
								</ul>
								<div class="tab-content">
									<div id="description" class="tab-pane fade in active">
										<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
										<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
										<ul>
											<li>The Big Oxmox advised her not to do so</li>
											<li>Because there were thousands of bad Commas</li>
											<li>Wild Question Marks and devious Semikoli</li>
											<li>She packed her seven versalia</li>
											<li>tial into the belt and made herself on the way.</li>
										</ul>
						         </div>
						         <div id="manufacturer" class="tab-pane fade">
						         	<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
										<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
								      
								   </div>
								   <div id="review" class="tab-pane fade">
								   	<div class="row">
								   		<div class="col-md-7">
								   			<h3>23 Reviews</h3>
								   			<div class="review">
										   		<div class="user-img" style="background-image: url(images/person1.jpg)"></div>
										   		<div class="desc">
										   			<h4>
										   				<span class="text-left">Jacob Webb</span>
										   				<span class="text-right">14 March 2018</span>
										   			</h4>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-half"></i>
										   					<i class="icon-star-empty"></i>
									   					</span>
									   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
										   			</p>
										   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
										   		</div>
										   	</div>
										   	<div class="review">
										   		<div class="user-img" style="background-image: url(images/person2.jpg)"></div>
										   		<div class="desc">
										   			<h4>
										   				<span class="text-left">Jacob Webb</span>
										   				<span class="text-right">14 March 2018</span>
										   			</h4>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-half"></i>
										   					<i class="icon-star-empty"></i>
									   					</span>
									   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
										   			</p>
										   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
										   		</div>
										   	</div>
										   	<div class="review">
										   		<div class="user-img" style="background-image: url(images/person3.jpg)"></div>
										   		<div class="desc">
										   			<h4>
										   				<span class="text-left">Jacob Webb</span>
										   				<span class="text-right">14 March 2018</span>
										   			</h4>
										   			<p class="star">
										   				<span>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-full"></i>
										   					<i class="icon-star-half"></i>
										   					<i class="icon-star-empty"></i>
									   					</span>
									   					<span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
										   			</p>
										   			<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrov</p>
										   		</div>
										   	</div>
								   		</div>
								   		<div class="col-md-4 col-md-push-1">
								   			<div class="rating-wrap">
									   			<h3>Give a Review</h3>
									   			<p class="star">
									   				<span>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					(98%)
								   					</span>
								   					<span>20 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-empty"></i>
									   					(85%)
								   					</span>
								   					<span>10 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-empty"></i>
									   					<i class="icon-star-empty"></i>
									   					(98%)
								   					</span>
								   					<span>5 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-empty"></i>
									   					<i class="icon-star-empty"></i>
									   					<i class="icon-star-empty"></i>
									   					(98%)
								   					</span>
								   					<span>0 Reviews</span>
									   			</p>
									   			<p class="star">
									   				<span>
									   					<i class="icon-star-full"></i>
									   					<i class="icon-star-empty"></i>
									   					<i class="icon-star-empty"></i>
									   					<i class="icon-star-empty"></i>
									   					<i class="icon-star-empty"></i>
									   					(98%)
								   					</span>
								   					<span>0 Reviews</span>
									   			</p>
									   		</div>
								   		</div>
								   	</div>
								   </div>
					         </div>
				         </div>
						</div>
					</div>
				</div> -->
			</div>
		</div>

        <!-- Footer Part Start -->
       <?php
            include("footer.php");
        ?>
        <!-- Footer Part End -->
        
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	<script>
											function add_to_cart(pro_id,mobile_no,pro_name,pro_img,pro_price){
												var qty = $('#qty').val();
												var pro_total = qty * pro_price;
												var pro_net_total = '2000';
												// alert(pro_id);
												//alert(qty);
												// alert(pro_name);
												// alert(pro_img);
												// alert(pro_total);
												$.ajax({
													url:'manage_cart.php',
													type:'post',
													data:'pro_id=' + pro_id + '&mobile_no=' + mobile_no + '&pro_name=' + pro_name + '&pro_img=' + pro_img + '&pro_price=' + pro_price + '&qty=' + qty + '&pro_total=' + pro_total + '&pro_net_total=' + pro_net_total,
													// success:function(result){
													// 	return result;	
													// }
												});	
											}
										</script>
	</body>
</html>

