<?php
include("../conn.php");

if(isset($_POST['shopId']) && isset($_POST['paperTypeId']) && isset($_POST['diomondTypeId'])){
   $shopId = $_POST['shopId'];
   $paperTypeId = $_POST['paperTypeId'];
   $diomondTypeId = $_POST['diomondTypeId'];

   $peperStock = mysqli_query($conn, "SELECT SUM(qty) - SUM(use_qty) AS available_paper_qty FROM `paper_stock` WHERE `type` = $paperTypeId AND `shop` = $shopId");
   $availablePaperQty = 0;
   if ($peperStock) {
      $peperStockResult = mysqli_fetch_assoc($peperStock);
      $availablePaperQty = $peperStockResult['available_paper_qty'] ? (int)$peperStockResult['available_paper_qty'] : 0;
   }

   $diamondStock = mysqli_query($conn, "SELECT SUM(pkt_qty) - SUM(use_pkt_qty) AS available_diamond_qty FROM `diomond_stock` WHERE `type` = $diomondTypeId AND `shop` = $shopId");
   $availableDiamondQty = 0;
   if ($diamondStock) {
      $diamondStockResult = mysqli_fetch_assoc($diamondStock);
      $availableDiamondQty = $diamondStockResult['available_diamond_qty'] ? (int)$diamondStockResult['available_diamond_qty'] : 0;
   }

   $data = [
      'paperQty' => $availablePaperQty,
      'diamoundQty' => $availableDiamondQty
   ];

   echo json_encode($data);
}

?>