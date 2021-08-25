<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url();?>/public/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url();?>/public/assets/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- change this one to right package version for future -> 3.0.0 -->
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> 
  
    <!--    RENDER STYLES-->
    <?= $this->renderSection('css') ?>
    
</head>
<!-- dark-mode -->
<body class="sidebar-open" style="height: auto;">
<div class="wrapper">

  <!-- Navbar -->
  <!-- navbar-dark -->
  <nav class="main-header navbar navbar-expand">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/clinic-ms-1/home" class="nav-link">Home</a>
      </li>
    </ul>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="http://localhost/clinic-ms-1/home" class="brand-link">
      <span class="brand-text font-weight-light ml-2">EENT Clinic</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?= session()->get('full_name') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url(); ?>/home" class="nav-link <?=url_is('home') ? 'active' : '';?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Patient Management</li>
          <li class="nav-item">
            <a href="<?= base_url(); ?>/patients/registered" class="nav-link <?=url_is('patients/registered*') ? 'active' : '';?>" >
              <i class="nav-icon fas fa-user-check"></i>
              <p>
                Registered
              </p>
            </a>
          </li>
          <li class="nav-header">Medical Records</li>
          <li class="nav-item">
            <a href="<?= base_url() ?>/medical/records" class="nav-link <?=url_is('medical/records*') ? 'active' : '';?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                List
              </p>
            </a>
          </li>
          <li class="nav-header">Admin</li>
          <?php if(session('role') == 2) :  ?>
          <li class="nav-item">
            <a href="<?= base_url(); ?>/users" class="nav-link <?=url_is('users') ? 'active' : '';?>">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a href="<?= base_url(); ?>/logout" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 525px;" x-data="app()">
    <?= $this->renderSection('content') ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright © 2021 <a href="http://localhost/clinic-ms-1/home">EENT Clinic</a>.</strong> All rights reserved.
  </footer>

<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url();?>/public/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url();?>/public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url();?>/public/assets/dist/js/adminlte.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="<?= base_url();?>/public/assets/plugins/jquery.dataTables.min.js"></script>
  <script src="<?= base_url();?>/public/assets/plugins/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url();?>/public/assets/plugins/dataTables.responsive.min.js"></script>
  <script src="<?= base_url();?>/public/assets/plugins/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url();?>/public/assets/plugins/dataTables.buttons.min.js"></script>
  <script src="<?= base_url();?>/public/assets/plugins/buttons.bootstrap4.min.js"></script>


<?= $this->renderSection('script') ?>

</body>
</html>
