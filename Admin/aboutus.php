<?php
    session_start();
    error_reporting(0);

    if (!isset($_SESSION["name"])) {
        header("Location:../Login/signin.php");
    } else {

    }
?>

<?php
require_once('../database_config/db.php');
$aboutus_img1 = '';
$aboutus_img2 = '';
$aboutus_img3 = '';+
$aboutus_img4 = '';
$about_img1 = "";
$about_img2 = "";
$about_img3 = "";
$about_img4 = "";
$aboutus_text = "";
$address = "";
$opening_time = "";
$closing_time = "";
$phone_number = "";
$msg = "";

// START INSERT AND UPDATE (INSERT DONE, UPDATE PANDING)
if (isset($_POST['submit'])) {

    $id = mysqli_real_escape_string($link, $_GET['id']);

    $aboutus_text = $_POST['aboutus_text'];
    $target = "images/aboutus/" . basename($_FILES['aboutus_img1']['name']);
    $aboutus_img1 = $_FILES['aboutus_img1']['name'];

    $target = "images/aboutus/" . basename($_FILES['aboutus_img2']['name']);
    $aboutus_img2 = $_FILES['aboutus_img2']['name'];

    $target = "images/aboutus/" . basename($_FILES['aboutus_img3']['name']);
    $aboutus_img3 = $_FILES['aboutus_img3']['name'];

    $target = "images/aboutus/" . basename($_FILES['aboutus_img4']['name']);
    $aboutus_img4 = $_FILES['aboutus_img4']['name'];

    $address = $_POST['address'];
    $opening_time = $_POST['opening_time'];
    $closing_time = $_POST['closing_time'];
    $phone_number = $_POST['phone_number'];

    $select_qry = "select * from aboutus";
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
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $update_qry = "UPDATE `aboutus` SET `aboutus_text`='$aboutus_text',`aboutus_img1`='$aboutus_img1',`aboutus_img2`='$aboutus_img2',`aboutus_img3`='$aboutus_img3',`aboutus_img4`='$aboutus_img4',`address`='$address',`opening_time`='$opening_time',`closing_time`='$closing_time',`phone_number`='$phone_number' WHERE `id` = '$id'";
            $result = mysqli_query($link, $update_qry);
            // for image 1
            if (move_uploaded_file($_FILES['aboutus_img1']['tmp_name'], $target)) {
                $msg = "Image Upload Successfully";
            } else {
                $msg = "There was a problem ..";
            }
            // for image 2
            if (move_uploaded_file($_FILES['aboutus_img2']['tmp_name'], $target)) {
                $msg = "Image Upload Successfully";
            } else {
                $msg = "There was a problem ..";
            }
            // for image 3
            if (move_uploaded_file($_FILES['aboutus_img3']['tmp_name'], $target)) {
                $msg = "Image Upload Successfully";
            } else {
                $msg = "There was a problem ..";
            }
            // for image 4
            if (move_uploaded_file($_FILES['aboutus_img4']['tmp_name'], $target)) {
                $msg = "Image Upload Successfully";
            } else {
                $msg = "There was a problem ..";
            }
        } else {
            $insert_qry = "INSERT INTO `aboutus`(`aboutus_text`, `aboutus_img1`, `aboutus_img2`, `aboutus_img3`, `aboutus_img4`, `address`, `opening_time`, `closing_time`, `phone_number`) VALUES ('$aboutus_text','$aboutus_img1','$aboutus_img2','$aboutus_img3','$aboutus_img4','$address','$opening_time','$closing_time','$phone_number')";
            $result = mysqli_query($link, $insert_qry);
            // for img 1
            if (move_uploaded_file($_FILES['aboutus_img1']['tmp_name'], $target)) {
                $msg = "Image Upload Successfully";
            } else {
                $msg = "There was a problem ..";
            }
            // for img 2
            if (move_uploaded_file($_FILES['aboutus_img2']['tmp_name'], $target)) {
                $msg = "Image Upload Successfully";
            } else {
                $msg = "There was a problem ..";
            }
            // for img 3
            if (move_uploaded_file($_FILES['aboutus_img3']['tmp_name'], $target)) {
                $msg = "Image Upload Successfully";
            } else {
                $msg = "There was a problem ..";
            }
            // for img 4
            if (move_uploaded_file($_FILES['aboutus_img4']['tmp_name'], $target)) {
                $msg = "Image Upload Successfully";
            } else {
                $msg = "There was a problem ..";
            }
        }
        echo $insert_qry;
        //header("Location:aboutus.php");
        die();
    }
}
// END INSERT AND UPDATE

// START STATUS AND DELETE (DONE)
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = mysqli_real_escape_string($link, $_GET['type']);

    /*if ($type == 'status') {
        $operation = mysqli_real_escape_string($link, $_GET['operation']);
        $id = mysqli_real_escape_string($link, $_GET['id']);
        if ($operation == 'active') {
            $status = "0";
        } else {
            $status = "1";
        }
        $update_status_qry = "update aboutus set status ='$status' where staff_id = '$staff_id' ";
        mysqli_query($link, $update_status_qry);
    }*/

    if ($type == 'delete') {
        $id = mysqli_real_escape_string($link, $_GET['id']);
        $delete_qry = "delete from aboutus where id = '$id' ";
        mysqli_query($link, $delete_qry);
    }
}
//  END STATUS AND DELETE

// STRAT EDIT (DONE)
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = mysqli_real_escape_string($link, $_GET['id']);

    $select_qry = "select * from aboutus where id = '$id' ";
    $res = mysqli_query($link, $select_qry);

    $check = mysqli_num_rows($res);

    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $aboutus_img1 = $row['aboutus_img1'];
        $aboutus_img2 = $row['aboutus_img2'];
        $aboutus_img3 = $row['aboutus_img2'];
        $aboutus_img4 = $row['aboutus_img4'];
        $aboutus_text = $row['aboutus_text'];
        $address = $row['address'];
        $opening_time = $row['opening_time'];
        $closing_time = $row['closing_time'];
        $phone_number = $row['phone_number'];
    } else {
        //echo "else check";
        header("Location:aboutus.php");
        die();
    }
}
// END EDIT

$about_qry = "select * from aboutus";
$about_res = mysqli_query($link, $about_qry);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title Page-->
    <title>Online Footwear | aboutus</title>

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
                                    <h2 class="title-1">aboutus Page</h2>
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
                                            <label for="select" class=" form-control-label">Aboutus Text</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="textarea" class="form-control" id="aboutus_text" name="aboutus_text" placeholder="aboutus text" value="<?php echo $aboutus_text ?>">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">aboutus Image1</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="aboutus_img1" accept="image/*" class="form-control-file" value="<?php echo $aboutus_img1; ?>">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">aboutus Image2</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="aboutus_img2" accept="image/*" class="form-control-file" value="<?php echo $aboutus_img2; ?>">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">aboutus Image3</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="aboutus_img3" accept="image/*" class="form-control-file" value="<?php echo $aboutus_img3; ?>">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">aboutus Image1</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="aboutus_img4" accept="image/*" class="form-control-file" value="<?php echo $aboutus_img4; ?>">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Address</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $address ?>">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Opening Time</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="opening_time" class="form-control" value="<?php echo $opening_time ?>" placeholder="Opening Time">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">closing Time</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="closing_time" value="<?php echo $closing_time ?>" placeholder="Closing Time" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Phone Number</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="phone_number" value="<?php echo $phone_number ?>" placeholder="Phone Number" class="form-control">
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
                                    <th>About Us Text</th>
                                    <th>Image 1</th>
                                    <th>Image 2</th>
                                    <th>Image 3</th>
                                    <th>Image 4</th>
                                    <th>Address</th>
                                    <th>Opening Time</th>
                                    <th>Closing Time</th>
                                    <th>Phone Number</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- start fetch data -->
                                <?php
                                while ($row = mysqli_fetch_assoc($about_res)) {
                                ?>

                                    <tr class="tr-shadow">
                                        <td>
                                            <span class="">
                                                <?php echo $row['id'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span>
                                                <?php echo $row['aboutus_text'] ?>
                                            </span>
                                        </td>
                                        <td class="">
                                            <span class="">
                                                <img src="./images/aboutus/<?php echo $row['aboutus_img1'] ?>" height="50px" width="50px">
                                            </span>
                                        </td>
                                        <td class="">
                                            <span class="">
                                                <img src="./images/aboutus/<?php echo $row['aboutus_img2'] ?>" height="50px" width="50px">
                                            </span>
                                        </td>
                                        <td class="">
                                            <span class="">
                                                <img src="./images/aboutus/<?php echo $row['aboutus_img3'] ?>" height="50px" width="50px">
                                            </span>
                                        </td>
                                        <td class="">
                                            <span class="">
                                                <img src="./images/aboutus/<?php echo $row['aboutus_img4'] ?>" height="50px" width="50px">
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['address'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['opening_time'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['closing_time'] ?>
                                            </span>
                                        </td>

                                        <td>
                                            <span class="">
                                                <?php echo $row['phone_number'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <?php
                                                echo "<a href='aboutus.php?id=" . $row['id'] . "'>Edit<a>";

                                                echo "<span class='role admin'><a href='?type=delete&id=" . $row['id'] . "'>Delete</a></span>";
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