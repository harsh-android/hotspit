<?php
include('conn.php');

if (isset($_GET['d_id'])) {
    $dId = $_GET['d_id'];
  
    $quee = mysqli_query($conn, "SELECT * FROM `dye` WHERE `id`='$dId'");
    $editRes = mysqli_fetch_assoc($quee);
    $existingImage = $editRes['photo'];
    $target_dir = "uploads/";
    if ($existingImage && file_exists($target_dir . $existingImage)) {
        unlink($target_dir . $existingImage);
    }

    $sql_delete = "DELETE FROM `dye` WHERE `id` = $dId";
    mysqli_query($conn,$sql_delete);
  
    header('location:paper-dye.php');
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
                            <h5 class="card-title fw-semibold mb-4">Dye</h5>
                            <div class="d-flex justify-content-between align-items-center gap-6 mb-4">
                                <a href="add-dye.php"><button class="btn btn-info mb-2" type="button">Add Dye</button></a>
                                <form class="position-relative">
                                    <input type="text" class="form-control search-chat py-2 ps-5" id="search-dye" placeholder="Search Dye Number">
                                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                                </form>
                            </div>
                            <div class="card">
                                <div id="stockDetails"></div>
                                <div class="card-body">
                                    <div class="border-bottom">
                                        <div class="row search-dye-response">
                                            <?php
                                            $que = mysqli_query($conn, "SELECT * FROM dye");
                                            while ($row = mysqli_fetch_assoc($que)) {
                                            ?>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <div class="product hover-img mb-7">
                                                        <div class="product-img position-relative rounded-1 mb-6 overflow-hidden">
                                                            <a href="sadi-stock-detail.php?id=<?php echo $row['id'] ?>">
                                                                <img src="uploads/<?php echo $row['photo']; ?>"
                                                                    alt="spike-img" class="w-100" style="min-height: 140px; max-height: 140px;">
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <!-- <input type="checkbox" name="sadi_main_ids[]" value="<?php echo $row['id']; ?>"> -->

                                                            <h5 class="mb-2"><?php echo $row['number']; ?></h5>

                                                            <div class="d-flex align-items-center mb-2">

                                                                <h6 class="mb-0 me-1"><?php echo $row['count']; ?></h6>
                                                                <p class="mb-0"><?php echo $row['type']; ?></p>
                                                            </div>
                                                            <h6 class="mb-0 fs-4"><?php echo "₹ " . $row['price']; ?></h6>
                                                        </div>
                                                        <div class="action-btn mt-3">
                                                            <a href="add-dye.php?id=<?php echo $row['id']; ?>" class="text-primary edit">
                                                                <i class="ti ti-edit fs-5"></i>
                                                            </a>
                                                            <a href="paper-dye.php?d_id=<?php echo $row['id']; ?>" class="text-dark delete ms-2" onclick="return confirmDelete()">
                                                                <i class="ti ti-trash fs-5"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
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

    <script>
        $(document).ready(function() {
            $('input[name="sadi_main_ids[]"]').change(function() {
                var selectedIds = [];
                $('input[name="sadi_main_ids[]"]:checked').each(function() {
                    selectedIds.push($(this).val());
                });

                // Make AJAX call if at least one checkbox is selected
                if (selectedIds.length > 0) {
                    $.ajax({
                        url: 'ajax/main-check.php',
                        type: 'POST',
                        data: {
                            sadi_main_ids: selectedIds
                        },
                        success: function(response) {
                            $('#stockDetails').html(response);
                        },
                        error: function() {
                            alert('An error occurred while fetching the stock data.');
                        }
                    });
                } else {
                    // Clear the stock details if no checkbox is selected
                    $('#stockDetails').html('Select entries to view stock details...');
                }
            });
        });
    </script>

    <script>
        $(document).ready(function(){
            $(document).on("input", "#search-dye", function(){
                const searchValue = $(this).val();

                $.ajax({
                    url: 'ajax/search-dye.php',
                    type: 'POST',
                    data: {
                        searchValue: searchValue
                    },
                    success: function(response) {
                        $('.search-dye-response').html(response);
                    },
                    error: function() {
                        console.error("AJAX Error:", status, error);
                        $('.search-dye-response').html('<p class="text-danger">Something went wrong..! Please try again later.</p>');
                    }
                });
            });
        });
    </script>

</body>
</html>