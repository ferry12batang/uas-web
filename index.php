<?php

require_once __DIR__ . '/inc/include.php';

if (!$auth->getUser()) {
  redirect(base_url('/auth/login'));
}

$user = $auth->getUser();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Home - Sewa Laptop</title>

  <!-- Custom fonts for this template-->
  <link href="<?= asset('/vendor/fontawesome-free/css/all.min.css', 'admin') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= asset('css/sb-admin-2.min.css', 'admin') ?>" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="https://<?= $_SERVER['SERVER_NAME'] ?>/admin">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laptop"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sewain <sup>v1</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - admin -->
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url() ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Panel Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Client Area
      </div>

      <!-- Nav Item - Borrow and Book List -->
      <li class="nav-item">
        <a href="<?=base_url('/loan') ?>" class="nav-link">
          <i class="fas fa-fw fa-laptop"></i>
          <span>Laptop List</span>
        </a>
      </li>

      <!-- Nav Item - My Penalties -->
      <li class="nav-item">
        <a href="<?=base_url('/borrow') ?>" class="nav-link">
          <i class="fas fa-fw fa-list"></i>
          <span>Borrow List</span>
        </a>
      </li>

      <!-- Nav Item - Users -->
      <li class="nav-item">
        <a href="<?=base_url('/invoice') ?>" class="nav-link">
          <i class="fas fa-fw fa-users"></i>
          <span>Invoice</span>
        </a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- <div class="topbar-divider d-none d-sm-block"></div> -->

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['surname'] ?></span>
                <img class="img-profile rounded-circle" src="http://www.gravatar.com/avatar/<?= md5($user['surname']) ?>" />
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- Coming soon
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div> -->
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Client Area</h1>
          </div>

          <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
              <a href="<?= base_url("/loan") ?>" class="card border-left-primary text-decoration-none text-dark shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Loan a Laptop</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-laptop fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
              <a href="<?= base_url("/borrow") ?>" class="card border-left-success text-decoration-none text-dark shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Loan Laptop</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
              <a href="<?= base_url("/invoice") ?>" class="card border-left-warning text-decoration-none text-dark shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Your Invoice</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-file fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Siperpus by <a href="https://www.cakadi.my.id">Cak Adi</a>.</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?=base_url('/logout') ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= asset('vendor/jquery/jquery.min.js', 'admin') ?>"></script>
  <script src="<?= asset('vendor/bootstrap/js/bootstrap.bundle.min.js', 'admin') ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= asset('vendor/jquery-easing/jquery.easing.min.js', 'admin') ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= asset('js/sb-admin-2.min.js', 'admin') ?>"></script>

</body>

</html>