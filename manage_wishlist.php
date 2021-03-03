<?php
    session_start();
    error_reporting(0);
    require_once('database_config/db.php');

    $user_id = $_SESSION["userid"];
	
	$qry = "select * from registration where userid =$user_id";
	$res_usr = mysqli_query($link, $qry);
	
	while ($row = mysqli_fetch_assoc($res_usr)) {
		$umobile_no = $row['mobile_no'];
    }
    
    // for insert a item into cart
    if (isset($_POST['pro_id'])) {
        $pro_id = $_POST['pro_id'];
        $pro_name = $_POST['pro_name'];
        $price = $_POST['price'];
        $pro_img = $_POST['pro_img'];
        $pqty = 1;
        $umob_no = $_POST['umob_no'];

        $stmt = $link->prepare("select umobile_no,pro_id from wishlist where umobile_no = $umob_no and pro_id = $pro_id");
        //$stmt->bind_param("s",$pro_id);
        $stmt->execute();
        $res = $stmt->get_result();
        $r =  $res->fetch_assoc();
        $id = $r['pro_id'];

        if(isset($_SESSION['userid'])){
            if (!$id) {
                $query = $link->prepare("INSERT INTO `wishlist`(`umobile_no`,`pro_name`, `pro_img`, `pro_price`, `qty`, `total_price`,`pro_id`) VALUES ('$umob_no','$pro_name','$pro_img','$price','$pqty','$price','$pro_id')");
                 $query->execute();

                echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Item added to your wishlist</strong>
                    </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Item already added to your wishlist</strong>
                    </div>';
            }
        }else{
                echo '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>User are not login they have to login first....</strong>
                    </div>';
        }
    }

    if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
        $stmt = $link->prepare("select * from wishlist");
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows();

        echo $rows;
    }
    // for remove only one item 
    if (isset($_GET['remove'])) {
        $id = $_GET['remove'];

        $stmt = $link->prepare("DELETE FROM wishlist where wish_id = $id and umobile_no = $umobile_no");
        $stmt->execute();

        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Item removed from cart!';
        header('location:wishlist.php');
    }
    // for clear all cart item 
    if (isset($_GET['clear'])) {
        $stmt = $link->prepare("DELETE FROM wishlist where umobile_no = $umobile_no");
        $stmt->execute();

        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'All Item removed from cart!';
        header('location:wishlist.php');
    }
    ?>