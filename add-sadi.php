<?php
include("conn.php");

$isupdate = false;
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $isupdate = true;
    $quee = mysqli_query($conn, "SELECT * FROM `sadi_main` WHERE `id`='$id'");
    $editRes = mysqli_fetch_assoc($quee);
    $existingImage = $editRes['image'];
}

if (isset($_POST['submit'])) {
    $cnNumber = $_POST['cnNumber'];
    $colorNumber = $_POST['colorNumber'];
    $shop = $_POST['shop'];
    $today = date("d-m-Y");

    $filename = $existingImage;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $file = $_FILES['image'];
        $filename = date('YmdHis') . '_' . basename($file['name']);
        $target_dir = "uploads/";
        $target_file = $target_dir . $filename;

        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            if ($existingImage && file_exists($target_dir . $existingImage)) {
                unlink($target_dir . $existingImage);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit;
        }
    }

    if ($isupdate) {
        $query = "UPDATE sadi_main SET `cn_number`='$cnNumber', `image`='$filename', `shop`='$shop' WHERE `id`='$id'";
        $res = mysqli_query($conn, $query);

        header("location:sadi-stock-list.php?id=" . $shop);
    } else {
        $mainIn = "INSERT INTO sadi_main(`cn_number`,`image`,`shop`,`date`) VALUES ('$cnNumber','$filename','$shop','$today')";
        $res = mysqli_query($conn, $mainIn);
        $insertedId = mysqli_insert_id($conn);

        for ($i = 0; $i < $colorNumber; $i++) {
            $color = $_POST['color' . $i];
            $qty = $_POST['qty' . $i];
            $price = $_POST['price' . $i] ?? 0;

            $in = "INSERT INTO sadi_stock(`color`,`qty`,`price`,`sadi_main_id`) VALUES ('$color','$qty','$price','$insertedId')";
            $res = mysqli_query($conn, $in);
        }

        header("location:sadi-stock-list.php?id=" . $shop);
    }
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
                            <h5 class="card-title fw-semibold mb-4"><?php echo $isupdate ? 'Edit' : 'Add' ?> Sadi Stock</h5>
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="mb-4">
                                            <label for="cnNumber" class="form-label">CN Number</label>
                                            <input type="number" class="form-control" id="cnNumber" name="cnNumber" placeholder="Enter chalan number"
                                                <?php if (@$isupdate) { ?> value="<?php echo $editRes['cn_number'] ?>" <?php } ?> required>
                                        </div>

                                        <div class="mb-4">
                                            <?php if($isupdate) { ?>
                                                <label for="image" class="form-label">Uploaded Image</label>
                                                <div class="product-img position-relative overflow-hidden" style="width: 170px; height: 120px;">
                                                    <img src="uploads/<?php echo $editRes['image']; ?>"
                                                    alt="spike-img" class="w-100" >
                                                </div>
                                            <?php } ?>
                                            <label for="image" class="form-label"><?php echo $isupdate ? 'Update' : 'Upload' ?> Stock Image</label>
                                            <input type="file" class="form-control" id="image" name="image"
                                                <?php if (@$isupdate) { ?> value="<?php echo $editRes['image'] ?>"
                                                <?php } ?> <?php echo $isupdate ? '' : 'required' ?>>
                                        </div>

                                        <?php if(!$isupdate) { ?>
                                            <div class="mb-4">
                                                <label for="colorNumber" class="form-label">Select Number of Colors to Add</label>
                                                <select class="form-control" id="colorNumber" name="colorNumber" <?php echo $isupdate ? '' : 'required' ?>>
                                                    <option value="" selected disabled>Select Color to Add</option>
                                                    <?php for ($i = 1; $i <= 10; $i++) { ?>
                                                        <option value="<?php echo $i; ?>">
                                                            <?php echo $i; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <div id="sadityperesult">

                                            </div>
                                        <?php } ?>

                                        <div class="mb-4">
                                            <label for="shop" class="form-label">Select Dealer</label>
                                            <?php $queShop = mysqli_query($conn, "SELECT * FROM dealer"); ?>
                                            <select class="form-control" id="shop" name="shop">
                                                <?php while ($row = mysqli_fetch_assoc($queShop)) { ?>
                                                    <option value="<?php echo $row['id'] ?>"
                                                    <?php echo $isupdate && $row['id'] == $editRes['shop'] ? 'selected' : '' ?>>
                                                        <?php echo $row['name'] ?>
                                                    </option>
                                                <?php } ?>
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

            $('#colorNumber').change(function() {
                var selectedValue = $(this).val();

                // Call AJAX function with selected value as parameter
                $.ajax({
                    url: 'ajax/sadi-color-ajax.php',
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