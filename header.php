<?php
	error_reporting(0);

	require_once('database_config/db.php');

	$user_id = $_SESSION['userid'];
	
	$select_query = "select * from registration where userid = '$user_id'";
	$select_res = mysqli_query($link, $select_query);

?>

<!-- Header Part Start -->

<nav class="colorlib-nav" role="navigation">
	<div class="top-menu">
		<div class="container">
			<div class="row">
				<div class="col-xs-2">
					<div id="colorlib-logo"><a href="home.php">Store</a></div>
				</div>
				<div class="col-xs-10 text-right menu-1">
					<ul>
						<li><a href="home.php">Home</a></li> <!-- class="active" -->
						<li class="has-dropdown">
							<a href="category.php">Category</a>
							<!-- <ul class="dropdown">
										<li><a href="#">Men</a></li>
										<li><a href="#">Women</a></li>
										<li><a href="#">Children</a></li>
										<li><a href="#">Order Complete</a></li>
										<li><a href="#">Wishlist</a></li>
									</ul> -->
						</li>
						<li class="has-dropdown">
							<a href="order_detail.php">Order Details</a>
							<!-- <ul class="dropdown">
										<li><a href="order_complete.php">Order Details</a></li>
										<li><a href="invoice/invoice.php" target="_blabk">Invoice</a></li>
									</ul> -->
						</li>
						<li><a href="about.php">About</a></li>
						<li><a href="contact.php">Contact</a></li>
						<!-- <li><a href="Login/signin.php">Login</a></li> -->

						<?php
						if (isset($_SESSION["userid"])) {
							while ($row = mysqli_fetch_assoc($select_res)) {

						?>

								<li class="has-dropdown">
									<a href="#">Profile</a>
									<ul class="dropdown">
										<li> Welcome <?php echo $row["username"] ?></li>
										<li><a href="account.php">Account</a></li>
										<li><a href="change_password.php">Change Password</a></li>
										<li><a href="Login/logout.php">Logout</a></li>
									</ul>
								</li>
								
								<li><a href="add_to_cart.php"><i class="icon-shopping-cart"></i> </a></li>
								<li><a href="wishlist.php"><i class="icon-heart3"></i></a></li>
							<?php
							}
						} else {
							?>
							<li><a href="Login/signin.php">Log In</a></li>
						<?php
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</nav>
<!-- Header Part End -->

<!-- START ADD TO CART FUNCTION -->

<script type="text/javascript">
	//call the function
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
</script>

<!-- END ADD TO CART FUNCTION -->