<?php
session_start();
if (!isset($_SESSION["name"])) {
    header("Location:../Login/signin.php");
} else {
}
?>

<?php
require_once('../database_config/db.php');

// START DELETE (DONE) 
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = mysqli_real_escape_string($link, $_GET['type']);

    if ($type == 'delete') {
        $contact_id = mysqli_real_escape_string($link, $_GET['contact_id']);

        $delete_qry = "delete from contact_us where contact_id = '$contact_id' ";
        $delete_res = mysqli_query($link, $delete_qry);

        if ($delete_res) {
            header("Location:contact_us.php");
            die();
        } else {
        }
    }
}
//  END DELETE

//  paging code
    $recoed_per_page = 10;
    $page = '';
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }
    $start_from = ($page - 1) * $recoed_per_page;

$cont_query = "select * from contact_us order by contact_id asc LIMIT $start_from,$recoed_per_page";
$cont_result = mysqli_query($link, $cont_query);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title Page-->
    <title>Online Footwear | Contact</title>

    <!-- START HEADER LINK PART -->
    <?php
    include("header_link.php");
    ?>
    <!-- END HEADER LINK PART -->
    <style>
        .pagination a {
            color: black;
            float: right;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 15px;
            border: 3px solid #ddd;
            /* Gray #ddd*/
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            border-top-right-radius: 10px;
            margin: 0 4px;
            font-size: 18px;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border-radius: 15px;
        }

        .pagination a:hover:not(.active) {
            background-color: #808080;
            color: white;
        }
    </style>

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
                        <!-- pagination part start -->

                        <div class="row" style="float: right;">
                            <div class="col-md-12">
                                <ul class="pagination">
                                    <?php
                                    // display the links to the pages 
                                    $page_query = "select * from contact_us order by contact_id desc";
                                    $page_result = mysqli_query($link, $page_query);
                                    $total_records = mysqli_num_rows($page_result);
                                    $total_pages = ceil($total_records / $recoed_per_page);
                                    for ($page = 1; $page <= $total_pages; $page++) {
                                    ?>
                                        <li class="active"><a href="contact_us.php?page=<?= $page; ?>"><?= $page ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div><br>
                        <!-- pagination part end -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Contact Page</h2>
                                </div>
                            </div>
                        </div>
                        <br>

                        <!-- START DATA TABLE -->
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email Id</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- start fetch data -->
                                    <?php
                                    while ($row = mysqli_fetch_assoc($cont_result)) {
                                    ?>

                                        <tr class="tr-shadow">
                                            <td>
                                                <span class="">
                                                    <?php echo $row['contact_id'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="">
                                                    <?php echo $row['first_name'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="">
                                                    <?php echo $row['last_name'] ?>
                                                </span>
                                            </td>
                                            <td class="">
                                                <span class="">
                                                    <?php echo $row['email'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="">
                                                    <?php echo $row['subject'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="">
                                                    <?php echo $row['message'] ?>
                                                </span>
                                            </td>

                                            <td>
                                                <div class="table-data-feature">
                                                    <?php
                                                    //echo "<a href='?type=delete&contact_id=".$row['contact_id']."'>Delete</a>";
                                                    echo "<span class='role admin'><a href='?type=delete&contact_id=" . $row['contact_id'] . "' style='color:#fff;'>Delete</a></span>";
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <!-- End Fetch Data  -->

                                    <tr class="spacer"></tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE -->

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