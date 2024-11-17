<?php
include("../conn.php");

if(isset($_POST['actionId']) && isset($_POST['actionName'])){
   $id = $_POST['actionId'];
   
   if($_POST['actionName'] == 'nidel-action'){
      $sql_delete = "DELETE FROM `nidel_expence` WHERE `id`=$id";
      if (mysqli_query($conn, $sql_delete)) {
         echo json_encode([
            'status' => true,
            'message' => 'Nidel expenses deleted successfully...',
         ]);
         exit;
      }
   }

   if($_POST['actionName'] == 'less-fiting-action'){
      $sql_delete = "DELETE FROM `less_fiting` WHERE `id`=$id";
      if (mysqli_query($conn, $sql_delete)) {
         echo json_encode([
            'status' => true,
            'message' => 'Less fiting expenses deleted successfully...',
         ]);
         exit;
      }
   }

   if($_POST['actionName'] == 'hotfix-action'){
      $sql_delete = "DELETE FROM `hotfix` WHERE `id`=$id";
      if (mysqli_query($conn, $sql_delete)) {
         echo json_encode([
            'status' => true,
            'message' => 'Hotfix expenses deleted successfully...',
         ]);
         exit;
      }
   }

   if($_POST['actionName'] == 'fusing-action'){
      $sql_delete = "DELETE FROM `fusing_expence` WHERE `id`=$id";
      if (mysqli_query($conn, $sql_delete)) {
         echo json_encode([
            'status' => true,
            'message' => 'Fusing expenses deleted successfully...',
         ]);
         exit;
      }
   }

   if($_POST['actionName'] == 'reniya-cuting-action'){
      $sql_delete = "DELETE FROM `reniya_cutting` WHERE `id`=$id";
      if (mysqli_query($conn, $sql_delete)) {
         echo json_encode([
            'status' => true,
            'message' => 'Reniya cutting expenses deleted successfully...',
         ]);
         exit;
      }
   }

   if($_POST['actionName'] == 'sheet-work-action'){
      $sql_delete = "DELETE FROM `sheet_work` WHERE `id`=$id";
      if (mysqli_query($conn, $sql_delete)) {
         echo json_encode([
            'status' => true,
            'message' => 'Sheet work expenses deleted successfully...',
         ]);
         exit;
      }
   }

   if($_POST['actionName'] == 'kapad-cutting-action'){
      $sql_delete = "DELETE FROM `kapad_cutting` WHERE `id`=$id";
      if (mysqli_query($conn, $sql_delete)) {
         echo json_encode([
            'status' => true,
            'message' => 'Kapad cutting expenses deleted successfully...',
         ]);
         exit;
      }
   }
}

// Default response for invalid or missing data
echo json_encode([
   'status' => false,
   'message' => 'Invalid request.',
]);

?>