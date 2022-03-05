<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi Pembayaran SPP</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!--datatables-->
  <link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="logo sekolah" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Nama Sekolah</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
            include "../koneksi.php";
            $data = $_SESSION['nim'];
            $sql = mysqli_query($koneksi,"select foto from siswa where nis = $data");
            while ($r1 = mysqli_fetch_array($sql)) 
            { ?>
                <img src="../guru/siswa/<?php echo $r1['foto']; ?>" class="img-circle elevation-2" alt="User Image">
            <?php } ?>
          <!---->
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php
            include "../koneksi.php";
            $data = $_SESSION['nim'];
            $sql = mysqli_query($koneksi,"select * from siswa where nis = $data");
            while ($r1 = mysqli_fetch_array($sql)) 
            { 
                echo $r1['nama'];
             } ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-school"></i>
              <p>
                Profil Sekolah
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="galeri.php" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Galeri
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="bayar.php" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
              <p>
                Data Pembayaran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fas fa-money-check"></i>
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
   