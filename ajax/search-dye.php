<?php
include("../conn.php");

if (isset($_POST['searchValue'])) {
   $searchValue = $_POST['searchValue'];

   if($searchValue) {
      $stmt = $conn->prepare("SELECT * FROM dye WHERE `number` LIKE ?");
      $likeValue = "%" . $searchValue . "%";
      $stmt->bind_param("s", $likeValue);
      $stmt->execute();
      $result = $stmt->get_result();
   } else {
      $stmt = $conn->prepare("SELECT * FROM dye");
      $stmt->execute();
      $result = $stmt->get_result();
   }

   if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
      ?>
         <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="product hover-img mb-7">
               <div class="product-img position-relative rounded-4 mb-6 overflow-hidden">
                  <a href="sadi-stock-detail.php?id=<?php echo htmlspecialchars($row['id']); ?>">
                     <img src="uploads/<?php echo htmlspecialchars($row['photo']); ?>"
                        alt="spike-img" class="w-100" style="min-height: 140px;">
                  </a>
               </div>
               <div>
                  <!-- <input type="checkbox" name="sadi_main_ids[]" value="<?php echo $row['id']; ?>"> -->
                  <h5 class="mb-2"><?php echo htmlspecialchars($row['number']); ?></h5>
                  <div class="d-flex align-items-center mb-2">
                     <h6 class="mb-0 me-1"><?php echo htmlspecialchars($row['count']); ?></h6>
                     <p class="mb-0"><?php echo htmlspecialchars($row['type']); ?></p>
                  </div>
                  <h6 class="mb-0 fs-4"><?php echo "₹ " . htmlspecialchars($row['price']); ?></h6>
               </div>
               <div class="action-btn mt-3">
                  <a href="add-dye.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="text-primary edit">
                     <i class="ti ti-edit fs-5"></i>
                  </a>
                  <a href="paper-dye.php?d_id=<?php echo htmlspecialchars($row['id']); ?>"
                     class="text-dark delete ms-2" onclick="return confirmDelete()">
                     <i class="ti ti-trash fs-5"></i>
                  </a>
               </div>
            </div>
         </div>
      <?php }
   } else {
      echo '<div class="col-12"><p>No results found.</p></div>';
   }
   $stmt->close();
   $conn->close();
}
?>