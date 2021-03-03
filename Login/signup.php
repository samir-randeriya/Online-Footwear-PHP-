<?php
$msg = "";
if (isset($_POST['register'])) {
	require_once('../database_config/db.php');

	$fname = $_POST['username'];
	$mobno = $_POST['mobile_no'];
	$emailid = $_POST['email_id'];
	$password = $_POST['password'];
	$pwd = MD5($password);
	$cpassword = $_POST['cpassword'];
	$trn_date = date("Y-m-d H:i:s");
	//$status = $_POST['status'];

	if ($password != $cpassword) {
		$msg = "Please check your password or password does not match..";
	} else {
		//$query = "INSERT INTO `registration`(`username`, `mobile_no`, `email_id`, `password`, `status`) VALUES ('$fname','$mobno','$emailid','$pwd','0')";
		$query = "INSERT INTO `registration`(`username`, `mobile_no`, `email_id`, `password`, `status`, `trn_date`) VALUES ('$fname','$mobno','$emailid','$pwd','0', '$trn_date')";
		$result = mysqli_query($link, $query);
		if ($result) {
			header("Location:signin.php");
		} else {
			echo "Error :" . $query;
		}
	}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Online Footwear | Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body style="background-color: #666666;">
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" action="" style="padding-top: 6%">
					<span class="login100-form-title p-b-43">
						New User Register Here..
					</span>


					<?php if ($msg != "") echo $msg . "<br><br>"; ?>

					<div class="wrap-input100 validate-input" data-validate="Valid Name is required">
						<input class="input100" type="text" name="username" minlength="3">
						<span class="focus-input100"></span>
						<span class="label-input100">First Name</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid Mobile Number is required" maxlength="10">
						<input class="input100" type="text" name="mobile_no">
						<span class="focus-input100"></span>
						<span class="label-input100">Mobile Number</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email_id">
						<span class="focus-input100"></span>
						<span class="label-input100">Email Id</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" minlength="5">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="cpassword" minlength="5">
						<span class="focus-input100"></span>
						<span class="label-input100">Confirm Password</span>
					</div>


					<!--<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me	
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div> -->


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="register" type="submit">
							Register
						</button>
					</div>


					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign in using
							<a href="signin.php" class="xt1">
								Sign In Here..
							</a>
						</span>
					</div>

					<div class="login100-form-social flex-c-m">
						<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
							<i class="fa fa-facebook-f" aria-hidden="true"></i>
						</a>

						<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
							<i class="fa fa-twitter" aria-hidden="true"></i>
						</a>
					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/bg-01.jpg');">

				</div>
			</div>
		</div>
	</div>





	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>