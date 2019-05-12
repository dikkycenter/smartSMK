  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Presensi
        <small>Presensi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Presensi</a></li>
        <li class="active">Presensi</li>
      </ol>
    </section>

    
    <?php 
      $data = $this->session->flashdata('sukses');
      if($data!="") { ?>
      <div class="alert alert-success" role="alert"><Strong>Sukses!</Strong>
        <?php echo $data; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div> 
      <?php };
    ?>
    <div class="alert-success"></div>

    <!-- Verifikasi -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $title; ?></h3>              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo site_url('presensi/save_verifikasi'); ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="pilih_siswa" class="col-sm-2 control-label">Pilih Siswa*</label>

                  <div class="col-sm-3">
                    <select class="form-control" style="width: 100%;" name="pilih_siswa" onChange="pilih_siswa()" required> 
                      <option selected disabled>---Pilih Siswa---</option>
                      <?php foreach ($getSiswa as $u): ?>
                      <option value="<?php echo $u['nis']; ?>"><?php echo $u['nama_depan']; ?> <?php echo $u['nama_belakang']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group" id="form-verifikasi">  
                  <label for="pilih_siswa" class="col-sm-2 control-label">Masukkan Password*</label>  

                  <div class="col-sm-3">
                    <input type="password" class="form-control" placeholder="Masukkan Password" name="verifikasi" required> 
                  </div>
                </div>                 
              </div>

              <div class="box-footer">                
                <button type="submit" class="btn btn-primary pull-right" name="verifikasi">Verifikasi</button>
                <!-- <button type="button" class="btn btn-danger pull-right" name="back" onClick="goBack()" style="margin-right: 2px;">Kembali</button> -->
              </div>
            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  <footer class="main-footer">
        <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.8
        </div>
        <strong>Copyright &copy; 2019 <a href="#">SmartSMK</a>.</strong> All rights
        reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>/assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>/assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/assets/dist/js/demo.js"></script>
<!-- page script -->
<script>

// document.getElementById("form-verifikasi").style.display="none";

// function pilih_siswa() {
//   document.getElementById("form-verifikasi").style.display="block";
// }
  
</script>
  


</body>
</html>