<?php 
 
session_start();

// if (!isset($_SESSION['userid'])) {
//   header('location: ../login.php');
// }

// if (isset($_SESSION['lubricantflag']) ) {
//     if ($_SESSION['lubricantflag'] == '0'){
//       header('location: ../Home.php');
//     }else if ($_SESSION['lubricantflag'] == '2'){
//       header('location: ../admin.php');
//     }
      
//     }
     

?>  


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
  <title>Taj Gasoline</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Taj Gasoline Portal" name="description" />
  <meta content="Taj Gasoline" name="author" />
  <!-- App favicon -->
  <link rel="shortcut icon" href="../../favicon.ico">
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <link href="assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
</head>
<body>
    <!-- Top Bar Start -->
    <?php include "navbar.php"; ?>
    <div class="page-wrapper">
     <?php include "leftbar.php"; ?>
     <!-- Left Sidenav -->
     <!-- Page Content-->
     <div class="page-content">
        <div class="container-fluid">
            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="float-right">
                            <ol class="breadcrumb">
                               <li class="breadcrumb-item"><a href="javascript:void(0);">Lubricant Portal</a></li>
                               <li class="breadcrumb-item active">Home</li>
                           </ol>
                       </div>
                       <h4 class="page-title">Welcome to TGPL Customer Portal</h4>
                   </div><!--end page-title-box-->
               </div><!--end col-->
           </div>

           <div class="row">

            <div class="col-xl-3 col-lg-6">
                <div class="card l-bg-blue-dark">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-users fa-5x"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0">CUSTOMER INFO</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center mb-0">
                                   <span id="customerInfo">-</span>
                                </h2>
                            </div>
                           
                        </div> 
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart fa-5x"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">NEW ORDERS</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0 nw">
                                <span id="newOrders">-</span>
                      
                            </h2>
                        </div>
                      
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-green-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart fa-5x"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">COMPLETED ORDERS</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <span id="completedOrders">-</span>
                            </h2>
                        </div>
                       
                    </div> 
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card l-bg-orange-dark">
                <div class="card-statistic-3 p-4">
                    <div class="card-icon card-icon-large"><i class="fas fa-dollar-sign fa-5x"></i></div>
                    <div class="mb-4">
                        <h5 class="card-title mb-0">BALANCE</h5>
                    </div>
                    <div class="row align-items-center mb-2 d-flex">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                               <span id="balance">-</span>
                            </h2>
                        </div>
                        
                    </div>
                    <!-- <div class="progress mt-1 " data-height="8" style="height: 8px;">
                        <div class="progress-bar l-bg-cyan" role="progressbar" data-width="25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                    </div> -->
                </div>
            </div>
        </div>

    </div>



</div><!-- container -->

</div>
<!-- end page content -->
</div>
<!-- end page-wrapper -->
<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/waves.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<!--Plugins-->

<script src="assets/plugins/moment/moment.js"></script>
<!-- Required datatable js -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="assets/pages/jquery.sweet-alert.init.js"></script>
<script src="functions/Home.js"></script>


<!--         <script src="functions/Staff.js"></script> -->

<!-- App js -->
<script src="assets/js/app.js"></script>
</body>
</html>