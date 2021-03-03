<?php
	session_start();
	error_reporting(0);

	require_once('database_config/db.php');
	require_once('database_config/connection.php');
?>

<?php
	require_once('database_config/db.php');
	$id = $_SESSION["userid"];

	$qry = "select * from registration where userid = $id ";
	$res = mysqli_query($link, $qry);

	while ($row = mysqli_fetch_assoc($res)) {
		$umobile_no = $row['mobile_no'];
}
//echo $umobile_no;
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
		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
					<?php
						$sql = 'SELECT * from home_slider';
						$stmt = $pdo->query($sql);
						$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
						foreach ($rows as $row) {
					?>
						<li style="background-image: url('Admin/images/home_slider/<?= $row['slider_img'] ?>');">
							<div class="overlay"></div>
							<div class="container-fluid">
								<div class="row">
									<div class="col-md-6 col-md-offset-3 col-md-pull-2 col-sm-12 col-xs-12 slider-text">
											<!-- <div class="slider-text-inner">
												<div class="desc">
													<center>
														<h3 class="head-1"><?= $row['slider_head'] ?></h3>
														<p class="category"><span><?= $row['slider_desc'] ?></span></p>
														<p><a href="category.php" class="btn btn-primary">Shop Collection</a></p>
													</center>
												</div>
											</div> -->
									</div>
								</div>
							</div>
						</li>
					<?php } ?>
				</ul>
			</div>
		</aside>

		<div id="colorlib-featured-product">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<a href="shop.html" class="f-product-1" style="background-image: url(images/item-1.jpg);">
							<!-- <div class="desc">
								<h2>Fahion <br>for <br>men</h2>
							</div> -->
						</a>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<a href="#" class="f-product-2" style="background-image: url(images/wo1.jpg);"></a>
							</div>
							<div class="col-md-6">
								<a href="#" class="f-product-2" style="background-image: url(images/men2.jpg);"></a>
							</div>
							<div class="col-md-12">
								<a href="$" class="f-product-2" style="background-image: url(images/2.jpg);"></a>
							</div>
						</div>
					</div>
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
				<div id="message"></div>
				<div id="message_wishlist"></div>
				<div class="row">
					<?php
					$sql = 'SELECT * from product order by pro_id asc LIMIT 4 ';
					$stmt = $pdo->query($sql);
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach ($rows as $row) {
						$qty = 1;
					?>
						<div class="col-md-3 text-center">
							<div class="product-entry">
								<div class="product-img" style="background-image: url('Admin/images/product/<?php echo $row['pro_img'] ?>');width: 85%;">
									<p class="tag"><span class="new">New</span></p>
									<div class="cart">
										<form action="" method="post" class="form-submit">
											<p>
												<input type="hidden" class="pro_id" value="<?= $row['pro_id']; ?>">
												<input type="hidden" class="pro_name" value="<?= $row['pro_name']; ?>">
												<input type="hidden" class="price" value="<?= $row['price']; ?>">
												<input type="hidden" class="pro_img" value="<?= $row['pro_img']; ?>">
												<input type="hidden" class="umob_no" value="<?= $umobile_no; ?>">
												<input type="hidden" id="qty" value="<?= $qty; ?>">

												<span class="addtocart addItemBtn"><a href=""><i class="icon-shopping-cart"></i></a></span>
												<span><a href="product_detail.php?pro_id=<?php echo $row['pro_id']; ?>"><i class="icon-eye">
												</i></a></span>
												<span class="addItemWish"><a href=""><i class="icon-heart3"></i></a></span>
												<!-- <span><a href=""><i class="icon-bar-chart"></i></a></span>-->
											</p>
										</form>
									</div>
								</div>
								<div class="desc" style="margin-right: 15%;">  
									<h3><?= $row['pro_name'] ?></h3>
									<p class="price"><span>$<?= $row['price'] ?></span></p>
								</div>
							</div>
						</div>
					<?php
					}
					?>

				</div>
			</div>

		</div>

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


	<!-- START ADD TO CART CODE -->
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
						window.scroll(1650, 1650);
						//load_cart_item_number();
					}
				});
			});
			load_cart_item_number();

			function load_cart_item_number() {
				$.ajax({
					url: 'manage_cart.php',
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


	<!-- START WISHLIST CODE -->
	<script type="text/javascript">
		$(document).ready(function() {
			$(".addItemWish").click(function(e) {
				e.preventDefault();
				var $form = $(this).closest(".form-submit");
				var pro_id = $form.find(".pro_id").val();
				var pro_name = $form.find(".pro_name").val();
				var price = $form.find(".price").val();
				var pro_img = $form.find(".pro_img").val();
				var qty = $('#qty').val();
				var umob_no = $form.find(".umob_no").val();

				$.ajax({
					url: 'manage_wishlist.php',
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
						$("#message_wishlist").html(response);
						window.scroll(1650, 1650);
						//load_cart_item_number();
					}
				});
			});
			load_wish_item_number();

			function load_wish_item_number() {
				$.ajax({
					url: 'manage_wishlist.php',
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

</body>

</html>