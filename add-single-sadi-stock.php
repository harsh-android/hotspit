<?php
include("conn.php");

$dealer_id = $_GET['dealer'];

$isupdate = false;
if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $isupdate = true;
   $quee = mysqli_query($conn, "SELECT * FROM sadi_stock WHERE `id`='$id'");
   $editRes = mysqli_fetch_assoc($quee);
}

if (isset($_POST['submit'])) {
   $color = $_POST['color'];
   $qty = $_POST['qty'];
   $price = $_POST['price'];

   if ($isupdate) {
      $in = "UPDATE `sadi_stock` SET `sadi_main_id`='$dealer_id',`color`='$color',`qty`='$qty',`price`='$price' WHERE `id`='$id'";
   } else {
      $in = "INSERT INTO sadi_stock(`sadi_main_id`, `color`, `qty`, `price`, `use_qty`, `expence`) VALUES ('$dealer_id','$color','$qty','$price','0','0')";
   }
   $res = mysqli_query($conn, $in);
   header("location:sadi-stock-detail.php?id=".$dealer_id);
}
?>

<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Spike Free</title>
   <link rel="shortcut icon" type="image/png" href="src/assets/images/logos/favicon.png" />
   <link rel="stylesheet" href="src/assets/css/styles.min.css" />
</head>

<body>
   <!--  Body Wrapper -->
   <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
      <!-- Sidebar Start -->
      <?php include('slider.php'); ?>
      <!--  Sidebar End -->
      <!--  Main wrapper -->
      <div class="body-wrapper">
         <!--  Header Start -->
         <?php include('header.php'); ?>
         <!--  Header End -->
         <div class="container-fluid">
            <div class="container-fluid">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title fw-semibold mb-4"><?php echo $isupdate ? 'Edit' : 'Add' ?> Paper Stock</h5>
                     <div class="card">
                        <div class="card-body">
                           <form method="post">

                              <div class="mb-3">
                                 <label for="color" class="form-label">Select Color</label>
                                 <?php $colors = mysqli_query($conn, "SELECT * FROM color"); ?>
                                 <select class="form-control" id="color" name="color" required>
                                    <?php while ($row = mysqli_fetch_assoc($colors)) { ?>
                                       <option value="<?php echo $row['id'] ?>" <?php echo $isupdate && $editRes['color'] == $row['id'] ? "selected" : ''; ?>><?php echo $row['name'] ?></option>
                                    <?php } ?>
                                 </select>
                              </div>

                              <div class="mb-3">
                                 <label for="qty" class="form-label">Quanitity</label>
                                 <input type="number" name="qty" class="form-control" id="qty" placeholder="Add quanitity" value="<?php echo $isupdate ? $editRes['qty'] : ''; ?>" required>
                              </div>

                              <div class="mb-3">
                                 <label for="price" class="form-label">Price</label>
                                 <input type="number" name="price" class="form-control" id="price" placeholder="Add price" step="0.01" value="<?php echo $isupdate ? $editRes['price'] : ''; ?>" required>
                              </div>

                              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script src="src/assets/libs/jquery/dist/jquery.min.js"></script>
   <script src="src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
   <script src="src/assets/js/sidebarmenu.js"></script>
   <script src="src/assets/js/app.min.js"></script>
   <script src="src/assets/libs/simplebar/dist/simplebar.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>

</body>

</html>