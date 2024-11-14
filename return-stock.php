<?php 

include("conn.php");
session_start();

$works = $_SESSION['return_stocks'];

foreach ($works as $key => $value) {
    
    $work_id = $value['stock_id'];
    $sadi_stock_id = $value['sadi_stock_id'];
    $use_qty = $value['use_qty'];
    $workers_id = $value['workers_id'];
    $price = $value['price'];
    if ($value['work']=='nidel') {
        $que = "UPDATE nidel_expence SET `return_qty`='$use_qty' WHERE id='$work_id'";
    }
    
    else if ($value['work']=='less') {
        $que = "UPDATE less_fiting SET `return_qty`='$use_qty' WHERE id='$work_id'";
    }
    
    else if ($value['work']=='hotfix') {
        $que = "UPDATE hotfix SET `return_qty`='$use_qty' WHERE id='$work_id'";
    }
    
    else if ($value['work']=='fusing') {
        $que = "UPDATE fusing_expence SET `return_qty`='$use_qty' WHERE id='$work_id'";
    }
    
    else if ($value['work']=='reniya') {
        $que = "UPDATE reniya_cutting SET `return_qty`='$use_qty' WHERE id='$work_id'";
    }
    
    
    mysqli_query($conn,$que);
}

?>