<?php
session_start();
?>


<?php 
	$msg="";
	require_once('database_config/db.php');
	
	if(isset($_POST['update']))
	{
		$name = $_POST['firstname'];
		$email = $_POST['email'];
		$mob_no = $_POST['mobile_no'];
		$userid = $_SESSION["userid"];

		$query = "UPDATE `registration` SET `username`='$name',`email_id`='$email',`mobile_no`='$mob_no' WHERE `userid` = '$userid'";
		$result = mysqli_query($link,$query);

		if($result)
		{
			//session_destroy();
			header("Location:account.php");
			// $msg ="data successfully updated...";
		}
	}
	
	$userid = $_SESSION["userid"];
	
	$qry = "select * from registration where userid = '$userid' ";
    $res = mysqli_query($link,$qry);
	
	
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Online Footwear | Account</title>
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
				   					<h1>Account</h1>
				   					<h2 class="bread"><span><a href="home.php">Home</a></span><span>/ Account</span></h2>
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
			 <div id="message"></div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="contact-wrap">
							<h3>Profile Page</h3>
							<form action="#" method="post">
                                <div style="color:red;">
									<?php if($msg != "") echo $msg . "<br><br>"; ?>
								</div>
								 <!-- start fetch data -->
                                    <?php                                                  
                                        while($row = mysqli_fetch_assoc($res)){   
                                	?>

                                <div class="row form-group">
									<div class="col-md-12">
										<label for="fname">First Name</label>
										<input type="text" id="fname" name="firstname" 
										 value="<?php echo $row['username'];?>" class="form-control" placeholder="Your firstname">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="email">Email</label>
										<input type="text" id="email" name="email" 
										 value="<?php echo $row['email_id']; ?>" class="form-control" placeholder="Your email address">
									</div>
								</div>

                                <div class="row form-group">
									<div class="col-md-12">
										<label for="mobile_no">Mobile No</label>
										<input type="text" id="number" name="mobile_no" 
										value="<?php echo $row['mobile_no']; ?>" class="form-control" placeholder="Enter mobile no">
									</div>
								</div>

								<div class="form-group text-center">
									<input type="submit" value="Update" name="update" class="btn btn-primary">
								</div>
							<?php } ?>
							</form>		
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
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>