<?php
$customer_id = Session::get('customer_id');
if ($customer_id != null) {
    $cek = DB::table('tbl_customer')->where('id',$customer_id)->first();
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Dashboard</title>
  <!-- Favicon -->
  <link rel="icon" href="<?php echo e(asset('backend/assets/img/brand/favicon.png')); ?>" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendor/nucleo/css/nucleo.css')); ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')); ?>" type="text/css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?php echo e(asset('backend/assets/css/argon.css?v=1.2.0')); ?>" type="text/css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="<?php echo e(url('/admin-home')); ?>">
          <img src="<?php echo e(URL::to('backend/assets/img/brand/blue.png')); ?>" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo e(url('/admin-home')); ?>">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/user-content')); ?>">
                <i class="ni ni-single-02 text-orange"></i>
                <span class="nav-link-text">Customer</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/category-content')); ?>">
                <i class="ni ni-bullet-list-67 text-primary"></i>
                <span class="nav-link-text">Category</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/product-content')); ?>">
                <i class="ni ni-bag-17 text-info"></i>
                <span class="nav-link-text">Product</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo e(url('/shipping-content')); ?>">
                <i class="ni ni-box-2 text-pink"></i>
                <span class="nav-link-text">Shipping</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">

        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">

          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?php echo e(asset($cek->image)); ?>">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo e($cek->name); ?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="<?php echo e(url('/profile/'.$cek->id)); ?>" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?php echo e(url('/logout')); ?>" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Logout</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->


    <div class="flash-data" data-flashdata="<?php echo e(Session::get('flash')); ?>"></div>
        <!-- START -->
            <?php echo $__env->yieldContent('content'); ?>
        <!-- END -->

      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">Dendy</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="<?php echo e(asset('backend/assets/vendor/jquery/dist/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/vendor/js-cookie/js.cookie.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')); ?>"></script>
  <!-- Optional JS -->
  <script src="<?php echo e(asset('backend/assets/vendor/chart.js/dist/Chart.min.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/vendor/chart.js/dist/Chart.extension.js')); ?>"></script>
  <!-- Argon JS -->
  <script src="<?php echo e(asset('backend/assets/js/argon.js?v=1.2.0')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/js/sweetalert2.all.min.js')); ?>"></script>
  <script src="<?php echo e(asset('backend/assets/js/script.js')); ?>"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
  <script>
    $(document).ready(function() {
        $('.data').DataTable();
    } );
  </script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\ecomerce_laravel2\resources\views/template2/template2.blade.php ENDPATH**/ ?>