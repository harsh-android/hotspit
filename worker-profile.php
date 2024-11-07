<?php 

  include('conn.php');
  $worker_id = $_GET['id'];


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Spike Free</title>
    <link rel="shortcut icon" type="image/png" href="src/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="src/assets/css/styles.min.css" />
    <link rel="stylesheet" href="src/styles.css" />
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
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img src="../assets/images/profile/user-2.jpg" width="110"
                                            class="rounded-3 mb-3" alt="" />
                                        <h5 class="mb-1">John Mednath</h5>
                                        <span
                                            class="badge bg-primary-subtle text-primary fw-light rounded-pill">Teacher</span>
                                    </div>

                                    <div class="hstack justify-content-between mt-5">
                                        <div class="d-flex align-items-center">
                                            <span
                                                class="bg-success-subtle p-6 rounded-3 round-50 hstack justify-content-center">
                                                <i class="ti ti-check text-success fs-7"></i>
                                            </span>

                                            <div class="ms-3">
                                                <p class="fw-normal text-dark fs-5 mb-0">1.23k</p>
                                                <p class="mb-0 fs-3">Tasks Done</p>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <span
                                                class="bg-success-subtle p-6 rounded-3 round-50 hstack justify-content-center">
                                                <i class="ti ti-cpu text-success fs-7"></i>
                                            </span>

                                            <div class="ms-3">
                                                <p class="fw-normal text-dark fs-5 mb-0">568</p>
                                                <p class="mb-0 fs-3">Projects Done</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5">
                                        <div class="pb-1 mb-2 border-bottom">
                                            <h6>Details</h6>
                                        </div>

                                        <ul>
                                            <li class="py-2">
                                                <p class="fw-normal text-dark mb-0">
                                                    Name:
                                                    <span class="fw-light ms-1">John Mednath</span>
                                                </p>
                                            </li>

                                            <li class="py-2">
                                                <p class="fw-normal text-dark mb-0">
                                                    Gender:
                                                    <span class="fw-light ms-1">Female</span>
                                                </p>
                                            </li>

                                            <li class="py-2">
                                                <p class="fw-normal text-dark mb-0">
                                                    Class:
                                                    <span class="fw-light ms-1">11 (Science)</span>
                                                </p>
                                            </li>

                                            <li class="py-2">
                                                <p class="fw-normal text-dark mb-0">
                                                    Section:
                                                    <span class="fw-light ms-1">B</span>
                                                </p>
                                            </li>

                                            <li class="py-2">
                                                <p class="fw-normal text-dark mb-0">
                                                    Date Of Birth:
                                                    <span class="fw-light ms-1">03/08/1993</span>
                                                </p>
                                            </li>

                                            <li class="py-2">
                                                <p class="fw-normal text-dark mb-0">
                                                    Id No. :
                                                    <span class="fw-light ms-1">498376</span>
                                                </p>
                                            </li>

                                            <li class="py-2">
                                                <p class="fw-normal text-dark mb-0">
                                                    Phone:
                                                    <span class="fw-light ms-1">+ 123 9988568</span>
                                                </p>
                                            </li>

                                            <li class="py-2">
                                                <p class="fw-normal text-dark mb-0">
                                                    Email:
                                                    <span class="fw-light ms-1">johnmednath@gmail.com</span>
                                                </p>
                                            </li>
                                        </ul>

                                        <div class="row mt-4">
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item me-2" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">
                                        23 Nidel
                                    </button>
                                </li>
                                <li class="nav-item me-2" role="presentation">
                                    <button class="nav-link" id="less-tab" data-bs-toggle="tab"
                                        data-bs-target="#less" type="button" role="tab" aria-controls="less"
                                        aria-selected="true">
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
                                    <button class="nav-link" id="sheet-tab" data-bs-toggle="tab"
                                        data-bs-target="#sheet" type="button" role="tab" aria-controls="sheet"
                                        aria-selected="true">
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
                                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                                            aria-labelledby="home-tab">
                                            <div class="mb-4 border-bottom pb-3">
                                                <h4 class="card-title mb-0">23 Nidel</h4>
                                            </div>
                                            <div class="table-responsive overflow-x-auto">
                                                <table class="table align-middle text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">
                                                                Return
                                                            </th>
                                                            <th scope="col">Second Peice</th>

                                                            <th scope="col">Salary</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="border-top">
                                                        <?php 
                                                        
                                                          $que = "SELECT * FROM nidel_expence WHERE workers_id='$worker_id'";
                                                          $res = mysqli_query($conn,$que);
                                                          while ($row = mysqli_fetch_assoc($res)) {
                                                            
                                                        ?>
                                                        <tr>
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
                                                                    <?php echo $row['price']*$row['return_qty']." (".$row['price'].")"; ?>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="less" role="tabpanel"
                                            aria-labelledby="less-tab">
                                            <div class="mb-4 border-bottom pb-3">
                                                <h4 class="card-title mb-0">Less Fiting</h4>
                                            </div>
                                            <div class="table-responsive overflow-x-auto">
                                                <table class="table align-middle text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">
                                                                Return
                                                            </th>
                                                            <th scope="col">Second Peice</th>

                                                            <th scope="col">Salary</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="border-top">
                                                        <?php 
                                                        
                                                          $que = "SELECT * FROM less_fiting WHERE workers_id='$worker_id'";
                                                          $res = mysqli_query($conn,$que);
                                                          while ($row = mysqli_fetch_assoc($res)) {
                                                            
                                                        ?>
                                                        <tr>
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
                                                                    <?php echo $row['price']*$row['return_qty']." (".$row['price'].")"; ?>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="fusing" role="tabpanel"
                                            aria-labelledby="fusing-tab">
                                            <div class="mb-4 border-bottom pb-3">
                                                <h4 class="card-title mb-0">Fusing</h4>
                                            </div>
                                            <div class="table-responsive overflow-x-auto">
                                                <table class="table align-middle text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">
                                                                Return
                                                            </th>
                                                            <th scope="col">Second Peice</th>

                                                            <th scope="col">Salary</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="border-top">
                                                        <?php 
                                                        
                                                          $que = "SELECT * FROM fusing_expence WHERE workers_id='$worker_id'";
                                                          $res = mysqli_query($conn,$que);
                                                          while ($row = mysqli_fetch_assoc($res)) {
                                                            
                                                        ?>
                                                        <tr>
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
                                                                    <?php echo $row['price']*$row['return_qty']." (".$row['price'].")"; ?>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="reniya" role="tabpanel"
                                            aria-labelledby="reniya-tab">
                                            <div class="mb-4 border-bottom pb-3">
                                                <h4 class="card-title mb-0">Reniya Cuting</h4>
                                            </div>
                                            <div class="table-responsive overflow-x-auto">
                                                <table class="table align-middle text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Date</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">
                                                                Return
                                                            </th>
                                                            <th scope="col">Second Peice</th>

                                                            <th scope="col">Salary</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="border-top">
                                                        <?php 
                                                        
                                                          $que = "SELECT * FROM reniya_cutting WHERE workers_id='$worker_id'";
                                                          $res = mysqli_query($conn,$que);
                                                          while ($row = mysqli_fetch_assoc($res)) {
                                                            
                                                        ?>
                                                        <tr>
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
                                                                    <?php echo $row['price']*$row['return_qty']." (".$row['price'].")"; ?>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

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
                                                            <th scope="col">
                                                            Diomond Quantity
                                                            </th>
                                                            <th scope="col">Completed</th>

                                                            <th scope="col">Salary</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="border-top">
                                                        <?php 
                                                        
                                                          $que = "SELECT * FROM less_fiting WHERE workers_id='$worker_id'";
                                                          $res = mysqli_query($conn,$que);
                                                          while ($row = mysqli_fetch_assoc($res)) {
                                                            
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <p class="fw-bold text-info mb-0">
                                                                    <?php echo $row['date']; ?></p>
                                                            </td>
                                                            <td>
                                                                <p class="fw-normal mb-0 fs-3 text-dark">
                                                                    <?php echo $row['use_paper_qty']." (".$row['return_sheet'].")"; ?>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="text-dark mb-0 fw-normal">
                                                                <?php echo $row['use_diomond_pkt']." (".$row['return_diomond_pkt'].")"; ?>
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <p class="text-dark mb-0 fw-normal">
                                                                    <?php echo $row['return_complete_sheet']; ?>
                                                                </p>
                                                            </td>

                                                            <td>
                                                                <p class="fw-bold text-success mb-0">
                                                                    <?php echo $row['price']*$row['return_complete_sheet']." (".$row['price'].")"; ?>
                                                                </p>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>




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

        $('#kapadType').change(function() {
            var selectedValue = $(this).val();

            // Call AJAX function with selected value as parameter
            $.ajax({
                url: 'ajax/sadi-ajax.php',
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