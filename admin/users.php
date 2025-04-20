<?php 
session_start();
if(!isset($_SESSION['memberid'])){
  echo "<script>window.location='./'</script>";
}
?>
<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE 4 |Users</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 |Users" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
      integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="dist/css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
   
    <?php include_once 'layout/sidebar.php';?>        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
                      <div class="container-fluid">
                        <!--begin::Row-->
                        <div class="row">
                          <div class="col-sm-6"><h3 class="mb-0">Users</h3></div>
                          <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Users</li>
                            </ol>
                          </div>
                        </div>
                        <!--end::Row-->
                      </div>
                      <!--end::Container-->
                    </div>
                    <!--end::App Content Header-->
                    <!--begin::App Content-->
                    <div class="app-content">
                      <!--begin::Container-->
                      <div class="container-fluid">
                        <!--begin::Row-->
                        <div class="row">
                          <div class="col">
                            <div class="card mb-4">
                              <div class="card-header"><h3 class="card-title">User Details</h3></div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th style="width: 10px"><p class="fs-6 text-center">S. No.</p></th>
                                      <th><p class="fs-6 text-center">Name</p></th>
                                      <th><p class="fs-6 text-center">Mob. No.</p></th>
                                      <th><p class="fs-6 text-center">Email</p></th>
                                      <th style="width: 40px"><p class="fs-6 text-center">Pic</p></th>
                                      <th><p class="fs-6 text-center">Status </p></th>
                                      <th style="width: 40px"><p class="fs-6 text-center">Action</p></th>

                                    </tr>
                                  </thead>
                                  <tbody id="user">
                                 
                                  </tbody>
                                </table>
                              </div>
                              <!-- /.card-body -->
                              



 <script src="../assets/js/jquery-3.7.1.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <?php
 if(isset($_REQUEST['verify']) || isset($_REQUEST['reject'])){
  
  if(isset($_REQUEST['verify'])){
    $verify=trim($_GET['verify']);

  ?>
 
  <script>
  if(confirm('confirm to verify the user')){
  let verifyID='<?php echo $verify;?>';
  $.ajax({
                url: "<?php echo '../processData/verify.php';//showstudentFees'); ?>",
                type: "POST",
                data: { verifyID: verifyID },
                dataType: "json",
                success: function(response) {
                  if (response.verify.status === 'success') {

                    alert(response.verify.message);
                    window.location='list.php';

                  
                  }else{
                  $.each(response.verify.errors, function(key, value) {
                        errors += '' + value + '';
                    });
					          alert(errors);

                  }

                  

                }
            });

  }else{
window.location='list.php';
}
  </script>
 <?php
 }


 if(isset($_REQUEST['reject'])){
  $reject=trim($_GET['reject']);
?>

<script>
  let page = 0;
  if(confirm('Sure to reject this user')){
  let rejectID='<?php echo $reject;?>';

  $.ajax({
                url: "<?php echo '../processData/reject.php';//showstudentFees'); ?>",
                type: "POST",
                data: { rejectID: rejectID },
                dataType: "json",
                success: function(response) {
                 

					          // alert(response.reject.status);
                    alert(response.reject.message);
                    window.location='list.php';


                }
            });

  }else{
  window.location='list.php';
}
  </script>

<?php

}

}
 ?>
   <script> 
        function getuser() {;
            $.ajax({
                url: "<?php echo '../processData/get.php';//showstudentFees'); ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('#user').empty();

					          let i=0;
                    $.each(data.userData, function(index, user) {i=i+1;
                      let status='<p class="fs-6 text-center text-warning">' + 'Pending' +'</p>';
                      if(user.verification==1){status='<p class="fs-6 text-center text-success">' + 'Verified' +'</p>';}
                        if(user.verification==2){status='<p class="fs-6 text-center text-danger">' + 'Rejected' +'</p>';}
                        $('#user').append('<tr><td ><p class="fs-6 text-center">' + i +'</p></td><td ><p class="fs-6 text-center">' + user.name +'</p></td><td><p class="fs-6 text-center">'  + user.mobno+ '</p></td><td><p class="fs-6 text-center" >'  + user.email + '</p></td><td><p class="fs-6 text-center" >'  + '<img src="<?php echo "../uploads/";?>'+user.pic + '"></p></td><td>'+status+'</td><td>'  + '<a href="?verify='+user.id + '" ><p class="btn fs-6 text-center   btn-success" >Verify</p></>'  + '<a href="?reject='+user.id + '" ><p class="btn btn-danger  fs-6 text-center" >Reject</p></></td></tr>'); // Assuming 'title' is a column in your 'posts' table
                    });

                }
            });
        }

        // Load the first page of posts
        $(document).ready(function() {
            getuser();

        });
    </script>








                          <!-- /.col -->
                          <div class="col-md-6">
                            
                <!-- /.card -->
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
      <footer class="app-footer">
        <!--begin::To the end-->
        <div class="float-end d-none d-sm-inline">Anything you want</div>
        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
          Copyright &copy; 2014-2024&nbsp;
          <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
      integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
      integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="dist/js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
