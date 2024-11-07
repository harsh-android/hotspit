<?php 
  include("conn.php");


  if(isset($_GET['id'])){ 
    $id = $_GET['id'];
    $isupdate = true;
    $quee = mysqli_query($conn,"SELECT * FROM blouse_stock WHERE `id`='$id'");
    $ress = mysqli_fetch_assoc($quee);

  }

  if(isset($_POST['submit'])) {

    $type = $_POST['blouseType'];
    $qty = $_POST['qty'];
    $price = $_POST['price'];
    $shop = $_POST['shop'];
    $today = date("d-m-Y");  

    if($isupdate){
      $in = "UPDATE `blouse_stock` SET `type`='$type',`qty`='$qty',`price`='$price',`shop`='$shop' WHERE `id`='$id'";
    } else{
      $in = "INSERT INTO blouse_stock(`type`,`qty`,`price`,`shop`,`date`) VALUES ('$name','$qty','$price','$shop','$today')";
    }
    $res = mysqli_query($conn,$in); 
    header("location:blouse-stock-list.php");
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
              <h5 class="card-title fw-semibold mb-4">Add Blouse</h5>
              <div class="card">
                <div class="card-body">
                  <form>
                    <div class="mb-3">
                      <label for="blouseType" class="form-label">Blouse Type</label>
                      <?php 
                        $typeque = mysqli_query($conn,"SELECT * FROM blouse_type");
                      ?>
                      <select class="form-control" id="blouseType" name="blouseType">
                      <?php 
                          while ($row = mysqli_fetch_assoc($typeque)) {
                        ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                        <?php 
                          }
                        ?>
                      </select>
                    </div>
                    <div id="sadityperesult">
                      <div class="mb-3">
                          <label for="qty" class="form-label">Quntity</label>
                          <input type="number" class="form-control" id="qty" name="qty">
                      </div>
                    </div>
                
                    <div class="mb-3">
                      <label for="price" class="form-label">Price</label>
                      <input type="number" name="price" class="form-control" id="price" placeholder="1000">
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
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                        <?php 
                          }
                        ?>
                      </select> 
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
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
