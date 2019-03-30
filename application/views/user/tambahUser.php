  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kelola User
        <small>Tambah User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Kelola User</a></li>
        <li class="active">Tambah User</li>
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
              <h3 class="box-title">Form Tambah User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" method="post" action="<?php echo site_url('user/tambah_aksi');?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="username" class="col-sm-2 control-label">Username</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username">
                  </div>
                </div>
                                
                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                </div>

                <div class="form-group">
                  <label for="kategori_user" class="col-sm-2 control-label">kategori User</label>

                  <div class="col-sm-10">
                    <select class="form-control" style="width: 100%;" name="kategori_user">
                      <option value="none" selected disabled>-----Pilih Kategori-----</option>
                      <?php foreach ($kategori as $u):?>
                      <option value="<?php echo $u->id_kategori ?>"><?php echo $u->user_kategori ?></option>
                      <!-- <option value="2">Wali Kelas</option>
                      <option value="3">Pengajar</option>
                      <option value="4">Siswa</option> -->
                      <?php endforeach ;?>
                    </select>
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
  <div class="control-sidebar-bg"></div>

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

</script>

