<?php
session_start();
//  <script>alert('Log IN');window.location.href='home.php';</script> 
?>

<!DOCTYPE HTML>
<html>
	<head>

	<title>Online Footwear | Order Complete</title>
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
				   					<h1>Order Complete</h1>
				   					<h2 class="bread"><span><a href="home.php">Home</a></span><span><a href="add_to_cart.php">/ Shopping Cart</a></span><span><a href="checkout.php">/ Checkout</a></span><span>/ Order Complete</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center active">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center active">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				<?php include('order_detail/order_detail.php');?>
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<!-- <span class="icon"><i class="icon-shopping-cart"></i></span> -->
						<h2>Thank you for purchasing, Your order is complete</h2>
						<p>
							<a href="home.php" class="btn btn-primary btn-outline">Home</a>
							<a href="category.php" class="btn btn-primary btn-outline">Continue Shopping</a>
							<a href="invoice/invoice.php" target="_blank" class="btn btn-primary btn-outline">Invoice</a>
						</p>
					</div>
				</div>
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
	</script>

	</body>
</html>

