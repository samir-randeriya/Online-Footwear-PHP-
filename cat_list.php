								<div class="panel panel-default">
									 <?php
									 	if(mysqli_num_rows($cat_res) > 0){
											 while($row = mysqli_fetch_assoc($cat_res)){	
												$cat_id = $row['cat_id'];
												//fetch subcategories
												$subcat_qry = "select * from subcategories where status = '0' and cat_id = $cat_id";
												$subcat_res = mysqli_query($link, $subcat_qry);								  
												if(mysqli_num_rows($subcat_res) > 0){
													while($row1 = mysqli_fetch_assoc($subcat_res)){
									 ?>
			                         <div class="panel-heading" role="tab" id="headingTwo">
			                             <h4 class="panel-title">
			                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												<?= $row['cat_name']?>
			                                 </a>
			                             </h4>
			                         </div>
									 <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
			                             <div class="panel-body">
			                                 <ul>
			                                 	<li><a href="#"><?= $row1['subcat_name']?></a></li>
			                                 	<!-- <li><a href="#">T-Shirt</a></li>
			                                 	<li><a href="#">Jacket</a></li>
			                                 	<li><a href="#">Shoes</a></li> -->
			                                 </ul>
			                             </div>
			                         </div>
									 <?php
									 		 }//While Close Subcategories
										 }//If Close Subategories
									  }//While Close Categories
									}//If Close Categories
									?>			                        
								</div>
		
	<!-- START HOME SLIDER AFTER DIV -->
		<div id="colorlib-featured-product">
			<div class="container">
				<div class="row">
					<?php
					$sql = 'SELECT * from product_display';
					$stmt = $pdo->query($sql);
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach ($rows as $row) {
					?>
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-12">
									<a href="" class="f-product-2" style="background-image: url(<?= $row['product_img'] ?>);">
										<div class="desc">
											<h2>Shoes <br>for <br><?= $row['product_category'] ?></h2>
										</div>
									</a>
								</div>
							</div>
						</div>
					<?php
					}
					?>
				</div>
			</div>
		</div>
		<!-- END HOME SLIDER AFTER DIV -->

					<!-- START CATEGORY PAGE PAGINATION -->
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
					<!-- END CATEGORY PAGE PAGINATION -->