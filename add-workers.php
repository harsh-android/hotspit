<?php
include("conn.php");

$isupdate = false;
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $isupdate = true;
  $quee = mysqli_query($conn, "SELECT * FROM workers WHERE `id`='$id'");
  $editRes = mysqli_fetch_assoc($quee);
}

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  if ($isupdate) {
    $in = "UPDATE `workers` SET `name`='$name',`address`='$address',`phone`='$phone' WHERE `id`='$id'";
  } else {
    $in = "INSERT INTO workers(`name`,`address`,`phone`,`salary`,`upad`) VALUES ('$name','$address','$phone','0','0')";
  }
  $res = mysqli_query($conn, $in);
  header("location:workers-list.php");
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
              <h5 class="card-title fw-semibold mb-4">Add Workers</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post">

                    <div id="sadityperesult">
                      <div class="mb-3">
                        <label for="name" class="form-label">Worker Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Add name" value="<?php echo $isupdate ? $editRes['name'] : ''; ?>">
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" name="address" class="form-control" id="address" placeholder="Add address" value="<?php echo $isupdate ? $editRes['address'] : ''; ?>">
                    </div>

                    <div class="mb-3">
                      <label for="phone" class="form-label">Contact No</label>
                      <input type="number" name="phone" class="form-control" id="phone" placeholder="Add contact no" value="<?php echo $isupdate ? $editRes['phone'] : ''; ?>">
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