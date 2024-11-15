<?php

include('conn.php');

$isupdate = false;
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $isupdate = true;
  $quee = mysqli_query($conn, "SELECT * FROM diomond_stock WHERE `id`='$id'");
  $editRes = mysqli_fetch_assoc($quee);
}

if (isset($_POST['submit'])) {

  $name = $_POST['diomondType'];
  $diomondQut = $_POST['diomondQut'];
  $diomondPacketQut = $_POST['diomondPacketQut'];
  $price = $_POST['price'];
  $shop = $_POST['shop'];
  $today = date("d-m-Y");

  if ($isupdate) {
    $in = "UPDATE `diomond_stock` SET `type`='$name',`pkt_qty`='$diomondQut',`qty_per_pkt`='$diomondPacketQut',`price`='$price',`shop`='$shop' WHERE `id`='$id'";
  } else {
    $in = "INSERT INTO diomond_stock(`type`,`pkt_qty`,`qty_per_pkt`,`price`,`shop`,`date`) VALUES ('$name','$diomondQut','$diomondPacketQut','$price','$shop','$today')";
  }
  $res = mysqli_query($conn, $in);
  header("location:diomond-stock-list.php");
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
              <h5 class="card-title fw-semibold mb-4"><?php echo $isupdate ? 'Edit' : 'Add' ?> Diomond Stock</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post">

                    <div class="mb-3">
                      <label for="diomondType" class="form-label">Diomond Type</label>
                      <?php
                      $que = mysqli_query($conn, "SELECT * FROM diomond_type");
                      ?>
                      <select class="form-control" id="diomondType" name="diomondType">
                        <?php
                        while ($row = mysqli_fetch_assoc($que)) {
                        ?>
                          <option value="<?php echo $row['id'] ?>" <?php echo $isupdate && $editRes['type'] == $row['id'] ? "selected" : ''; ?>><?php echo $row['name'] ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="diomondQut" class="form-label">Diomond Packet Quanitity</label>
                      <input type="number" name="diomondQut" class="form-control" id="diomondQut" placeholder="10" value="<?php echo $isupdate ? $editRes['pkt_qty'] : ''; ?>">
                    </div>

                    <div class="mb-3">
                      <label for="diomondPacketQut" class="form-label">Diomond Quanitity per Packet</label>
                      <input type="number" name="diomondPacketQut" class="form-control" id="diomondPacketQut" placeholder="80000" value="<?php echo $isupdate ? $editRes['qty_per_pkt'] : ''; ?>">
                    </div>

                    <div class="mb-3">
                      <label for="price" class="form-label">Price</label>
                      <input type="number" name="price" class="form-control" id="price" placeholder="1000" value="<?php echo $isupdate ? $editRes['price'] : ''; ?>">
                    </div>

                    <div class="mb-3">
                      <label for="shop" class="form-label">Shop</label>
                      <?php
                      $queShop = mysqli_query($conn, "SELECT * FROM shop");

                      ?>
                      <select class="form-control" id="shop" name="shop">
                        <?php
                        while ($row = mysqli_fetch_assoc($queShop)) {
                        ?>
                          <option value="<?php echo $row['id'] ?>" <?php echo $isupdate && $editRes['shop'] == $row['id'] ? "selected" : ''; ?>><?php echo $row['name'] ?></option>
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

</body>
</html>