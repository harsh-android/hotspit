<?php 
  include("conn.php");


  if(isset($_POST['submit'])) {

    $type = $_POST['kapadType'];
    $dyeNumber = $_POST['dyeNumber'];
    $count = $_POST['count'];
    $totaldiomond = $_POST['totaldiomond'];
    $price = $_POST['price'];
    $today = date("d-m-Y");
    
    $file = $_FILES['image'];
    $filename = date('YmdHis') . '_' . basename($file['name']);
    $target_dir = "uploads/";
    $target_file = $target_dir . $filename;
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
   
      $mainIn = "INSERT INTO dye(`number`,`photo`,`type`,`count`,`total_diomond`,`price`) VALUES ('$dyeNumber','$filename','$type','$count','$totaldiomond','$price')";
      $res = mysqli_query($conn,$mainIn); 
      $lastId = mysqli_insert_id($conn);
      
      header("location:paper-dye.php");
    
  
  
    } else {
        echo "Sorry, there was an error uploading your file.";
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
            <?php include('header.php');?>
            <!--  Header End -->
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Add Sadi Stock</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="dyeNumber" class="form-label">Dye Number</label>
                                            <input type="number" class="form-control" id="dyeNumber" name="dyeNumber"
                                                <?php if(@$isupdate) {?> value="<?php echo $ress['cn_number'] ?>"
                                                <?php } ?>>
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Upload Image</label>
                                            <input type="file" class="form-control" id="image" name="image"
                                                <?php if(@$isupdate) {?> value="<?php echo $ress['image'] ?>"
                                                <?php } ?>>
                                        </div>

                                        <div class="mb-3">
                                            <label for="kapadType" class="form-label">Type</label>
                                            <select class="form-control" id="kapadType" name="kapadType">
                                                <option value="butta">Butta</option>
                                                <option value="less">Less</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <div id="titles">    
                                                <label for="count" class="form-label">Butta Count</label>
                                            </div>
                                            <input type="number" class="form-control" id="count" name="count"
                                                <?php if(@$isupdate) {?> value="<?php echo $ress['count'] ?>"
                                                <?php } ?>>
                                        </div>

                                        <div class="mb-3">
                                            <label for="totaldiomond" class="form-label">Total Diomond</label>
                                            <input type="number" class="form-control" id="totaldiomond" name="totaldiomond"
                                                <?php if(@$isupdate) {?> value="<?php echo $ress['total_diomond'] ?>"
                                                <?php } ?>>
                                        </div>

                                        <div class="mb-3">
                                            <label for="price" class="form-label">Price</label>
                                            <input type="number" step="0.01" class="form-control" id="price" name="price"
                                                <?php if(@$isupdate) {?> value="<?php echo $ress['price'] ?>"
                                                <?php } ?>>
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

            if (selectedValue == "butta") {
                $('#titles').html('<label for="count" class="form-label">Butta Count</label>');
            }else {
                $('#titles').html('<label for="count" class="form-label">Less Count</label>');
            }

            // Call AJAX function with selected value as parameter
            $.ajax({
                url: 'ajax/sadi-color-ajax.php',
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