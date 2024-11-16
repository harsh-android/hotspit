<?php
include('conn.php');


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $quee = mysqli_query($conn, "SELECT * FROM hotfix WHERE `id`='$id'");
  $editRes = mysqli_fetch_assoc($quee);

   if (!$editRes) {
      header("location:javascript://history.go(-1)");
      exit;
   }
} else {
   header("location:javascript://history.go(-1)");
   exit;
}

if (isset($_POST['submit'])) {
   $use_qty = $_POST['use_qty'];
   $butta_count = $_POST['butta_count'];
   $butta_price = $_POST['butta_price'];
   $line_count = $_POST['line_count'];
   $line_price = $_POST['line_price'];
   $sheet_used = $_POST['sheet_used'];
   $sheet_price = $_POST['sheet_price'];
   $border_price = $_POST['border_price'];
   $price = $_POST['price'];

   $sql_update = "UPDATE `hotfix` SET `use_qty`='$use_qty', `butta_count`='$butta_count', `butta_price`='$butta_price', `line_count`='$line_count', `line_price`='$line_price', `sheet_used`='$sheet_used', `sheet_price` = '$sheet_price', `border_price`='$border_price', `price`='$price' WHERE `id`='$id'";
   if (mysqli_query($conn, $sql_update)) {
      header("location:worker-profile.php?id=" . $editRes['workers_id']);
      exit;
   }
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
              <h5 class="card-title fw-semibold mb-4">Edit Hotfix Expenses</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post">

                    <div class="mb-3">
                      <label for="use_qty" class="form-label">Use Quantity</label>
                      <input type="number" name="use_qty" class="form-control" id="use_qty" placeholder="" value="<?php echo $editRes['use_qty']; ?>">
                    </div>

                    <div class="mb-3">
                        <label for="butta_count" class="form-label">Butta Count</label>
                        <input type="number" class="form-control" id="butta_count" name="butta_count" placeholder="" value="<?php echo $editRes['butta_count']; ?>">
                     </div>

                     <div class="mb-3">
                        <label for="butta_price" class="form-label">Butta Price</label>
                        <input type="number" class="form-control" step="0.01" id="butta_price" name="butta_price" placeholder="" value="<?php echo $editRes['butta_price']; ?>">
                     </div>

                     <div class="mb-3">
                        <label for="line_count" class="form-label">Line Count</label>
                        <input type="number" class="form-control" id="line_count" name="line_count" placeholder="" value="<?php echo $editRes['line_count']; ?>">
                     </div>

                     <div class="mb-3">
                        <label for="line_price" class="form-label">Line Price</label>
                        <input type="number" class="form-control" step="0.01" id="line_price" name="line_price" placeholder="" value="<?php echo $editRes['line_price']; ?>">
                     </div>

                     <div class="mb-3">
                        <label for="sheet_used" class="form-label">Sheet Used</label>
                        <input type="number" class="form-control" id="sheet_used" name="sheet_used" placeholder="" value="<?php echo $editRes['sheet_used']; ?>">
                     </div>

                     <div class="mb-3">
                        <label for="sheet_price" class="form-label">Sheet Price</label>
                        <input type="number" class="form-control" step="0.01" id="sheet_price" name="sheet_price" placeholder="" value="<?php echo $editRes['sheet_price']; ?>">
                     </div>

                     <div class="mb-3">
                        <label for="border_price" class="form-label">Border Price</label>
                        <input type="number" class="form-control" step="0.01" id="border_price" name="border_price" placeholder="" value="<?php echo $editRes['border_price']; ?>">
                     </div>

                     <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" name="price" step="0.01" class="form-control" id="price" placeholder="" value="<?php echo $editRes['price']; ?>" value="<?php echo $editRes['use_qty']; ?>">
                     </div>

                    <button type="submit" name="submit" class="btn btn-primary">Submit (Hotfix)</button>
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