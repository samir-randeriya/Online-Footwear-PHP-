<!-- START CHECK SESSION  -->
<?php
    session_start();
    if (!isset($_SESSION["name"])){
		header("Location:../Login/signin.php");
	}
	else{	
	}
?>
<!-- END CHECK SESSION -->

<?php 
	// $msg="";
	// require_once('../database_config/db.php');
    // $name ="";
    // $email ="";
    // $mob_no ="";

	// if(isset($_POST['update']))
	// {
	// 	$name = $_POST['firstname'];
	// 	$email = $_POST['email'];
	// 	$mob_no = $_POST['mobile_no'];
	// 	$userid = $_SESSION["userid"];

	// 	$query = "UPDATE `registration` SET `username`='$name',`email_id`='$email',`mobile_no`='$mob_no' WHERE `userid` = '$userid'";
	// 	$result = mysqli_query($link,$query);

	// 	if($result)
	// 	{
	// 		//header("Location:account.php");
	// 		$msg ="data successfully updated...";
	// 	}
	// 	else
	// 	{
				
	// 	}
	// }
	// $userid = $_SESSION["userid"];
	// $qry = "select * from registration where userid = '$userid' ";
    // $res = mysqli_query($link,$qry);
		
?>

<!DOCTYPE html>
<html lang="en">

<head>
   
    <!-- Title Page-->
    <title>Online Footwear | Account</title>

   <!-- START HEADER LINK PART -->
    <?php
        include("header_link.php");
    ?>
    <!-- END HEADER LINK PART -->

</head>

<body class="animsition">
    <div class="page-wrapper">

    <!-- START HEADER PART -->
    <?php
    include('header.php');
   ?>
   <!-- END HEADER PART -->
    
    <!-- PAGE CONTAINER-->
        <div class="page-container">
         <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        
                     <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Account Page</h2>
                                </div>
                            </div>
                     </div>
                    <br>
                        <!-- START CONTAINER-->                      

                         <!-- <div class="card"> -->
                            <div class="card">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="card-body card-block"> 
                                            
                                            <?php                                                  
                                                  //  while($row = mysqli_fetch_assoc($res)){   
                                             ?> 
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class="form-control-label">First Name</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="cat_name" class="form-control" value="<?php //echo $row['username'];?>" >
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class="form-control-label">Email Address</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="cat_name" class="form-control" value="<?php //echo $row['email_id']; ?>" >
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class="form-control-label">Mobile No</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="cat_name" class="form-control" value="<?php //echo $row['mobile_no']; ?>" >
                                                </div>
                                            </div>
                                            <?php //} ?>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" name="update" class="btn btn-primary btn-sm">
                                                <i class="fa fa-dot-circle-o"></i> Update
                                            </button>
                                            <!-- <button type="reset" name="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-ban"></i> Reset
                                            </button> -->
                                        </div>
                                </form>  
                            </div>
                               
                             </div>

                        <!-- END CONTAINER-->
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2020 Smart Footwear. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         <!-- END MAIN CONTENT-->
        </div>
    <!-- END PAGE CONTAINER-->
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
