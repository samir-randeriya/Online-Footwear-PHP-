<?php
session_start();
?>

<?php
	
	$msg="";
	if(isset($_POST['submit']))
	{
		require_once('database_config/db.php');

		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];

		$cont_query = "INSERT INTO `contact_us`(`first_name`, `last_name`, `email`, `subject`, `message`) VALUES ('$fname','$lname','$email','$subject','$message')";
		$cont_result = mysqli_query($link,$cont_query);
		if($cont_result)
		{
			$msg ="Contact successfully submited...";
			header("Location:contact.php");
		}
		else
		{
			$msg ="Contact are not submited...";
			echo "Error :" . $query;
		}
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
	
	<title>Online Footwear | Contact</title>
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
				   					<h1>Contact</h1>
				   					<h2 class="bread"><span><a href="home.php">Home</a></span><span>/ Contact</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="contact-wrap">
							<h3>Get In Touch</h3>
							<form action="#" method="post">
								<div class="row form-group">
									<div class="col-md-6 padding-bottom">
										<label for="fname">First Name</label>
										<input type="text" id="fname" name="firstname" class="form-control" placeholder="Your firstname">
									</div>
									<div class="col-md-6">
										<label for="lname">Last Name</label>
										<input type="text" id="lname" name="lastname" class="form-control" placeholder="Your lastname">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="email">Email</label>
										<input type="text" id="email" name="email" class="form-control" placeholder="Your email address">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="subject">Subject</label>
										<input type="text" id="subject" name="subject" class="form-control" placeholder="Your subject of this message">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="message">Message</label>
										<textarea name="message" id="message" name="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
									</div>
								</div>
								<div class="form-group text-center">
									<input type="submit" name="submit" value="Send Message" class="btn btn-primary">
								</div>
							</form>		
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- <div id="map" class="colorlib-map"></div> -->
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
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

