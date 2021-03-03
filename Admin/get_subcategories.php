<?php
    require_once('../database_config/db.php');

    $cat_id = mysqli_real_escape_string($link, $_POST['cat_id']);
    $subcat_id = mysqli_real_escape_string($link, $_POST['subcat_id']);

    $sub_qry = "select * from subcategories where cat_id='$cat_id' and status='0' order by subcat_id asc";
    $sub_res = mysqli_query($link, $sub_qry);

    if(mysqli_num_rows($sub_res) > 0){
        $html = '';
        while($row = mysqli_fetch_assoc($sub_res)){
            if($subcat_id == $row['subcat_id']){
                $html .= "<option value=".$row['subcat_id']." selected>".$row['subcat_name']."</option>";
            }else{
                $html .= "<option value=".$row['subcat_id'].">".$row['subcat_name']."</option>";
            }            
        }
        echo $html;
    }else{
        echo "<option>No Subcategories </option>";
    }
?>

 