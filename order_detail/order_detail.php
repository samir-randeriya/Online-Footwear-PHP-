<?php
    session_start();
    error_reporting(0);
?>

<?php
	require_once('database_config/db.php');
    $id = $_SESSION["userid"];
    
	$qry = "select * from registration where userid =$id";
	$res = mysqli_query($link, $qry);
	
	while ($row = mysqli_fetch_assoc($res)) {
		$umobile_no = $row['mobile_no'];
		$email_id = $row['email_id'];
	}
	// echo $umobile_no;
?>

<?php
    require_once('database_config/db.php');
    $select_cart = "SELECT * FROM `checkout` WHERE `umobile_no` = '$umobile_no'";
    $result_cart = mysqli_query($link, $select_cart);

    // echo $select_cart;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- Header Part Start -->
		<?php
    		include("../header_link.php");
		?>
	<!-- Header Part End -->
</head>
<body>

<div class="container">
    
    <!-- Header Part Start -->
        <?php
    		include("../header.php");
		?>
    <!-- Header Part End -->
    
    <!-- Simple Invoice - START -->
    <div class="container">
        <!-- for alert message -->
        <div id="message"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="text-center"><strong>Order summary</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td><strong>Item</strong></td>
                                        <td><strong>Item Name</strong></td>
                                        <td class="text-center"><strong>Item Price</strong></td>
                                        <td class="text-center"><strong>Item Quantity</strong></td>
                                        <td class="text-right"><strong>Total</strong></td>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    // if(isset($_SESSION["userid"]))
                                        while($row1 = mysqli_fetch_assoc($result_cart)) {
                                            $qty = $row1['qty'];
                                            $pro_price = $row1['pro_price'];
                                            $total_price = $qty * $pro_price;
                                            $grand_total += $total_price;
                                    ?>
                                    <tr>
                                        <td></td>
                                        <!-- <img style="background-image: url(Admin/images/product/img);"> -->
                                        <td><?php echo $row1['pro_name'];?></td>
                                        <td class="text-center"><?php echo $row1['pro_price'];?></td>
                                        <td class="text-center"><?php echo $row1['qty'];?></td>
                                        <td class="text-right"><?php echo $row1['grand_total'];?></td>
                                    </tr>
                                    <?php 
                                          } 
                                    // }else{
                                    //     echo "you are not connected...";
                                    // } 
                                    ?>
                                    
                                    <tr>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow text-center"><strong>Subtotal</strong></td>
                                        <td class="highrow text-right"><?php echo $grand_total;?></td>
                                    </tr>
                                    <tr>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow text-center"><strong>Shipping</strong></td>
                                        <td class="emptyrow text-right">$0</td>
                                    </tr>
                                    <tr>
                                        <td class="emptyrow"><i class="fa fa-barcode iconbig"></i></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow"></td>
                                        <td class="emptyrow text-center"><strong>Total</strong></td>
                                        <td class="emptyrow text-right"><?php echo $grand_total;?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Part Start -->
    <?php
                    include("../footer.php");
                ?>
            <!-- Footer Part End -->

    <style>
    .height {
        min-height: 200px;
    }

    .icon {
        font-size: 47px;
        color: #5CB85C;
    }

    .iconbig {
        font-size: 77px;
        color: #5CB85C;
    }

    .table > tbody > tr > .emptyrow {
        border-top: none;
    }

    .table > thead > tr > .emptyrow {
        border-bottom: none;
    }

    .table > tbody > tr > .highrow {
        border-top: 3px solid;
    }
    </style>

    <!-- Simple Invoice - END -->

</div>

</body>
</html>

<!-- <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <?php
                       //while($row2 = mysqli_fetch_assoc($result_cart))
                    ?>
                    <div class="col-xs-12 col-md-3 col-lg-3 pull-left">
                        <div class="panel panel-default height">
                            <div class="panel-heading">Billing Details</div>
                            <div class="panel-body">
                                <strong><?php //echo $row2['fname']; echo "&nbsp";echo $row2['lname'];?>:</strong><br>
                                <?php //echo $row2['address1']?><br>
                                <?php //echo $row2['address2']?><br>
                                VA<br>
                                <strong>22 203</strong><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3 col-lg-3">
                        <div class="panel panel-default height">
                            <div class="panel-heading">Payment Information</div>
                            <div class="panel-body">
                                <strong>Payment:</strong> <br> -->
                                <!-- <strong>Card Number:</strong> ***** 332<br>
                                <strong>Exp Date:</strong> 09/2020<br> -->
                            <!-- </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3 col-lg-3">
                        <div class="panel panel-default height">
                            <div class="panel-heading">Order Preferences</div>
                            <div class="panel-body">
                                <strong>Gift:</strong> No<br>
                                <strong>Express Delivery:</strong> Yes<br>
                                <strong>Insurance:</strong> No<br>
                                <strong>Coupon:</strong> No<br>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-3 col-lg-3 pull-right">
                        <div class="panel panel-default height">
                            <div class="panel-heading">Shipping Address</div>
                            <div class="panel-body">
                                <strong>David Peere:</strong><br>
                                1111 Army Navy Drive<br>
                                Arlington<br>
                                VA<br>
                                <strong>22 203</strong><br>
                            </div>
                        </div>
                    </div>
                    <?php //}?>
                </div>
            </div>
        </div> -->