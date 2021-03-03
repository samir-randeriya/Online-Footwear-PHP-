<?php
    session_start();
    error_reporting(0);
?>

<?php
	require_once('../database_config/db.php');
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
    require_once('../database_config/db.php');
    $select_cart = "SELECT * FROM `checkout` WHERE `umobile_no` = '$umobile_no'";
    $result_cart = mysqli_query($link, $select_cart);

    // echo $select_cart;
?>

<!-- START PDF DOWNLOAD CODE -->
<?php
    
    // function fetch_data(){
    //     $output = '';
    //     require_once('../database_config/db.php');

    //     $select_cart = "SELECT * FROM `checkout` WHERE `umobile_no` = '$umobile_no'";
    //     $result_cart = mysqli_query($link, $select_cart);
    //     while($pdf = mysqli_fetch_assoc($result_cart)){
    //         $output .=' 
    //             <tr>
    //                 <td>'.$fname.'</td>  
    //                 <td>'.$pro_name.'</td>  
    //                 <td>'.$qty.'</td>  
    //                 <td>'.$pr_price.'</td>  
    //                 <td>'.$total.'</td>   
    //             </tr>      
    //         ';
    //     } 
    //     return $output;       
    // }

    // if(isset($_POST['dwnld_btn'])){
    //     require_once('tcpdf_min/tcpdf.php');
    //     require_once('../database_config/db.php');
     
    //     $select_cart = "SELECT * FROM `checkout` WHERE `umobile_no` = '$umobile_no'";
    //     $result_cart = mysqli_query($link, $select_cart);
    //     while($pdf = mysqli_fetch_assoc($result_cart)){
    //         $fname = $pdf['fname'];
    //         $pro_name = $pdf['pro_name'];
    //         $qty = $pdf['qty'];
    //         $pr_price = $pdf['pro_price'];
    //         $total = $qty * $pr_price;
    //     }
     
    //     $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    //     $obj_pdf->SetCreator(PDF_CREATOR);  
    //     $obj_pdf->SetTitle("Export HTML Table data to PDF using TCPDF in PHP");  
    //     $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    //     $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    //     $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    //     $obj_pdf->SetDefaultMonospacedFont('helvetica');  
    //     $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    //     $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
    //     $obj_pdf->setPrintHeader(false);  
    //     $obj_pdf->setPrintFooter(false);  
    //     $obj_pdf->SetAutoPageBreak(TRUE, 10);  
    //     $obj_pdf->SetFont('helvetica', '', 12);  
    //     $obj_pdf->AddPage();  
        
    //     $content = ''; 

    //     $content .= '  
    //         <h3 align="center">Export HTML Table data to PDF using TCPDF in PHP</h3><br /><br />  
    //         <table border="1" cellspacing="0" cellpadding="5">  
    //             <tr>  
    //                 <th width="5%">First Name</th>  
    //                 <th width="30%">Product name</th>  
    //                 <th width="10%">Quantity</th>  
    //                 <th width="45%">Product Price</th>  
    //                 <th width="10%">Total Price</th>  
    //             </tr>  
    //     ';  
        
    //     $content .= fetch_data();  
    //     $content .= '</table>';  
    //     $obj_pdf->writeHTML($content);  
    //     $obj_pdf->Output('sample.pdf', 'D');  

    // }
?>
<!-- END PDF DOWNLOAD CODE -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Online Footwear | Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<!-- Invoice Template - START -->

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 main">
            <div class="col-md-12">
               <div class="row">
                    <div class="col-md-4">
                        <img class="img-responsive" alt="Invoce Template" src="store.png" />
                    </div>
                    <div class="col-md-8 text-right">
                        <h4 style="color: #F81D2D;"><strong>Online Footwear</strong></h4>
                        <p>54, North Road</p>
                        <p>+1 888 455 6677</p>
                        <p>smartfootwear1212@gmail.com</p>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>INVOICE</h2>
                        <!-- <h5>00000846382</h5> -->
                    </div>
                </div>
                <br />
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th><h5>Description</h5></th>
                                <th><h5>Amount</h5></th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                    while($row1 = mysqli_fetch_assoc($result_cart)) {
                                        $qty = $row1['qty'];
                                        $pro_price = $row1['pro_price'];
                                        $total_price = $qty * $pro_price;
                                        $grand_total += $total_price;
                                ?>
                                    <tr>
                                        <td class="col-md-9"><?php echo $qty;echo "&nbsp;x&nbsp;"; echo $row1['pro_name'];?></td>
                                        <td class="col-md-3"><i class="fa fa-usd" aria-hidden="true"></i> <?= $total_price?> </td>
                                    </tr>
                                <?php }?>
                                <tr style="height: 100px;">
                                    <td class="text-right"></td>
                                    <td></td>
                                </tr>
                                <tr style="color: #F81D2D;">
                                    <td class="text-right"><h4><strong>Total:</strong></h4></td>
                                    <td class="text-left"><h4><strong><i class="fa fa-usd" aria-hidden="true"></i> <?php echo $grand_total?>
                                    </strong></h4></td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <div class="col-md-12">
                        <p><b>Date :</b> 28 June 2017</p>
                        <br />
                        <p><b>Signature</b></p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <form method="post">
                <input type="submit" name="dwnld_btn" class="btn btn-primary" style="margin-top: 0%; margin-left: 40%;" value="Download" />
                <!-- href="download.php?file=invoice" -->
            </form>
        </div>
    </div>
    
    <!-- <button onclick="window.print();" style="margin-left: 67%;">Print Invoice</button> -->
</div>

<style>
    .main {
        background: #ffffff;
        border-bottom: 15px solid #F81D2D;
        border-top: 15px solid #1E1F23;
        margin-top: 30px;
        margin-bottom: 30px;
        padding: 40px 30px !important;
        position: relative;
        box-shadow: 0 1px 21px #808080;
        font-size:10px;
    }

    .main thead {
		background: #1E1F23;
        color: #fff;
		}
</style>
<!-- Invoice Template - END -->

</div>

</body>
</html>