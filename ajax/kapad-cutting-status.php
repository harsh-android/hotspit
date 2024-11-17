<?php
include("../conn.php");

if (isset($_POST['stockId']) && isset($_POST['stockAction']) && isset($_POST['status'])) {
   $stockId = $_POST['stockId'];
   $stockAction = $_POST['stockAction'];
   $status = $_POST['status'];

   if ($stockAction == 'kapad-cutting-status') {
      $sql_update = "UPDATE kapad_cutting SET `complete_work`='$status' WHERE id='$stockId'";
      mysqli_query($conn, $sql_update);
   }
}
