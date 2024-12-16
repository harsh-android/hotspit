<?php
include('conn.php');

session_start();
unset($_SESSION['bill_data']); // unset old session

if(isset($_REQUEST['id'])) {
   $id = $_REQUEST['id'];
   $qu = "UPDATE generate_bill_data SET paid='1' WHERE id='$id'";
   $rs = mysqli_query($conn,$qu);
   header("location:view-all-bills.php");
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spike Free</title>
    <!-- datatable css -->
    <link rel="stylesheet" href="src/assets/css/datatable/datatables.min.css">

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
                                <a href="generate-bill.php"><button class="btn btn-info" type="button">Generate
                                        Bill</button></a>
                            </div>
                            <div class="card">
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table id="example" class="table search-table align-middle text-nowrap">
                                            <thead class="header-item">
                                                <th>Invoice No</th>
                                                <th>Shop</th>
                                                <th>Bill Date</th>
                                                <th>Colors</th>
                                                <th>Paid/Not</th>
                                                <th></th>
                                            </thead>
                                            <tbody>

                                                <!-- start row -->
                                                <?php
                                    $que = "SELECT generate_bill_data.*, dealer.name, dealer.owner_name FROM generate_bill_data INNER JOIN dealer ON dealer.id = generate_bill_data.shop_id";
                                    $res = mysqli_query($conn, $que);
                                    while ($row = mysqli_fetch_assoc($res)) {
                                       
                                    ?>
                                                <tr class="search-items">
                                                    <td>
                                                        <span class="usr-name"><?php echo $row['id']; ?></span>
                                                    </td>
                                                    <td>
                                                        <span class="usr-name"><?php echo $row['name']; ?>
                                                            (<?php echo $row['owner_name']; ?>)</span>
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
                                                        <p><button disabled
                                                                class="btn btn-outline-<?php  if($row['paid']==0){ echo "danger";} else {echo "success"; } ?>">
                                                                <?php  if($row['paid']==0){ echo "Pending";} else {echo "Paid"; } ?></button>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <div style="display:flex;">
                                                            <?php 
                                                   if(@$row['paid'] == 0) {
                                                ?>
                                                            <a href="view-all-bills.php?id=<?php echo $row['id']; ?>"><i
                                                                    class="ti ti-discount-check fs-7 text-success"></i></a>
                                                            <?php } ?>
                                                            <form class="ms-3" method="POST" action="bill.php">
                                                                <input type="hidden" name="id"
                                                                    value="<?php echo $row['id']; ?>">
                                                                <button type="submit"
                                                                    class="btn btn-success btn-sm">View Bill</button>
                                                            </form>
                                                            <a href="edit-bill.php?id=<?php echo $row['id']; ?>"><button>Edit</button></a>
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

    <script src="src/assets/js/datatable/datatables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#example').DataTable({
            layout: {
                topStart: {
                    buttons: [{
                            extend: 'excelHtml5',
                            text: 'Export to Excel',
                            className: 'btn btn-success'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: 'Export to PDF',
                            className: 'btn btn-danger'
                        },
                        {
                            extend: 'print',
                            text: 'Print',
                            className: 'btn btn-primary'
                        }
                    ]
                }
            },
            responsive: true,
            autoWidth: false
        });
    });
    </script>

</body>

</html>