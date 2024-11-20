<?php
include('conn.php');
$id = $_GET['id'];

if (isset($_POST['submit'])) {
  $que = "SELECT * FROM sadi_stock WHERE `sadi_main_id`='$id'";
  $res = mysqli_query($conn,$que);
  while ($ro = mysqli_fetch_assoc($res)) {
    
    $i = $ro['id'];
    $useqty = $_POST["qty$i"];
    $price = $_POST["price$i"];

    $q = "UPDATE sadi_stock SET `use_qty`='$useqty', `price`='$price' WHERE `id`='$i'";
    $r = mysqli_query($conn,$q);

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
                            <!-- <h5 class="card-title fw-semibold mb-4">Paper Stock</h5>
              <a href="add-paper-stock.php"><button class="btn btn-info mb-2" type="button">Add Paper Stock</button></a> -->
                            <div class="card">
                                <div class="card-body">
                                    <form method="post">
                                        <div class="table-responsive">
                                            <?php 
                                        
                                          $que = "SELECT * FROM sadi_stock WHERE `sadi_main_id`='$id'";
                                          $res = mysqli_query($conn,$que);
                                          while($mainrow = mysqli_fetch_assoc($res)) {

                                        ?>


                                            <div class="row" id="sadityperesult">
                                                <div class=" col-lg-4 col-12 mb-3">
                                                    <label for="color" class="form-label">Colors</label>
                                                    <?php 
        $typeque = mysqli_query($conn,"SELECT * FROM color");
        ?>
                                                    <select class="form-control" id="color<?php echo $mainrow['id']; ?>" disabled
                                                        name="color<?php echo $i; ?>">
                                                        <?php 
            while ($row = mysqli_fetch_assoc($typeque)) {
        ?>
                                                        <option value="<?php echo $row['id'] ?>"
                                                            <?php if($mainrow['color']==$row['id']) { echo "selected"; } ?>>
                                                            <?php echo $row['name']; ?>
                                                        </option>
                                                        <?php 
            }
        ?>
                                                    </select>
                                                </div>
                                                <div class=" col-lg-4 col-12 mb-3">
                                                    <label for="qty" class="form-label">Use Qty</label>
                                                    <input type="number" name="qty<?php echo $mainrow['id']; ?>"
                                                        class="form-control" id="qty" placeholder="10" value="<?php echo $mainrow['qty']; ?>">
                                                </div>

                                                <dl̥iv class=" col-lg-4 col-12 mb-3">
                                                    <label for="price" class="form-label">Price</label>
                                                    <input type="number" name="price<?php echo $mainrow['id']; ?>"
                                                        class="form-control" id="price" placeholder="1000">
                                                </dl̥iv>
                                            </div>

                                            <?php } ?>
                                            <button type="submit" name="submit" class="btn btn-info">SUBMIT</button>
                                        </div>
                                    </form>
                                </div>
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