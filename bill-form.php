<?php
include('conn.php');
session_start();

$id = $_GET['id'];

if (isset($_POST['submit'])) {

    $que = "SELECT sadi_stock.id AS sadi_stock_id, sadi_stock.*, color.*, sadi_main.cn_number FROM sadi_stock 
            INNER JOIN color ON color.id = sadi_stock.color 
            INNER JOIN sadi_main ON sadi_main.id = sadi_stock.sadi_main_id
            WHERE `sadi_main_id`='$id'";
    $result = mysqli_query($conn, $que);

    $sadi_stocks = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $i = $row['sadi_stock_id'];
        $useqty = $_POST["qty$i"];
        $price = $_POST["price$i"];

        $sadi_stocks[] = [
            'sadi_stock_id' => $row['sadi_stock_id'],
            'color_name' => $row['name'],
            'cn_number' => $row['cn_number'],
            'qty' => $row["qty"],
            'use_qty' => $_POST["qty$i"],
            'price' => $_POST["price$i"]
        ];

        $sql_update = "UPDATE sadi_stock SET `use_qty`='$useqty', `price`='$price' WHERE `id`='$i'";
        mysqli_query($conn, $sql_update);
    }
    $data['sadi_stocks'] = $sadi_stocks;
    $data['id'] = $id;
    $data['igst'] = $_POST['igst'] ?? 0;
    $data['cgst'] = $_POST['cgst'] ?? 0;
    $data['sgst'] = $_POST['sgst'] ?? 0;
    $data['discount'] = $_POST['discount'] ?? 0;

    unset($_SESSION['bill_data']); // unset session first
    $_SESSION['bill_data'] = $data;
    header("location:generate-bill.php");
    exit;
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
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <?php include('slider.php'); ?> <!-- sidebar -->
        <div class="body-wrapper">
            <?php include('header.php'); ?> <!-- header -->
            <div class="container-fluid">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h5 class="card-title fw-semibold mb-4">Paper Stock</h5>
                            <a href="add-paper-stock.php"><button class="btn btn-info mb-2" type="button">Add Paper Stock</button></a> -->
                            <div class="card">
                                <div class="card-body">
                                    <form method="post">
                                        <div class="mb-3">
                                            <?php
                                            $que = "SELECT * FROM sadi_stock WHERE `sadi_main_id`='$id'";
                                            $res = mysqli_query($conn, $que);
                                            while ($mainrow = mysqli_fetch_assoc($res)) {
                                            ?>
                                                <div class="row mb-2" id="sadityperesult">
                                                    <div class="col-lg-4 mb-3">
                                                        <label for="color" class="form-label">Colors</label>
                                                        <?php
                                                        $typeque = mysqli_query($conn, "SELECT * FROM color");
                                                        ?>
                                                        <select class="form-control" id="color<?php echo $mainrow['id']; ?>" disabled
                                                            name="color<?php echo $i; ?>">
                                                            <?php
                                                            while ($row = mysqli_fetch_assoc($typeque)) {
                                                            ?>
                                                                <option value="<?php echo $row['id'] ?>"
                                                                    <?php if ($mainrow['color'] == $row['id']) {
                                                                        echo "selected";
                                                                    } ?>>
                                                                    <?php echo $row['name']; ?>
                                                                </option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4 mb-3">
                                                        <label for="qty" class="form-label">Use Qty</label>
                                                        <input type="number" name="qty<?php echo $mainrow['id']; ?>"
                                                            class="form-control" id="qty" placeholder="10" value="<?php echo $mainrow['use_qty']; ?>" required>
                                                    </div>
                                                    <div class="col-lg-4 mb-3">
                                                        <label for="price" class="form-label">Price</label>
                                                        <input type="number" step="0.01" name="price<?php echo $mainrow['id']; ?>"
                                                            class="form-control" id="price" placeholder="1000"
                                                            value="<?php echo $mainrow['price']; ?>" required>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <div class=" col-lg-4 mb-3">
                                                <label for="price" class="form-label">IGST</label>
                                                <input type="number" step="0.01" name="igst" class="form-control" id="price" placeholder="Enter IGST %">
                                            </div>
                                            <div class=" col-lg-4 mb-3">
                                                <label for="price" class="form-label">CGST</label>
                                                <input type="number" step="0.01" name="cgst" class="form-control" id="price" placeholder="Enter CGST %">
                                            </div>
                                            <div class=" col-lg-4 mb-3">
                                                <label for="price" class="form-label">SGST</label>
                                                <input type="number" step="0.01" name="sgst" class="form-control" id="price" placeholder="Enter SGST %">
                                            </div>
                                            <div class=" col-lg-4 mb-3">
                                                <label for="price" class="form-label">Discount</label>
                                                <input type="number" step="0.01" name="discount" class="form-control" id="price" placeholder="Enter Discount %">
                                            </div>

                                            <button type="submit" name="submit" class="btn btn-info mt-4">Submit & Generate Bill</button>
                                        </div>
                                    </form>
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