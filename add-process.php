<?php 
  include("conn.php");
  session_start();

  $isupdate = false;
  if(isset($_GET['id'])){ 
    $id = $_GET['id'];
    $isupdate = true;
    $quee = mysqli_query($conn,"SELECT * FROM kapad_stock WHERE `id`='$id'");
    $ress = mysqli_fetch_assoc($quee);
  }

  if(isset($_POST['submit'])) {

    $type = $_POST['type'];
    
    $price = $_POST['price'];
    $worker = $_POST['worker'];
    $today = date("d-m-Y");  

    $selectedStocks = $_SESSION['selected_stocks'];
    
    if($type == "23nidel"){
      foreach ($selectedStocks as $key => $value) {
        $stockId = $value["stock_id"];
        $use = $value["use"];

        $getUseQty = "SELECT * FROM `sadi_stock` WHERE `id` = '$stockId'";
        $getUseQtyResult = $conn->query($getUseQty);
        $row = $getUseQtyResult->fetch_assoc();
        $usedQtrIs = (int)$row['use_qty'] + (int)$use;

        if ($usedQtrIs > (int)$row['qty']){
          $available_qty = (int)$row['qty'] - (int)$row['use_qty'];
          $error_message = "Insufficient stock, Please enter correct Use Quantity!";
          break;
        }
      }

      if (empty($error_message)) {
        foreach ($selectedStocks as $key => $value) {
          $stockId = $value["stock_id"];
          $use = $value["use"];

          $getUseQty = "SELECT * FROM `sadi_stock` WHERE `id` = '$stockId'";
          $getUseQtyResult = $conn->query($getUseQty);
          $row = $getUseQtyResult->fetch_assoc();
          $usedQtrIs = (int)$row['use_qty'] + (int)$use;

          $useQue = "UPDATE `sadi_stock` SET `use_qty`= $usedQtrIs WHERE `id`='$stockId'";
          mysqli_query($conn,$useQue);
          $in = "INSERT INTO nidel_expence(`sadi_stock_id`,`use_qty`,`price`,`workers_id`,`date`) VALUES ('$stockId','$use','$price','$worker','$today')";
          $res = mysqli_query($conn,$in);
        }
        header("location: dealer-list.php");
      }
    }

    if($type == "lessfiting"){
      foreach ($selectedStocks as $key => $value) {
        $stockId = $value["stock_id"];
        $use = $value["use"];

        $in = "INSERT INTO less_fiting(`sadi_stock_id`,`use_qty`,`price`,`workers_id`,`date`) VALUES ('$stockId','$use','$price','$worker','$today')";
        $res = mysqli_query($conn,$in);
      }
      header("location:dealer-list.php");
    }

    if($type == "hotfix"){
      $buttaCount = $_POST['buttaCount'];
      $buttaPrice = $_POST['buttaPrice'];
      $lineCount = $_POST['lineCount'];
      $linePrice = $_POST['linePrice'];
      $sheetUsed = $_POST['sheetUsed'];
      $sheetPrice = $_POST['sheetPrice'];
      $borderPrice = $_POST['borderPrice'];


      foreach ($selectedStocks as $key => $value) {
        $stockId = $value["stock_id"];
        $use = $value["use"];

        $in = "INSERT INTO hotfix(`sadi_stock_id`,`use_qty`,`workers_id`,`butta_count`,`butta_price`,`line_count`,`line_price`,`sheet_used`,`sheet_price`,`border_price`,`price`,`date`) VALUES ('$stockId','$use','$worker','$buttaCount','$buttaPrice','$lineCount','$linePrice','$sheetUsed','$sheetPrice','$borderPrice','$price','$today')";
        $res = mysqli_query($conn,$in);
      }
      header("location:dealer-list.php");
    }


    if($type == "fusing"){
      foreach ($selectedStocks as $key => $value) {
        $stockId = $value["stock_id"];
        $use = $value["use"];

        $in = "INSERT INTO fusing_expence(`sadi_stock_id`,`use_qty`,`price`,`workers_id`,`date`) VALUES ('$stockId','$use','$price','$worker','$today')";
        $res = mysqli_query($conn,$in);
      }
      header("location:dealer-list.php");
    }

    if($type == "reniyacutting"){
      foreach ($selectedStocks as $key => $value) {
        $stockId = $value["stock_id"];
        $use = $value["use"];

        $in = "INSERT INTO reniya_cutting(`sadi_stock_id`,`use_qty`,`price`,`workers_id`,`date`) VALUES ('$stockId','$use','$price','$worker','$today')";
        $res = mysqli_query($conn,$in);
      }
      header("location:dealer-list.php");
    }

    // if($isupdate){
    //   $in = "UPDATE `kapad_stock` SET `type`='$name',`cutting_price`='$cuttingPrice',`meter`='$meter',`panno`='$panno',`price`='$price',`shop`='$shop' WHERE `id`='$id'";
    // } else{
    //   $in = "INSERT INTO kapad_stock(`type`,`cutting_price`,`meter`,`panno`,`price`,`shop`,`date`) VALUES ('$name','$cuttingPrice','$meter','$panno','$price','$shop','$today')";
    // }
    
    // $res = mysqli_query($conn,$in);
    // echo mysqli_error($conn);
    // header("location:kapad-stock-list.php");
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
              <h5 class="card-title fw-semibold mb-4">Add Process</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post">
                    <?php if(!empty($error_message)) { ?>
                      <p style="color: red;"><?php echo $error_message; ?></p>
                    <?php } ?>
                    <div class="mb-3">
                      <label for="type" class="form-label">Process Type</label>
                      <select class="form-control kapadType" id="type" name="type">
                        <option value="23nidel">23 Nidel</option>
                        <option value="lessfiting">Less Fiting</option>
                        <option value="hotfix">Hotfix</option>
                        <option value="fusing">Fusing</option>
                        <option value="reniyacutting">Reniya Cutting</option>
                      </select>
                    </div>
                    <div id="sadityperesult">
                     
                    </div>
              

                    <div class="mb-3">
                      <label for="price" class="form-label">Price</label>
                      <input type="number" step="0.01" name="price" class="form-control" id="price" placeholder="1000">
                    </div>

                    <div class="mb-3">
                      <label for="worker" class="form-label">Worker</label>
                      <?php 
                        $queShop = mysqli_query($conn,"SELECT * FROM workers");
                      
                      ?>
                      <select class="form-control" id="worker" name="worker">
                      <?php 
                          while ($row = mysqli_fetch_assoc($queShop)) {
                        ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
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

      $(document).on('change','.kapadType',function() {
        var selectedValue = $(this).val();
        
        if(selectedValue === 'hotfix'){
          // Call AJAX function with selected value as parameter
          $.ajax({
            url: 'ajax/process-ajax.php',
            type: 'POST',
            data: { 'type': selectedValue },
            success: function(response) {
              //  alert("hello");
                // Handle the response from the PHP script
                $('#sadityperesult').html(response);
            }
          });
        } else {
          $('#sadityperesult').html("");
        }
      });
        
    });

  </script>

</body>

</html>
