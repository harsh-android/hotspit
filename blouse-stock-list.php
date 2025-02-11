<?php
include('conn.php');

if (isset($_GET['d_id'])) {
  $dId = $_GET['d_id'];

  $sql_delete = "DELETE FROM `blouse_stock` WHERE `id` = $dId";
  mysqli_query($conn,$sql_delete);

  header('location:blouse-stock-list.php');
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
              <h5 class="card-title fw-semibold mb-4">Blouse Stock</h5>
              <a href="add-blouse-stock.php"><button class="btn btn-info mb-2" type="button">Add Blouse Stock</button></a>
              <div class="card">
                <div class="card-body">

                  <div class="table-responsive">
                    <table class="table search-table align-middle text-nowrap">
                      <thead class="header-item">

                        <th>Type</th>
                        <th>Shop</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Date</th>
                      </thead>
                      <tbody>

                        <!-- start row -->
                        <?php

                        $que = "SELECT * FROM blouse_stock";
                        $res = mysqli_query($conn, $que);
                        while ($row = mysqli_fetch_assoc($res)) {
                          @$typeId = $row["type"];
                          @$shopId = $row["shop"];

                        ?>
                          <tr class="search-items">
                            <td>
                              <span class="usr-name"><?php @$typeData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM blouse_type WHERE `id`='$typeId'"));
                                                      echo @$typeData["name"];
                                                      ?></span>
                            </td>
                            <td>
                              <span class="usr-name"><?php @$shopData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM shop WHERE `id`='$shopId'"));
                                                      echo @$shopData["name"] . "<br/>(" . $shopData['owner_name'] . ")";
                                                      ?></span>
                            </td>
                            <td>
                              <span class="usr-name"><?php echo $row['qty']; ?></span>
                            </td>

                            <td>
                              <span class="usr-name"><?php echo $row['price']; ?></span>
                            </td>
                            <td>
                              <span class="usr-name"><?php echo $row['date']; ?></span>
                            </td>
                            <td>
                              <div class="action-btn">
                                <a href="add-blouse-stock.php?id=<?php echo $row['id']; ?>" class="text-primary edit">
                                  <i class="ti ti-edit fs-5"></i>
                                </a>
                                <a href="blouse-stock-list.php?d_id=<?php echo $row['id']; ?>" class="text-dark delete ms-2" onclick="return confirmDelete()">
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
    function confirmDelete() {
        return confirm("Are you sure you want to delete this item?");
    }
  </script>
</body>

</html>