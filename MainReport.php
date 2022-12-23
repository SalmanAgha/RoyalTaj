  <?php
  session_start();
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <?php include('meta.php'); ?>
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <link href="assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
       <!-- DataTables -->
   <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
   <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
   <!-- Responsive datatable examples -->
   <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <!-- Plugins css -->
    <link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="assets/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link href="assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
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
        <!-- end page title end breadcrumb -->
        <div class="col-lg-12" >
          <div class="card">
            <!-- From Date -->
            <div class="card-body">
              <h3>Report Page</h3>
              <div class="text-left">
              
              <table id="datatable" class="table table-bordered dt-responsive nowrap" style=" overflow-x: auto;border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                 <tr class="table-bordered text-black text-center"> 
                  <th scope="col">Transaction ID</th>
                  <th scope="col">FBR ID</th>
                  <th scope="col">Amount</th> 
                </tr>
              </thead>
              <tbody id="TableBody">
              </tbody>
            </table>
          </div>
        </div>
      </div> <!-- end col -->
    
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
<!-- Buttons examples -->
<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables/jszip.min.js"></script>
<script src="assets/plugins/datatables/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/buttons.print.min.js"></script>
<script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
<script src="assets/pages/jquery.datatable.init.js"></script>
<script src="assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="assets/pages/jquery.sweet-alert.init.js"></script>

<!-- Plugins js -->
<script src="assets/plugins/moment/moment.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/select2/select2.min.js"></script>
<script src="assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
<script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
<script src="assets/pages/jquery.forms-advanced.js"></script>
<!-- App js -->
<script src="assets/js/app.js"></script>
<script src="functions/MainReport.js"></script>
</body>
</html>