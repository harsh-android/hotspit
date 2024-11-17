<?php
include("../conn.php");

if (isset($_POST['searchValue'], $_POST['shopId'])) {
   $searchValue = $_POST['searchValue'];
   $shopId = $_POST['shopId'];

   if (!empty($searchValue)) {
      $query = "SELECT sadi_main.*, shop.name AS shop_name, shop.owner_name 
          FROM sadi_main 
          INNER JOIN shop ON shop.id = sadi_main.shop 
          WHERE sadi_main.shop = ? 
            AND (
               sadi_main.cn_number LIKE ? OR 
               shop.name LIKE ? OR 
               shop.owner_name LIKE ?
            )";
      $stmt = $conn->prepare($query);
      $likeValue = '%' . $searchValue . '%';
      $stmt->bind_param("ssss", $shopId, $likeValue, $likeValue, $likeValue);
   } else {
      $query = "SELECT sadi_main.*, shop.name AS shop_name, shop.owner_name 
          FROM sadi_main 
          INNER JOIN shop ON shop.id = sadi_main.shop 
          WHERE sadi_main.shop = ?";
      $stmt = $conn->prepare($query);
      $stmt->bind_param("s", $shopId);
   }

   $stmt->execute();
   $result = $stmt->get_result();

   if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
      ?>
         <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="product hover-img mb-7">
                    <div class="product-img position-relative rounded-4 mb-6 overflow-hidden">
                        <a href="sadi-stock-detail.php?id=<?php echo $row['id']; ?>">
                            <img src="uploads/<?php echo $row['image']; ?>" alt="spike-img" class="w-100" style="min-height: 140px;">
                        </a>
                    </div>
                    <div>
                        <input type="checkbox" name="sadi_main_ids[]" value="<?php echo $row['id']; ?>">
                        <h5 class="mb-2 mt-2"><?php echo $row['shop_name'] . "<br/> (" . $row['owner_name'] . ")"; ?></h5>
                        <h6 class="mb-0 fs-4 mt-3"><?php echo $row['date']; ?></h6>
                        <h6 class="mb-0 fs-4 mt-3">CN No: <?php echo $row['cn_number']; ?></h6>
                    </div>
                </div>
            </div>
            <?php
        }
   } else {
         echo '<div class="col-12"><p>No results found.</p></div>';
   }
   $stmt->close();
   $conn->close();
}
?>