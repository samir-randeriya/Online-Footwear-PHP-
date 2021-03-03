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

    $subcat_name = '';
    $pro_name = "";
    $pro_img = '';
    $description = '';
    $price = '';
    $qty = '';

    $msg = '';

    // START INSERT AND UPDATE (INSERT DONE, UPDATE PANDING)
    if (isset($_POST['submit'])) {

        $pro_id = mysqli_real_escape_string($link, $_GET['pro_id']);
        $cat_id = $_POST['cat_id'];
        $subcat_id = $_POST['subcat_id'];
        $pro_name = $_POST['pro_name'];
        $target = "images/product/" . basename($_FILES['pro_img']['name']);
        $pro_img = $_FILES['pro_img']['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $qty = $_POST['qty'];

        $select_qry = "select * from product";
        $res = mysqli_query($link, $select_qry);

        // echo $select_qry;
        if ($msg == '') {
            //echo "if msg..";
            if (isset($_GET['pro_id']) && $_GET['pro_id'] != '') {
                $update_qry = "update product set cat_id= '$cat_id', subcat_id = '$subcat_id', pro_name = '$pro_name', pro_img = '$pro_img', description = '$description', price = '$price',
                    qty ='$qty', `status`='0' WHERE pro_id = '$pro_id' ";
                $result = mysqli_query($link, $update_qry);

                if (move_uploaded_file($_FILES['pro_img']['tmp_name'], $target)) {
                    $msg = "Image Upload Successfully";
                } else {
                    $msg = "There was a problem ..";
                }
            } else {
                $insert_qry = "INSERT INTO `product`(`cat_id`,`subcat_id`,`pro_name`,`pro_img`,`description`,`price`,`qty`, `status`) VALUES ('$cat_id','$subcat_id', '$pro_name','$pro_img', '$description', '$price', '$qty', '0')";
                $result = mysqli_query($link, $insert_qry);

                if (move_uploaded_file($_FILES['pro_img']['tmp_name'], $target)) {
                    $msg = "Image Upload Successfully";
                } else {
                    $msg = "There was a problem ..";
                }
            }
            //echo $insert_qry;
            header("Location:product.php");
            die();
        }
    }
    // END INSERT AND UPDATE

    // START STATUS AND DELETE (DONE)
    if (isset($_GET['type']) && $_GET['type'] != '') {
        $type = mysqli_real_escape_string($link, $_GET['type']);

        if ($type == 'status') {
            $operation = mysqli_real_escape_string($link, $_GET['operation']);
            $pro_id = mysqli_real_escape_string($link, $_GET['pro_id']);
            if ($operation == 'active') {
                $status = "0";
            } else {
                $status = "1";
            }
            $update_status_qry = "update product set status ='$status' where pro_id = '$pro_id' ";
            mysqli_query($link, $update_status_qry);
        }

        if ($type == 'delete') {
            $pro_id = mysqli_real_escape_string($link, $_GET['pro_id']);
            $delete_qry = "delete from product where pro_id = '$pro_id' ";
            mysqli_query($link, $delete_qry);
        }
    }
    //  END STATUS AND DELETE

    // STRAT EDIT (DONE)
    if (isset($_GET['pro_id']) && $_GET['pro_id'] != '') {
        $pro_id = mysqli_real_escape_string($link, $_GET['pro_id']);

        $select_qry = "select * from product where pro_id = '$pro_id' ";
        $res = mysqli_query($link, $select_qry);

        $check = mysqli_num_rows($res);

        if ($check > 0) {
            $row = mysqli_fetch_assoc($res);
            $cat_name = $row['cat_id'];
            $subcat_name = $row['subcat_id'];
            $pro_name = $row['pro_name'];
            $pro_img = $row['pro_img'];
            $description = $row['description'];
            $price = $row['price'];
            $qty = $row['qty'];
        } else {
            //echo "else check";
            header("Location:product.php");
            die();
        }
    }
    // END EDIT

    // paging code  
    $recoed_per_page = 5;
    $page = '';
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }
    $start_from = ($page - 1) * $recoed_per_page;

    $pro_qry = "select categories.cat_name,subcategories.subcat_name,product.* from product join categories join subcategories on product.cat_id = categories.cat_id and product.subcat_id = subcategories.subcat_id where product.pro_id order by product.pro_id asc LIMIT $start_from,$recoed_per_page";
    $pro_res = mysqli_query($link, $pro_qry);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Title Page-->
    <title>Online Footwear | Product</title>

    <!-- START HEADER LINK PART -->
    <?php
    include("header_link.php");
    ?>
    <!-- END HEADER LINK PART -->

    <!-- pagination style start -->

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
    <!-- pagination start end -->

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
                                    <h2 class="title-1">Product Page</h2>
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
                                            <label for="select" class=" form-control-label">Category Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" id="cat_id" name="cat_id" placeholder="select category" onchange="get_subcategories('')">
                                                <option value="">Select Categories</option>
                                                <?php
                                                $res = mysqli_query($link, "select * from categories where status = '0' order by cat_id ");
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    if ($row['cat_id'] == $cat_name) {
                                                        echo "<option value=" . $row['cat_id'] . " selected>" . $row['cat_name'] . "
                                                                    </option>";
                                                    } else {
                                                        echo "<option value=" . $row['cat_id'] . ">" . $row['cat_name'] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select" class=" form-control-label">Subcategory Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select class="form-control" id="subcat_id" name="subcat_id" placeholder="select category">

                                            </select>
                                        </div>
                                    </div>

                                    <!-- START AJAX FUNCTION FOR Subcategories -->
                                    <script>
                                        function get_subcategories(subcat_id) {
                                            var cat_id = $('#cat_id').val();
                                            //alert(cat_id);
                                            $.ajax({
                                                url: 'get_subcategories.php',
                                                type: 'post',
                                                data: 'cat_id=' + cat_id + "&subcat_id=" + subcat_id,
                                                success: function(result) {
                                                    $('#subcat_id').html(result);
                                                }
                                            });
                                        }
                                    </script>
                                    <!-- END AJAX FUNCTION FOR Subcategories -->

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="file-input" class=" form-control-label">Product Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file" id="file-input" name="pro_img" accept="image/*" class="form-control-file">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Product Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" style="height:150;padding-bottom: 100;" name="pro_name" value="<?php echo $pro_name ?>" placeholder="Product Name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Description</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="textarea" id="text-input" style="height:150;padding-bottom: 100;" name="description" value="<?php echo $description ?>" placeholder="Description" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Price</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="price" value="<?php echo $price ?>" name="price" placeholder="Price" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Quantity</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="price" value="<?php echo $qty ?>" name="qty" placeholder="Quantity" class="form-control">
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

                    <!-- pagination part start -->

                    <div class="row" style="float: right;">
                        <div class="col-md-12">
                            <ul class="pagination">
                                <?php
                                // display the links to the pages 
                                $page_query = "select categories.cat_name,subcategories.subcat_name,product.* from product join categories join subcategories on product.cat_id = categories.cat_id and product.subcat_id = subcategories.subcat_id where product.pro_id order by product.pro_id desc";
                                $page_result = mysqli_query($link, $page_query);
                                $total_records = mysqli_num_rows($page_result);
                                $total_pages = ceil($total_records / $recoed_per_page);
                                for ($page = 1; $page <= $total_pages; $page++) {
                                ?>
                                    <li class="active"><a href="product.php?page=<?= $page; ?>"><?= $page ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <br><br><br><br>

                    <!-- pagination part start -->

                    <!-- START DATA TABLE -->
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Categories Name</th>
                                    <th>Subcategories Name</th>
                                    <th>Product Name</th>
                                    <th>Product</th>
                                    <th>Description</th>
                                    <th>price</th>
                                    <th>Quantity</th>
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
                                                <?php echo $row['pro_id'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['cat_name'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['subcat_name'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['pro_name'] ?>
                                            </span>
                                        </td>
                                        <td class="">
                                            <span class="">
                                                <img src="./images/product/<?php echo $row['pro_img'] ?>" height="50px" width="50px">
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['description'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['price'] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="">
                                                <?php echo $row['qty'] ?>
                                            </span>
                                        </td>

                                        <td>
                                            <span class="">
                                                <?php
                                                if ($row['status'] == 0) {
                                                    echo "<a href='?type=status&operation=deactive&pro_id=" . $row['pro_id'] . "'>Active</a>";
                                                } else {
                                                    echo "<a href='?type=status&operation=active&pro_id=" . $row['pro_id'] . "'>Deactive</a>";
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <?php
                                                echo "<a href='product.php?pro_id=" . $row['pro_id'] . "'>Edit<a>";

                                                echo "<span class='role admin'><a href='?type=delete&pro_id=" . $row['pro_id'] . "'>Delete</a></span>";
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
<!-- START EDIT CLICK CATEGORY THEN DISPLAY SUBCATEGORY -->
<script>
    <?php if (isset($_GET['pro_id'])) { ?>
        get_subcategories('<?php echo $subcat_name ?>');
    <?php } ?>
</script>
<!-- END EDIT CLICK CATEGORY THEN DISPLAY SUBCATEGORY -->

</html>
<!-- end document-->