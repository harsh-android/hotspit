<?php 
include("../conn.php");

if (isset($_POST['stocks'])) {
   $stocks = $_POST['stocks'];

   foreach ($stocks as $key => $item) {
      $stockId = $item['stockId'];
      $stockWork = $item['stockWork'];
      $useQty = $item['useQty'];
      $secondQty = $item['secondQty'];

      if($stockWork == 'nidel') {
         $returnQty = $useQty - $secondQty;

         $sql_update = "UPDATE nidel_expence SET `return_qty`='$returnQty' WHERE id='$stockId'";
         mysqli_query($conn, $sql_update);
      }

      if($stockWork == 'less-fiting') {
         $returnQty = $useQty - $secondQty;

         $sql_update = "UPDATE less_fiting SET `return_qty`='$returnQty' WHERE id='$stockId'";
         mysqli_query($conn, $sql_update);
      }

      if($stockWork == 'fusing') {
         $returnQty = $useQty - $secondQty;

         $sql_update = "UPDATE fusing_expence SET `return_qty`='$returnQty' WHERE id='$stockId'";
         mysqli_query($conn, $sql_update);
      }

      if($stockWork == 'reniya-cutting') {
         $returnQty = $useQty - $secondQty;

         $sql_update = "UPDATE reniya_cutting SET `return_qty`='$returnQty' WHERE id='$stockId'";
         mysqli_query($conn, $sql_update);
      }

      if($stockWork == 'hotfix') {
         $returnQty = $useQty - $secondQty;

         $sql_update = "UPDATE hotfix SET `return_qty`='$returnQty' WHERE id='$stockId'";
         mysqli_query($conn, $sql_update);
      }
   }
}

?>