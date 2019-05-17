  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pemberitahuan SP
        <small>Form Kirim Email</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Pemberitahuan SP</a></li>
        <li class="active">Form Kirim Email</li>
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
      <?php }; ?>

    <?php 
      $data = $this->session->flashdata('gagal');
      if($data!="") { ?>
      <div class="alert alert-danger" role="alert"><Strong>Failed!</Strong>
        <?php echo $data; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div> 
      <?php }; ?>

    <div class="alert-success"></div>
  
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Form Kirim Email</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open('CheckPresensi/sendEmail'); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email Wali Siswa</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" placeholder="Masukkan email" name="email" required>
                  </div>
                </div>                
              </div>

              <!-- /.box-body -->

              <div class="box-footer">                
                <button type="submit" class="btn btn-primary pull-right" name="kirim">kirim</button>
              </div>
            <?php echo form_close(); ?>
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