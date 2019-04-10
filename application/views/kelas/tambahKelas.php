  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Kelas
        <small>Tambah Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kelas</a></li>
        <li class="active">Tambah Kelas</li>
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
              <h3 class="box-title">Form Tambah Kelas</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo site_url('kelas/tambah_aksi'); ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="Nama Kelas" class="col-sm-2 control-label">Kode Kelas*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: uppercase;" id="nama_kelas" placeholder="Masukkan Kode Kelas" name="nama_kelas" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama_jurusan" class="col-sm-2 control-label">Jurusan*</label>

                  <div class="col-sm-10">
                    <select class="form-control" style="width: 100%;" name="nama_jurusan" required> 
                      <option selected disabled>---Pilih Jurusan---</option>
                      <option value="Teknik Pengelasan Kapal">Teknik Pengelasan Kapal</option>
                      <option value="Teknik Kelistrikan Kapal">Teknik Kelistrikan Kapal</option>
                      <option value="Teknik G.Rancang Bangun Kapal">Teknik G.Rancang Bangun Kapal</option>
                      <option value="Teknik Instalasi Pemesinan Kapal">Teknik Instalasi Pemesinan Kapal</option>
                      <option value="Multimedia">Multimedia</option>
                      <option value="Teknik Pemesinan">Teknik Pemesinan</option>
                      <option value="Program Studi Teknik Ketenagalistrikan">Program Studi Teknik Ketenagalistrikan</option>
                      <option value="Teknik Inst.Pemanfaatan Tenaga Listrik">Teknik Inst.Pemanfaatan Tenaga Listrik</option>
                      <option value="Produksi Grafika">Produksi Grafika</option>
                      <option value="Teknik Elektronika Industri">Teknik Elektronika Industri</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="keterangan" class="col-sm-2 control-label">Keterangan*</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" style="text-transform: capitalize;" rows="3" placeholder="Masukkan Keterangan" name="keterangan" required></textarea>
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