<?php
session_start();
if (!isset($_SESSION["name"])) {
    header("Location:../Login/signin.php");
} else {
}
?>

<?php
require_once('../database_config/db.php');
$msg = "";
$slider_id = '';
$slider_img = '';
$slider_head = '';
$slider_desc = '';

if (isset($_POST['upload'])) {
    $slider_id = mysqli_real_escape_string($link, $_GET['slider_id']);
    $slider_head = $_POST['slider_head'];
    $slider_desc = $_POST['slider_desc'];

    $select_qry = "select * from home_slider ";
    $res = mysqli_query($link, $select_qry);

    $check = mysqli_num_rows($res);

    /*if($check > 0){
            if(isset($_GET['image_id']) && $_GET['image_id']!=''){
                $getData = mysqli_fetch_assoc($res);

                if($image_id == $getData['image_id']){

                }else{
                    $msg = "Images Already Exist...";
                }
            }else{
                $msg = "images Already Exist...";
            }    
        }*/
    if ($msg == '') {

        if (isset($_GET['slider_id']) && $_GET['slider_id'] != '') {
            $target = "images/home_slider/" . basename($_FILES['uploadfile']['name']);
            $filename = $_FILES["uploadfile"]["name"];
            $update_qry = "UPDATE `home_slider` SET `slider_img`='$filename',`slider_head`='$slider_head',`slider_desc`='$slider_desc' WHERE `slider_id` =$slider_id";
            $result = mysqli_query($link, $update_qry);
            if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            } else {
                $msg = "Failed to upload image";
            }
        } else {
            $target = "images/home_slider/" . basename($_FILES['uploadfile']['name']);
            $filename = $_FILES["uploadfile"]["name"];
            $insert_qry =  "INSERT INTO `home_slider`( `slider_img`, `slider_head`, `slider_desc`) VALUES ('$filename','$slider_head','$slider_desc')";
            $result = mysqli_query($link, $insert_qry);
            if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            } else {
                $msg = "Failed to upload image";
            }
        }
        header("Location:home_slider.php");
        die();
    }
}

// START EDIT 
if (isset($_GET['slider_id']) && $_GET['slider_id'] != '') {
    $slider_id = mysqli_real_escape_string($link, $_GET['slider_id']);
    

    $select_qry = "select * from home_slider where slider_id = '$slider_id' ";
    $res = mysqli_query($link, $select_qry);

    $check = mysqli_num_rows($res);

    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $slider_img = $row['slider_img'];
        $slider_head = $row['slider_head'];
        $slider_desc = $row['slider_desc'];
    } else {
        header("Location:home_slider.php");
        die();
    }
}
// END EDIT

// START RESET BUTTON
if (isset($_POST['reset'])) {
    $uploadfile = '';
}
// END RESET BUTTON

// START DELETE (DONE) 
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = mysqli_real_escape_string($link, $_GET['type']);

    if ($type == 'delete') {
        $image_id = mysqli_real_escape_string($link, $_GET['slider_id']);
        $delete_qry = "delete from home_slider where slider_id = '$slider_id' ";
        mysqli_query($link, $delete_qry);
    }
    header("Location:home_slider.php");
}
//  END DELETE

$home_slider_query = "select * from home_slider order by slider_id asc";
$home_slider_result = mysqli_query($link, $home_slider_query);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title Page-->
    <title>Online Footwear | Home Slider</title>

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
                                    <h2 class="title-1">Home Image Slider Information</h2>
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
                                            <label for="text-input" class="form-control-label">Slider ID</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="slider_id" placeholder="Slider ID" disabled class="form-control" value="<?php echo $slider_id ?>">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class="form-control-label">Image Slider</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="uploadfile" class="form-control-file">
                                            <!-- value="<?php echo $image_slider ?>" -->
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Slider header</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="slider_head" value="<?php echo $slider_head ?>" name="slider_head" placeholder="slider header" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Slider description</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="slider_desc" value="<?php echo $slider_desc ?>" name="slider_desc" placeholder="slider description" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" name="upload" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Upload
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
                                    <th>Images</th>
                                    <th>header</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                <!-- start fetch data -->
                                <?php
                                while ($row = mysqli_fetch_assoc($home_slider_result)) {
                                ?>

                                    <tr class="tr-shadow">
                                        <td>
                                            <span class="">
                                                <?php echo $row['slider_id'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <img src="./images/home_slider/<?php echo $row['slider_img'] ?>" height="50px" width="50px">
                                                <!-- <?php echo $row['image_slider'] ?> -->
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['slider_head'] ?>
                                            </span>
                                        </td>
                                
                                        <td>
                                            <div class="table-data-feature">
                                                <?php
                                                echo "<a href='home_slider.php?slider_id=" . $row['slider_id'] . "'>Edit<a>&nbsp;&nbsp;&nbsp;&nbsp;";
                                                echo "<a href='?type=delete&slider_id=" . $row['slider_id'] . "'>Delete</a>";
                                                // <span class='role admin'></span> style='color:#fff;'
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