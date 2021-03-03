<?php
	session_start();
	error_reporting(0);
?>

<?php
	require_once('database_config/db.php');
	$id = $_SESSION["userid"];
	
	$qry = "select * from registration where userid = $id ";
	$res = mysqli_query($link, $qry);

	while ($row = mysqli_fetch_assoc($res)) {
		$umobile_no = $row['mobile_no'];
	}
	//echo $umobile_no;
?>

<?php
	require_once('database_config/db.php');

	$cat_qry = "select * from categories order by cat_id asc";
	$cat_res = mysqli_query($link, $cat_qry);
?>

<!DOCTYPE HTML>
<html>

<head>

	<title>Online Footwear | Categories</title>

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
										<h1>Products</h1>
										<h2 class="bread"><span><a href="home.php">Home</a></span><span>/ Categories</span></h2>
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
				<!-- for alert message -->
				<div id="message"></div>

				<div class="row">
					<div class="col-md-10 col-md-push-2">
						<div class="row row-pb-lg">
							<!-- product fetch part start (done) -->
							<?php
							require_once('database_config/db.php');
							//$id= $_GET['pro_id']; 
							$result_per_page = 6;

							if(!isset($_GET['subcat_id']))
							{
								$select_qry = "select * from product order by cat_id";
								$result1 =  mysqli_query($link, $select_qry);
								$number_of_results = mysqli_num_rows($result1);
							}
							else
							{
								$sub_id = $_GET['subcat_id']; 
								$select_qry = "select * from product where status = 0 and subcat_id = $sub_id";
								$result1 =  mysqli_query($link, $select_qry);
								$number_of_results = mysqli_num_rows($result1);
							}
						
							$number_of_pages = ceil($number_of_results/$result_per_page);

							if(!isset($_GET['page']))
							{
								$page= 1;
							}
							else
							{
								$page = $_GET['page'];
							}

							$this_page_first_result = ($page-1) * $result_per_page;

							if(!isset($_GET['subcat_id']))
							{
								$select_qry = "select * from product order by cat_id LIMIT ". $this_page_first_result. ','.$result_per_page;
								$result1 =  mysqli_query($link, $select_qry);
								$number_of_results = mysqli_num_rows($result1);
							}
							else
							{
								$sub_id = $_GET['subcat_id']; 
								$select_qry = "select * from product where status = 0 and subcat_id = $sub_id LIMIT ". $this_page_first_result. ','.$result_per_page;
								$result1 =  mysqli_query($link, $select_qry);
								$number_of_results = mysqli_num_rows($result1);
							}

							while ($row1 = mysqli_fetch_assoc($result1)) {
								//$sub_cat_id = $row1['subcat_id'];
								$qty = 1;
							?>
								<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url('Admin/images/product/<?php echo $row1['pro_img'] ?>');width: 80%;">
											<p class="tag"><span class="new">New</span></p>
											<div class="cart">
												<form action="" method="post" class="form-submit">
													<p>
														<input type="hidden" class="pro_id" value="<?= $row1['pro_id']; ?>">
														<input type="hidden" class="pro_name" value="<?= $row1['pro_name']; ?>">
														<input type="hidden" class="price" value="<?= $row1['price']; ?>">
														<input type="hidden" class="pro_img" value="<?= $row1['pro_img']; ?>">
														<input type="hidden" class="umob_no" value="<?= $umobile_no; ?>">
														<input type="hidden" id="qty" value="<?= $qty; ?>">
														<span class="addtocart addItemBtn"><a href=""><i class="icon-shopping-cart"></i></a></span>

														<span><a href="product_detail.php?pro_id=<?php echo $row1['pro_id']; ?>"><i class="icon-eye"></i></a></span>
														<span><a href="wishlist.php"><i class="icon-heart3"></i></a></span>
														<!-- <span><a href=""><i class="icon-bar-chart"></i></a></span>-->
													</p>
												</form>
											</div>
										</div>
										<div class="desc">
											<h3><a href="#"><?php echo $row1['pro_name'] ?></a></h3>
											<p class="price"><span>$<?php echo $row1['price'] ?></span></p>
										</div>
									</div>
								</div>
							<?php } ?>
							</div>
								
						<div class="row">
							<div class="col-md-12">
								<ul class="pagination">
									<?php
										for($page = 1; $page<= $number_of_pages; $page++)
										{
											echo '<li><a href="category.php?page='.$page.'">'. $page. '</a> </li>' ;
										}
									?>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-md-2 col-md-pull-10">
						<div class="sidebar">
							<div class="side">
								<h2>Categories</h2>
								<div class="fancy-collapse-panel">
									<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

										<div class="panel panel-default">
											<?php

											while ($cat_row = mysqli_fetch_assoc($cat_res)) {
												$cat_id = $cat_row['cat_id'];
												$subcat_id = $cat_row['subcat_id'];
											?>
												<div class="panel-heading" role="tab" id="headingOne">
													<h4 class="panel-title">
														<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><?php echo $cat_row['cat_name'] ?></a>
													</h4>
												</div>
												<!-- END CATEGORY PART -->

												<!-- START SUBCATEGORY PART -->

												<!--<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">-->

												<div class="panel-body">
													<?php
													
													$subcat_qry = "select * from subcategories where cat_id = $cat_id";
													$subcat_res = mysqli_query($link, $subcat_qry);
													while ($subcat_row = mysqli_fetch_assoc($subcat_res)) {
														$subcat_name = $subcat_row['subcat_name'];
														$sub_cat_id = $subcat_row['subcat_id'];
													?>
														<ul>
															<li><a href="category.php?subcat_id=<?php echo $sub_cat_id ?>"><?php echo $subcat_name ?></a></li>
														</ul>
													<?php } ?>
												</div>

												<!--</div>-->
											<?php
												//}
											}

											?>
											<!-- END SUBCATEGORY PART -->
										</div>
										<?php //} 
										?>
									</div>
								</div>
							</div>

							<!-- <div class="side">
								<h2>Price Range</h2>
								<form method="post" class="colorlib-form-2">
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="guests">Price from:</label>
												<div class="form-field">
													<i class="icon icon-arrow-down3"></i>
													<select name="people" id="people" class="form-control">
														<option value="#">1</option>
														<option value="#">200</option>
														<option value="#">300</option>
														<option value="#">400</option>
														<option value="#">1000</option>
													</select>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label for="guests">Price to:</label>
												<div class="form-field">
													<i class="icon icon-arrow-down3"></i>
													<select name="people" id="people" class="form-control">
														<option value="#">2000</option>
														<option value="#">4000</option>
														<option value="#">6000</option>
														<option value="#">8000</option>
														<option value="#">10000</option>
													</select>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<div class="side">
								<h2>Color</h2>
								<div class="color-wrap">
									<p class="color-desc">
										<a href="#" class="color color-1"></a>
										<a href="#" class="color color-2"></a>
										<a href="#" class="color color-3"></a>
										<a href="#" class="color color-4"></a>
										<a href="#" class="color color-5"></a>
									</p>
								</div>
							</div>
							<div class="side">
								<h2>Size</h2>
								<div class="size-wrap">
									<p class="size-desc">
										<a href="#" class="size size-1">xs</a>
										<a href="#" class="size size-2">s</a>
										<a href="#" class="size size-3">m</a>
										<a href="#" class="size size-4">l</a>
										<a href="#" class="size size-5">xl</a>
										<a href="#" class="size size-5">xxl</a>
									</p>
								</div>
							</div> -->
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

	<script type="text/javascript">
		$(document).ready(function() {
			$(".addItemBtn").click(function(e) {
				e.preventDefault();
				var $form = $(this).closest(".form-submit");
				var pro_id = $form.find(".pro_id").val();
				var pro_name = $form.find(".pro_name").val();
				var price = $form.find(".price").val();
				var pro_img = $form.find(".pro_img").val();
				var qty = $('#qty').val();
				var umob_no = $form.find(".umob_no").val();

				$.ajax({
					url: 'manage_cart.php',
					method: 'POST',
					data: {
						pro_id: pro_id,
						pro_name: pro_name,
						price: price,
						pro_img: pro_img,
						qty: qty,
						umob_no: umob_no
					},
					success: function(response) {
						$("#message").html(response);
						window.scroll(0, 0);
						//load_cart_item_number();
					}
				});
			});
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
		});
	</script>

</body>

</html>