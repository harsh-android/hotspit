<?php 
  include("conn.php");

  $isupdate = false;
  if(isset($_GET['id'])){ 
    $id = $_GET['id'];
    $isupdate = true;
    $quee = mysqli_query($conn,"SELECT * FROM kapad_stock WHERE `id`='$id'");
    $editRes = mysqli_fetch_assoc($quee);
  }

  if(isset($_POST['submit'])) {

    $name = $_POST['kapadType'];
    $cuttingPrice = @$_POST['cuttingPrice'];
    if ($name == "Roll") {
      $cuttingPrice = "";
    }
  
    $meter = $_POST['meter'];
    $panno = $_POST['panno'];
    $price = $_POST['price'];
    $shop = $_POST['shop'];
    $today = date("d-m-Y");  

    if($isupdate){
      $in = "UPDATE `kapad_stock` SET `type`='$name',`cutting_price`='$cuttingPrice',`meter`='$meter',`panno`='$panno',`price`='$price',`shop`='$shop' WHERE `id`='$id'";
    } else{
      $in = "INSERT INTO kapad_stock(`type`,`cutting_price`,`meter`,`panno`,`price`,`shop`,`date`) VALUES ('$name','$cuttingPrice','$meter','$panno','$price','$shop','$today')";
    }
    
    $res = mysqli_query($conn,$in);
    echo mysqli_error($conn);
    header("location:kapad-stock-list.php");
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
                      <label for="kapadType" class="form-label">Kapad Type</label>
                      <select class="form-control" id="kapadType" name="kapadType">
                        <option value="Kapad" <?php echo $isupdate && $editRes['type'] == "Kapad" ? "selected" : ''; ?>>Sadi Meter</option>
                        <option value="Roll" <?php echo $isupdate && $editRes['type'] == "Roll" ? "selected" : ''; ?>>Roll</option>
                      </select>
                    </div>

                    <div class="mb-3 cuttingPriceSection">
                        <label for="cuttingPrice" class="form-label">Cutting Price</label>
                        <input type="number" class="form-control" id="cuttingPrice" name="cuttingPrice" value="<?php echo $isupdate ? $editRes['cutting_price'] : ''; ?>">
                    </div>
                   
                    <div class="mb-3">
                      <label for="meter" class="form-label">Meter</label>
                      <input type="number" name="meter" class="form-control" id="meter" placeholder="10" value="<?php echo $isupdate ? $editRes['meter'] : ''; ?>">
                    </div>

                    <div class="mb-3">
                      <label for="panno" class="form-label">Panno</label>
                      <input type="number" name="panno" class="form-control" id="panno" placeholder="42" value="<?php echo $isupdate ? $editRes['panno'] : ''; ?>">
                    </div>

                    <div class="mb-3">
                      <label for="price" class="form-label">Price</label>
                      <input type="number" step="0.01" name="price" class="form-control" id="price" placeholder="1000" value="<?php echo $isupdate ? $editRes['price'] : ''; ?>">
                    </div>

                    <div class="mb-3">
                      <label for="shop" class="form-label">Shop</label>
                      <?php 
                        $queShop = mysqli_query($conn,"SELECT * FROM shop");
                      
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

  <script>

    $(document).ready(function(){

      $(document).on("change","#kapadType",function() {
        getCuttingPrice();
      });

      getCuttingPrice();
      function getCuttingPrice() {
        const selectedValue = $("#kapadType").val();

        if(selectedValue === "Kapad"){
          $(".cuttingPriceSection").show();
        } else {
          $(".cuttingPriceSection").hide();
        }
      }
        
    });

  </script>

</body>

</html>
