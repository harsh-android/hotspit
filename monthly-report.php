<?php
include('conn.php');
$month = $_GET['month'] ?? date('m');
$year = $_GET['year'] ?? date('Y');
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
                     <div class="d-flex gap-2 align-items-center mt-2 mb-4" style="background-color: white; max-width: 430px;">
                        <select class="form-control" id="month" name="month" style="border: 1px solid  #89E4DE;">
                           <option value="1">January</option>
                           <option value="2">February</option>
                           <option value="3">March</option>
                           <option value="4">April</option>
                           <option value="5">May</option>
                           <option value="6">June</option>
                           <option value="7">July</option>
                           <option value="8">August</option>
                           <option value="9">September</option>
                           <option value="10">October</option>
                           <option value="11">November</option>
                           <option value="12">December</option>
                        </select>
                        <select class="form-control" id="year" name="year" style="border: 1px solid  #89E4DE;">
                           <option value="2024">2024</option>
                           <option value="2025">2025</option>
                           <option value="2026">2026</option>
                           <option value="2027">2027</option>
                           <option value="2028">2028</option>
                           <option value="2029">2029</option>
                           <option value="2030">2030</option>
                           <option value="2031">2031</option>
                           <option value="2032">2032</option>
                           <option value="2033">2033</option>
                           <option value="2034">2034</option>
                        </select>
                        <button class="btn btn-success btn-sm" id="monthYearSearch" style="padding: 9px 17px; font-size: 13px;">
                           Search
                        </button>
                     </div>

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
                           <button class="nav-link" id="kapad-cutting-tab" data-bs-toggle="tab"
                              data-bs-target="#kapad-cutting" type="button" role="tab" aria-controls="kapad-cutting"
                              aria-selected="false">
                              Kapad Cutting
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
                                    <!-- <button class="btn btn-success ms-2 qty-submit-button" type="submit" style="pointer-events: none; opacity: 0.5;">
                                                    Return Checked Nidel Stock
                                                </button> -->
                                    <table class="table align-middle text-nowrap">
                                       <thead>
                                          <tr>
                                             <!-- <th scope="col">Check</th> -->
                                             <th scope="col">Date</th>
                                             <th scope="col">Worker</th>
                                             <th scope="col">Quantity</th>
                                             <!-- <th scope="col">Return</th> -->
                                             <!-- <th scope="col">Second Peice</th> -->
                                             <th scope="col">Salary</th>
                                          </tr>
                                       </thead>
                                       <tbody class="border-top">
                                          <?php
                                          $que = "SELECT * FROM nidel_expence 
                                                                INNER JOIN workers ON workers.id = nidel_expence.workers_id
                                                                WHERE DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%m') = '$month' 
                                                                AND DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%Y') = '$year'";
                                          $res = mysqli_query($conn, $que);
                                          while ($row = mysqli_fetch_assoc($res)) {
                                          ?>
                                             <tr>
                                                <!-- <td>
                                                                    <?php if ($row['use_qty'] > $row['return_qty'] + $row['second_qty']) {

                                                                     ?>
                                                                        <input type="checkbox" class="select-stock"
                                                                            id="select-stock"
                                                                            data-id="<?php echo $row['id'] ?>"
                                                                            data-work="nidel"
                                                                            data-qty="<?php echo $row['use_qty'] ?>"
                                                                            data-second="<?php echo $row['second_qty'] ?>">
                                                                    <?php } ?>
                                                                </td> -->
                                                <td>
                                                   <p class="fw-bold text-info mb-0">
                                                      <?php echo $row['date']; ?></p>
                                                </td>
                                                <td>
                                                   <p class="fw-bold text-primary mb-0">
                                                      <?php echo $row['name']; ?></p>
                                                </td>
                                                <td>
                                                   <p class="fw-normal mb-0 fs-3 text-dark">
                                                      <?php echo $row['use_qty']; ?>
                                                   </p>
                                                </td>
                                                <!-- <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['return_qty']; ?>
                                                                    </p>
                                                                </td> -->
                                                <!-- <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['second_qty']; ?>
                                                                    </p>
                                                                </td> -->

                                                <td>
                                                   <p class="fw-bold text-success mb-0">
                                                      <?php echo $row['price'] * $row['use_qty'] . " (" . $row['price'] . ")"; ?>
                                                   </p>
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
                                 <!-- <button class="btn btn-success ms-2 qty-submit-button" type="submit" style="pointer-events: none; opacity: 0.5;">
                                                Return Checked Less Fiting Stock
                                            </button> -->
                                 <div class="table-responsive overflow-x-auto">
                                    <table class="table align-middle text-nowrap">
                                       <thead>
                                          <tr>
                                             <!-- <th scope="col">Check</th> -->
                                             <th scope="col">Date</th>
                                             <th scope="col">Worker</th>
                                             <th scope="col">Quantity</th>
                                             <!-- <th scope="col">Return</th> -->
                                             <!-- <th scope="col">Second Peice</th> -->
                                             <th scope="col">Salary</th>

                                          </tr>
                                       </thead>
                                       <tbody class="border-top">

                                          <?php

                                          $que = "SELECT * FROM less_fiting 
                                                                INNER JOIN workers ON workers.id = less_fiting.workers_id
                                                                WHERE DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%m') = '$month' 
                                                                AND DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%Y') = '$year'";
                                          $res = mysqli_query($conn, $que);
                                          while ($row = mysqli_fetch_assoc($res)) {

                                          ?>
                                             <tr>
                                                <!-- <td>
                                                                    <?php if ($row['use_qty'] > $row['return_qty'] + $row['second_qty']) {

                                                                     ?>
                                                                        <input type="checkbox" class="select-stock"
                                                                            id="select-stock"
                                                                            data-id="<?php echo $row['id'] ?>"
                                                                            data-work="less-fiting"
                                                                            data-qty="<?php echo $row['use_qty'] ?>"
                                                                            data-second="<?php echo $row['second_qty'] ?>">
                                                                    <?php } ?>
                                                                </td> -->
                                                <td>
                                                   <p class="fw-bold text-info mb-0">
                                                      <?php echo $row['date']; ?></p>
                                                </td>
                                                <td>
                                                   <p class="fw-bold text-primary mb-0">
                                                      <?php echo $row['name']; ?></p>
                                                </td>
                                                <td>
                                                   <p class="fw-normal mb-0 fs-3 text-dark">
                                                      <?php echo $row['use_qty']; ?>
                                                   </p>
                                                </td>
                                                <!-- <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['return_qty']; ?>
                                                                    </p>
                                                                </td> -->
                                                <!-- <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['second_qty']; ?>
                                                                    </p>
                                                                </td> -->

                                                <td>
                                                   <p class="fw-bold text-success mb-0">
                                                      <?php echo $row['price'] * $row['use_qty'] . " (" . $row['price'] . ")"; ?>
                                                   </p>
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
                                 <!-- <button class="btn btn-success ms-2 qty-submit-button" type="submit" style="pointer-events: none; opacity: 0.5;">
                                                Return Checked Hotfix Stock
                                            </button> -->
                                 <div class="table-responsive overflow-x-auto">
                                    <table class="table align-middle text-nowrap">
                                       <thead>
                                          <tr>
                                             <!-- <th scope="col">Check</th> -->
                                             <th scope="col">Date</th>
                                             <th scope="col">Worker</th>
                                             <th scope="col">Quantity</th>
                                             <!-- <th scope="col">Return</th> -->
                                             <!-- <th scope="col">Second Peice</th> -->
                                             <th scope="col">Butta Count</th>
                                             <th scope="col">Butta Price</th>
                                             <th scope="col">Line Count</th>
                                             <th scope="col">Line Price</th>
                                             <th scope="col">Sheet Used</th>
                                             <th scope="col">Sheet Price</th>
                                             <th scope="col">Border Price</th>
                                             <th scope="col">Salary</th>

                                          </tr>
                                       </thead>
                                       <tbody class="border-top">
                                          <?php

                                          $que = "SELECT * FROM `hotfix` 
                                                                INNER JOIN workers ON workers.id = hotfix.workers_id
                                                                WHERE DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%m') = '$month' 
                                                                AND DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%Y') = '$year'";
                                          $res = mysqli_query($conn, $que);
                                          while ($row = mysqli_fetch_assoc($res)) {

                                          ?>
                                             <tr>
                                                <!-- <td>
                                                                    <?php if ($row['use_qty'] > $row['return_qty'] + $row['second_qty']) {

                                                                     ?>
                                                                        <input type="checkbox" class="select-stock"
                                                                            id="select-stock"
                                                                            data-id="<?php echo $row['id'] ?>"
                                                                            data-work="hotfix"
                                                                            data-qty="<?php echo $row['use_qty'] ?>"
                                                                            data-second="<?php echo $row['second_qty'] ?>">
                                                                    <?php } ?>
                                                                </td> -->
                                                <td>
                                                   <p class="fw-bold text-info mb-0">
                                                      <?php echo $row['date']; ?></p>
                                                </td>
                                                <td>
                                                   <p class="fw-bold text-primary mb-0">
                                                      <?php echo $row['name']; ?></p>
                                                </td>
                                                <td>
                                                   <p class="fw-normal mb-0 fs-3 text-dark">
                                                      <?php echo $row['use_qty']; ?>
                                                   </p>
                                                </td>
                                                <!-- <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['return_qty']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['second_qty']; ?>
                                                                    </p>
                                                                </td> -->
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
                                                      <?php echo $row['price'] * $row['use_qty'] . " (" . $row['price'] . ")"; ?>
                                                   </p>
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
                                 <!-- <button class="btn btn-success ms-2 qty-submit-button" type="submit" style="pointer-events: none; opacity: 0.5;">
                                                Return Checked Fusing Stock
                                            </button> -->
                                 <div class="table-responsive overflow-x-auto">
                                    <table class="table align-middle text-nowrap">
                                       <thead>
                                          <tr>
                                             <!-- <th scope="col">Check</th> -->
                                             <th scope="col">Date</th>
                                             <th scope="col">Worker</th>
                                             <th scope="col">Quantity</th>
                                             <!-- <th scope="col">Return</th> -->
                                             <!-- <th scope="col">Second Peice</th> -->
                                             <th scope="col">Salary</th>
                                          </tr>
                                       </thead>
                                       <tbody class="border-top">
                                          <?php

                                          $que = "SELECT * FROM fusing_expence 
                                                                INNER JOIN workers ON workers.id = fusing_expence.workers_id
                                                                WHERE DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%m') = '$month' 
                                                                AND DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%Y') = '$year'";
                                          $res = mysqli_query($conn, $que);
                                          while ($row = mysqli_fetch_assoc($res)) {

                                          ?>
                                             <tr>
                                                <!-- <td>
                                                                    <?php if ($row['use_qty'] > $row['return_qty'] + $row['second_qty']) {

                                                                     ?>
                                                                        <input type="checkbox" class="select-stock"
                                                                            id="select-stock"
                                                                            data-id="<?php echo $row['id'] ?>"
                                                                            data-work="fusing"
                                                                            data-qty="<?php echo $row['use_qty'] ?>"
                                                                            data-second="<?php echo $row['second_qty'] ?>">
                                                                    <?php } ?>
                                                                </td> -->
                                                <td>
                                                   <p class="fw-bold text-info mb-0">
                                                      <?php echo $row['date']; ?></p>
                                                </td>
                                                <td>
                                                   <p class="fw-bold text-primary mb-0">
                                                      <?php echo $row['name']; ?></p>
                                                </td>
                                                <td>
                                                   <p class="fw-normal mb-0 fs-3 text-dark">
                                                      <?php echo $row['use_qty']; ?>
                                                   </p>
                                                </td>
                                                <!-- <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['return_qty']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['second_qty']; ?>
                                                                    </p>
                                                                </td> -->

                                                <td>
                                                   <p class="fw-bold text-success mb-0">
                                                      <?php echo $row['price'] * $row['use_qty'] . " (" . $row['price'] . ")"; ?>
                                                   </p>
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
                                 <!-- <button class="btn btn-success ms-2 qty-submit-button" type="submit" style="pointer-events: none; opacity: 0.5;">
                                                Return Checked Reniya Cuting Stock
                                            </button> -->
                                 <div class="table-responsive overflow-x-auto">
                                    <table class="table align-middle text-nowrap">
                                       <thead>
                                          <tr>
                                             <!-- <th scope="col">Check</th> -->
                                             <th scope="col">Date</th>
                                             <th scope="col">Worker</th>
                                             <th scope="col">Quantity</th>
                                             <!-- <th scope="col">Return</th> -->
                                             <!-- <th scope="col">Second Peice</th> -->
                                             <th scope="col">Salary</th>
                                          </tr>
                                       </thead>
                                       <tbody class="border-top">
                                          <?php

                                          $que = "SELECT * FROM reniya_cutting 
                                                                INNER JOIN workers ON workers.id = reniya_cutting.workers_id
                                                                WHERE DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%m') = '$month' 
                                                                AND DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%Y') = '$year'";
                                          $res = mysqli_query($conn, $que);
                                          while ($row = mysqli_fetch_assoc($res)) {

                                          ?>
                                             <tr>
                                                <!-- <td>
                                                                    <?php if ($row['use_qty'] > $row['return_qty'] + $row['second_qty']) {

                                                                     ?>
                                                                        <input type="checkbox" class="select-stock"
                                                                            id="select-stock"
                                                                            data-id="<?php echo $row['id'] ?>"
                                                                            data-work="reniya-cutting"
                                                                            data-qty="<?php echo $row['use_qty'] ?>"
                                                                            data-second="<?php echo $row['second_qty'] ?>">
                                                                    <?php } ?>
                                                                </td> -->
                                                <td>
                                                   <p class="fw-bold text-info mb-0">
                                                      <?php echo $row['date']; ?></p>
                                                </td>
                                                <td>
                                                   <p class="fw-bold text-primary mb-0">
                                                      <?php echo $row['name']; ?></p>
                                                </td>
                                                <td>
                                                   <p class="fw-normal mb-0 fs-3 text-dark">
                                                      <?php echo $row['use_qty']; ?>
                                                   </p>
                                                </td>
                                                <!-- <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['return_qty']; ?>
                                                                    </p>
                                                                </td>
                                                                <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['second_qty']; ?>
                                                                    </p>
                                                                </td> -->

                                                <td>
                                                   <p class="fw-bold text-success mb-0">
                                                      <?php echo $row['price'] * $row['use_qty'] . " (" . $row['price'] . ")"; ?>
                                                   </p>
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
                                             <th scope="col">Worker</th>
                                             <th scope="col">Paper Quantity</th>
                                             <!-- <th scope="col">Return Paper</th> -->
                                             <th scope="col">Diamond Quantity</th>
                                             <!-- <th scope="col">Return Diamond Packet</th> -->
                                             <!-- <th scope="col">Return Completed Sheet</th> -->
                                             <!-- <th scope="col">Second Sheet</th> -->
                                             <th scope="col">Salary</th>
                                          </tr>
                                       </thead>
                                       <tbody class="border-top">
                                          <?php

                                          $que = "SELECT * FROM sheet_work 
                                                                INNER JOIN workers ON workers.id = sheet_work.workers_id
                                                                WHERE DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%m') = '$month' 
                                                                AND DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%Y') = '$year'";
                                          $res = mysqli_query($conn, $que);
                                          while ($row = mysqli_fetch_assoc($res)) {

                                          ?>
                                             <tr>
                                                <td>
                                                   <p class="fw-bold text-info mb-0">
                                                      <?php echo $row['date']; ?></p>
                                                </td>
                                                <td>
                                                   <p class="fw-bold text-primary mb-0">
                                                      <?php echo $row['name']; ?></p>
                                                </td>
                                                <td>
                                                   <p class="fw-normal mb-0 fs-3 text-dark">
                                                      <?php echo $row['use_paper_qty']; ?>
                                                   </p>
                                                </td>
                                                <!-- <td>
                                                                    <p class="fw-normal mb-0 fs-3 text-dark">
                                                                        <?php echo $row['return_paper']; ?>
                                                                    </p>
                                                                </td> -->
                                                <td>
                                                   <p class="text-dark mb-0 fw-normal">
                                                      <?php echo $row['use_diomond_pkt']; ?>
                                                   </p>
                                                </td>
                                                <!-- <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['return_diomond_pkt']; ?>
                                                                    </p>
                                                                </td> -->

                                                <!-- <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['return_complete_sheet']; ?>
                                                                    </p>
                                                                </td> -->
                                                <!-- <td>
                                                                    <p class="text-dark mb-0 fw-normal">
                                                                        <?php echo $row['second_sheet']; ?>
                                                                    </p>
                                                                </td> -->
                                                <td>
                                                   <p class="fw-bold text-success mb-0">
                                                      <?php echo $row['price'] * $row['use_paper_qty'] . " (" . $row['price'] . ")"; ?>
                                                   </p>
                                                </td>
                                             </tr>
                                          <?php } ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>

                              <!-- Kapad Cutting -->
                              <div class="tab-pane fade" id="kapad-cutting" role="tabpanel"
                                 aria-labelledby="kapad-cutting-tab">
                                 <div class="mb-4 border-bottom pb-3">
                                    <h4 class="card-title mb-0">Kapad Cutting</h4>
                                 </div>
                                 <div class="table-responsive overflow-x-auto">
                                    <table class="table align-middle text-center">
                                       <thead>
                                          <tr>
                                             <th scope="col">Date</th>
                                             <th scope="col">Worker</th>
                                             <th scope="col">Use Meter</th>
                                             <th scope="col">Line Size</th>
                                             <th scope="col">Salary</th>
                                          </tr>
                                       </thead>
                                       <tbody class="border-top">
                                          <?php

                                          $que = "SELECT * FROM kapad_cutting 
                                                                INNER JOIN workers ON workers.id = kapad_cutting.workers_id
                                                                WHERE DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%m') = '$month' 
                                                                AND DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%Y') = '$year'";
                                          $res = mysqli_query($conn, $que);
                                          while ($row = mysqli_fetch_assoc($res)) {

                                          ?>
                                             <tr>
                                                <td>
                                                   <p class="fw-bold text-info mb-0">
                                                      <?php echo $row['date']; ?></p>
                                                </td>
                                                <td>
                                                   <p class="fw-bold text-primary mb-0">
                                                      <?php echo $row['name']; ?></p>
                                                </td>
                                                <td>
                                                   <p class="fw-normal mb-0 fs-3 text-dark">
                                                      <?php echo $row['use_meter']; ?>
                                                   </p>
                                                </td>
                                                <td>
                                                   <p class="fw-normal mb-0 fs-3 text-dark">
                                                      <?php echo $row['line_size']; ?>
                                                   </p>
                                                </td>
                                                <td>
                                                   <p class="fw-bold text-success mb-0">
                                                      <!-- <?php echo $row['price'] * $row['return_complete_sheet'] . " (" . $row['price'] . ")"; ?> -->
                                                   </p>
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
                                 <div class="table-responsive overflow-x-auto">
                                    <table class="table align-middle text-center">
                                       <thead>
                                          <tr>
                                             <th scope="col">Date</th>
                                             <th scope="col">Worker</th>
                                             <th scope="col">Salary Date</th>
                                             <th scope="col">Mode</th>
                                             <th scope="col">Cheque No</th>
                                             <th scope="col">A/c No</th>
                                             <th scope="col">Amount</th>
                                             <th scope="col">Note</th>
                                          </tr>
                                       </thead>
                                       <tbody class="border-top">
                                          <?php

                                          $que = "SELECT * FROM banking 
                                                                LEFT JOIN workers ON workers.id = banking.workers_id
                                                                WHERE DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%m') = '$month' 
                                                                AND DATE_FORMAT(STR_TO_DATE(date, '%d-%m-%Y'), '%Y') = '$year'";
                                          $res = mysqli_query($conn, $que);
                                          while ($row = mysqli_fetch_assoc($res)) {
                                          ?>
                                             <tr>
                                                <td>
                                                   <p class="fw-bold text-info mb-0">
                                                      <?php echo $row['date']; ?></p>
                                                </td>
                                                <td>
                                                   <p class="fw-bold text-primary mb-0">
                                                      <?php echo $row['name'] ?? '-'; ?></p>
                                                </td>
                                                <td>
                                                   <p class="fw-bold text-success mb-0">
                                                      <?php echo $row['salary_date']; ?></p>
                                                </td>
                                                <td>
                                                   <p class="fw-normal mb-0 fs-3 text-dark">
                                                      <?php echo $row['type']; ?>
                                                   </p>
                                                </td>
                                                <td>
                                                   <p class="fw-normal mb-0 fs-3 text-dark">
                                                      <?php echo $row['cheque_no'] ?? '-'; ?>
                                                   </p>
                                                </td>
                                                <td>
                                                   <p class="fw-normal mb-0 fs-3 text-dark">
                                                      <?php echo $row['account_no'] ?? '-'; ?>
                                                   </p>
                                                </td>
                                                <td>
                                                   <p class="fw-normal mb-0 text-danger">
                                                      <b><?php echo $row['amount']; ?></b>
                                                   </p>
                                                </td>
                                                <td>
                                                   <p class="fw-bold mb-0">
                                                      <?php echo $row['note']; ?>
                                                   </p>
                                                </td>
                                             </tr>
                                          <?php } ?>
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

         const currentMonth = <?php echo $month; ?>; // Months are zero-indexed
         const currentYear = <?php echo $year; ?>;

         $('#month').val(currentMonth);
         $('#year').val(currentYear);

         // Event listener to handle dropdown change
         $(document).on('click', '#monthYearSearch', function() {
            const selectedMonth = String($('#month').val()).padStart(2, '0');
            const selectedYear = $('#year').val();
            toggleMonthYearWiseData(selectedMonth, selectedYear);
         });

         // Function to reload the page with updated query parameters
         function toggleMonthYearWiseData(month, year) {
            const url = new URL(window.location.href);
            url.searchParams.set('month', month);
            url.searchParams.set('year', year);
            window.location.href = url.toString();
         }
      });
   </script>

</body>

</html>