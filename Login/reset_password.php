<!DOCTYPE html>
<html lang="en">
<head>
	<title>Online Footwear | Reset Password</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
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
				<form class="login100-form validate-form" method="post" action="" name="update">
					<?php
						require_once('../database_config/db.php');
						if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"]=="reset")&& !isset($_POST["action"])){
							$key = $_GET["key"];
							$email = $_GET["email"];
							$curDate = date("Y-m-d H:i:s");
							$query = mysqli_query($link,"SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';");
							$row = mysqli_num_rows($query);
							if ($row==""){
							$error = '<h2>Invalid Link</h2> <p>The link is invalid/expired. Either you did not copy the correct link from the email, or you have already used the key in which case it is deactivated.</p>
							<p><a href="http://localhost/Online_Footwear/Login/forgot_password.php">Click here</a> to reset password.</p>';
						}
						else{
							$row = mysqli_fetch_assoc($query);
							$expDate = $row['expDate'];
							if ($expDate >= $curDate){
					?>

					<span class="login100-form-title p-b-43">
						Reset password here..
					</span>
					<input type="hidden" name="action" value="update" />
						
					<div class="wrap-input100 validate-input" data-validate = "Valid password is required">
						<input class="input100" type="password" name="pass1" id="pass1">
						<span class="focus-input100"></span>
						<span class="label-input100">Enter New Password</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="valid Password is required">
						<input class="input100" type="password" name="pass2" id="pass2">
						<span class="focus-input100"></span>
						<span class="label-input100">Enter Retype New Password</span>
					</div>

					<input type="hidden" name="email" value="<?php echo $email;?>"/>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" value="Reset password" >
							Reset Password
						</button>
					</div>

					<?php
						}
							else{
								$error = "<h2>Link Expired</h2> <p>The link is expired. You are trying to use the expired link which as valid only 24 hours (1 days after request).<br /><br /></p>";
							}
						}
						if($error!=""){
							echo "<div class='error'>".$error."</div><br />";
						}	
					} // isset email key validate end
					if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update"))
					{
						$error="";
						$pass1 = mysqli_real_escape_string($link,$_POST["pass1"]);
						$pass2 = mysqli_real_escape_string($link,$_POST["pass2"]);
						$email = $_POST["email"];
						$curDate = date("Y-m-d H:i:s");
						if ($pass1!=$pass2){
							$error = "<p>Password do not match, both password should be same.<br /><br /></p>";
						}
						if($error!=""){
							echo "<div class='error'>".$error."</div><br />";
						}
						else{
							$pass1 = md5($pass1);
        					//mysqli_query($link,"UPDATE `registration` SET `password`='".$pass1. "' WHERE `email`='".$email."';");	
							mysqli_query($link,"UPDATE `registration` SET `password`='".$pass1."', `trn_date`='".$curDate."' WHERE `email_id`='".$email."';");	
							mysqli_query($link,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");
							echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p><p><a href="http://localhost/Online_Footwear/Login/signin.php"> Click here to Login.</a></p></div><br />';
		
							//echo UPDATE `registration` SET `password`='".$pass1."', `trn_date`='".$curDate."' WHERE `email_id`= $email ;
						}		
					}
				?>

				</form>

			    <div class="login100-more">
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