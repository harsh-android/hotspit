<?php 

  include('conn.php');

  $isupdate = false;
  if(isset($_GET['id'])){ 
    $id = $_GET['id'];
    $isupdate = true;
    $quee = mysqli_query($conn,"SELECT * FROM dealer WHERE `id`='$id'");
    $ress = mysqli_fetch_assoc($quee);

  }

  if(isset($_POST['submit'])) {

    $shopName = $_POST['shopName'];
    $ownerName = $_POST['ownerName'];
    $mobileNumber = $_POST['mobileNumber'];
    $gstNumber = $_POST['gstNumber'];
    $address = $_POST['address'];

    if($isupdate){
      $in = "UPDATE `dealer` SET `name`='$name', `owner_name`='$ownerName', `mobile_number`='$mobileNumber', `gst_number`='$gstNumber', `address`='$address' WHERE `id`='$id'";
    } else{
      $in = "INSERT INTO dealer(`name`,`owner_name`,`mobile_number`,`gst_number`,`address`) VALUES ('$shopName','$ownerName','$mobileNumber','$gstNumber','$address')";
    }
    $res = mysqli_query($conn,$in); 
    header("location:dealer-list.php");
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
              <h5 class="card-title fw-semibold mb-4">Add Diomond Type</h5>

              
              <div class="card">
                <div class="card-body">
                  <form method="post">
                 
                      <div class="mb-3">
                          <label for="shopName" class="form-label">Shop Name</label>
                          <input type="text" class="form-control" id="shopName" name="shopName"  <?php if(@$isupdate) {?> value="<?php echo $ress['name'] ?>" <?php } ?>>
                      </div>
                  
                      <div class="mb-3">
                          <label for="ownerName" class="form-label">Owner Name</label>
                          <input type="text" class="form-control" id="ownerName" name="ownerName"  <?php if(@$isupdate) {?> value="<?php echo $ress['owner_name'] ?>" <?php } ?>>
                      </div>
                    
                      <div class="mb-3">
                          <label for="mobileNumber" class="form-label">Mobile Number</label>
                          <input type="number" class="form-control" id="mobileNumber" name="mobileNumber"  <?php if(@$isupdate) {?> value="<?php echo $ress['mobile_number'] ?>" <?php } ?>>
                      </div>
                   
                      <div class="mb-3">
                          <label for="gstNumber" class="form-label">GST Number</label>
                          <input type="text" class="form-control" id="gstNumber" name="gstNumber"  <?php if(@$isupdate) {?> value="<?php echo $ress['gst_number'] ?>" <?php } ?>>
                      </div>
                   
                      <div class="mb-3">
                          <label for="address" class="form-label">Address</label>
                          <input type="text" class="form-control" id="address" name="address"  <?php if(@$isupdate) {?> value="<?php echo $ress['address'] ?>" <?php } ?>>
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
