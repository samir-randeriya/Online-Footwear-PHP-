<?php
	session_start();
	error_reporting(0);
    require_once('database_config/db.php');
    require_once('connection.php');
?>

<!DOCTYPE HTML>
<html>
	<head>
	<title>Online Footwear | Home</title>
    
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

		<!-- Container Middle Part Start-->
		<aside id="colorlib-hero">
			<div class="flexslider">
			    <ul class="slides">
					
					<?php
					
	
					$sql = 'SELECT * from home_slider';
					$stmt = $pdo->query($sql);
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach($rows as $row)
					{
					?>
			   	<li style="background-image: url('<?= $row['slider_img']?>');">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner">
				   					<div class="desc">
					   					<h3 class="head-1"><?= $row['slider_head']?></h3>
					   					<p class="category"><span><?= $row['slider_desc']?></span></p>
					   					<p><a href="#" class="btn btn-primary">Shop Collection</a></p>
				   					</div>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
				   </li>
				<?php }?>
			   	</ul>
		  	</div>
		</aside> 
		<div id="colorlib-featured-product">
			<div class="container">
				<div class="row">
					<?php
					
	
					$sql = 'SELECT * from product_display';
					$stmt = $pdo->query($sql);
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach($rows as $row)
					{
					?>
					<div class="col-md-6">
						<div class="row">
						<div class="col-md-12">
								<a href="" class="f-product-2" style="background-image: url(<?= $row['product_img']?>);">
									<div class="desc">
										<h2>Shoes <br>for <br><?= $row['product_category']?></h2>
									</div>
								</a>
							</div>
						</div>
					</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
		
		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>New Arrival</span></h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
				<?php
					
	
					$sql = 'SELECT * from new_arrival';
					$stmt = $pdo->query($sql);
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach($rows as $row)
					{
					?>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(<?= $row['arr_img']?>);">
								<p class="tag"><span class="new">New</span></p>
								<div class="cart">
									<p>
                                        <span class="addtocart"><a href="add_to_cart.php"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product_detail.php?pro_id=<?php echo $row['pro_id']?>"><i class="icon-eye"></i></a></span> 
										<span><a href="wishlist.php"><i class="icon-heart3"></i></a></span>
										<!-- <span><a href=""><i class="icon-bar-chart"></i></a></span> -->
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html"><?= $row['arr_name']?></a></h3>
								<p class="price"><span>$<?= $row['arr_price']?></span></p>
							</div>
						</div>
					</div>
					<?php
					}
					?>
					
				</div>
			</div>
		</div>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Our Products</span></h2>
						<p>We love to tell our successful far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div>
				</div>
				<div class="row">
				<?php
					$sql = 'SELECT * from product_all';
					$stmt = $pdo->query($sql);
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach($rows as $row)
					{
					?>
					<div class="col-md-3 text-center">
						<div class="product-entry">
							<div class="product-img" style="background-image: url(<?= $row['product_img']?>);">
								<div class="cart">
									<p>
                                        <span class="addtocart"><a href="add_to_cart.php"><i class="icon-shopping-cart"></i></a></span> 
										<span><a href="product_detail.php?pro_id=<?php echo $row['pro_id']?>"><i class="icon-eye"></i></a></span> 
										<span><a href="wishlist.php"><i class="icon-heart3"></i></a></span>
										<!-- <span><a href=""><i class="icon-bar-chart"></i></a></span> -->
									</p>
								</div>
							</div>
							<div class="desc">
								<h3><a href="shop.html"><?= $row['product_name']?></a></h3>
								<p class="price"><span><?= $row['product_price']?></span>  </p>
								<!-- <p class="price"><span><?= $row['status']?></span>  </p> -->
							</div>
						</div>
					</div>
					<?php
					}
					?>
				
				
				
					
					
				</div>
			</div>
		</div>

		<!-- <div id="colorlib-testimony" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
						<h2><span>Our Satisfied Customer says</span></h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-md-offset-2">						
						<div class="owl-carousel2">
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(images/person1.jpg);"></span>
									<span class="user">Alysha Myers</span>
									<small>Miami Florida, USA</small>
									<blockquote>
										<p>" A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(images/person2.jpg);"></span>
									<span class="user">James Fisher</span>
									<small>New York, USA</small>
									<blockquote>
										<p>One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
									</blockquote>
								</div>
							</div>
							<div class="item">
								<div class="testimony text-center">
									<span class="img-user" style="background-image: url(images/person3.jpg);"></span>
									<span class="user">Jacob Webb</span>
									<small>Athens, Greece</small>
									<blockquote>
										<p>Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
									</blockquote>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>
		</div> -->

		<!-- <div class="colorlib-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center colorlib-heading">
						<h2>Recent Blog</h2>
						<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<article class="article-entry">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-1.jpg);"></a>
							<div class="desc">
								<p class="meta"><span class="day">02</span><span class="month">Mar</span></p>
								<p class="admin"><span>Posted by:</span> <span>Noah Henderson</span></p>
								<h2><a href="blog.html">Openning Branches</a></h2>
								<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
							</div>
						</article>
					</div>
					<div class="col-md-4">
						<article class="article-entry">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-2.jpg);"></a>
							<div class="desc">
								<p class="meta"><span class="day">02</span><span class="month">Mar</span></p>
								<p class="admin"><span>Posted by:</span> <span>Noah Henderson</span></p>
								<h2><a href="blog.html">Openning Branches</a></h2>
								<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
							</div>
						</article>
					</div>
					<div class="col-md-4">
						<article class="article-entry">
							<a href="blog.html" class="blog-img" style="background-image: url(images/blog-3.jpg);"></a>
							<div class="desc">
								<p class="meta"><span class="day">02</span><span class="month">Mar</span></p>
								<p class="admin"><span>Posted by:</span> <span>Noah Henderson</span></p>
								<h2><a href="blog.html">Openning Branches</a></h2>
								<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life</p>
							</div>
						</article>
					</div>
				</div>
			</div>
		</div>  -->
		<!-- Container Middle Part End-->
		
		
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

	</body>
</html>
