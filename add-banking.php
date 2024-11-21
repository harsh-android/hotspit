<?php
include("conn.php");

$isupdate = false;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $isupdate = true;
    $quee = mysqli_query($conn, "SELECT * FROM banking WHERE `id`='$id'");
    $editRes = mysqli_fetch_assoc($quee);
}

if (isset($_POST['submit'])) {

    $in_out = $_POST['in_out'];
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    $note = $_POST['note'];
    $type = $_POST['type'];
    $today = date("d-m-Y");
    $update_date = date("d-m-Y");

    $cheque_no = isset($_POST['cheque_no']) && $_POST['cheque_no'] !== '' ? strval($_POST['cheque_no']) : null;
    $account_no = isset($_POST['account_no']) && $_POST['account_no'] !== '' ? strval($_POST['account_no']) : null;
    $cheque_no_value = is_null($cheque_no) ? "NULL" : "'$cheque_no'";
    $account_no_value = is_null($account_no) ? "NULL" : "'$account_no'";

    if ($isupdate) {
        $in = "UPDATE `banking` SET `in_out`='$in_out',`category`='$category',`amount`='$amount',`type`='$type',`cheque_no`=$cheque_no_value,`account_no`=$account_no_value,`note`='$note',`update_date`='$update_date' WHERE `id`='$id'";
    } else {
        $in = "INSERT INTO banking(`in_out`,`category`,`type`,`cheque_no`,`account_no`,`amount`,`note`,`date`) VALUES ('$in_out','$category','$type',$cheque_no_value,$account_no_value,'$amount','$note','$today')";
    }

    $res = mysqli_query($conn, $in);
    echo mysqli_error($conn);
    header("location:banking-list.php");
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
                            <h5 class="card-title fw-semibold mb-4">Add Stock</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form method="post">
                                        <div class="mb-3">
                                            <label for="in_out" class="form-label">Income/Expence</label>
                                            <select class="form-control" id="in_out" name="in_out">
                                                <option value="income" <?php echo $isupdate && $editRes['in_out'] == "income" ? "selected" : ''; ?>>Income</option>
                                                <option value="expence" <?php echo $isupdate && $editRes['in_out'] == "expence" ? "selected" : ''; ?>>Expence</option>
                                            </select>
                                        </div>

                                        <div id="sadityperesult">
                                            
                                        </div>

                                        <div class="mb-3">
                                            <label for="type" class="form-label">Mode</label>
                                            <select class="form-control mode-type" id="type" name="type">
                                                <option value="cash" <?php echo $isupdate && $editRes['type'] == "cash" ? "selected" : ''; ?>>Cash</option>
                                                <option value="cheque" <?php echo $isupdate && $editRes['type'] == "cheque" ? "selected" : ''; ?>>Cheque</option>
                                                <option value="upi" <?php echo $isupdate && $editRes['type'] == "upi" ? "selected" : ''; ?>>UPI</option>
                                                <option value="bank_transfer" <?php echo $isupdate && $editRes['type'] == "bank_transfer" ? "selected" : ''; ?>>Bank Transfer</option>
                                            </select>
                                        </div>

                                        <div class="col-md-12 add-new-field">

                                        </div>

                                        <div class="mb-3">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="number" name="amount" class="form-control" id="amount"
                                                placeholder="10" value="<?php echo $isupdate ? $editRes['amount'] : ''; ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="note" class="form-label">Note</label>
                                            <textarea type="text" name="note" class="form-control" id="note"
                                                placeholder="note"><?php echo $isupdate ? $editRes['note'] : ''; ?></textarea>
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

    <script>
        $(document).ready(function() {

            changeCategory();
            $(document).on("change", "#in_out", function() {
                changeCategory();
            });
            function changeCategory() {
                const income_expense = $("#in_out").val();

                if (income_expense == "income") {
                    $('#sadityperesult').html(`
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-control" id="category" name="category">
                                <option value="dealer" <?php echo $isupdate && $editRes['category'] == "dealer" ? "selected" : ''; ?>>From Dealer</option>
                                <option value="product" <?php echo $isupdate && $editRes['category'] == "dealer" ? "selected" : ''; ?>>Sell Product</option>
                            </select>
                        </div>
                    `);
                } else if (income_expense == "expence") {
                    $('#sadityperesult').html(`
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-control" id="category" name="category">
                                <option value="salary" <?php echo $isupdate && $editRes['category'] == "salary" ? "selected" : ''; ?>>Salary</option>
                                <option value="material" <?php echo $isupdate && $editRes['category'] == "material" ? "selected" : ''; ?>>Material</option>
                            </select>
                        </div>
                    `);
                }
            }

            addDynamicField();
            $(document).on("change", ".mode-type", function() {
                addDynamicField();
            });

            function addDynamicField() {
                const selectedType = $('.mode-type').val();

                if (selectedType == "cheque") {
                    $('.add-new-field').html(`
                  <div class="note-description mb-3">
                     <label class="form-label">Cheque No</label>
                     <input type="number" name="cheque_no" id="cheque_no" class="form-control" placeholder="Cheque No" required value="<?php echo $isupdate ? $editRes['cheque_no'] : ''; ?>">
                  </div>
               `);
                } else if (selectedType == "bank_transfer") {
                    $('.add-new-field').html(`
                  <div class="note-description mb-3">
                     <label class="form-label">Account No</label>
                     <input type="number" name="account_no" id="account_no" class="form-control" placeholder="To Account No" required value="<?php echo $isupdate ? $editRes['account_no'] : ''; ?>">
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