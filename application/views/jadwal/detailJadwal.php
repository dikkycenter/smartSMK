  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Siswa
        <small><?php echo $info; ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Siswa</a></li>
        <li class="active"><?php echo $info; ?></li>
      </ol>
    </section>
  
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Data Detail Jadwal</h3>
            </div>
            <!-- /.box-header -->
            <?php foreach($detail as $data):?>
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">

                <div class="form-group">
                  <label for="NIP" class="col-sm-2 control-label">ID Jadwal</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_jadwal" placeholder="" name="id_jadwal" value="<?php echo $data['id_jadwal']; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama_wali" class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: capitalize;" id="id_kelas" name="id_kelas" value="<?php echo $data['id_kelas']; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="email_wali" class="col-sm-2 control-label">Mata Pelajaran</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_mapel" name="id_mapel" value="<?php echo $data['id_mapel']; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="NamaDepan" class="col-sm-2 control-label">Tanggal</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: capitalize;" id="tanggal" name="nama"  value="<?php echo $data['tanggal']; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="TempatLahir" class="col-sm-2 control-label">Jam Mulai</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: capitalize;" id="start" name="start" value="<?php echo $data['start']; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama_wali" class="col-sm-2 control-label">Jam Berakhir</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: capitalize;" id="end" name="end" value="<?php echo $data['end']; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama_wali" class="col-sm-2 control-label">Pengajar Utama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: capitalize;" id="id_pengajar" name="id_pengajar" value="<?php echo $data['nama_depan']; ?> <?php echo $data['nama_belakang']; ?> <?php echo $data['gelar']; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama_wali" class="col-sm-2 control-label">Pengajar Pengganti</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: capitalize;" id="id_pengajar2" name="id_pengajar2" value="<?php echo $data['nama_depan']; ?> <?php echo $data['nama_belakang']; ?> <?php echo $data['gelar']; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama_wali" class="col-sm-2 control-label">Verifikasi by</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: capitalize;" id="" name="verifikasi_by" value="<?php echo $data['verifikasi_by']; ?>" disabled>
                  </div>
                </div>

              <!-- /.box-body -->
                <?php endforeach; ?>

              <div class="box-footer">
              <button type="button" class="btn btn-primary pull-right" name="back" onClick="goBack()">Kembali</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
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
<!-- FastClick -->
<script src="<?php echo base_url();?>/assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assets/dist/js/app.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>/assets/plugins/select2/select2.full.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url();?>/assets/plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/assets/dist/js/demo.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>/assets/plugins/datepicker/bootstrap-datepicker.js"></script>

<script>
$ (function () {
  $(".select2").select2();

  //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });
});

function goBack() {
  window.history.back();
}

</script>

</body>
</html>