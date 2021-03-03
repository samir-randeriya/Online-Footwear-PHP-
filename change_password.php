<?php
session_start();
?>


<?php 
	$msg="";
	require_once('database_config/db.php');
	
	if(isset($_POST['update']))
	{
		
		$oldpassword = md5($_POST['oldpassword']);
		$newpassword = md5($_POST['newpassword']);
		$confirmnewpass = md5($_POST['cnewpassword']);
		$userid = $_SESSION["userid"];
		
		$result = mysqli_query($link ,"SELECT password FROM registration WHERE 
					password = '$oldpassword' AND userid='$userid'");
		$num=mysqli_fetch_array($result);
		if($num>0)
		{
			if($newpassword == $confirmnewpass)
			{
 				$qry=mysqli_query($link,"update registration set password=' $newpassword' where userid='$userid'");
				$msg ="Password Changed Successfully !!";
			}
			// session_destroy();
			// header("location:home.php");
		}
		else
		{
			$msg ="Failed...";
		}
	}	
	
	
?>

<!DOCTYPE HTML>
<html>
	<head>
	
	<title>Online Footwear | Change password</title>
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
				   					<h1>Change password</h1>
				   					<h2 class="bread"><span><a href="home.php">Home</a></span><span>/ Profile
				   					</span><span>/ Change Password</span> </h2>
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
							<h3>Change Password Page</h3>
							<form action="#" method="post">
                                <div style="color:red;">
									<?php if($msg != "") echo $msg . "<br><br>"; ?>
								</div>

                                <div class="row form-group">
									<div class="col-md-12">
										<label for="oldpassword">Old password</label>
										<input type="password" id="oldpass" name="oldpassword" 
										 value="" class="form-control" placeholder="Enter Old Password">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="newpassword">New Password</label>
										<input type="password" id="newpass" name="newpassword" 
										 value="" class="form-control" placeholder="Enter New Password">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="retpassword">Retype New Password</label>
										<input type="password" id="newpass" name="cnewpassword" 
										 value="" class="form-control" placeholder="Enter Retype New Password">
									</div>
								</div>

								<div class="form-group text-center">
									<input type="submit" value="Update" name="update" class="btn btn-primary">
								</div>
							
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

