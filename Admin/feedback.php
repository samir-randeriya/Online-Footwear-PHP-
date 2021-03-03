<?php
    session_start();
    if (!isset($_SESSION["name"])){
		header("Location:../Login/signin.php");
	}
	else{
	
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
 
    <!-- Title Page-->
    <title>Online Footwear | Feedback</title>

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
                                    <h2 class="title-1">Feedback Page</h2>
                                </div>
                            </div>
                     </div>
                    <br>
                       
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