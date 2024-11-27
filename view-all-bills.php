<?php
include('conn.php');

session_start();
unset($_SESSION['bill_data']); // unset old session
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
                     <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title fw-semibold">View All Bills</h5>
                        <a href="generate-bill.php"><button class="btn btn-info" type="button">Generate Bill</button></a>
                     </div>
                     <div class="card">
                        <div class="card-body">

                           <div class="table-responsive">
                              <table class="table search-table align-middle text-nowrap">
                                 <thead class="header-item">
                                    <th>Invoice No</th>
                                    <th>Shop</th>
                                    <th>Bill Date</th>
                                    <th>Colors</th>
                                    <th></th>
                                 </thead>
                                 <tbody>

                                    <!-- start row -->
                                    <?php
                                    $que = "SELECT generate_bill_data.*, shop.name, shop.owner_name FROM generate_bill_data INNER JOIN shop ON shop.id = generate_bill_data.shop_id";
                                    $res = mysqli_query($conn, $que);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                    ?>
                                       <tr class="search-items">
                                          <td>
                                             <span class="usr-name"><?php echo $row['id']; ?></span>
                                          </td>
                                          <td>
                                             <span class="usr-name"><?php echo $row['name']; ?> (<?php echo $row['owner_name']; ?>)</span>
                                          </td>
                                          <td>
                                             <span class="usr-name">
                                                <?php
                                                $bill_date_get = $row['bill_date'];
                                                $bill_date = date('d/m/Y', strtotime($bill_date_get));
                                                echo $bill_date; ?>
                                             </span>
                                          </td>
                                          <td>
                                             <span class="usr-name">
                                                <?php
                                                $colors = str_replace(',|,', ', ', $row['color']);
                                                echo $colors; ?>
                                             </span>
                                          </td>
                                          <td>
                                             <form method="POST" action="bill.php">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" class="btn btn-success btn-sm">View Bill</button>
                                             </form>
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

</body>

</html>