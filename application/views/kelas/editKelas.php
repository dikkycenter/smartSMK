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
        <li class="active">Ubah Data </li>
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
              <h3 class="box-title">Form Ubah Data</h3>
            </div>
            <!-- /.box-header -->
            <?php foreach($detail as $data):?>
            <!-- form start -->
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo site_url('kelas/update_aksi/'.$data['id_kelas']); ?>">
              <div class="box-body">

                <div class="form-group">
                  <label for="id_kelas" class="col-sm-2 control-label">Kode Kelas*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: uppercase;" id="id_kelas" placeholder="" name="id_kelas" value="<?php echo $data['id_kelas']; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama_kelas" class="col-sm-2 control-label">Nama Kelas*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: uppercase;" id="nama_kelas" placeholder="" name="nama_kelas"  value="<?php echo $data['nama_kelas']; ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama_jurusan" class="col-sm-2 control-label">Jurusan*</label>

                  <div class="col-sm-10">
                    <select class="form-control" style="width: 100%;" name="nama_jurusan" required> 
                      <option <?php echo ($data['nama_jurusan']=='Teknik Pengelasan Kapal')?'selected="selected"':''; ?>>Teknik Pengelasan Kapal</option>
                      <option <?php echo ($data['nama_jurusan']=='Teknik Kelistrikan Kapal')?'selected="selected"':''; ?>>Teknik Kelistrikan Kapal</option>
                      <option <?php echo ($data['nama_jurusan']=='Teknik G.Rancang Bangun Kapal')?'selected="selected"':''; ?>>Teknik G.Rancang Bangun Kapal</option>
                      <option <?php echo ($data['nama_jurusan']=='Teknik Instalasi Pemesinan Kapal')?'selected="selected"':''; ?>>Teknik Instalasi Pemesinan Kapal</option>
                      <option <?php echo ($data['nama_jurusan']=='Multimedia')?'selected="selected"':''; ?>>Multimedia</option>
                      <option <?php echo ($data['nama_jurusan']=='Teknik Pemesinan')?'selected="selected"':''; ?>>Teknik Pemesinan</option>
                      <option <?php echo ($data['nama_jurusan']=='Program Studi Teknik Ketenagalistrikan')?'selected="selected"':''; ?>>Program Studi Teknik Ketenagalistrikan</option>
                      <option <?php echo ($data['nama_jurusan']=='Teknik Inst.Pemanfaatan Tenaga Listrik')?'selected="selected"':''; ?>>Teknik Inst.Pemanfaatan Tenaga Listrik</option>
                      <option <?php echo ($data['nama_jurusan']=='Produksi Grafika')?'selected="selected"':''; ?>>Produksi Grafika</option>
                      <option <?php echo ($data['nama_jurusan']=='Teknik Elektronika Industri')?'selected="selected"':''; ?>>Teknik Elektronika Industri</option>
                    </select>
                  </div>
                </div>

              <div class="form-group">
                  <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: capitalize;" id="keterangan" placeholder="" name="keterangan"  value="<?php echo $data['keterangan']; ?>">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
                <?php endforeach; ?>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" name="update">Update</button>
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