<?php
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Online Footwear | About Us</title>

	<!-- Header Part Start -->
	<?php
	include("header_link.php");
	?>
	<!-- Header Part End -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.card {
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
			max-width: 300px;
			margin: auto;
			text-align: center;
			font-family: arial;
		}

		.title {
			color: grey;
			font-size: 18px;
		}

		.button {
			border: none;
			outline: 0;
			display: inline-block;
			padding: 8px;
			color: white;
			background-color: #000;
			text-align: center;
			cursor: pointer;
			width: 100%;
			font-size: 18px;
		}

		a {
			text-decoration: none;
			/*font-size: 0px;*/
			color: black;
		}

		.insta {
			font-size: 22px;
		}

		.twitter {
			font-size: 22px;
		}

		.facebook {
			font-size: 22px;
		}

		button:hover,
		a:hover {
			opacity: 0.7;
		}
	</style>
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
										<h1>About Us</h1>
										<h2 class="bread"><span><a href="home.php" style="color: #FFC300;">Home</a></span><span>/ About us</span></h2>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>

		<?php
		require_once 'database_config/connection.php';

		$sql = 'SELECT * from aboutus';
		$stmt = $pdo->query($sql);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		?>
		<div id="colorlib-about">
			<div class="container">
				<div class="row">
					<div class="about-flex">
						<div class="col-one-forth">
							<div class="row">
								<div class="col-md-12 about">
									<h2>About</h2>
									<ul>
										<li><a href="#about">About us</a></li>
										<li><a href="#staff">Staff</a></li>
										<li><a href="#connect">Connect with us</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-three-forth">
							<center>
								<h2 id="about">About us</h2>
							</center>
							<div class="row">
								<div class="col-md-12">
									<p><?= $row['aboutus_text']; ?></p>

									<div class="row row-pb-sm">
										<div class="col-md-6">
											<img class="img-responsive" src="Admin/images/aboutus/<?= $row['aboutus_img1']; ?>" alt="" style="width:100%; height:250px"><br>
										</div>
										<div class="col-md-6">
											<img class="img-responsive" src="Admin/images/aboutus/<?= $row['aboutus_img2']; ?>" alt="" style="width:100%; height:250px"><br><br>
										</div>
										<div class="col-md-6">
											<img class="img-responsive" src="Admin/images/aboutus/<?= $row['aboutus_img3']; ?>" alt="" style="width:100%; height:250px"><br>
										</div>
										<div class="col-md-6">
											<img class="img-responsive" src="Admin/images/aboutus/<?= $row['aboutus_img4']; ?>" alt="" style="width:100%; height:250px"><br>
										</div>
									</div>
								</div>
							</div>
							<br>
							
							<center>
								<h2 id="staff">Our staff</h2>
							</center>
							<div class="row col-lg-12">
								<div class="row row-pb-sm">

									<?php
									$sql = 'SELECT * from staff where status = 0';
									$stmt = $pdo->query($sql);
									$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

									foreach ($rows as $row) {
									?>
										<center>
											<div class="col-md-4">
												<div class="card">
													<img src="Admin/images/staff/<?= $row['staff_img']; ?>" alt="image" style="width:50%; border-radius:50%"><br><br>
													<h3><?= $row['staff_name']; ?></h3>
													<p class="title"><?= $row['staff_designation']; ?></p>
													<div style="margin: 24px 0;">
														<a class="insta" href="<?= $row['staff_insta']; ?>"><i class="fa fa-instagram"></i></a>
														<a class="twitter" href="<?= $row['staff_twitter']; ?>"><i class="fa fa-twitter"></i></a>
														<a class="facebook" href="<?= $row['staff_facebook']; ?>"><i class="fa fa-facebook"></i></a>
													</div>
													<p><button class="button">Contact</button></p>
												</div>
											</div>
										</center>

									<?php
									}
									?>
								</div>
							</div>
							<br>
							<?php
							require_once 'database_config/connection.php';

							$sql = 'SELECT * from aboutus';
							$stmt = $pdo->query($sql);
							$row = $stmt->fetch(PDO::FETCH_ASSOC);
							?>
							<center>
								<h2 id="connect">Connect with us</h2>
							</center>
							<div class="row">
								<div class="col-md-12">
									<center>
										<h4><?= $row['address'] ?></h4>

										<h4>Monday to Sunday from <?= $row['opening_time'] ?> AM to <?= $row['closing_time'] ?> PM</h4>

										<h4><?= $row['phone_number'] ?></h4>
									</center>
								</div>
							</div>

							<br>
						</div>
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