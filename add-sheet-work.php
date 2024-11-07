<?php 
  include("conn.php");


  if(isset($_GET['id'])){ 
    $id = $_GET['id'];
    $isupdate = true;
    $quee = mysqli_query($conn,"SELECT * FROM fusing_paper_stock WHERE `id`='$id'");
    $ress = mysqli_fetch_assoc($quee);

  }

  if(isset($_POST['submit'])) {

    $shop = $_POST['shop'];
    $paperType = $_POST['paperType'];
    $usepaper = $_POST['usepaper'];
    $diomondType = $_POST['diomondType'];
    $usediomond = $_POST['usediomond'];
    $dye = $_POST['dye'];
    $price = $_POST['price'];
    $workers = $_POST['workers'];
    $today = date("d-m-Y");  

    $expence = $usemeter*$price;

    $q = "SELECT * FROM paper_stock";
    $r = mysqli_query($conn,$q);


    $in = "INSERT INTO sheet_work(`shop`,`paper_type`,`use_paper_qty`,`diomond_type`,`use_diomond_pkt`,'dye',`date`,`workers_id`,`price`,`date`) VALUES ('$shop','$paperType','$usepaper','$diomondType','$usediomond','$dye','$today','$workers','$price','$today')";
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
                            <h5 class="card-title fw-semibold mb-4">Add </h5>
                            <div class="card">
                                <div class="card-body">
                                    <form method="post">
                                        <div class="mb-3">

                                            <div class="mb-3">
                                                <label for="shop" class="form-label">Shop</label>
                                                <?php 
                        $paperque = mysqli_query($conn,"SELECT * FROM shop");
                      
                      ?>
                                                <select class="form-control" id="shop" name="shop">
                                                    <?php 
                          while ($row = mysqli_fetch_assoc($paperque)) {
                        ?>
                                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name']?>
                                                    </option>
                                                    <?php 
                          }
                        ?>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="paperType" class="form-label">Paper Type</label>
                                                <?php 
                        $paperque = mysqli_query($conn,"SELECT * FROM paper_type");
                      
                      ?>
                                                <select class="form-control" id="paperType" name="paperType">
                                                    <?php 
                          while ($row = mysqli_fetch_assoc($paperque)) {
                            $met = $row["meter"] - $row['use_qty'];
                        ?>
                                                    <option value="<?php echo $row['id'] ?>">
                                                        <?php echo $row['name']; ?></option>
                                                    <?php 
                          }
                        ?>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="usepaper" class="form-label">Paper Qty</label>
                                                <input type="number" step="0.01" name="usepaper" class="form-control"
                                                    id="usepaper" placeholder="10">
                                            </div>


                                            <div>
                                                <label for="diomondType" class="form-label">Diomond Type</label>
                                                <?php 
                        $paperque = mysqli_query($conn,"SELECT * FROM diomond_type");
                      
                      ?>
                                                <select class="form-control" id="diomondType" name="diomondType">
                                                    <?php 
                          while ($row = mysqli_fetch_assoc($paperque)) {
                            $met = $row["meter"] - $row['use_qty'];
                        ?>
                                                    <option value="<?php echo $row['id'] ?>">
                                                        <?php echo $row['name']; ?></option>
                                                    <?php 
                          }
                        ?>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="usediomond" class="form-label">Diomond Qty</label>
                                                <input type="number" step="0.01" name="usediomond" class="form-control"
                                                    id="usediomond" placeholder="2">
                                            </div>
                                            
                                            <div>
                                                <label for="dye" class="form-label">Dye</label>
                                                <?php 
                        $paperque = mysqli_query($conn,"SELECT * FROM dye");
                      
                      ?>
                                                <select class="form-control" id="dye" name="dye">
                                                    <?php 
                          while ($row = mysqli_fetch_assoc($paperque)) {
                            $met = $row["meter"] - $row['use_qty'];
                        ?>
                                                    <option value="<?php echo $row['id'] ?>">
                                                        <?php echo $row['number']; ?></option>
                                                    <?php 
                          }
                        ?>
                                                </select>
                                            </div>
                                           

                                            <div class="mb-3">
                                                <label for="price" class="form-label">Price per Sheet</label>
                                                <input type="number" step="0.01" name="price" class="form-control"
                                                    id="price" placeholder="1.5">
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
                                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name']?>
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
                url: 'ajax/sadi-ajax.php',
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