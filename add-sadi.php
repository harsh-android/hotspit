<?php 
  include("conn.php");


  if(isset($_POST['submit'])) {

    $colorNumber = $_POST['kapadType'];
    $cnNumber = $_POST['cnNumber'];
    $shop = $_POST['shop'];
    $today = date("d-m-Y");
    
    $file = $_FILES['image'];
    $filename = date('YmdHis') . '_' . basename($file['name']);
    $target_dir = "uploads/";
    $target_file = $target_dir . $filename;
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
   
      $mainIn = "INSERT INTO sadi_main(`cn_number`,`image`,`shop`,`date`) VALUES ('$cnNumber','$filename','$shop','$today')";
      $res = mysqli_query($conn,$mainIn); 
      $lastId = mysqli_insert_id($conn);
      for ($i=0; $i <$colorNumber ; $i++) { 
      
        $color = $_POST['color'.$i];
        $qty = $_POST['qty'.$i];
        $price = $_POST['price'.$i];
    
        $in = "INSERT INTO sadi_stock(`color`,`qty`,`price`,`sadi_main_id`) VALUES ('$color','$qty','$price','$lastId')";
        $res = mysqli_query($conn,$in); 
  
      }
      header("location:sadi-stock-list.php");
    
  
  
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
                                            <label for="cnNumber" class="form-label">CN Number</label>
                                            <input type="number" class="form-control" id="cnNumber" name="cnNumber"
                                                <?php if(@$isupdate) {?> value="<?php echo $ress['cn_number'] ?>" <?php } ?>>
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Upload Image</label>
                                            <input type="file" class="form-control" id="image" name="image"
                                                <?php if(@$isupdate) {?> value="<?php echo $ress['image'] ?>"
                                                <?php } ?>>
                                        </div>
                                        <div class="mb-3">
                                            <label for="kapadType" class="form-label">Select Number of Colors</label>
                                            <select class="form-control" id="kapadType" name="kapadType">
                                                <?php 
                          for ($i=1; $i <=10 ; $i++) { 
                        ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>



                                        <div id="sadityperesult">

                                        </div>


                                        <div class="mb-3">
                                            <label for="shop" class="form-label">Shop</label>
                                            <?php 
                        $queShop = mysqli_query($conn,"SELECT * FROM dealer");
                      
                      ?>
                                            <select class="form-control" id="shop" name="shop">
                                                <?php 
                          while ($row = mysqli_fetch_assoc($queShop)) {
                        ?>
                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?>
                                                </option>
                                                <?php 
                          }
                        ?>
                                            </select>
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