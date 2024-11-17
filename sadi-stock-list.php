<?php
include('conn.php');
$dealerId = $_GET['id'];
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
                            <h5 class="card-title fw-semibold mb-4">Sadi Stock</h5>
                            <div class="d-flex justify-content-between align-items-center gap-6 mb-4">
                                <a href="add-sadi.php"><button class="btn btn-info mb-2" type="button">Add Sadi Stock</button></a>
                                <form class="position-relative">
                                    <input type="text" class="form-control search-chat py-2 ps-5" id="search-sadi" placeholder="Search CN no. or Shop" data-shop=<?php echo $dealerId; ?>>
                                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                                </form>
                            </div>
                            <div class="card">
                                <div id="stockDetails">Select entries to view stock details...</div>
                                <div class="card-body">



                                    <div class="border-bottom">
                                        <div class="row search-sadi-response">
                                            <?php
                                            $que = mysqli_query($conn, "SELECT * FROM sadi_main WHERE shop='$dealerId'");
                                            while ($row = mysqli_fetch_assoc($que)) {
                                                @$shopId = $row["shop"];

                                            ?>
                                                <div class="col-sm-6 col-md-4 col-lg-3">
                                                    <div class="product hover-img mb-7">

                                                        <div
                                                            class="product-img position-relative rounded-4 mb-6 overflow-hidden">

                                                            <a href="sadi-stock-detail.php?id=<?php echo $row['id'] ?>">
                                                                <img src="uploads/<?php echo $row['image']; ?>"
                                                                    alt="spike-img" class="w-100" style="min-height: 140px;">
                                                            </a>

                                                        </div>
                                                        <div>
                                                            <input type="checkbox" name="sadi_main_ids[]" value="<?php echo $row['id']; ?>">

                                                            <h5 class="mb-2 mt-2">
                                                                <?php @$shopData = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM shop WHERE `id`='$shopId'"));
                                                                echo @$shopData["name"] . "<br/>(" . $shopData['owner_name'] . ")";?>
                                                            </h5>
                                                            <h6 class="mb-0 fs-4 mt-3"><?php echo $row['date']; ?></h6>
                                                            <h6 class="mb-0 fs-4 mt-3">CN No: <?php echo $row['cn_number']; ?></h6>
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
            $(document).on("input", "#search-sadi", function(){
                const searchValue = $(this).val();
                const shopId = $(this).attr('data-shop');

                $.ajax({
                    url: 'ajax/search-sadi.php',
                    type: 'POST',
                    data: {
                        searchValue: searchValue,
                        shopId: shopId
                    },
                    success: function(response) {
                        $('.search-sadi-response').html(response);
                    },
                    error: function() {
                        console.error("AJAX Error:", status, error);
                        $('.search-sadi-response').html('<p class="text-danger">Something went wrong..! Please try again later.</p>');
                    }
                });
            });
        });
    </script>


</body>
</html>