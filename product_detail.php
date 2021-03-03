<?php
	session_start();
	error_reporting(0);
?>
<?php
	require_once('database_config/db.php');
	$id = $_SESSION["userid"];
	$qry = "select * from registration where userid =$id";
	$res = mysqli_query($link, $qry);
	while ($row = mysqli_fetch_assoc($res)) {
		$umobile_no = $row['mobile_no'];
	}
	//echo $umobile_no;
?>
<?php
	require_once('database_config/db.php');
	$id = $_GET['pro_id'];
	//$umobile_no = $_SESSION['umobile_no'];
	$select_qry = "select * from product where status = 0 and pro_id=$id";
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
		<!--fetch the data -->
		<?php while ($row = mysqli_fetch_assoc($result)) {

		?>

			<div class="colorlib-shop">
				<div class="container">
					<!-- for alert message -->
					<div id="message"></div>

					<div class="row row-pb-lg">
						<div class="col-md-10 col-md-offset-1">
							<div class="product-detail-wrap">
								<div class="row">
									<div class="col-md-5">
										<div class="product-entry">
											<div class="product-img" style="background-image: url('Admin/images/product/<?php echo $row['pro_img'] ?>');height: 455px;">
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
											<h3><?php echo $row['pro_name'] ?></h3>
											<p class="price">
												<span>₹<?php echo $row['price'] ?></span>
												<span class="rate text-right">
													<i class="icon-star-full"></i>
													<i class="icon-star-full"></i>
													<i class="icon-star-full"></i>
													<i class="icon-star-full"></i>
													<i class="icon-star-half"></i>
													(74 Rating)
												</span>
											</p>
											<p><?php echo $row['description'] ?></p>
											<!--<div class="color-wrap">
											<p class="color-desc">
												Color: 
												<a href="#" class="color color-1"></a>
												<a href="#" class="color color-2"></a>
												<a href="#" class="color color-3"></a>
												<a href="#" class="color color-4"></a>
												<a href="#" class="color color-5"></a>
											</p>
										</div>-->
											<div class="size-wrap">
												<p class="size-desc">
													Size:
													<a href="#" class="size size-1">3</a>
													<a href="#" class="size size-2">4</a>
													<a href="#" class="size size-3">5</a>
													<a href="#" class="size size-4">6</a>
													<a href="#" class="size size-5">7</a>
													<!--<a href="#" class="size size-5">xxl</a>-->
												</p>
											</div>

											<div class="col-md-12" style="padding-left: 4px;">
												<div class="form-group">
													<label for="country">Select Quantitiy</label>
													<div class="form-field">
														<select name="qty" id="qty" class="form-control" style="width: 75px;">
															<option>1</option>
															<option>2</option>
															<option>3</option>
															<option>4</option>
															<option>5</option>
														</select>
													</div>
												</div>
											</div>

											<form action="" method="post" class="form-submit">
												<input type="hidden" class="pro_id" value="<?= $row['pro_id']; ?>">
												<input type="hidden" class="pro_name" value="<?= $row['pro_name']; ?>">
												<input type="hidden" class="price" value="<?= $row['price']; ?>">
												<input type="hidden" class="pro_img" value="<?= $row['pro_img']; ?>">
												<input type="hidden" class="umob_no" value="<?= $umobile_no; ?>">
												<span class="btn btn-primary btn-addtocart addItemBtn"><a href=""><i class="icon-shopping-cart"> </i></a> Add to Cart</span>
											</form>
										</div>
									</div>
								</div>
							</div>
						<?php } ?>
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

	<!-- script tag for product add to the cart using ajax -->

	<script type="text/javascript">
		$(document).ready(function() {
			$(".addItemBtn").click(function(e) {
				e.preventDefault();
				var $form = $(this).closest(".form-submit");
				var pro_id = $form.find(".pro_id").val();
				var pro_name = $form.find(".pro_name").val();
				var price = $form.find(".price").val();
				var pro_img = $form.find(".pro_img").val();
				var qty = $('#qty').val();
				var umob_no = $form.find(".umob_no").val();
				//alert(umob_no);

				$.ajax({
					url: 'manage_cart.php',
					method: 'POST',
					data: {
						pro_id: pro_id,
						pro_name: pro_name,
						price: price,
						pro_img: pro_img,
						qty: qty,
						umob_no: umob_no
					},
					success: function(response) {
						$("#message").html(response);
						window.scroll(500, 500);
						//load_cart_item_number();
					}
				});
			});
			load_cart_item_number();

			function load_cart_item_number() {
				$.ajax({
					url: 'action.php',
					method: 'get',
					data: {
						cartItem: "cart_item"
					},
					success: function(response) {
						$("#cart-item").html(response);
					}
				});
			}
		});
	</script>



	<!-- end of the ajax part -->
	<!-- <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script> -->

</body>

</html>