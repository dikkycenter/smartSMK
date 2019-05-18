<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('dashboard/index'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo base_url();?>assets/images/logo.png" width="40"></span>
      <!-- logo for regular state and mobile devices -->
      <span style="float:left"; class="logo-lg"><img src="<?php echo base_url();?>assets/images/logo.png" width="50"><b>Smart</b>SMK</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"><a href="#"><i class="fa fa-send"></i>Kirim Pemberitahuan Ke Wali Siswa</a></li>              
              <li class="footer"><a href="<?php echo site_url('checkPresensi/index'); ?>">Lihat Siswa Bermasalah</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <?php if($this->session->userdata('hak_akses')=='1') {?>
              <img src="<?php echo base_url() ?>/assets/dist/img/avatar5.png" class="user-image" alt="User Image">
              <span class="hidden-xs" style="text-transform: capitalize;"><?php echo $this->session->userdata("username"); ?></span>
            <?php } else { ?>
              <img src="<?php echo base_url() ?>/assets/images/pengajar/<?php echo $this->session->userdata('foto_pengajar'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs" style="text-transform: capitalize;"><?php echo $this->session->userdata("nama_depan"); ?></span>
            <?php } ?>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php if($this->session->userdata('hak_akses')=='1') {?>
                  <img src="<?php echo base_url() ?>/assets//dist/img/avatar5.png" class="img-circle" alt="User Image">
                  <p style="text-transform: capitalize;">
                    <?php echo $this->session->userdata("username"); ?>
                    <small>
                      <?php if ($this->session->userdata('hak_akses')=='1') {
                        echo "Administrator";
                       } elseif ($this->session->userdata('hak_akses')=='2') {
                         echo "Wali Kelas";
                       } elseif ($this->session->userdata('hak_akses')=='3') {
                         echo "Pengajar";
                       } else {
                         echo "Siswa";
                       } ?>
                    </small>
                  </p>
                <?php } else { ?>
                  <img src="<?php echo base_url() ?>/assets/images/pengajar/<?php echo $this->session->userdata('foto_pengajar'); ?>" class="img-circle" alt="User Image">
                  <p style="text-transform: capitalize;">
                    <?php echo $this->session->userdata("nama_depan");?> <?php echo $this->session->userdata("nama_belakang"); ?>
                    <small>
                      <?php if ($this->session->userdata('hak_akses')=='1') {
                        echo "Administrator";
                       } elseif ($this->session->userdata('hak_akses')=='2') {
                         echo "Wali Kelas";
                       } elseif ($this->session->userdata('hak_akses')=='3') {
                         echo "Pengajar";
                       } else {
                         echo "Siswa";
                       } ?>
                    </small>
                  </p>
                <?php } ?>
                
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('auth/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  