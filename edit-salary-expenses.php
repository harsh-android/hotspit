<?php
include('conn.php');


if (isset($_GET['id'])) {
   $id = $_GET['id'];
   $quee = mysqli_query($conn, "SELECT * FROM banking WHERE `id`='$id'");
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
   $type = $_POST['type'];
   $cheque_no = isset($_POST['cheque_no']) && $_POST['cheque_no'] !== '' ? strval($_POST['cheque_no']) : null;
   $account_no = isset($_POST['account_no']) && $_POST['account_no'] !== '' ? strval($_POST['account_no']) : null;
   $amount = $_POST['amount'];
   $note = $_POST['note'];
   $update_date = date("d-m-Y");

   $cheque_no_value = is_null($cheque_no) ? "NULL" : "'$cheque_no'";
   $account_no_value = is_null($account_no) ? "NULL" : "'$account_no'";

   $sql_update = "UPDATE `banking` SET 
         `type`='$type',
         `cheque_no`=$cheque_no_value,
         `account_no`=$account_no_value,
         `amount`='$amount',
         `note`='$note',
         `update_date`='$update_date'
      WHERE `id`='$id'";
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
                     <h5 class="card-title fw-semibold mb-4">Edit Salary Expenses</h5>
                     <div class="card">
                        <div class="card-body">
                           <form method="post">

                              <div class="col-md-12 mb-3">
                                 <div class="note-title">
                                    <label class="form-label">Mode</label>
                                    <select class="form-control mode-type" id="type" name="type" required>
                                       <option value="cash" <?php echo $editRes['type'] == 'cash' ? 'selected' : '' ?>>Cash</option>
                                       <option value="cheque" <?php echo $editRes['type'] == 'cheque' ? 'selected' : '' ?>>Cheque</option>
                                       <option value="upi" <?php echo $editRes['type'] == 'upi' ? 'selected' : '' ?>>UPI</option>
                                       <option value="bank_transfer" <?php echo $editRes['type'] == 'bank_transfer' ? 'selected' : '' ?>>Bank Transfer</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-12 add-new-field">

                              </div>
                              <div class="col-md-12 mb-3">
                                 <div class="note-description">
                                    <label class="form-label">Amount</label>
                                    <input type="number" name="amount" id="amount" class="form-control" placeholder="Amount" required value="<?php echo $editRes['amount']; ?>">
                                 </div>
                              </div>
                              <div class="col-md-12 mb-6">
                                 <div class="note-description">
                                    <label class="form-label">Note</label>
                                    <input type="text" name="note" id="note" class="form-control" placeholder="Note" required value="<?php echo $editRes['note']; ?>">
                                 </div>
                              </div>

                              <button type="submit" name="submit" class="btn btn-primary">Submit (Salary)</button>
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

   <script>
      $(document).ready(function(){
         addDynamicField();

         $(document).on("change", ".mode-type", function(){
            addDynamicField();
         });

         function addDynamicField() {
            const selectedType = $('.mode-type').val();
               
            if (selectedType == "cheque") {
               $('.add-new-field').html(`
                  <div class="note-description mb-3">
                     <label class="form-label">Cheque No</label>
                     <input type="number" name="cheque_no" id="cheque_no" class="form-control" placeholder="Cheque No" required value="<?php echo $editRes['cheque_no'] ? $editRes['cheque_no'] : null; ?>">
                  </div>
               `);
            } else if (selectedType == "bank_transfer") {
               $('.add-new-field').html(`
                  <div class="note-description mb-3">
                     <label class="form-label">Account No</label>
                     <input type="number" name="account_no" id="account_no" class="form-control" placeholder="To Account No" required value="<?php echo $editRes['account_no'] ? $editRes['account_no'] : null; ?>">
                  </div>
               `);
            } else {
               $('.add-new-field').html('');
            }
         }
      });
   </script>
</body>
</html>