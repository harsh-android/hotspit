<?php
include('conn.php');
session_start();

$bill_id = $_GET['id'];

$bill_res = mysqli_query($conn, "SELECT * FROM generate_bill_data WHERE id='$bill_id'");
$bill_row = mysqli_fetch_assoc($bill_res);

$sql_select_party = "SELECT * FROM dealer";
$result_party = mysqli_query($conn, $sql_select_party);


if (isset($_POST['submit'])) {

   $descriptions = $_POST['description'] ?? [];
   $quantities = $_POST['qty'] ?? [];
   $chalan_numbers = $_POST['cn_number'] ?? [];
   $used_quantities = $_POST['use_qty'] ?? [];
   $prices = $_POST['price'] ?? [];

   $sadi_stocks = [];
   for ($i = 0; $i < count($descriptions); $i++) {
      $description = $descriptions[$i];
      $qty = $quantities[$i];
      $cn_number = $chalan_numbers[$i];
      $use_qty = $used_quantities[$i];
      $price = $prices[$i];

      $sadi_stocks[] = [
         'description' => $description,
         'cn_number' => $cn_number,
         'qty' => $qty,
         'use_qty' => $use_qty,
         'price' => $price
      ];
   }

   $color_str = implode(',|,', $descriptions);
   $qty_str = implode(',|,', $quantities);
   $cn_number_str = implode(',|,', $chalan_numbers);
   $use_qty_str = implode(',|,', $used_quantities);
   $price_str = implode(',|,', $prices);
   $shop_id = $_POST['select_party'];
   $igst = $_POST['igst'] ?? 0;
   $cgst = $_POST['cgst'] ?? 0;
   $sgst = $_POST['sgst'] ?? 0;
   $discount = $_POST['discount'] ?? 0;
   $bill_date = $_POST['bill_date'];

   $sql_update_bill_data = "UPDATE `generate_bill_data` SET `shop_id`='$shop_id',`bill_date`='$bill_date',`color`='$color_str',`qty`='$qty_str',`cn_number`='$cn_number_str',`use_qty`='$use_qty_str',`price`='$price_str',`discount`='$discount',`cgst`='$cgst',`sgst`='$sgst',`igst`='$igst' WHERE `id` = $bill_id";
   $result_bill_data = mysqli_query($conn, $sql_update_bill_data);
   $invoice_number = $bill_id;

   $data['sadi_stocks'] = $sadi_stocks;
   $data['id'] = $shop_id;
   $data['igst'] = $igst;
   $data['cgst'] = $cgst;
   $data['sgst'] = $sgst;
   $data['discount'] = $discount;
   $data['invoice_number'] = $invoice_number;
   $data['bill_date'] = $bill_date;

   unset($_SESSION['bill_data']); // unset session first
   $_SESSION['bill_data'] = $data;
   header("location:bill.php");
   exit;
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
   <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
      <?php include('slider.php'); ?> <!-- sidebar -->
      <div class="body-wrapper">
         <?php include('header.php'); ?> <!-- header -->
         <div class="container-fluid">
            <div class="container-fluid">
               <div class="card">
                  <div class="card-body">
                     <h5 class="card-title fw-semibold mb-5">Generate Bill</h5>
                     <form method="post">
                        <div class="mb-3">

                           <div class="mb-4">
                              <label for="select_party" class="form-label">Select Party</label>
                              <select class="form-control" id="select_party" name="select_party" required>
                                 <option value="" selected disabled>Select Party</option>
                                 <?php while ($row = mysqli_fetch_assoc($result_party)) { ?>
                                    <option value="<?php echo $row['id']; ?>" <?php echo ($bill_row['shop_id'] == $row['id']) ? 'selected' : ''; ?>><?php echo $row['name']; ?> (<?php echo $row['owner_name']; ?>)</option>
                                 <?php } ?>
                              </select>
                           </div>

                           <?php
                              $color = explode(",|,", $bill_row['color']);
                              $color_count = count($color);

                              $qty = isset($bill_row['qty']) ? explode(",|,", $bill_row['qty']) : [];
                              $cn_number = isset($bill_row['cn_number']) ? explode(",|,", $bill_row['cn_number']) : [];
                              $use_qty = isset($bill_row['use_qty']) ? explode(",|,", $bill_row['use_qty']) : [];
                              $price = isset($bill_row['price']) ? explode(",|,", $bill_row['price']) : [];
                           ?>
                           <div class="row mt-3" id="color_cols">
                              <?php if (!empty($color)) {
                                 for ($i = 0; $i < $color_count; $i++) { ?>
                                    <div class="col-lg-4 mb-4">
                                       <label for="description_<?php echo $i; ?>" class="form-label"><?php echo ($i + 1); ?>. Description</label>
                                       <input type="text" name="description[]" class="form-control" id="description_<?php echo $i; ?>" placeholder="Description" value="<?php echo $color[$i] ?? ''; ?>" required>
                                    </div>
                                    <div class="col-lg-2 mb-4">
                                       <label for="qty_<?php echo $i; ?>" class="form-label">Total Qty</label>
                                       <input type="number" name="qty[]" class="form-control" id="qty_<?php echo $i; ?>" placeholder="Total Qty" value="<?php echo $qty[$i] ?? ''; ?>" required>
                                    </div>
                                    <div class="col-lg-2 mb-4">
                                       <label for="cn_number_<?php echo $i; ?>" class="form-label">Chalan Number</label>
                                       <input type="text" name="cn_number[]" class="form-control" id="cn_number_<?php echo $i; ?>" placeholder="Chalan Number" value="<?php echo $cn_number[$i] ?? ''; ?>" required>
                                    </div>
                                    <div class="col-lg-2 mb-4">
                                       <label for="use_qty_<?php echo $i; ?>" class="form-label">Used Qty</label>
                                       <input type="number" name="use_qty[]" class="form-control" id="use_qty_<?php echo $i; ?>" placeholder="Used Qty" value="<?php echo $use_qty[$i] ?? ''; ?>" required>
                                    </div>
                                    <div class="col-lg-2 mb-4">
                                       <label for="price_<?php echo $i; ?>" class="form-label">Rate</label>
                                       <input type="number" step="0.01" name="price[]" class="form-control" id="price_<?php echo $i; ?>" placeholder="Rate/Price" value="<?php echo $price[$i] ?? ''; ?>" required>
                                    </div>
                              <?php }
                              } ?>
                           </div>

                           <div class="col-lg-4 mb-3">
                              <label for="discount" class="form-label">Discount</label>
                              <input type="number" step="0.01" name="discount" class="form-control" id="discount" placeholder="Enter Discount %" value="<?php echo $bill_row['discount'] ?>">
                           </div>
                           <div class="col-lg-4 mb-3">
                              <label for="igst" class="form-label">IGST</label>
                              <input type="number" step="0.01" name="igst" class="form-control" id="igst" placeholder="Enter IGST %" value="<?php echo $bill_row['igst'] ?>">
                           </div>
                           <div class="col-lg-4 mb-3">
                              <label for="cgst" class="form-label">CGST</label>
                              <input type="number" step="0.01" name="cgst" class="form-control" id="cgst" placeholder="Enter CGST %" value="<?php echo $bill_row['cgst'] ?>">
                           </div>
                           <div class="col-lg-4 mb-3">
                              <label for="sgst" class="form-label">SGST</label>
                              <input type="number" step="0.01" name="sgst" class="form-control" id="sgst" placeholder="Enter SGST %" value="<?php echo $bill_row['sgst'] ?>">
                           </div>
                           <div class="col-lg-4 mb-3">
                              <label for="bill_date" class="form-label">Bill Date</label>
                              <input type="date" name="bill_date" class="form-control" id="bill_date" value="<?php echo $bill_row['bill_date'] ?>">
                           </div>

                           <button type="submit" name="submit" class="btn btn-info mt-4">Update & Generate Bill</button>
                        </div>
                     </form>
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