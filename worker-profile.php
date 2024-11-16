<?php

include('conn.php');
$worker_id = $_GET['id'];

$q = "SELECT * FROM workers WHERE id='$worker_id'";
$r = mysqli_query($conn, $q);
$row = mysqli_fetch_assoc($r);

if (isset($_POST["modalSubmit"])) {
    $action_name = $_POST["action_name"];
    $action_id = $_POST["action_id"];

    // define variables as per action
    if ($action_name == "sheet-work-action") {
        $return_paper = $_POST['return_paper'];
        $return_diomond_pkt = $_POST['return_diomond_pkt'];
        $return_complete_sheet = $_POST['return_complete_sheet'];
        $second_sheet = $_POST['second_sheet'];
    } else {
        $return_qty = $_POST["return_qty"];
        $second_qty = $_POST["second_qty"];
    }

    // update perform
    if ($action_name == "nidel-action") {
        $sql_update = "UPDATE `nidel_expence` SET `return_qty`=$return_qty,`second_qty`=$second_qty WHERE `id`=$action_id";
        if (mysqli_query($conn, $sql_update)) {
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
    }

    if ($action_name == "less-fiting-action") {
        $sql_update = "UPDATE `less_fiting` SET `return_qty`=$return_qty,`second_qty`=$second_qty WHERE `id`=$action_id";
        if (mysqli_query($conn, $sql_update)) {
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
    }

    if ($action_name == "hotfix-action") {
        $sql_update = "UPDATE `hotfix` SET `return_qty`=$return_qty,`second_qty`=$second_qty WHERE `id`=$action_id";
        if (mysqli_query($conn, $sql_update)) {
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
    }

    if ($action_name == "fusing-action") {
        $sql_update = "UPDATE `fusing_expence` SET `return_qty`=$return_qty,`second_qty`=$second_qty WHERE `id`=$action_id";
        if (mysqli_query($conn, $sql_update)) {
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
    }

    if ($action_name == "reniya-cuting-action") {
        $sql_update = "UPDATE `reniya_cutting` SET `return_qty`=$return_qty,`second_qty`=$second_qty WHERE `id`=$action_id";
        if (mysqli_query($conn, $sql_update)) {
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
    }

    if ($action_name == "sheet-work-action") {
        $sql_update = "UPDATE `sheet_work` SET `return_paper`=$return_paper,`return_diomond_pkt`=$return_diomond_pkt,`return_complete_sheet`=$return_complete_sheet,`second_sheet`=$second_sheet WHERE `id`=$action_id";
        if (mysqli_query($conn, $sql_update)) {
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }
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
    <!-- <link rel="stylesheet" href="src/styles.css" /> -->
    <style>
        .nav-tabs .nav-link {
            margin: 0px;
            font-family: inherit;
            color: #000;
            font-weight: 400;
            font-size: 16px;
            margin: 4px;
        }

        .nav-tabs .nav-link.active {
            /* box-shadow: 1px 1px 1px rgba(0, 133, 219, .3); */
            background-color: #0085db;
            color: #fff;
        }

        .nav-tabs,
        .nav-tabs .nav-link {
            border-radius: 30px;
        }
    </style>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="../assets/images/profile/user-2.jpg" width="110"
                                            class="rounded-3 mb-3" alt="" />
                                        <h5 class="mb-1"><?php echo $row['name'] ?></h5>
                                        <!-- <span
                                            class="badge bg-primary-subtle text-primary fw-light rounded-pill">Teacher</span> -->
                                    </div>

                                    <div class="hstack justify-content-between mt-5">
                                        <div class="d-flex align-items-center">
                                            <span
                                                class="bg-success-subtle p-6 rounded-3 round-50 hstack justify-content-center">
                                                <i class="ti ti-check text-success fs-7"></i>
                                            </span>

                                            <div class="ms-3">
                                                <p class="fw-normal text-dark fs-5 mb-0">
                                                    <?php echo $row['salary'] - $row['upad']; ?></p>
                                                <p class="mb-0 fs-3">Pending Salary</p>
                                            </div>
                                        </div>

                                        <!-- <div class="d-flex align-items-center">
                                            <span
                                                class="bg-success-subtle p-6 rounded-3 round-50 hstack justify-content-center">
                                                <i class="ti ti-cpu text-success fs-7"></i>
                                            </span>

                                            <div class="ms-3">
                                                <p class="fw-normal text-dark fs-5 mb-0">568</p>
                                                <p class="mb-0 fs-3">Projects Done</p>
                                            </div>
                                        </div> -->
                                    </div>

                                    <div class="mt-5">
                                        <div class="pb-1 mb-2 border-bottom">
                                            <h6>Details</h6>
                                        </div>

                                        <ul>
                                            <li class="py-2">
                                                <p class="fw-normal text-dark mb-0">
                                                    Name:
                                                    <span class="fw-light ms-1"><?php echo $row['name'] ?></span>
                                                </p>
                                            </li>


                                            <li class="py-2">
                                                <p class="fw-normal text-dark mb-0">
                                                    Id No. :
                                                    <span class="fw-light ms-1"><?php echo $row['id'] ?></span>
                                                </p>
                                            </li>

                                            <li class="py-2">
                                                <p class="fw-normal text-dark mb-0">
                                                    Phone:
                                                    <span class="fw-light ms-1"><?php echo $row['phone'] ?></span>
                                                </p>
                                            </li>

                                            <li class="py-2">
                                                <p class="fw-normal text-dark mb-0">
                                                    Address:
                                                    <span class="fw-light ms-1"><?php echo $row['address']; ?></span>
                                                </p>
                                            </li>
                                        </ul>

                                        <!-- <div class="row mt-4">
                                            <div class="col-sm-6">
                                                <button type="button"
                                                    class="btn btn-primary w-100 justify-content-center me-2 d-flex align-items-center mb-3 mb-sm-0">
                                                    <i class="ti ti-edit fs-5 me-2"></i>
                                                    Edit
                                                </button>
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="button"
                                                    class="btn btn-danger w-100 justify-content-center d-flex align-items-center">
                                                    <i class="ti ti-trash fs-5 me-2"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item me-2" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">
                                        23 Nidel
                                    </button>
                                </li>
                                <li class="nav-item me-2" role="presentation">
                                    <button class="nav-link" id="less-tab" data-bs-toggle="tab" data-bs-target="#less"
                                        type="button" role="tab" aria-controls="less" aria-selected="true">
                                        Less Fiting
                                    </button>
                                </li>
                                <li class="nav-item me-2" role="presentation">
                                    <button class="nav-link" id="hotfix-tab" data-bs-toggle="tab"
                                        data-bs-target="#hotfix" type="button" role="tab" aria-controls="hotfix"
                                        aria-selected="true">
                                        Hotfix
                                    </button>
                                </li>
                                <li class="nav-item me-2" role="presentation">
                                    <button class="nav-link" id="fusing-tab" data-bs-toggle="tab"
                                        data-bs-target="#fusing" type="button" role="tab" aria-controls="fusing"
                                        aria-selected="true">
                                        Fusing
                                    </button>
                                </li>
                                <li class="nav-item me-2" role="presentation">
                                    <button class="nav-link" id="reniya-tab" data-bs-toggle="tab"
                                        data-bs-target="#reniya" type="button" role="tab" aria-controls="reniya"
                                        aria-selected="true">
                                        Reniya Cutting
                                    </button>
                                </li>
                                <li class="nav-item me-2" role="presentation">
                                    <button class="nav-link" id="sheet-tab" data-bs-toggle="tab" data-bs-target="#sheet"
                                        type="button" role="tab" aria-controls="sheet" aria-selected="true">
                                        Sheet Work
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">
                                        Salary
                                    </button>
                                </li>
                            </ul>

                            <div class="card mt-4">
                                <div class="card-body">
                                    <div class="tab-content" id="myTabContent">
                                        <!-- 23 Nidel -->
                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="mb-4 border-bottom pb-3">
                                                <h4 class="card-title mb-0">23 Nidel</h4>
                                            </div>
                                            <div class="table-responsive overflow-x-auto">
                                                <a href="return-stock.php" class="qty-submit-button"
                                                    style="pointer-events: none; opacity: 0.5;"><button
                                                        class="btn btn-success ms-2" type="submit">Checked Return
                                                        All</button></a>
                                                <table class="table align-middle text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Check</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Return</th>
                                                            <th scope="col">Second Peice</th>
                                                            <th scope="col">Salary</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="border-top">
                                                        <?php
                                                        $que = "SELECT * FROM nidel_expence WHERE workers_id='$worker_id'";
                                                        $res = mysqli_query($conn, $que);
                                                        while ($row = mysqli_fetch_assoc($res)) {
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?php if ($row['use_qty'] != $row['return_qty'] + $row['second_qty']) {

                                                                    ?>
                                                                        <input type="checkbox" class="select-stock"
                                                                            id="select-stock" data-id="<?php echo $row['id'] ?>"
                                                                            data-work="nidel"
                                                                            data-cn-number="<?php echo $row['sadi_stock_id'] ?>"
                                                                            data-color="<?php echo $row['use_qty'] ?>"
                                                                            data-qty="<?php echo $row['workers_id']; ?>"
                                                                            data-price="<?php echo $row['price'] ?>">
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-bold text-info mb-0">
                                                                        <?php echo $row['date']; ?></p>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-normal mb-0 fs-3 text-dark">
                                                                        <?php echo $row['use_qty']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['return_qty']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['second_qty']; ?>
                                                                    </p>
                                                                </td>

                                                                <td>
                                                                    <p class="fw-bold text-success mb-0">
                                                                        <?php echo $row['price'] * $row['return_qty'] . " (" . $row['price'] . ")"; ?>
                                                                    </p>
                                                                </td>

                                                                <td>
                                                                    <a class="text-primary edit open-actiona-model"
                                                                        id="<?php echo $row['id']; ?>"
                                                                        data-action-name="nidel-action"
                                                                        data-title="23 Nidel"
                                                                        data-return="<?php echo $row['return_qty']; ?>"
                                                                        data-second="<?php echo $row['second_qty']; ?>">
                                                                        <i class="ti ti-pencil fs-5"></i>
                                                                    </a>
                                                                    <a href="edit-nidel-expenses.php?id=<?php echo $row['id']; ?>" class="text-primary">
                                                                        <i class="ti ti-edit fs-5"></i>
                                                                    </a>
                                                                    <a class="text-danger delete-single-expense"
                                                                        id="<?php echo $row['id']; ?>"
                                                                        data-action-name="nidel-action">
                                                                        <i class="ti ti-trash fs-5"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- Less Fiting -->
                                        <div class="tab-pane fade" id="less" role="tabpanel" aria-labelledby="less-tab">
                                            <div class="mb-4 border-bottom pb-3">
                                                <h4 class="card-title mb-0">Less Fiting</h4>
                                            </div>
                                            <a href="return-stock.php" class="qty-submit-button"
                                                style="pointer-events: none; opacity: 0.5;"><button
                                                    class="btn btn-success ms-2" type="submit">Checked Return
                                                    All</button></a></thead>
                                            <div class="table-responsive overflow-x-auto">
                                                <table class="table align-middle text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Check</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Return</th>
                                                            <th scope="col">Second Peice</th>
                                                            <th scope="col">Salary</th>
                                                            <th scope="col">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="border-top">

                                                        <?php

                                                        $que = "SELECT * FROM less_fiting WHERE workers_id='$worker_id'";
                                                        $res = mysqli_query($conn, $que);
                                                        while ($row = mysqli_fetch_assoc($res)) {

                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?php if ($row['use_qty'] != $row['return_qty'] + $row['second_qty']) {

                                                                    ?>
                                                                        <input type="checkbox" class="select-stock"
                                                                            id="select-stock" data-id="<?php echo $row['id'] ?>"
                                                                            data-work="less"
                                                                            data-cn-number="<?php echo $row['sadi_stock_id'] ?>"
                                                                            data-color="<?php echo $row['use_qty'] ?>"
                                                                            data-qty="<?php echo $row['workers_id']; ?>"
                                                                            data-price="<?php echo $row['price'] ?>">
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-bold text-info mb-0">
                                                                        <?php echo $row['date']; ?></p>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-normal mb-0 fs-3 text-dark">
                                                                        <?php echo $row['use_qty']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['return_qty']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['second_qty']; ?>
                                                                    </p>
                                                                </td>

                                                                <td>
                                                                    <p class="fw-bold text-success mb-0">
                                                                        <?php echo $row['price'] * $row['return_qty'] . " (" . $row['price'] . ")"; ?>
                                                                    </p>
                                                                </td>

                                                                <td>
                                                                    <a class="text-primary edit open-actiona-model"
                                                                        id="<?php echo $row['id']; ?>"
                                                                        data-action-name="less-fiting-action"
                                                                        data-title="Less Fiting"
                                                                        data-return="<?php echo $row['return_qty']; ?>"
                                                                        data-second="<?php echo $row['second_qty']; ?>">
                                                                        <i class="ti ti-pencil fs-5"></i>
                                                                    </a>
                                                                    <a href="edit-less-fiting-expenses.php?id=<?php echo $row['id']; ?>" class="text-primary">
                                                                        <i class="ti ti-edit fs-5"></i>
                                                                    </a>
                                                                    <a class="text-danger delete-single-expense"
                                                                        id="<?php echo $row['id']; ?>"
                                                                        data-action-name="less-fiting-action">
                                                                        <i class="ti ti-trash fs-5"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- Hotfix -->
                                        <div class="tab-pane fade" id="hotfix" role="tabpanel"
                                            aria-labelledby="hotfix-tab">
                                            <div class="mb-4 border-bottom pb-3">
                                                <h4 class="card-title mb-0">Hotfix</h4>
                                            </div>
                                            <a href="return-stock.php" class="qty-submit-button"
                                                style="pointer-events: none; opacity: 0.5;"><button
                                                    class="btn btn-success ms-2" type="submit">Checked Return
                                                    All</button></a>
                                            <div class="table-responsive overflow-x-auto">
                                                <table class="table align-middle text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Check</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Return</th>
                                                            <th scope="col">Second Peice</th>
                                                            <th scope="col">Butta Count</th>
                                                            <th scope="col">Butta Price</th>
                                                            <th scope="col">Line Count</th>
                                                            <th scope="col">Line Price</th>
                                                            <th scope="col">Sheet Used</th>
                                                            <th scope="col">Sheet Price</th>
                                                            <th scope="col">Border Price</th>
                                                            <th scope="col">Salary</th>
                                                            <th scope="col">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="border-top">
                                                        <?php

                                                        $que = "SELECT * FROM `hotfix` WHERE workers_id='$worker_id'";
                                                        $res = mysqli_query($conn, $que);
                                                        while ($row = mysqli_fetch_assoc($res)) {

                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?php if ($row['use_qty'] != $row['return_qty'] + $row['second_qty']) {

                                                                    ?>
                                                                        <input type="checkbox" class="select-stock"
                                                                            id="select-stock" data-id="<?php echo $row['id'] ?>"
                                                                            data-work="hotfix"
                                                                            data-cn-number="<?php echo $row['sadi_stock_id'] ?>"
                                                                            data-color="<?php echo $row['use_qty'] ?>"
                                                                            data-qty="<?php echo $row['workers_id']; ?>"
                                                                            data-price="<?php echo $row['price'] ?>">
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-bold text-info mb-0">
                                                                        <?php echo $row['date']; ?></p>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-normal mb-0 fs-3 text-dark">
                                                                        <?php echo $row['use_qty']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['return_qty']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['second_qty']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['butta_count']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['butta_price']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['line_count']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['line_price']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['sheet_used']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['sheet_price']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['border_price']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-bold text-success mb-0">
                                                                        <?php echo $row['price'] * $row['return_qty'] . " (" . $row['price'] . ")"; ?>
                                                                    </p>
                                                                </td>

                                                                <td>
                                                                    <a class="text-primary edit open-actiona-model"
                                                                        id="<?php echo $row['id']; ?>"
                                                                        data-action-name="hotfix-action" data-title="Hotfix"
                                                                        data-return="<?php echo $row['return_qty']; ?>"
                                                                        data-second="<?php echo $row['second_qty']; ?>">
                                                                        <i class="ti ti-pencil fs-5"></i>
                                                                    </a>
                                                                    <a href="edit-hotfix-expenses.php?id=<?php echo $row['id']; ?>" class="text-primary">
                                                                        <i class="ti ti-edit fs-5"></i>
                                                                    </a>
                                                                    <a class="text-danger delete-single-expense"
                                                                        id="<?php echo $row['id']; ?>"
                                                                        data-action-name="hotfix-action">
                                                                        <i class="ti ti-trash fs-5"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- Fusing -->
                                        <div class="tab-pane fade" id="fusing" role="tabpanel"
                                            aria-labelledby="fusing-tab">
                                            <div class="mb-4 border-bottom pb-3">
                                                <h4 class="card-title mb-0">Fusing</h4>
                                            </div>
                                            <a href="return-stock.php" class="qty-submit-button"
                                                style="pointer-events: none; opacity: 0.5;"><button
                                                    class="btn btn-success ms-2" type="submit">Checked Return
                                                    All</button></a>
                                            <div class="table-responsive overflow-x-auto">
                                                <table class="table align-middle text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Check</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Return</th>
                                                            <th scope="col">Second Peice</th>
                                                            <th scope="col">Salary</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="border-top">
                                                        <?php

                                                        $que = "SELECT * FROM fusing_expence WHERE workers_id='$worker_id'";
                                                        $res = mysqli_query($conn, $que);
                                                        while ($row = mysqli_fetch_assoc($res)) {

                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?php if ($row['use_qty'] != $row['return_qty'] + $row['second_qty']) {

                                                                    ?>
                                                                        <input type="checkbox" class="select-stock"
                                                                            id="select-stock" data-id="<?php echo $row['id'] ?>"
                                                                            data-work="fusing"
                                                                            data-cn-number="<?php echo $row['sadi_stock_id'] ?>"
                                                                            data-color="<?php echo $row['use_qty'] ?>"
                                                                            data-qty="<?php echo $row['workers_id']; ?>"
                                                                            data-price="<?php echo $row['price'] ?>">
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-bold text-info mb-0">
                                                                        <?php echo $row['date']; ?></p>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-normal mb-0 fs-3 text-dark">
                                                                        <?php echo $row['use_qty']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['return_qty']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['second_qty']; ?>
                                                                    </p>
                                                                </td>

                                                                <td>
                                                                    <p class="fw-bold text-success mb-0">
                                                                        <?php echo $row['price'] * $row['return_qty'] . " (" . $row['price'] . ")"; ?>
                                                                    </p>
                                                                </td>

                                                                <td>
                                                                    <a class="text-primary edit open-actiona-model"
                                                                        id="<?php echo $row['id']; ?>"
                                                                        data-action-name="fusing-action" data-title="Fusing"
                                                                        data-return="<?php echo $row['return_qty']; ?>"
                                                                        data-second="<?php echo $row['second_qty']; ?>">
                                                                        <i class="ti ti-pencil fs-5"></i>
                                                                    </a>
                                                                    <a href="edit-fusing-expenses.php?id=<?php echo $row['id']; ?>" class="text-primary">
                                                                        <i class="ti ti-edit fs-5"></i>
                                                                    </a>
                                                                    <a class="text-danger delete-single-expense"
                                                                        id="<?php echo $row['id']; ?>"
                                                                        data-action-name="fusing-action">
                                                                        <i class="ti ti-trash fs-5"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- Reniya Cuting -->
                                        <div class="tab-pane fade" id="reniya" role="tabpanel"
                                            aria-labelledby="reniya-tab">
                                            <div class="mb-4 border-bottom pb-3">
                                                <h4 class="card-title mb-0">Reniya Cuting</h4>
                                            </div>
                                            <a href="return-stock.php" class="qty-submit-button"
                                                style="pointer-events: none; opacity: 0.5;"><button
                                                    class="btn btn-success ms-2" type="submit">Checked Return
                                                    All</button></a>
                                            <div class="table-responsive overflow-x-auto">
                                                <table class="table align-middle text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Check</th>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Return</th>
                                                            <th scope="col">Second Peice</th>
                                                            <th scope="col">Salary</th>
                                                            <th scope="col">Action</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="border-top">
                                                        <?php

                                                        $que = "SELECT * FROM reniya_cutting WHERE workers_id='$worker_id'";
                                                        $res = mysqli_query($conn, $que);
                                                        while ($row = mysqli_fetch_assoc($res)) {

                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?php if ($row['use_qty'] != $row['return_qty'] + $row['second_qty']) {

                                                                    ?>
                                                                        <input type="checkbox" class="select-stock"
                                                                            id="select-stock" data-id="<?php echo $row['id'] ?>"
                                                                            data-work="reniya"
                                                                            data-cn-number="<?php echo $row['sadi_stock_id'] ?>"
                                                                            data-color="<?php echo $row['use_qty'] ?>"
                                                                            data-qty="<?php echo $row['workers_id']; ?>"
                                                                            data-price="<?php echo $row['price'] ?>">
                                                                    <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-bold text-info mb-0">
                                                                        <?php echo $row['date']; ?></p>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-normal mb-0 fs-3 text-dark">
                                                                        <?php echo $row['use_qty']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['return_qty']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['second_qty']; ?>
                                                                    </p>
                                                                </td>

                                                                <td>
                                                                    <p class="fw-bold text-success mb-0">
                                                                        <?php echo $row['price'] * $row['return_qty'] . " (" . $row['price'] . ")"; ?>
                                                                    </p>
                                                                </td>

                                                                <td>
                                                                    <a class="text-primary edit open-actiona-model"
                                                                        id="<?php echo $row['id']; ?>"
                                                                        data-action-name="reniya-cuting-action"
                                                                        data-title="Reniya Cuting"
                                                                        data-return="<?php echo $row['return_qty']; ?>"
                                                                        data-second="<?php echo $row['second_qty']; ?>">
                                                                        <i class="ti ti-pencil fs-5"></i>
                                                                    </a>
                                                                    <a href="edit-reniya-cuting-expenses.php?id=<?php echo $row['id']; ?>" class="text-primary">
                                                                        <i class="ti ti-edit fs-5"></i>
                                                                    </a>
                                                                    <a class="text-danger delete-single-expense"
                                                                        id="<?php echo $row['id']; ?>"
                                                                        data-action-name="reniya-cuting-action">
                                                                        <i class="ti ti-trash fs-5"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- Sheet Work -->
                                        <div class="tab-pane fade" id="sheet" role="tabpanel"
                                            aria-labelledby="sheet-tab">
                                            <div class="mb-4 border-bottom pb-3">
                                                <h4 class="card-title mb-0">Sheet Work</h4>
                                            </div>
                                            <div class="table-responsive overflow-x-auto">
                                                <table class="table align-middle text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Paper Quantity</th>
                                                            <th scope="col">Return Paper</th>
                                                            <th scope="col">Diamond Quantity</th>
                                                            <th scope="col">Return Diamond Packet</th>
                                                            <th scope="col">Return Completed Sheet</th>
                                                            <th scope="col">Second Sheet</th>
                                                            <th scope="col">Salary</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="border-top">
                                                        <?php

                                                        $que = "SELECT * FROM sheet_work WHERE workers_id='$worker_id'";
                                                        $res = mysqli_query($conn, $que);
                                                        while ($row = mysqli_fetch_assoc($res)) {

                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <p class="fw-bold text-info mb-0">
                                                                        <?php echo $row['date']; ?></p>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-normal mb-0 fs-3 text-dark">
                                                                        <?php echo $row['use_paper_qty']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-normal mb-0 fs-3 text-dark">
                                                                        <?php echo $row['return_paper']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['use_diomond_pkt']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['return_diomond_pkt']; ?>
                                                                    </p>
                                                                </td>

                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['return_complete_sheet']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['second_sheet']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="fw-bold text-success mb-0">
                                                                        <?php echo $row['price'] * $row['return_complete_sheet'] . " (" . $row['price'] . ")"; ?>
                                                                    </p>
                                                                </td>

                                                                <td>
                                                                    <a class="text-primary edit open-actiona-model"
                                                                        id="<?php echo $row['id']; ?>"
                                                                        data-action-name="sheet-work-action"
                                                                        data-title="Sheet Work"
                                                                        data-return-paper="<?php echo $row['return_paper']; ?>"
                                                                        data-return-diomond-pkt="<?php echo $row['return_diomond_pkt']; ?>"
                                                                        data-return-complete-sheet="<?php echo $row['return_complete_sheet']; ?>"
                                                                        data-second-sheet="<?php echo $row['second_sheet']; ?>">
                                                                        <i class="ti ti-pencil fs-5"></i>
                                                                    </a>
                                                                    <a href="edit-sheet-work-expenses.php?id=<?php echo $row['id']; ?>" class="text-primary">
                                                                        <i class="ti ti-edit fs-5"></i>
                                                                    </a>
                                                                    <a class="text-danger delete-single-expense"
                                                                        id="<?php echo $row['id']; ?>"
                                                                        data-action-name="sheet-work-action">
                                                                        <i class="ti ti-trash fs-5"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>



                                        <!-- Salary Report -->
                                        <div class="tab-pane fade" id="profile" role="tabpanel"
                                            aria-labelledby="profile-tab">
                                            <div class="mb-4 border-bottom pb-3">
                                                <h4 class="card-title mb-0">Salary Report</h4>
                                            </div>
                                            <div class="d-flex justify-content-between align-items-start">
                                                <span class="badge text-bg-primary">Standard</span>
                                                <div class="d-flex justify-content-center">
                                                    <sup class="h5 mt-3 mb-0 me-1 text-primary">$</sup>
                                                    <h1 class="display-5 mb-0 text-primary">50</h1>
                                                    <sub class="fs-6 pricing-duration mt-auto mb-3">/ month</sub>
                                                </div>
                                            </div>
                                            <ul class="g-2 my-4">
                                                <li class="mb-2 align-middle">
                                                    <i class="ti ti-circle-check fs-5 me-2 text-success"></i> 3 Periods
                                                    per day
                                                </li>

                                                <li class="mb-2 align-middle">
                                                    <i class="ti ti-circle-check fs-5 me-2 text-success"></i> Included
                                                    Documents
                                                </li>

                                                <li class="mb-2 align-middle">
                                                    <i class="ti ti-circle-check fs-5 me-2 text-success"></i> Free Books
                                                </li>

                                                <li class="mb-2 align-middle">
                                                    <i class="ti ti-circle-check fs-5 me-2 text-success"></i> Students
                                                    Help Salary
                                                </li>
                                            </ul>
                                            <div class="d-flex justify-content-between align-items-center mb-1">
                                                <span>Days</span>
                                                <span>75% Completed</span>
                                            </div>
                                            <div class="progress bg-primary-subtle mb-1">
                                                <div class="progress-bar text-bg-primary w-75" role="progressbar"
                                                    aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span>4 days remaining</span>
                                            <div class="d-grid w-100 mt-4 pt-2">
                                                <button class="btn btn-primary" data-bs-target="#upgradePlanModal"
                                                    data-bs-toggle="modal">
                                                    Pay Full Salary
                                                </button>
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

    <!-- Return and Second qty edit model -->
    <div class="modal fade" id="addnotesmodal" tabindex="-1" role="dialog" aria-labelledby="addnotesmodalTitle"
        aria-modal="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 10px;">
                <div class="modal-header text-bg-primary">
                    <h6 class="modal-title text-white">Add Notes</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <div class="notes-box">
                            <div class="notes-content">
                                <div class="row modal-input-fields">
                                    <div class="col-md-12 mb-3">
                                        <div class="note-title">
                                            <label class="form-label">Return Quantity</label>
                                            <input type="number" name="return_qty" id="return_qty" class="form-control"
                                                placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="note-description">
                                            <label class="form-label">Second Quantity</label>
                                            <input type="number" name="second_qty" id="second_qty" class="form-control"
                                                placeholder="Title">
                                            <input type="hidden" name="action_name" id="action_name">
                                            <input type="hidden" name="action_id" id="action_id">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="d-flex gap-6">
                            <button class="btn bg-danger-subtle text-danger" data-bs-dismiss="modal">Discard</button>
                            <button id="btn-n-add" class="btn btn-primary" type="submit"
                                name="modalSubmit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete confirmation model -->
    <div class="modal fade" id="deleteConfirmationModel" tabindex="-1" role="dialog" aria-labelledby="addnotesmodalTitle"
        aria-modal="true" data-bs-backdrop="static" data-bs-keyboard="false" style="display: none;">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 10px;">
                <div class="modal-body">
                    <div class="notes-box">
                        <div class="notes-content">
                            <div class="row modal-input-fields">
                                <div class="col-md-12">
                                    <div class="note-description mt-3 ms-3 delete-message">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex gap-6">
                        <button class="btn btn-primary delete-check-confirm">Ok</button>
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

            $(document).on('change', '.select-stock', function() {
                updateSelectedStocks();
            });

            function updateSelectedStocks() {
                var selectedStocks = {}; // Reset selected stocks

                if ($('.select-stock:checked').length === 0) {
                    $('.qty-submit-button').attr('disabled', true).css('pointer-events', 'none').css('opacity',
                        '0.5');
                } else {
                    $('.qty-submit-button').attr('disabled', false).css('pointer-events', 'auto').css('opacity',
                        '1');
                }

                $('.select-stock:checked').each(function() {
                    let stockId = $(this).data('id'); // Get the stock ID
                    // const use = document.getElementById("use" + stockId).value;

                    // const total_qty = $(this).data('qty');
                    // if(use == "" || use > total_qty){
                    //     used_qty_high = true;
                    //     $("#use"+stockId).css("color","red");
                    // } else {
                    //     $("#use"+stockId).css("color","green");
                    // }
                    // if(used_qty_high) {
                    //     $('.qty-submit-button').attr('disabled', true).css('pointer-events', 'none').css('opacity', '0.5');
                    // } else {
                    //     $('.qty-submit-button').attr('disabled', false).css('pointer-events', 'auto').css('opacity', '1');
                    // }

                    selectedStocks[stockId] = {
                        stock_id: stockId,
                        work: $(this).data('work'),
                        sadi_stock_id: $(this).data('cn-number'),
                        use_qty: $(this).data('color'),
                        workers_id: $(this).data('qty'),
                        price: $(this).data('price')
                    };
                });

                // Send the updated array to the server using AJAX
                $.ajax({
                    url: 'ajax/worker-return.php',
                    method: 'POST',
                    data: {
                        stocks: selectedStocks
                    },
                    success: function(response) {
                        console.log('Selected Stocks Updated:', response);
                    },
                    error: function(error) {
                        console.error('Error updating selected stocks:', error);
                    }
                });
            }

            $(document).on("click", ".open-actiona-model", function() {
                const actionId = $(this).attr("id");
                const modelTitle = $(this).attr("data-title");
                const actionName = $(this).attr("data-action-name");

                if (actionName === "sheet-work-action") {
                    const returnPaper = $(this).attr("data-return-paper");
                    const returnDiamondPkt = $(this).attr("data-return-diomond-pkt");
                    const returnCompleteSheet = $(this).attr("data-return-complete-sheet");
                    const secondSheet = $(this).attr("data-second-sheet");

                    $(".modal-input-fields").html(`
                    <div class="col-md-12 mb-3">
                        <div class="note-title">
                            <label class="form-label">Return Paper</label>
                            <input type="number" name="return_paper" id="return_paper" class="form-control" placeholder="Title" value="${returnPaper}">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="note-title">
                            <label class="form-label">Return Paper</label>
                            <input type="number" name="return_diomond_pkt" id="return_diomond_pkt" class="form-control" placeholder="Title" value="${returnDiamondPkt}">
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="note-title">
                            <label class="form-label">Return Paper</label>
                            <input type="number" name="return_complete_sheet" id="return_complete_sheet" class="form-control" placeholder="Title" value="${returnCompleteSheet}">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="note-description">
                            <label class="form-label">Second Quantity</label>
                            <input type="number" name="second_sheet" id="second_sheet" class="form-control" placeholder="Title" value="${secondSheet}">
                            <input type="hidden" name="action_name" id="action_name" value="${actionName}">
                            <input type="hidden" name="action_id" id="action_id" value="${actionId}">
                        </div>
                    </div>
                `);

                    $(".modal-title").text(modelTitle);
                } else {
                    const returnQty = $(this).attr("data-return");
                    const secondQty = $(this).attr("data-second");

                    $("#action_id").val(actionId);
                    $(".modal-title").text(modelTitle);
                    $("#action_name").val(actionName);
                    $("#return_qty").val(returnQty);
                    $("#second_qty").val(secondQty);
                }

                $("#addnotesmodal").modal("show");
            });

            $(document).on("click", ".delete-single-expense", function() {
                const actionId = $(this).attr("id");
                const actionName = $(this).attr("data-action-name");

                const userConfirmed = confirm("Are you sure you want to delete this expense?");

                if (userConfirmed) {
                    $.ajax({
                        url: 'ajax/delete-expenses.php',
                        method: 'POST',
                        data: {
                            actionId: actionId,
                            actionName: actionName
                        },
                        success: function(response) {
                            const jsonResponse = JSON.parse(response);
                            if (jsonResponse.status) {
                                $(".delete-message").text(jsonResponse.message);
                                $("#deleteConfirmationModel").modal("show");
                            }
                        },
                        error: function(error) {
                            console.error('Error updating selected stocks:', error);
                        }
                    });
                }
            });

            $(document).on("click", ".delete-check-confirm", function(){
                location.reload();
            })
        });
    </script>


</body>

</html>