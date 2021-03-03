<?php
    require_once('../database_config/db.php');

    $country_id = mysqli_real_escape_string($link, $_POST['country_id']);
    $state_id = mysqli_real_escape_string($link, $_POST['state_id']);

    $state_qry = "select * from state where country_id='$country_id' and status='0' order by state_id asc";
    $state_res = mysqli_query($link, $state_qry);

    if(mysqli_num_rows($state_res) > 0){
        $html = '';
        while($row = mysqli_fetch_assoc($state_res)){
            if($state_id == $row['state_id']){
                $html .= "<option value=".$row['state_id']." selected>".$row['state_name']."</option>";
            }else{
                $html .= "<option value=".$row['state_id'].">".$row['state_name']."</option>";
            }            
        }
        echo $html;
    }else{
        echo "<option>No state </option>";
    }
?>

 