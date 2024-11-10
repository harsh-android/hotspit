<?php 
  include("conn.php");

  $isupdate = false;
  if(isset($_GET['id'])){ 
    $id = $_GET['id'];
    $isupdate = true;
    $quee = mysqli_query($conn,"SELECT * FROM banking WHERE `id`='$id'");
    $ress = mysqli_fetch_assoc($quee);
  }

  if(isset($_POST['submit'])) {

    $in_out = $_POST['kapadType'];
  
    $category = $_POST['category'];
    $amount = $_POST['amount'];
    $note = $_POST['note'];
    $type = $_POST['type'];
    $today = date("d-m-Y");  

    if($isupdate){
      $in = "UPDATE `banking` SET `type`='$in_out',`category`='$category',`amount`='$amount',`type`='$type',`note`='$note' WHERE `id`='$id'";
    } else{
      $in = "INSERT INTO banking(`in_out`,`category`,`type`,`amount`,`note`,`date`) VALUES ('$in_out','$category','$type','$amount','$note','$today')";
    }
    
    $res = mysqli_query($conn,$in);
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
            <?php include('header.php');?>
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
                                            <label for="kapadType" class="form-label">Income/Expence</label>
                                            <select class="form-control" id="kapadType" name="kapadType">
                                                <option value="income">Income</option>
                                                <option value="expence">Expence</option>
                                            </select>
                                        </div>
                                        <div id="sadityperesult">
                                            <div class="mb-3">
                                                <label for="category" class="form-label">Category</label>
                                                <select class="form-control" id="category" name="category">
                                                    <option value="dealer">From Dealer</option>
                                                    <option value="product">Sell Product</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="type" class="form-label">Mode</label>
                                            <select class="form-control" id="type" name="type">
                                                <option value="cash">Cash</option>
                                                <option value="check">Check</option>
                                                <option value="upi">UPI</option>
                                                <option value="bank">Bank Transfer</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="amount" class="form-label">Amount</label>
                                            <input type="number" name="amount" class="form-control" id="amount"
                                                placeholder="10">
                                        </div>

                                        <div class="mb-3">
                                            <label for="note" class="form-label">Note</label>
                                            <textarea type="text" name="note" class="form-control" id="note"
                                                placeholder="note"></textarea>
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

        $('#kapadType').change(function() {
            var selectedValue = $(this).val();

            // Call AJAX function with selected value as parameter
            $.ajax({
                url: 'ajax/banking-cat-ajax.php',
                type: 'POST',
                data: {
                    'type': selectedValue
                },
                success: function(response) {
                    //  alert("hello");
                    // Handle the response from the PHP script
                    $('#sadityperesult').html(response);
                }
            });
        });

    });
    </script>

</body>

</html>