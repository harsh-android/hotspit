<?php
include('conn.php');

if (isset($_GET['d_id'])) {
    $dId = $_GET['d_id'];

    $sql_delete = "DELETE FROM `dealer` WHERE `id` = $dId";
    mysqli_query($conn, $sql_delete);

    header('location:dealer-list.php');
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
                            <h5 class="card-title fw-semibold mb-2">Dealer</h5>
                            <a href="add-dealer.php"><button class="btn btn-info mb-2" type="button">Add
                                    Dealer</button></a>
                            <div class="card">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table search-table align-middle text-nowrap">
                                            <thead class="header-item">
                                                <th>Name</th>
                                                <th>Owner Name</th>
                                                <th>Mobile</th>
                                                <th>GST</th>
                                                <th>Address</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>

                                                <!-- start row -->
                                                <?php
                                                $que = "SELECT * FROM dealer";
                                                $res = mysqli_query($conn, $que);
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                ?>

                                                    <tr class="search-items">
                                                        <td>
                                                            <a href="sadi-stock-list.php?id=<?php echo $row['id']; ?>">
                                                                <span class="usr-name"><?php echo $row['name']; ?></span>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <span class="usr-name"><?php echo $row['owner_name']; ?></span>
                                                        </td>
                                                        <td>
                                                            <span
                                                                class="usr-name"><?php echo $row['mobile_number']; ?></span>
                                                        </td>
                                                        <td>
                                                            <span class="usr-name"><?php echo $row['gst_number']; ?></span>
                                                        </td>
                                                        <td>
                                                            <span class="usr-name"><?php echo $row['address']; ?></span>
                                                        </td>
                                                        <td>
                                                            <div class="action-btn">
                                                                <a href="add-dealer.php?id=<?php echo $row['id']; ?>"
                                                                    class="text-primary edit">
                                                                    <i class="ti ti-edit fs-5"></i>
                                                                </a>
                                                                <a href="dealer-list.php?d_id=<?php echo $row['id']; ?>" class="text-dark delete ms-2" onclick="return confirmDelete()">
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