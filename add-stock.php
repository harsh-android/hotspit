<?php 
  include("conn.php");
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
              <h5 class="card-title fw-semibold mb-4"><?php echo $isupdate ? 'Edit' : 'Add' ?> Stock</h5>
              <div class="card">
                <div class="card-body">
                  <form>
                    <div class="mb-3">
                      <label for="kapadType" class="form-label">Kapad Type</label>
                      <select class="form-control" id="kapadType" name="kapadType">
                        <option value="Kapad">Sadi Meter</option>
                        <option value="Roll">Roll</option>
                      </select>
                    </div>
                    <div id="sadityperesult">
                      <div class="mb-3">
                          <label for="cuttingPrice" class="form-label">Cutting Price</label>
                          <input type="number" class="form-control" id="cuttingPrice" name="cuttingPrice">
                      </div>
                    </div>
                   

                    <div class="mb-3">
                      <label for="paperType" class="form-label">Paper Type</label>
                      <?php 
                        $paperque = mysqli_query($conn,"SELECT * FROM paper_type");
                      
                      ?>
                      <select class="form-control" id="paperType" name="paperType">
                      <?php 
                          while ($row = mysqli_fetch_assoc($paperque)) {
                        ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                        <?php 
                          }
                        ?>
                      </select>
                    </div>
                    
                    <div class="mb-3">
                      <label for="paperQut" class="form-label">Paper Quanitity</label>
                      <input type="number" name="paperQut" class="form-control" id="paperQut" placeholder="10">
                    </div>
                    
                    <div class="mb-3">
                      <label for="fusingPaperType" class="form-label">Fusing Paper Type</label>
                      <?php 
                        $fusingpaperque = mysqli_query($conn,"SELECT * FROM fusing_paper_type");
                      
                      ?>
                      <select class="form-control" id="fusingPaperType" name="fusingPaperType">
                        <?php 
                        if(mysqli_num_rows($fusingpaperque)>0) {
                          while ($row = mysqli_fetch_assoc($fusingpaperque)) {
                        ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                        <?php 
                          }
                        }
                        ?>
                      </select>
                    </div>
                    
                    <div class="mb-3">
                      <label for="fusingPaperQut" class="form-label">Paper Quanitity</label>
                      <input type="number" name="fusingPaperQut" class="form-control" id="fusingPaperQut" placeholder="10">
                    </div>

                    <div class="mb-3">
                      <label for="price" class="form-label">Price</label>
                      <input type="number" name="price" class="form-control" id="price" placeholder="1000">
                    </div>

                    <div class="mb-3">
                      <label for="shop" class="form-label">Shop</label>
                      <select class="form-control" id="shop" name="shop">
                        <option value="Kapad">Normal</option>
                        <option value="Roll">DMC</option>
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
