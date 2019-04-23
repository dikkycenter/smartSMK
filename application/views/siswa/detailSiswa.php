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
              <h3 class="box-title">Data Detail Data</h3>
            </div>
            <!-- /.box-header -->
            <?php foreach($detail as $data):?>
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">

                <div class="form-group">
                  <label for="NIP" class="col-sm-2 control-label">NIS</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nis" placeholder="" name="nis" value="<?php echo $data['nis']; ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="NamaDepan" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: capitalize;" id="nama" name="nama"  value="<?php echo $data['nama_depan']; ?> <?php echo $data['nama_belakang']; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="TempatLahir" class="col-sm-2 control-label">Tempat, Tanggal Lahir</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: capitalize;" id="tempatlahir" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>, <?php echo $data['tanggal_lahir']; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama_wali" class="col-sm-2 control-label">Nama Wali</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: capitalize;" id="nama_wali" name="nama_wali" value="<?php echo $data['nama_wali']; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="email_wali" class="col-sm-2 control-label">Email Wali</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="email_wali" name="email_wali" value="<?php echo $data['email_wali']; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama_wali" class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: capitalize;" id="agama" name="agama" value="<?php echo $data['agama']; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama_wali" class="col-sm-2 control-label">Kelas</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: capitalize;" id="kelas" name="kelas" value="<?php echo $data['kelas']; ?>" disabled>
                  </div>
                </div>

                <div class="form-group">
                  <label for="Alamat" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" style="text-transform: capitalize;" rows="3" placeholder="Masukkan Alamat" name="alamat" disabled><?php echo $data['alamat']; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputFoto" class="col-sm-2 control-label">Foto Profil</label>
                  <div class="col-sm-10">
                   <img src="<?php echo base_url();?>assets/images/siswa/<?php echo $data['foto']; ?>" width="200">
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