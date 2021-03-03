<?php
session_start();
?>

<?php
$msg = "";

if (isset($_POST['login'])) {
	require_once('../database_config/db.php');

	$mobno = $_POST['mobile_no'];
	$password = MD5($_POST['password']);
	//$pwd = MD5($password);

	$query = "SELECT * FROM registration WHERE mobile_no='$mobno' AND password='$password' ";
	$result = mysqli_query($link, $query);

	if (mysqli_num_rows($result) > 0) {
		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row['userid'];
			$name = $row["username"];
			$email_id = $row["email_id"];
			$status = $row["status"];

			if ($status == 0) {
				if (isset($_POST['rememberme'])) {
					//echo "if cookie";
					$_SESSION["userid"] = $id;
					$_SESSION["mobile_no"] = $mobile_no;

					setcookie("mobile_no", $_POST["mobile_no"], time() + (10 * 365 * 24 * 60 * 60));
					setcookie("password", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));

					header("location:../home.php");
				} else {
					//echo "else cookie";
					$_SESSION["userid"] = $id;

					header("location:../home.php");
				}
				//header("location:../home.php");
			} elseif ($status == 1) {
				$_SESSION['name'] = $name;
				$_SESSION['email_id'] = $email_id;

				header("location:../admin/dashboard.php");
			} else {
				//header("location:../site_maintainance.php");
			}
		}
	} else {
		//echo "$query";
		echo "Invalid Data Entered...";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Online Footwear | Login</title>
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
				<form class="login100-form validate-form" name="form1" method="post" style="padding-top: 6%">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>


					<div class="wrap-input100 validate-input" data-validate="Valid Mobile number is required">
						<input class="input100" type="text" name="mobile_no" maxlength="10" value="<?php if (isset($_COOKIE['mobile_no'])) {
																										echo $_COOKIE['mobile_no'];
																									} ?>">
						<span class="focus-input100"></span>
						<span class="label-input100">Mobile Number</span>
					</div>



					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" value="<?php if (isset($_COOKIE['password'])) {
																							echo $_COOKIE['password'];
																						} ?>">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="rememberme">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="forgot_password.php" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>


					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="login" type="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							or sign up using
							<a href="signup.php" class="xt1">
								Sign Up here..
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
					<!--style="background-image: url('images/bg-01.jpg');" -->
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