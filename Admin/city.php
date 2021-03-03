<?php
session_start();
if (!isset($_SESSION["name"])) {
    header("Location:../Login/signin.php");
} else {
}
?>

<?php
require_once('../database_config/db.php');

$msg = '';
$state_name = "";
$city_name = "";

// START INSERT AND UPDATE (INSERT DONE, UPDATE PANDING)
if (isset($_POST['submit'])) {

    $city_id = mysqli_real_escape_string($link, $_GET['city_id']);
    $country_id = $_POST['country_id'];
    $state_id = $_POST['state_id'];
    $city_name = $_POST['city_name'];

    $select_qry = "select * from city";
    $res = mysqli_query($link, $select_qry);

    //$check = mysqli_num_rows($res);

    //  if(mysqli_num_rows($res) > 0){
    //         // echo $_GET['subcat_id'];
    //         if(isset($_GET['subcat_id']) && $_GET['subcat_id']!=''){
    //             $getData = mysqli_fetch_assoc($res);

    //             if($subcat_id == $getData['subcat_id']){
    //                $msg = "Not Exist";
    //             }else{
    //                 $msg = "Subcategories Already Exist...";
    //             }
    //         }else{
    //             $msg = "Subcategories Already Exist...";
    //        }            
    //  }else{
    //      $msg ="insert";
    //  }

    // echo $select_qry;

    if ($msg == '') {
        echo "if msg..";
        if (isset($_GET['city_id']) && $_GET['city_id'] != '') {
            $update_qry = "update city set country_id= '$country_id', state_id = '$state_id', city_name ='$city_name', `status`='0' WHERE city_id = '$city_id' ";
            $result = mysqli_query($link, $update_qry);
        } else {
            $insert_qry = "INSERT INTO `city`(`country_id`,`state_id`, `city_name`, `status`) VALUES ('$country_id','$state_id', '$city_name', '0')";
            $result = mysqli_query($link, $insert_qry);
        }
        //echo $update_qry;
        header("Location:city.php");
        die();
    }
}
// END INSERT AND UPDATE

// START RESET BUTTON
if (isset($_POST['reset'])) {
    $country_name = '';
    $state_name = '';
    $city_name = '';
}
// END RESET BUTTON 

// START STATUS AND DELETE (DONE)
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = mysqli_real_escape_string($link, $_GET['type']);

    if ($type == 'status') {
        $operation = mysqli_real_escape_string($link, $_GET['operation']);
        $city_id = mysqli_real_escape_string($link, $_GET['city_id']);
        if ($operation == 'active') {
            $status = "0";
        } else {
            $status = "1";
        }
        $update_status_qry = "update city set status ='$status' where city_id = '$city_id' ";
        mysqli_query($link, $update_status_qry);
    }

    if ($type == 'delete') {
        $city_id = mysqli_real_escape_string($link, $_GET['city_id']);
        $delete_qry = "delete from city where city_id = '$city_id' ";
        mysqli_query($link, $delete_qry);
    }
    header("Location:city.php");
}
//  END STATUS AND DELETE

// STRAT EDIT (DONE)
if (isset($_GET['city_id']) && $_GET['city_id'] != '') {
    $city_id = mysqli_real_escape_string($link, $_GET['city_id']);

    $select_qry = "select * from city where city_id = '$city_id' ";
    $res = mysqli_query($link, $select_qry);

    $check = mysqli_num_rows($res);

    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $country_name = $row['country_id'];
        $state_name = $row['state_id'];
        $city_name = $row['city_name'];
    } else {
        header("Location:city.php");
        die();
    }
}
// END EDIT
//paging code
$recoed_per_page = 5;
$page = '';
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
}
$start_from = ($page - 1) * $recoed_per_page;
$pro_qry = "select country.country_name,state.state_name,city.* from city join country join state on city.country_id = country.country_id and city.state_id = state.state_id where city.city_id order by city.city_id asc LIMIT $start_from,$recoed_per_page";
$pro_res = mysqli_query($link, $pro_qry);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title Page-->
    <title>Online Footwear | City</title>

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
                                    <h2 class="title-1">City Page</h2>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- START CONTAINER-->

                        <div class="card">
                            <div class="card-body card-block">
                                <form action="" method="post" class="form-horizontal">

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Country Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" id="country_id" name="country_id" placeholder="select country" onchange="get_state()">
                                                <option value="">Select Country</option>
                                                <?php
                                                $res = mysqli_query($link, "select * from country where status = '0' order by country_id ");
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    if ($row['country_id'] == $country_name) {
                                                        echo "<option value=" . $row['country_id'] . " selected>" . $row['country_name'] . "
                                                                    </option>";
                                                    } else {
                                                        echo "<option value=" . $row['country_id'] . ">" . $row['country_name'] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">State Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" id="state_id" name="state_id" placeholder="select state">
                                                <option value="">Select State</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- START AJAX FUNCTION FOR Subcategories -->
                                    <script>
                                        function get_state(state_id) {
                                            var country_id = $('#country_id').val();
                                            //alert(country_id);
                                            $.ajax({
                                                url: 'get_state.php',
                                                type: 'post',
                                                data: 'country_id=' + country_id + "&state_id=" + state_id,
                                                success: function(result) {
                                                    $('#state_id').html(result);
                                                }
                                            });
                                        }
                                    </script>
                                    <!-- END AJAX FUNCTION FOR Subcategories -->

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">City Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="city_name" value="<?php echo $city_name ?>" name="city_name" placeholder="City Name" class="form-control">
                                        </div>
                                    </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm" name="submit">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm" name="reset">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                                <?php echo $msg; ?>
                            </div>
                        </div>

                        </form>
                    </div>

                    <!-- END CONTAINER-->

                    <!-- pagination part start -->

                    <div class="row" style="float: right;">
                        <div class="col-md-12">
                            <ul class="pagination">
                                <?php
                                // display the links to the pages 
                                $page_query = "select country.country_name,state.state_name,city.* from city join country join state on city.country_id = country.country_id and city.state_id = state.state_id where city.city_id order by city.city_id desc";
                                $page_result = mysqli_query($link, $page_query);
                                $total_records = mysqli_num_rows($page_result);
                                $total_pages = ceil($total_records / $recoed_per_page);
                                for ($page = 1; $page <= $total_pages; $page++) {
                                ?>
                                    <li class="active"><a href="city.php?page=<?= $page; ?>"><?= $page ?></a></li>
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
                                    <th>Country Name</th>
                                    <th>State Name</th>
                                    <th>City Name</th>
                                    <th>status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- start fetch data -->
                                <?php
                                while ($row = mysqli_fetch_assoc($pro_res)) {
                                ?>

                                    <tr class="tr-shadow">
                                        <td>
                                            <span class="">
                                                <?php echo $row['city_id'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['country_name'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['state_name'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['city_name'] ?>
                                            </span>
                                        </td>

                                        <td>
                                            <span class="">
                                                <?php
                                                if ($row['status'] == 0) {
                                                    echo "<a href='?type=status&operation=deactive&city_id=" . $row['city_id'] . "'>Active</a>";
                                                } else {
                                                    echo "<a href='?type=status&operation=active&city_id=" . $row['city_id'] . "'>Deactive</a>";
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <?php
                                                echo "<a href='city.php?city_id=" . $row['city_id'] . "'>Edit<a>";

                                                echo "<span class='role admin'><a href='?type=delete&city_id=" . $row['city_id'] . "'>Delete</a></span>";
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

<!-- START EDIT CLICK COUNTRY THEN DISPLAY STATE -->
<script>
    <?php if (isset($_GET['city_id'])) { ?>
        get_state('<?php echo $state_name ?>');
    <?php } ?>
</script>
<!-- END EDIT CLICK COUNTRY THEN DISPLAY STATE -->

</html>
<!-- end document-->