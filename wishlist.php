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

<!DOCTYPE HTML>
<html>

<head>

	<title>Online Footwear | Wishlist</title>
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
										<h1>Wishlist</h1>
										<h2 class="bread"><span><a href="home.php">Home</a></span><span>/ Wishlist</span></h2>
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
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-name">
							<div class="one-forth text-center">
								<span>Product Details</span>
							</div>
							<div class="one-eight text-center">
								<span>Price</span>
							</div>
							<div class="one-eight text-center">
								<span>Quantity</span>
							</div>
							<div class="one-eight text-center">
								<span>Total</span>
							</div>
							<div class="one-eight text-center">
								<a class="closed" href=" manage_wishlist.php?clear=all" onclick="return confirm('Are you sure you want to clear your cart?');"><span class="badge-danger badge p-1"><i class="fas fa-trash"></i>Clear wishlist</span></a>
							</div>
						</div>
						<!-- fetch cart data -->
						<?php
							require_once('database_config/db.php');
							$stmt = $link->prepare("SELECT * FROM wishlist where umobile_no = '$umobile_no'");
							$stmt->execute();
							$result = $stmt->get_result();
							//$grand_total = 0;
							while ($row = $result->fetch_assoc()) :
						?>
							<form class="form-submit" method="post">
								<div class="product-cart">
									<div class="one-forth">
										<input type="hidden" class="pro_id" value="<?= $row['pro_id'] ?>">
										<div class="product-img" style="background-image: url(Admin/images/product/<?= $row['pro_img'] ?>);margin-left: 30px;">
										</div>
										<div class="display-tc" style="padding-left: 25px;">
											<h3><?= $row['pro_name'] ?></h3>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<span class="price">$<?= $row['pro_price'] ?>.00</span>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<input type="number" class="input-number text-center form-control itemQty" value="<?= $row['qty'] ?>" disabled>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<span class="price">$<?= $row['pro_price'] ?>.00</span>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<a href="manage_wishlist.php?remove=<?= $row['wish_id'] ?>" onclick="return confirm('Are you sure you want to clear this item?');" class="closed"></a>
										</div>
									</div>
								</div>
							</form>
						<?php endwhile; ?>
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