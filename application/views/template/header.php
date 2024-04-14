<?php

$activePage = basename($_SERVER['PHP_SELF'], ".php");

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="Sistem Pengajuan Cuti Karyawan PT. Harkovnet Indonesia" />
      <meta name="author" content="Harkovnet" />
      <title>PT. Harkovnet Indonesia</title>
      <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
      <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
      <link href="<?php echo base_url('css/styles.css'); ?>" rel="stylesheet" />
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

        <!-- Ionicons -->
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->

        <!-- Bootstrap 3.3.6 -->
        <!-- Latest compiled and minified CSS -->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"> -->

        <!-- Bootstrap 5 CSS -->
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

      
   </head>
   <body class="sb-nav-fixed">
      <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
         <!-- Navbar Brand-->
         <a class="navbar-brand ps-3" href="<?php echo site_url('home'); ?>">PT. Harkovnet Indonesia</a>
         <!-- Sidebar Toggle-->
         <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
         <!-- Navbar Search-->
         <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
         </form>
         <!-- Navbar-->
         <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
               <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="<?php echo site_url('auth/logout'); ?>">Logout</a></li>
               </ul>
            </li>
         </ul>
      </nav>
      <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
         <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
            <div class="nav">
    <?php
    $idpegawai = $this->session->userdata('idpegawai');
    $pegawai = $this->Auth_model->getPegawaiById($idpegawai);
    
    if ($pegawai && $pegawai['jabatan'] == 1) {
        // Menu untuk jabatan 1 (Admin / HRD)
        ?>
        <div class="sb-sidenav-menu-heading">Admin / HRD</div>
        <a class="nav-link <?= ($activePage == 'home') ? 'active':''; ?>" href="<?php echo site_url('home'); ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard
        </a>
        <a class="nav-link collapsed <?= ($activePage == 'divisi' || $activePage == 'pegawai') ? 'active':''; ?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePegawai" aria-expanded="false" aria-controls="collapsePegawai">
            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
            Management Pegawai
            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
        </a>

        
        <div class="<?= ($activePage == 'divisi' || $activePage == 'pegawai') ? '':'collapse'; ?>" id="collapsePegawai" aria-labelledby="headingPegawai" data-bs-parent="#sidenavAccordion">
            <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link <?= ($activePage == 'divisi') ? 'active':''; ?>" href="<?php echo site_url('divisi'); ?>">Divisi</a>
                <a class="nav-link <?= ($activePage == 'pegawai') ? 'active':''; ?>" href="<?php echo site_url('pegawai'); ?>">Pegawai</a>
            </nav>
        </div>

        <a class="nav-link" href="<?= site_url('pengamanan'); ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-lock"></i></div>
            Pengamanan Data
        </a>

        <a class="nav-link <?= ($activePage == 'permintaanadminindex') ? 'active':''; ?>" href="<?php echo site_url('cuti/permintaanadminindex'); ?>">
            <div class="sb-nav-link-icon"><i class="fas fa-calendar"></i></div>
            Management Cuti
        </a>
    <?php
    }
    ?>


<?php
    $idpegawai = $this->session->userdata('idpegawai');
    $pegawai = $this->Auth_model->getPegawaiById($idpegawai);
    
    if ($pegawai && $pegawai['jabatan'] == 2) {
        // Menu untuk jabatan 2 (Manager)
        ?>
    <div class="sb-sidenav-menu-heading">Manager</div>
        <a class="nav-link <?= ($activePage == 'home') ? 'active':''; ?>" href="<?php echo site_url('home'); ?>">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
        Dashboard
    </a>
    <a class="nav-link <?= ($activePage == 'indexstaff') ? 'active':''; ?>" href="<?php echo site_url('pegawai/indexstaff'); ?>">
        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
        Data Staff
    </a>
    <a class="nav-link <?= ($activePage == 'permintaanindex') ? 'active':''; ?>" href="<?php echo site_url('cuti/permintaanindex'); ?>">
        <div class="sb-nav-link-icon"><i class="fas fa-gear"></i></div>
        Permintaan Cuti
    </a>
    <a class="nav-link <?= ($activePage == 'pengajuanmanagerindex') ? 'active':''; ?>" href="<?php echo site_url('cuti/pengajuanmanagerindex'); ?>">
        <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
        Pengajuan Cuti
    </a>
    <?php
    }
    ?>
    <?php
    $idpegawai = $this->session->userdata('idpegawai');
    $pegawai = $this->Auth_model->getPegawaiById($idpegawai);
    
    if ($pegawai && $pegawai['jabatan'] == 3) {
     ?>
    <div class="sb-sidenav-menu-heading">Staff</div>
    <a class="nav-link <?= ($activePage == 'home') ? 'active':''; ?>" href="<?php echo site_url('home'); ?>">
        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
        Dashboard
    </a>
    <a class="nav-link <?= ($activePage == 'pengajuanstaffindex') ? 'active':''; ?>" href="<?php echo site_url('cuti/pengajuanstaffindex'); ?>">
        <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
        Pengajuan Cuti
    </a>
    <?php
    }
    ?>
</div>

            </div>
            <div class="sb-sidenav-footer">
    <div class="small">Logged in as:</div>
    <?php
    $idpegawai = $this->session->userdata('idpegawai');
    $pegawai = $this->Auth_model->getPegawaiById($idpegawai);
    
    if ($pegawai) {
        $jabatan = '';
        
        switch ($pegawai['jabatan']) {
            case 1:
                $jabatan = 'Admin / HRD';
                break;
            case 2:
                $jabatan = 'Manager';
                break;
            case 3:
                $jabatan = 'Staff';
                break;
            default:
                $jabatan = 'Unknown';
                break;
        }
        
        echo $pegawai['nama_pegawai'] . ' - ' . $jabatan;
    } else {
        echo 'Start Bootstrap'; // Jika data pegawai tidak ditemukan, tampilkan teks default
    }
    ?>


</div>

         </nav>
      </div>
      <div id="layoutSidenav_content">