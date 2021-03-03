<!-- START CHECK SESSION  -->
<?php
session_start();
if (!isset($_SESSION["name"])) {
    header("Location:../Login/signin.php");
} else {
}
?>
<!-- END CHECK SESSION -->

<?php
require_once('../database_config/db.php');
$country_name = '';
$msg = '';

// START INSERT AND UPDATE (INSERT DONE, UPDATE PANDING)
if (isset($_POST['submit'])) {

    $country_id = mysqli_real_escape_string($link, $_GET['country_id']);
    $country_name = $_POST['country_name'];

    $select_qry = "select * from country where country_name = '$country_name' ";
    $res = mysqli_query($link, $select_qry);

    $check = mysqli_num_rows($res);

    if ($check > 0) {
        if (isset($_GET['country_id']) && $_GET['country_id'] != '') {
            $getData = mysqli_fetch_assoc($res);

            if ($country_id == $getData['country_id']) {
            } else {
                $msg = "Country Already Exist...";
            }
        } else {
            $msg = "Country Already Exist...";
        }
    }
    if ($msg == '') {

        if (isset($_GET['country_id']) && $_GET['country_id'] != '') {
            $update_qry = "update `country` set country_name = '$country_name' where country_id = '$country_id' ";
            $result = mysqli_query($link, $update_qry);
        } else {

            $insert_qry = "INSERT INTO `country`(`country_name`, `status`) VALUES ('$country_name', '0')";
            $result = mysqli_query($link, $insert_qry);
        }
        header("Location:country.php");
        die();
    }
}
// END INSERT AND UPDATE

// START RESET BUTTON
if (isset($_POST['reset'])) {
    $country_name = '';
}
// END RESET BUTTON

// STRAT EDIT (DONE)
if (isset($_GET['country_id']) && $_GET['country_id'] != '') {
    $country_id = mysqli_real_escape_string($link, $_GET['country_id']);

    $select_qry = "select * from country where country_id = '$country_id' ";
    $res = mysqli_query($link, $select_qry);

    $check = mysqli_num_rows($res);

    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $country_name = $row['country_name'];
    } else {
        header("Location:country.php");
        die();
    }
}
// END EDIT

// START STATUS AND DELETE (DONE) 
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = mysqli_real_escape_string($link, $_GET['type']);

    if ($type == 'status') {
        $operation = mysqli_real_escape_string($link, $_GET['operation']);
        $country_id = mysqli_real_escape_string($link, $_GET['country_id']);
        if ($operation == 'active') {
            $status = "0";
        } else {
            $status = "1";
        }
        $update_status_qry = "update country set status ='$status' where country_id = '$country_id' ";
        mysqli_query($link, $update_status_qry);
    }

    if ($type == 'delete') {
        $country_id = mysqli_real_escape_string($link, $_GET['country_id']);
        $delete_qry = "delete from country where country_id = '$country_id' ";
        mysqli_query($link, $delete_qry);
    }
    header("Location:country.php");
}
//  END STATUS AND DELETE

$qry = "select * from country order by country_id asc";
$res = mysqli_query($link, $qry);
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title Page-->
    <title>Online Footwear | Country</title>

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
                                    <h2 class="title-1">Country Page</h2>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- START CONTAINER-->

                        <div class="card">
                            <!-- <div class="card"> -->
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="card-body card-block">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">Country Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="country_name" placeholder="country Name" class="form-control" value="<?php echo $country_name ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                    <button type="reset" name="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> Reset
                                    </button>
                                    <?php echo $msg ?>
                                </div>
                            </form>
                        </div>

                    </div>

                    <!-- END CONTAINER-->

                    <!-- START DATA TABLE -->
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Country Name</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- start fetch data -->
                                <?php
                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <tr class="tr-shadow">
                                        <td>
                                            <span class="">
                                                <?php echo $row['country_id'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['country_name'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php
                                                if ($row['status'] == 0) {
                                                    echo "<a href='?type=status&operation=deactive&country_id=" . $row['country_id'] . "'>Active</a>";
                                                } else {
                                                    echo "<a href='?type=status&operation=active&country_id=" . $row['country_id'] . "'>Deactive</a></span>";
                                                }
                                                ?>
                                            </span>
                                        </td>

                                        <td>
                                            <div class="table-data-feature">
                                                <?php
                                                echo "<a href='country.php?country_id=" . $row['country_id'] . "'>Edit<a>";

                                                echo "<span class='role admin'><a href='?type=delete&country_id=" . $row['country_id'] . "'>Delete</a></span>";
                                                ?>
                                                <!-- href='category.php?cat_id=".$row['cat_id']."' class='item' data-toggle='tooltip' data-placement='top' title='Edit'>
                                                                <i class='zmdi zmdi-edit'></i> -->
                                                <!-- <a href="" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <i class='zmdi zmdi-delete'></i></a> -->
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

                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
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