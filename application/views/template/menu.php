<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <?php if($this->session->userdata('hak_akses')=='1') {?>
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>/assets/dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info" style="text-transform: capitalize">
          <p><?php echo $this->session->userdata("username"); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <?php } else { ?>
        <div class="user-panel">
        <div class="pull-left image">
        <img src="<?php echo base_url() ?>/assets/images/pengajar/<?php echo $this->session->userdata('foto_pengajar'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info" style="text-transform: capitalize">
          <p><?php echo $this->session->userdata("nama_depan"); ?> <?php echo $this->session->userdata("nama_belakang"); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <?php } ?>
      <!-- search form -->
      <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form> -->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <!-- Tampil Menu Admin -->
      <?php if($this->session->userdata('hak_akses')=='1') {?>

      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview <?php echo activate_menu('Dashboard'); ?>">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            <ul class="treeview-menu">
              <li class="<?php echo activate_menu('index'); ?>"><a href="<?php echo site_url('dashboard/index');?>"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
              <li class="<?php echo activate_menu('index2'); ?>"><a href="<?php echo site_url('dashboard/index2');?>"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
            </ul>
        </li>
   
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Data Pengajar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo site_url('pengajar/index'); ?>"><i class="fa fa-circle-o"></i> Daftar Pengajar</a></li>
            <li class=""><a href="<?php echo site_url('pengajar/tambahPengajar'); ?>"><i class="fa fa-circle-o"></i> Tambah Pengajar</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Data Siswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo site_url('Siswa/index'); ?>"><i class="fa fa-circle-o"></i> Daftar Siswa</a></li>
            <li class=""><a href="<?php echo site_url('Siswa/tambahSiswa'); ?>"><i class="fa fa-circle-o"></i> Tambah Siswa</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Data Kelas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo site_url('Kelas/index'); ?>"><i class="fa fa-circle-o"></i> Daftar Kelas</a></li>
            <li class=""><a href="<?php echo site_url('Kelas/tambahKelas'); ?>"><i class="fa fa-circle-o"></i> Tambah Kelas</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Data Mata Pelajaran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo site_url('mapel/index'); ?>"><i class="fa fa-circle-o"></i> Daftar Mata Pelajaran</a></li>
            <li class=""><a href="<?php echo site_url('mapel/tambahMapel'); ?>"><i class="fa fa-circle-o"></i> Tambah Mata Pelajaran</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Data Jadwal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo site_url('jadwal/index'); ?>"><i class="fa fa-circle-o"></i> Daftar Jadwal</a></li>
            <li class=""><a href="<?php echo site_url('jadwal/tambahJadwal'); ?>"><i class="fa fa-circle-o"></i> Tambah Jadwal</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Data Presensi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo site_url('Presensi/index'); ?>"><i class="fa fa-circle-o"></i> Daftar Presesi</a></li>
            <li class=""><a href="<?php echo site_url('Presensi/jadwalPresensi'); ?>"><i class="fa fa-circle-o"></i> Tambah Presensi</a></li>
            <li class=""><a href="<?php echo site_url('Presensi/updatePresensi'); ?>"><i class="fa fa-circle-o"></i> Update Presensi</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo site_url('Laporan/index'); ?>"><i class="fa fa-circle-o"></i> Unduh Laporan Presensi</a></li>
            <!-- <li class=""><a href="<?php //echo site_url('Laporan/'); ?>"><i class="fa fa-circle-o"></i> Cetak Presensi</a></li> -->
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Kelola User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo site_url('user/index'); ?>"><i class="fa fa-circle-o"></i> Data User</a></li>
            <li class=""><a href="<?php echo site_url('user/tambahUser'); ?>"><i class="fa fa-circle-o"></i> Tambah User</a></li>
          </ul>
        </li>
      </ul>
      <?php }?>

      <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Kelola User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php //echo site_url('mail/index'); ?>"><i class="fa fa-circle-o"></i> Data User</a></li>
        
          </ul>
        </li>
      </ul>
      <?php  ?> -->
      <!-- End Tampil Menu Admin -->
      
      <!-- Tampil Menu Pengajar -->
      <?php if($this->session->userdata('hak_akses')=='3') {?>

      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview <?php echo activate_menu('Dashboard'); ?>">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
            <ul class="treeview-menu">
              <li class="<?php echo activate_menu('index2'); ?>"><a href="<?php echo site_url('dashboard/index2');?>"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
            </ul>
        </li>       

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Data Presensi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo site_url('presensi/index'); ?>"><i class="fa fa-circle-o"></i> Daftar Presesi</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class=""><a href="<?php echo site_url('laporan/index'); ?>"><i class="fa fa-circle-o"></i> Unduh Presensi</a></li>
          </ul>
        </li>
      </ul>
      <?php } ?>
      <!-- End Tampil Menu Pengajar -->
    </section>
    <!-- /.sidebar -->
  </aside>