  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Siswa
        <small>Ubah Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Siswa</a></li>
        <li class="active">Ubah Data Siswa</li>
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
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo site_url('siswa/update_aksi/'.$data['nis']); ?>">
              <div class="box-body">

                <div class="form-group">
                  <label for="NIP" class="col-sm-2 control-label">NIS*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nip" placeholder="" name="nis" value="<?php echo $data['nis']; ?>" disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="NamaDepan" class="col-sm-2 control-label">Nama Depan*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: capitalize;" id="namadepan" placeholder="Masukkan Nama Depan" name="nama_depan"  value="<?php echo $data['nama_depan']; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="NamaBelakang" class="col-sm-2 control-label">Nama Belakang</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: capitalize;" id="namabelakang" placeholder="Masukkan Nama Belakang" name="nama_belakang" value="<?php echo $data['nama_belakang']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="TempatLahir" class="col-sm-2 control-label">Tempat Lahir*</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: capitalize;" id="tempatlahir" placeholder="Masukkan Tempat Lahir" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="tanggalLahir" class="col-sm-2 control-label">Tanggal Lahir*</label>

                  <div class="col-sm-10">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker" name="tanggal_lahir" value="<?php echo $data['tanggal_lahir']; ?>" required>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="nama_wali" class="col-sm-2 control-label">Nama Wali*</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" style="text-transform: capitalize;" id="nama_wali" name="nama_wali" value="<?php echo $data['nama_wali']; ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="email_wali" class="col-sm-2 control-label">Email Wali*</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email_wali" name="email_wali" value="<?php echo $data['email_wali']; ?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="agama" class="col-sm-2 control-label">Agama</label>

                  <div class="col-sm-10">
                    <select class="form-control" style="width: 100%;" name="agama">
                      <option <?php echo ($data['agama']=='Islam')?'selected="selected"':''; ?>>Islam</option>
                      <option <?php echo ($data['agama']=='Kristen Khatolik')?'selected="selected"':''; ?>>Kristen Khatolik</option>
                      <option <?php echo ($data['agama']=='Kristen Protestan')?'selected="selected"':''; ?>>Kristen Protestan</option>
                      <option <?php echo ($data['agama']=='Budha')?'selected="selected"':''; ?>>Budha</option>
                      <option <?php echo ($data['agama']=='Hindu')?'selected="selected"':''; ?>>Hindu</option>
                      <option <?php echo ($data['agama']=='Konghucu')?'selected="selected"':''; ?>>Konghucu</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="Alamat" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" style="text-transform: capitalize;" rows="3" placeholder="Masukkan Alamat" name="alamat"><?php echo $data['alamat']; ?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="kelas" class="col-sm-2 control-label">Kelas*</label>

                  <div class="col-sm-10">
                    <select class="form-control" style="width: 100%;" name="kelas" required> 
                      <?php foreach ($kelas as $u): ?>
                      <option <?php echo ($data['kelas']==$u->id_kelas)?'selected="selected"':''; ?>><?php echo $u->id_kelas; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputFoto" class="col-sm-2 control-label">Input Foto</label>
                  <div class="col-sm-10">
                    <input type="file" id="exampleInputFile" name="foto" value="<?php echo $data['foto']; ?>">
                    <input type="hidden" name="old_image" value="<?php echo $data['foto']; ?>">                    
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