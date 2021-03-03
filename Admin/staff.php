<?php
session_start();
if (!isset($_SESSION["name"])) {
    header("Location:../Login/signin.php");
} else {
}
?>

<?php
require_once('../database_config/db.php');

$staff_img = "";
$staff_name = "";
$staff_designation = "";
$staff_insta = "";
$staff_twitter = "";
$staff_facebook = "";

$msg = '';

// START INSERT AND UPDATE (INSERT DONE, UPDATE PANDING)
if (isset($_POST['submit'])) {

    $staff_id = mysqli_real_escape_string($link, $_GET['staff_id']);

    $staff_name = $_POST['staff_name'];
    $target = "images/staff/" . basename($_FILES['staff_img']['name']);
    $staff_img = $_FILES['staff_img']['name'];
    $staff_designation = $_POST['staff_designation'];
    $staff_insta = $_POST['staff_insta'];
    $staff_facebook = $_POST['staff_facebook'];
    $staff_twitter = $_POST['staff_twitter'];

    $select_qry = "select * from staff";
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
        if (isset($_GET['staff_id']) && $_GET['staff_id'] != '') {
            $update_qry = "UPDATE `staff` SET `staff_img`='$staff_img',`staff_name`='$staff_name',`staff_designation`='$staff_designation',`staff_insta`='$staff_insta',`staff_twitter`='$staff_twitter',`staff_facebook`='$staff_facebook',`status`='0' WHERE `staff_id`= '$staff_id'";
            $result = mysqli_query($link, $update_qry);

            if (move_uploaded_file($_FILES['staff_img']['tmp_name'], $target)) {
                $msg = "Image Upload Successfully";
            } else {
                $msg = "There was a problem ..";
            }
        } else {
            $insert_qry = "INSERT INTO `staff`(`staff_img`, `staff_name`, `staff_designation`, `staff_insta`, `staff_twitter`, `staff_facebook`, `status`) VALUES ('$staff_img','$staff_name','$staff_designation','$staff_insta','$staff_twitter','$staff_facebook','0')";
            $result = mysqli_query($link, $insert_qry);

            if (move_uploaded_file($_FILES['staff_img']['tmp_name'], $target)) {
                $msg = "Image Upload Successfully";
            } else {
                $msg = "There was a problem ..";
            }
        }
        //echo $insert_qry;
        header("Location:staff.php");
        die();
    }
}
// END INSERT AND UPDATE

// START STATUS AND DELETE (DONE)
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = mysqli_real_escape_string($link, $_GET['type']);

    if ($type == 'status') {
        $operation = mysqli_real_escape_string($link, $_GET['operation']);
        $staff_id = mysqli_real_escape_string($link, $_GET['staff_id']);
        if ($operation == 'active') {
            $status = "0";
        } else {
            $status = "1";
        }
        $update_status_qry = "update staff set status ='$status' where staff_id = '$staff_id' ";
        mysqli_query($link, $update_status_qry);
    }

    if ($type == 'delete') {
        $staff_id = mysqli_real_escape_string($link, $_GET['staff_id']);
        $delete_qry = "delete from staff where staff_id = '$staff_id' ";
        mysqli_query($link, $delete_qry);
    }
}
//  END STATUS AND DELETE

// STRAT EDIT (DONE)
if (isset($_GET['staff_id']) && $_GET['staff_id'] != '') {
    $staff_id = mysqli_real_escape_string($link, $_GET['staff_id']);

    $select_qry = "select * from staff where staff_id = '$staff_id' ";
    $res = mysqli_query($link, $select_qry);

    $check = mysqli_num_rows($res);

    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $staff_name = $row['staff_name'];
        $staff_img = $row['staff_img'];
        $staff_designation = $row['staff_designation'];
        $staff_insta = $row['staff_insta'];
        $staff_twitter = $row['staff_twitter'];
        $staff_facebook = $row['staff_facebook'];
    } else {
        //echo "else check";
        header("Location:staff.php");
        die();
    }
}
// END EDIT

$staff_qry = "select * from staff";
$staff_res = mysqli_query($link, $staff_qry);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title Page-->
    <title>Online Footwear | staff</title>

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
                                    <h2 class="title-1">staff Page</h2>
                                </div>
                            </div>
                        </div>
                        <br>
                        <!-- START CONTAINER-->

                        <div class="card">
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Staff Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="staff_img" accept="image/*" class="form-control-file" value="<?php echo $staff_img; ?>">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">staff Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" class="form-control" id="staff_name" name="staff_name" placeholder="Staff Name" value="<?php echo $staff_name ?>">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Staff designation</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="staff_designation" class="form-control" value="<?php echo $staff_designation ?>" placeholder="staff designation">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Staff Instagram</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" style="height:150;padding-bottom: 100;" name="staff_insta" value="<?php echo $staff_insta ?>" placeholder="staff instagram" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Staff Twitter</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" style="height:150;padding-bottom: 100;" name="staff_twitter" value="<?php echo $staff_twitter ?>" placeholder="Staff twitter" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Staff facebook</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="staff_facebook" value="<?php echo $staff_facebook ?>" name="staff_facebook" placeholder="staff facebook" class="form-control">
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
                            </div>
                            <?php echo $msg; ?>
                        </div>

                        </form>
                    </div>

                    <!-- END CONTAINER-->

                    <!-- START DATA TABLE -->
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Image</th>
                                    <th>Staff Name</th>
                                    <th>Staff Designation</th>
                                    <th>Staff Instagram</th>
                                    <th>Staff Twitter</th>
                                    <th>Staff Facebook</th>
                                    <th>status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- start fetch data -->
                                <?php
                                while ($row = mysqli_fetch_assoc($staff_res)) {
                                ?>

                                    <tr class="tr-shadow">
                                        <td>
                                            <span class="">
                                                <?php echo $row['staff_id'] ?>
                                            </span>
                                        </td>
                                        <td class="">
                                            <span class="">
                                                <img src="./images/staff/<?php echo $row['staff_img'] ?>" height="50px" width="50px">
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['staff_name'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['staff_designation'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['staff_insta'] ?>
                                            </span>
                                        </td>

                                        <td>
                                            <span class="">
                                                <?php echo $row['staff_twitter'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['staff_facebook'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php
                                                if ($row['status'] == 0) {
                                                    echo "<a href='?type=status&operation=deactive&staff_id=" . $row['staff_id'] . "'>Active</a>";
                                                } else {
                                                    echo "<a href='?type=status&operation=active&staff_id=" . $row['staff_id'] . "'>Deactive</a>";
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <?php
                                                echo "<a href='staff.php?staff_id=" . $row['staff_id'] . "'>Edit<a>";

                                                echo "<span class='role admin'><a href='?type=delete&staff_id=" . $row['staff_id'] . "'>Delete</a></span>";
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
                                <p>Copyright © 2020 Online Footwear. All rights reserved.</p>
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