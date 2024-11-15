<?php 
  include("conn.php");

  $isupdate = false;
  if(isset($_GET['id'])){ 
    $id = $_GET['id'];
    $isupdate = true;
    $quee = mysqli_query($conn,"SELECT * FROM fusing_paper_stock WHERE `id`='$id'");
    $ress = mysqli_fetch_assoc($quee);

  }

  if(isset($_POST['submit'])) {

    $kapadStock = $_POST['paperType'];
    $usemeter = $_POST['usemeter'];
    $price = $_POST['price'];
    $linesize = $_POST['linesize'];
    $workers = $_POST['workers'];
    $today = date("d-m-Y");  

    $expence = $usemeter*$price;


    if($isupdate){
      $in = "UPDATE `kapad_cutting` SET `type`='$name',`qty`='$diomondQut',`price`='$price',`shop`='$shop' WHERE `id`='$id'";
    } else{
      $salary = "UPDATE `workers` SET `salary`=salary+$expence WHERE `id`='$workers'";
      $ex = "UPDATE `kapad_stock` SET `use_qty`=use_qty+$usemeter, `expence`=expence+$expence WHERE `id`='$kapadStock'";
      $res = mysqli_query($conn,$salary); 
      $res = mysqli_query($conn,$ex); 
      $in = "INSERT INTO kapad_cutting(`kapad_stock_id`,`use_meter`,`price`,`line_size`,`date`,`workers_id`) VALUES ('$kapadStock','$usemeter','$price','$linesize','$today','$workers')";
    }
    $res = mysqli_query($conn,$in); 
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
              <h5 class="card-title fw-semibold mb-4"><?php echo $isupdate ? 'Edit' : 'Add' ?> Kapad Cutting</h5>
              <div class="card">
                <div class="card-body">
                  <form method="post">
                  <div class="mb-3">
                      <label for="paperType" class="form-label">Kapad Stock</label>
                      <?php 
                        $paperque = mysqli_query($conn,"SELECT * FROM kapad_stock WHERE meter != use_qty AND `type`='Kapad'");
                      
                      ?>
                      <select class="form-control" id="paperType" name="paperType">
                      <?php 
                          while ($row = mysqli_fetch_assoc($paperque)) {
                            $met = $row["meter"] - $row['use_qty'];
                        ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['type']." (".$met.") ".$row['date'] ?></option>
                        <?php 
                          }
                        ?>
                      </select>
                    </div>
                    
                    <div class="mb-3">
                      <label for="usemeter" class="form-label">Meter Use</label>
                      <input type="number" step="0.01" name="usemeter" class="form-control" id="usemeter" placeholder="10">
                    </div>
                    
                    <div class="mb-3">
                      <label for="price" class="form-label">Price per Meter</label>
                      <input type="number" step="0.01" name="price" class="form-control" id="price" placeholder="1000">
                    </div>

                    <div class="mb-3">
                      <label for="linesize" class="form-label">Line Width</label>
                      <input type="number" step="0.01" name="linesize" class="form-control" id="linesize" placeholder="2">
                    </div>

                    <div class="mb-3">
                      <label for="workers" class="form-label">Worker</label>
                      <?php 
                        $paperque = mysqli_query($conn,"SELECT * FROM workers");
                      
                      ?>
                      <select class="form-control" id="workers" name="workers">
                      <?php 
                          while ($row = mysqli_fetch_assoc($paperque)) {
                        ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name']?></option>
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

      $('#kapadType').change(function() {
        var selectedValue = $(this).val();
       
        // Call AJAX function with selected value as parameter
        $.ajax({
            url: 'ajax/sadi-ajax.php',
            type: 'POST',
            data: { 'type': selectedValue },
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
