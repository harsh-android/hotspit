<?php 

  include('conn.php');

  if(isset($_POST['submit'])) {

    $name = $_POST['diomondType'];

    $in = "INSERT INTO diomond_type(`name`) VALUES ('$name')";
    $res = mysqli_query($conn,$in); 

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
      <?php include('header.php');?>
      <!--  Header End -->
      <div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Add Diomond Type</h5>
              <div class="card">
                <div class="card-body">
               
                            <div class="table-responsive">
                                <table class="table search-table align-middle text-nowrap">
                                    <thead class="header-item">
                                        <th>
                                            <div class="n-chk align-self-center text-center">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input primary" id="contact-check-all" />
                                                    <label class="form-check-label" for="contact-check-all"></label>
                                                    <span class="new-control-indicator"></span>
                                                </div>
                                            </div>
                                        </th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Location</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        <!-- start row -->
                                        <tr class="search-items">
                                            <td>
                                                <div class="n-chk align-self-center text-center">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input contact-chkbox primary" id="checkbox1" />
                                                        <label class="form-check-label" for="checkbox1"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="src/assets/images/profile/user-2.jpg" alt="avatar" class="rounded-circle" width="35" />
                                                    <div class="ms-3">
                                                        <div class="user-meta-info">
                                                            <h6 class="user-name mb-0" data-name="Emma Adams">Emma Adams</h6>
                                                            <span class="user-work fs-3" data-occupation="Web Developer">Web Developer</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="usr-email-addr" data-email="adams@mail.com">adams@mail.com</span>
                                            </td>
                                            <td>
                                                <span class="usr-location" data-location="Boston, USA">Boston, USA</span>
                                            </td>
                                            <td>
                                                <span class="usr-ph-no" data-phone="+1 (070) 123-4567">+91 (070) 123-4567</span>
                                            </td>
                                            <td>
                                                <div class="action-btn">
                                                    <a href="javascript:void(0)" class="text-primary edit">
                            <i class="ti ti-eye fs-5"></i>
                          </a>
                                                    <a href="javascript:void(0)" class="text-dark delete ms-2">
                            <i class="ti ti-trash fs-5"></i>
                          </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end row -->
                                        <!-- start row -->
                                        <tr class="search-items">
                                            <td>
                                                <div class="n-chk align-self-center text-center">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input contact-chkbox primary" id="checkbox2" />
                                                        <label class="form-check-label" for="checkbox2"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="src/assets/images/profile/user-2.jpg" alt="avatar" class="rounded-circle" width="35" />
                                                    <div class="ms-3">
                                                        <div class="user-meta-info">
                                                            <h6 class="user-name mb-0" data-name="Olivia Allen">Olivia Allen</h6>
                                                            <span class="user-work fs-3" data-occupation="Web Designer">Web Designer</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="usr-email-addr" data-email="allen@mail.com">allen@mail.com</span>
                                            </td>
                                            <td>
                                                <span class="usr-location" data-location="Sydney, Australia">Sydney, Australia</span>
                                            </td>
                                            <td>
                                                <span class="usr-ph-no" data-phone="+91 (125) 450-1500">+91 (125) 450-1500</span>
                                            </td>
                                            <td>
                                                <div class="action-btn">
                                                    <a href="javascript:void(0)" class="text-primary edit">
                            <i class="ti ti-eye fs-5"></i>
                          </a>
                                                    <a href="javascript:void(0)" class="text-dark delete ms-2">
                            <i class="ti ti-trash fs-5"></i>
                          </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end row -->
                                        <!-- start row -->
                                        <tr class="search-items">
                                            <td>
                                                <div class="n-chk align-self-center text-center">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input contact-chkbox primary" id="checkbox3" />
                                                        <label class="form-check-label" for="checkbox3"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="src/assets/images/profile/user-3.jpg" alt="avatar" class="rounded-circle" width="35" />
                                                    <div class="ms-3">
                                                        <div class="user-meta-info">
                                                            <h6 class="user-name mb-0" data-name="Isabella Anderson"> Isabella Anderson </h6>
                                                            <span class="user-work fs-3" data-occupation="UX/UI Designer">UX/UI Designer</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="usr-email-addr" data-email="anderson@mail.com">anderson@mail.com</span>
                                            </td>
                                            <td>
                                                <span class="usr-location" data-location="Miami, USA">Miami, USA</span>
                                            </td>
                                            <td>
                                                <span class="usr-ph-no" data-phone="+91 (100) 154-1254">+91 (100) 154-1254</span>
                                            </td>
                                            <td>
                                                <div class="action-btn">
                                                    <a href="javascript:void(0)" class="text-primary edit">
                            <i class="ti ti-eye fs-5"></i>
                          </a>
                                                    <a href="javascript:void(0)" class="text-dark delete ms-2">
                            <i class="ti ti-trash fs-5"></i>
                          </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end row -->
                                        <!-- start row -->
                                        <tr class="search-items">
                                            <td>
                                                <div class="n-chk align-self-center text-center">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input contact-chkbox primary" id="checkbox4" />
                                                        <label class="form-check-label" for="checkbox4"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="src/assets/images/profile/user-4.jpg" alt="avatar" class="rounded-circle" width="35" />
                                                    <div class="ms-3">
                                                        <div class="user-meta-info">
                                                            <h6 class="user-name mb-0" data-name="Amelia Armstrong"> Amelia Armstrong </h6>
                                                            <span class="user-work fs-3" data-occupation="Ethical Hacker">Ethical Hacker</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="usr-email-addr" data-email="armstrong@mail.com">armstrong@mail.com</span>
                                            </td>
                                            <td>
                                                <span class="usr-location" data-location="Tokyo, Japan">Tokyo, Japan</span>
                                            </td>
                                            <td>
                                                <span class="usr-ph-no" data-phone="+91 (154) 199- 1540">+91 (154) 199- 1540</span>
                                            </td>
                                            <td>
                                                <div class="action-btn">
                                                    <a href="javascript:void(0)" class="text-primary edit">
                            <i class="ti ti-eye fs-5"></i>
                          </a>
                                                    <a href="javascript:void(0)" class="text-dark delete ms-2">
                            <i class="ti ti-trash fs-5"></i>
                          </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end row -->
                                        <!-- start row -->
                                        <tr class="search-items">
                                            <td>
                                                <div class="n-chk align-self-center text-center">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input contact-chkbox primary" id="checkbox5" />
                                                        <label class="form-check-label" for="checkbox5"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="src/assets/images/profile/user-5.jpg" alt="avatar" class="rounded-circle" width="35" />
                                                    <div class="ms-3">
                                                        <div class="user-meta-info">
                                                            <h6 class="user-name mb-0" data-name="Emily Atkinson"> Emily Atkinson </h6>
                                                            <span class="user-work fs-3" data-occupation="Web developer">Web developer</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="usr-email-addr" data-email="atkinson@mail.com">atkinson@mail.com</span>
                                            </td>
                                            <td>
                                                <span class="usr-location" data-location="Edinburgh, UK">Edinburgh, UK</span>
                                            </td>
                                            <td>
                                                <span class="usr-ph-no" data-phone="+91 (900) 150- 1500">+91 (900) 150- 1500</span>
                                            </td>
                                            <td>
                                                <div class="action-btn">
                                                    <a href="javascript:void(0)" class="text-primary edit">
                            <i class="ti ti-eye fs-5"></i>
                          </a>
                                                    <a href="javascript:void(0)" class="text-dark delete ms-2">
                            <i class="ti ti-trash fs-5"></i>
                          </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end row -->
                                        <!-- start row -->
                                        <tr class="search-items">
                                            <td>
                                                <div class="n-chk align-self-center text-center">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input contact-chkbox primary" id="checkbox6" />
                                                        <label class="form-check-label" for="checkbox6"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="src/assets/images/profile/user-12.jpg" alt="avatar" class="rounded-circle" width="35" />
                                                    <div class="ms-3">
                                                        <div class="user-meta-info">
                                                            <h6 class="user-name mb-0" data-name="Sofia Bailey">Sofia Bailey</h6>
                                                            <span class="user-work fs-3" data-occupation="UX/UI Designer">UX/UI Designer</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="usr-email-addr" data-email="bailey@mail.com">bailey@mail.com</span>
                                            </td>
                                            <td>
                                                <span class="usr-location" data-location="New York, USA">New York, USA</span>
                                            </td>
                                            <td>
                                                <span class="usr-ph-no" data-phone="+91 (001) 160- 1845">+91 (001) 160- 1845</span>
                                            </td>
                                            <td>
                                                <div class="action-btn">
                                                    <a href="javascript:void(0)" class="text-primary edit">
                            <i class="ti ti-eye fs-5"></i>
                          </a>
                                                    <a href="javascript:void(0)" class="text-dark delete ms-2">
                            <i class="ti ti-trash fs-5"></i>
                          </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="search-items">
                                            <td>
                                                <div class="n-chk align-self-center text-center">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input contact-chkbox primary" id="checkbox7" />
                                                        <label class="form-check-label" for="checkbox7"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="src/assets/images/profile/user-2.jpg" alt="avatar" class="rounded-circle" width="35" />
                                                    <div class="ms-3">
                                                        <div class="user-meta-info">
                                                            <h6 class="user-name mb-0" data-name="Victoria Sharma"> Victoria Sharma </h6>
                                                            <span class="user-work fs-3" data-occupation="Project Manager">Project Manager</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="usr-email-addr" data-email="sharma@mail.com">sharma@mail.com</span>
                                            </td>
                                            <td>
                                                <span class="usr-location" data-location="Miami, USA">Miami, USA</span>
                                            </td>
                                            <td>
                                                <span class="usr-ph-no" data-phone="+91 (110) 180- 1600">+91 (110) 180- 1600</span>
                                            </td>
                                            <td>
                                                <div class="action-btn">
                                                    <a href="javascript:void(0)" class="text-primary edit">
                            <i class="ti ti-eye fs-5"></i>
                          </a>
                                                    <a href="javascript:void(0)" class="text-dark delete ms-2">
                            <i class="ti ti-trash fs-5"></i>
                          </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr class="search-items">
                                            <td>
                                                <div class="n-chk align-self-center text-center">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input contact-chkbox primary" id="checkbox8" />
                                                        <label class="form-check-label" for="checkbox8"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="src/assets/images/profile/user-3.jpg" alt="avatar" class="rounded-circle" width="35" />
                                                    <div class="ms-3">
                                                        <div class="user-meta-info">
                                                            <h6 class="user-name mb-0" data-name="Penelope Baker"> Penelope Baker </h6>
                                                            <span class="user-work fs-3" data-occupation="Web Developer">Web Developer</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="usr-email-addr" data-email="baker@mail.com">baker@mail.com</span>
                                            </td>
                                            <td>
                                                <span class="usr-location" data-location="Edinburgh, UK">Edinburgh, UK</span>
                                            </td>
                                            <td>
                                                <span class="usr-ph-no" data-phone="+91 (405) 483- 4512">+91 (405) 483- 4512</span>
                                            </td>
                                            <td>
                                                <div class="action-btn">
                                                    <a href="javascript:void(0)" class="text-primary edit">
                            <i class="ti ti-eye fs-5"></i>
                          </a>
                                                    <a href="javascript:void(0)" class="text-dark delete ms-2">
                            <i class="ti ti-trash fs-5"></i>
                          </a>
                                                </div>
                                            </td>
                                        </tr>
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

    $(document).ready(function(){

      $('#kapadType').change(function() {
        var selectedValue = $(this).val();
       
        // Call AJAX function with selected value as parameter
        $.ajax({
            url: 'ajax/sadi-ajax.php',
            type: 'POST',
            data: { 'type': selectedValue },
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
