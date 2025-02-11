<?php 

  include('conn.php');


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
              <h5 class="card-title fw-semibold mb-4">Banking</h5>
              <a href="add-banking.php"><button class="btn btn-info mb-2" type="button">Add Income/Expence</button></a>
              <div class="card">
                <div class="card-body">
               
                        <div class="table-responsive">
                            <table class="table search-table align-middle text-nowrap text-center">
                                <thead class="header-item">
                                   
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Cheque No</th>
                                    <th>Account No</th>
                                    <th>Income</th>
                                    <th>Expence</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>

                                  <!-- start row -->
                                <?php 
                                
                                $que = "SELECT * FROM banking";
                                $res = mysqli_query($conn, $que);
                                while ($row = mysqli_fetch_assoc($res)) {
                                  
                                
                                ?>
                                    <tr class="search-items">
                                       
                                        <td>
                                            <span class="usr-name" ><?php echo $row['date']; ?></span>
                                        </td>
                                        <td>
                                            <span class="usr-name" ><?php echo $row['category']; ?></span>
                                        </td>
                                        <td>
                                            <span class="usr-name" ><?php echo $row['type']; ?></span>
                                        </td>
                                        <td>
                                            <span class="usr-name" ><?php echo $row['cheque_no'] ?? '-'; ?></span>
                                        </td>
                                        <td>
                                            <span class="usr-name" ><?php echo $row['account_no'] ?? '-'; ?></span>
                                        </td>
                                        <td>
                                            <span class="usr-name" style="color:darkgreen; font-weight:bold"><?php if ($row['in_out']=="income") {
                                              echo $row['amount'];
                                            } else { echo "-"; }?></span>
                                        </td>
                                        <td>
                                            <span class="usr-name" style="color:darkred; font-weight:bold" ><?php if ($row['in_out']=="expence") {
                                              echo $row['amount'];
                                            } else { echo "-"; }?></span>
                                        </td>
                                        <td>
                                            <span class="usr-name" ><?php echo $row['note']; ?></span>
                                        </td>
                                        <td>
                                            <div class="action-btn">
                                                <a href="add-banking.php?id=<?php echo $row['id']; ?>" class="text-primary edit">
                        <i class="ti ti-edit fs-5"></i>
                        </a>
                                                <a href="javascript:void(0)" class="text-dark delete ms-2">
                        <i class="ti ti-trash fs-5"></i>
                        </a>
                                            </div>
                                        </td>
                                    </tr>
                                   
                                <?php 
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
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
