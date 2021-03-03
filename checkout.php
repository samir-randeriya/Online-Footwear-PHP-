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
		$email_id = $row['email_id'];
	}
	// echo $umobile_no;
?>

<?php
	 require_once('database_config/db.php');
	 $country_name = '';
	 $state_name = '';
	 $city_name = '';
	
	$select_country = "SELECT * FROM `country`";
	$result_country = mysqli_query($link, $select_country);

?>

<?php

	require_once('database_config/db.php');

	if(isset($_POST['place_on_order'])){

		//echo "if";
		$country = $_POST['country_id'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$address1 = $_POST['address1'];
		$address2 = $_POST['address2'];
		$state = $_POST['state_id'];
		$town = $_POST['city_id'];
		$zipp_code = $_POST['zip_code'];

		$select_cart_total = "SELECT * FROM `add_to_cart` WHERE `umobile_no` = $umobile_no";
		$result_cart_total = mysqli_query($link, $select_cart_total);
		
			$grandtotal = 0;
			//echo $select_cart_total;
			while($row_cart = mysqli_fetch_assoc($result_cart_total)){
				$qty = $row_cart['qty'];
				$pro_name = $row_cart['pro_name'];
				$pro_price = $row_cart['pro_price'];
				$total_price = $qty * $pro_price;
				$grandtotal += $total_price;


				$insert_chkout = "INSERT INTO `checkout`(`country`, `fname`, `lname`, `address1`, `address2`, `state`, `town`, `zipp_code`, 					 `email_id`, `umobile_no`, `qty`, `pro_name`, `pro_price`, `grand_total`,`payment`) VALUES ('$country','$fname',				 '$lname','$address1','$address2','$state','$town','$zipp_code','$email_id','$umobile_no','$qty','$pro_name',					 '$pro_price','$total_price','cash')";
				$result_chkout = mysqli_query($link, $insert_chkout);

				if($result_chkout){
					 header("Location:order_detail.php");
					//echo "success";
					//echo $insert_chkout;
				}else{
					//echo "failed";
					echo $insert_chkout;
				}
	
			}
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Online Footwear | Checkout</title>
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
				   					<h1>Checkout</h1>
				   					<h2 class="bread"><span><a href="home.php">Home</a></span><span><a href="add_to_cart.php">/ Shopping Cart</a></span><span>/ Checkout</span></h2>
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
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Shopping Cart</h3>
							</div>
							<div class="process text-center active">
								<p><span>02</span></p>
								<h3>Checkout</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Order Complete</h3>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
						<div class="col-md-7">
							<form method="post" class="colorlib-form">
								<h2>Billing Details</h2>
							<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="country">Select Country</label>
									<div class="form-field">
										<i class="icon icon-arrow-down3"></i>
										<select name="country_id" id="country_id" class="form-control" onchange="get_state()">
											<option value="">Select country</option>
											<?php
												while($row = mysqli_fetch_assoc($result_country)){
													echo "<option value=".$row['country_id'].">".$row['country_name']."</option>";
												} 
											?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
										<div class="col-md-6">
											<label for="fname">First Name</label>
											<input type="text" id="fname" name="fname" class="form-control" placeholder="Your first name" required>
										</div>
										<div class="col-md-6">
											<label for="lname">Last Name</label>
											<input type="text" id="lname" name="lname" class="form-control" placeholder="Your last name" required>
										</div>
								</div>
							<div class="col-md-12">
										<div class="form-group">
											<label for="fname">Address</label>
										<input type="text" id="address1" name="address1" class="form-control" placeholder="Enter Your Address" required>
								</div>
								<div class="form-group">
										<input type="text" id="address2" name="address2" class="form-control" placeholder="Second Address" required>
								</div>
							</div>
							<div class="col-md-12">
									<div class="form-group">
										<label for="companyname">State/Province</label>
											<div class="form-field">
												<i class="icon icon-arrow-down3"></i>
													<select name="state_id" id="state_id" class="form-control" onchange="get_city()">
														<option value="">Select State/Province</option>
													</select>
											</div>
									</div>
							</div>
									<!-- START AJAX FUNCTION FOR State -->
										<script>
												function get_state(state_id){
													var country_id = $('#country_id').val();
													//alert(country_id);
													$.ajax({
														url:'admin/get_state.php',
														type:'post',
														data:'country_id=' + country_id + "&state_id=" + state_id ,
														success:function(result){
															$('#state_id').html(result); 
														}
													});
												}
										</script>
									<!-- END AJAX FUNCTION FOR State -->

							<div class="form-group">
										<div class="col-md-6">
											<label for="stateprovince">Town/City</label>
												<div class="form-field">
													<i class="icon icon-arrow-down3"></i>
														<select name="city_id" id="city_id" class="form-control">
															<option value="">Select Town/City</option>
														</select>
												</div>
										</div>
											
											<!-- START AJAX FUNCTION FOR city -->
												<script>
														function get_city(state_id){
															var state_id = $('#state_id').val();
															//alert(country_id);
															$.ajax({
																url:'admin/get_city.php',
																type:'post',
																data:'state_id=' + state_id + "&city_id=" + city_id ,
																success:function(result){
																	$('#city_id').html(result); 
																}
															});
														}
												</script>
											<!-- END AJAX FUNCTION FOR city -->

										<div class="col-md-6">
											<label for="lname">Zip/Postal Code</label>
											<input type="text" id="zip_code" name="zip_code" class="form-control" placeholder="Zip / Postal" maxlength="6" required>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-6">
											<label for="email">E-mail Address</label>
											<input type="text" id="email_id" name="email_id" class="form-control" placeholder="E-mail Address" value="<?= $email_id?>" disabled>
										</div>
										<div class="col-md-6">
											<label for="Phone">Phone Number</label>
											<input type="text" id="phone_no" name="phone_no" class="form-control" placeholder="Phone Number" maxlength="10" value="<?= $umobile_no;?>" disabled>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
										 	<p><button class="btn btn-primary" name="place_on_order" value="Place an order" style="margin-top: 25px;margin-left: 240px;">Place an order</button>
										 	</p>
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="col-md-5">
							<!-- <form method="post" class="colorlib-form"> -->
								<div class="cart-detail">
									<h2>Cart Total</h2>
									<?php
										$select_cart_total = "SELECT * FROM `add_to_cart` WHERE `umobile_no` = $umobile_no";
										$result_cart_total = mysqli_query($link, $select_cart_total);
										$grand_total = 0;
										//echo $select_cart_total;
										while($row_cart = mysqli_fetch_assoc($result_cart_total)){
											$qty = $row_cart['qty'];
											$pro_name = $row_cart['pro_name'];
											$pro_price = $row_cart['pro_price'];
											$total_price = $qty * $pro_price;
											$grand_total += $total_price;
									?>
									<ul>
																						
										<li>
											<!-- <span>Subtotal</span> <span>$100.00</span> -->
											<ul>
													<li><span><?= $qty ?> x <?= $pro_name ?></span> <span>$<?= $total_price ?></span></li>
													
											</ul>
										</li>
										<?php }?>
										<!-- <li><span>Shipping</span> <span>$0.00</span></li> -->
										<li><span>Order Total</span> <span>$<?php echo $grand_total?></span></li>
										
									</ul>
									
								</div>
								<div class="cart-detail">
									<form>
									<h2>Payment Method</h2>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											<label><input type="radio" name="cash" id="cash">Cash</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											<label><input type="radio" name="paytm" id="paytm">Paytm</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											<label><input type="radio" name="paypal" id="paypal">Paypal</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="checkbox">
											<label><input type="checkbox" value="" id="terms_condition" required>I have read and accept the terms and conditions</label>
											</div>
										</div>
									</div>
										</form>
								</div>
	
							<!-- </form> -->
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

