<?php
session_start();
if (!isset($_SESSION["name"])) {
    header("Location:../Login/signin.php");
} else {
}
?>

<?php

require_once('../database_config/db.php');

// START STATUS AND DELETE (DONE)
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = mysqli_real_escape_string($link, $_GET['type']);

    if ($type == 'status') {
        $operation = mysqli_real_escape_string($link, $_GET['operation']);
        $userid = mysqli_real_escape_string($link, $_GET['userid']);
        if ($operation == 'user') {
            $status = "0";
        } else {
            $status = "1";
        }
        $update_status_qry = "update registration set status ='$status' where userid = '$userid' ";
        mysqli_query($link, $update_status_qry);
    }

    if ($type == 'delete') {
        $userid = mysqli_real_escape_string($link, $_GET['userid']);

        $delete_qry = "delete from registration where userid = '$userid' ";
        mysqli_query($link, $delete_qry);
    }
    header("Location:registration.php");
}
//  END STATUS AND DELETE
//paging code
$recoed_per_page = 10;
$page = '';
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $recoed_per_page;

$reg_query = "select * from registration order by userid asc LIMIT $start_from,$recoed_per_page";
$reg_res = mysqli_query($link, $reg_query);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title Page-->
    <title>Online Footwear | Registration</title>

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
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Registration Page</h2>
                                </div>
                            </div>
                        </div>
                        <br>

                        <!-- pagination part start -->
                            <div class="row" style="float: right;">
                                <div class="col-md-12">
                                    <ul class="pagination">
                                        <?php
                                        // display the links to the pages 
                                        $page_query = "select * from registration order by userid desc";
                                        $page_result = mysqli_query($link, $page_query);
                                        $total_records = mysqli_num_rows($page_result);
                                        $total_pages = ceil($total_records / $recoed_per_page);
                                        for ($page = 1; $page <= $total_pages; $page++) {
                                        ?>
                                            <li class="active"><a href="registration.php?page=<?= $page; ?>"><?= $page ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div><br>
                        <!-- pagination part end -->

                        <!-- START DATA TABLE -->
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>User Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email Id</th>
                                        <th>Password</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <!-- start fetch data -->
                                    <?php
                                    while ($row = mysqli_fetch_assoc($reg_res)) {
                                    ?>

                                        <tr class="tr-shadow">
                                            <td>
                                                <span class="">
                                                    <?php echo $row['userid'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="">
                                                    <?php echo $row['username'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="">
                                                    <?php echo $row['mobile_no'] ?>
                                                </span>
                                            </td>
                                            <td class="">
                                                <span class="">
                                                    <?php echo $row['email_id'] ?>
                                                </span>
                                            </td>
                                            <td>
                                                <span class="">
                                                    <?php echo $row['password'] ?>
                                                </span>
                                            </td>

                                            <td>
                                                <span class="">
                                                    <?php
                                                    if ($row['status'] == 0) {
                                                        echo "<a href='?type=status&operation=admin&userid=" . $row['userid'] . "'>User</a>";
                                                    } else {
                                                        echo "<a href='?type=status&operation=user&userid=" . $row['userid'] . "'>Admin</a>";
                                                    }
                                                    ?>
                                                </span>
                                            </td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <?php
                                                    echo "<span class='role admin'><a href='?type=delete&userid=" . $row['userid'] . "' style='color:#fff;'>Delete</a></span>";
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