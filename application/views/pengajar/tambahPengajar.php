  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pengajar
        <small>Tambah Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pengajar</a></li>
        <li class="active">Tambah Pengajar</li>
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
              <h3 class="box-title">Form Tambah Pengajar</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo site_url('pengajar/tambah_aksi'); ?> post="method">
              <div class="box-body">
                <div class="form-group">
                  <label for="NIP" class="col-sm-2 control-label">NIP</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nip" placeholder="Masukkan NIP" name="nip">
                  </div>
                </div>
                <div class="form-group">
                  <label for="NamaDepan" class="col-sm-2 control-label">Nama Depan</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="namadepan" placeholder="Masukkan Nama Depan" name="nama_depan">
                  </div>
                </div>
                <div class="form-group">
                  <label for="NamaBelakang" class="col-sm-2 control-label">Nama Belakang</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="namabelakang" placeholder="Masukkan Nama Belakang" name="nama_belakang">
                  </div>
                </div>
                <div class="form-group">
                  <label for="TempatLahir" class="col-sm-2 control-label">Tempat Lahir</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="tempatlahir" placeholder="Masukkan Tempat Lahir" name="tempat_lahir">
                  </div>
                </div>
                <div class="form-group">
                  <label for="tanggalLahir" class="col-sm-2 control-label">Tanggal Lahir</label>

                  <div class="col-sm-10">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_lahir">
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="Alamat" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" rows="3" placeholder="Masukkan Alamat" name="alamat"></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="agama" class="col-sm-2 control-label">Agama</label>

                  <div class="col-sm-10">
                    <select class="form-control" style="width: 100%;" name="agama">
                      <option value="Islam">Islam</option>
                      <option value="Kristen Khatolik">Kristen Khatolik</option>
                      <option value="Kristen Protestan">Kristen Protestan</option>
                      <option value="Budha">Budha</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Konghucu">Konghucu</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="gelar" class="col-sm-2 control-label">Gelar</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="gelar" placeholder="Masukkan Gelar" name="gelar">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputFoto" class="col-sm-2 control-label">Input Foto</label>
                  <div class="col-sm-10">
                    <input type="file" id="exampleInputFile" name="foto_pengajar">
                  </div>
                </div>

                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="Masukkan Email" name="email">
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                  </div>
                </div>
              </div>  
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" name="simpan">Simpan</button>
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

</script>

</body>
</html>