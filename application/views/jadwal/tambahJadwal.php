  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Jadwal
        <small>Tambah Data</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Jadwal</a></li>
        <li class="active">Tambah Jadwal</li>
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
              <h3 class="box-title">Form Tambah Jadwal</h3>
            </div>
            <!-- /.box-header -->
            
            <!-- form start -->
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo site_url('jadwal/tambah_aksi'); ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="id_kelas" class="col-sm-2 control-label">Pilih Kelas*</label>

                  <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" id="id_kelas" name="id_kelas" required> 
                      <option selected disabled>Pilih Kelas</option>
                      <?php foreach ($kelas as $kelas): ?>
                      <option value='<?php echo $kelas->id_kelas; ?>'><?php echo $kelas->id_kelas; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="id_jadwal" class="col-sm-2 control-label">Kode Jadwal*</label>

                  <div class="col-sm-10 jadwal">
                    <input type="text" class="form-control" style="text-transform: uppercase;" name="id_jadwal" value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="id_mapel" class="col-sm-2 control-label">Mata Pelajaran*</label>

                  <div class="col-sm-10">
                    <select class="form-control select2" style="width: 100%;" data-placeholder="Pilih Mata Pelajaran" name="id_mapel" required>
                      <option selected disabled>Pilih Mata Pelajaran</option>
                      <?php foreach ($mapel as $mapel): ?>
                      <option value='<?php echo $mapel->id_mapel; ?>'><?php echo $mapel->mapel; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="id_pengajar" class="col-sm-2 control-label">Pengajar Utama*</label>

                  <div class="col-sm-10">
                    <select class="form-control select2" data-placeholder="Pilih Pengajar" style="width: 100%;" name="id_pengajar" required>
                      <option selected disabled>Pilih Pengajar Utama</option>
                      <?php foreach ($pengajar as $pengajar): ?>
                      <option value='<?php echo $pengajar->nip_pengajar; ?>'><?php echo $pengajar->nama_depan; ?> <?php echo $pengajar->nama_belakang; ?>, <?php echo $pengajar->gelar; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="tanggal" class="col-sm-2 control-label">Tanggal*</label>

                  <div class="col-sm-4">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker" name="tanggal" required>
                    </div>
                  </div>
                </div>

                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label for="start" class="col-sm-2 control-label">Mulai*</label>

                    <div class="col-sm-4">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                        <input type="text" class="form-control timepicker pull-right" name="start">
                      </div>
                    </div>  
                  </div>

                  <div class="form-group">
                    <label for="end" class="col-sm-2 control-label">Selesai*</label>

                    <div class="col-sm-4">
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                        <input type="text" class="form-control timepicker2" name="end">
                      </div>
                    </div>  
                  </div>
                </div>
                
              </div>

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
<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/select2/select2.min.css">
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/timepicker/bootstrap-timepicker.min.css">

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>/assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>/assets/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url();?>/assets/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url();?>/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url();?>/assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url();?>/assets/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url();?>/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url();?>/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url();?>/assets/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>/assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>/assets/dist/js/demo.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker Start
    $(".timepicker").timepicker({
      showInputs: false
    });
    
    //Timepicker End
    $(".timepicker2").timepicker({
      showInputs: false
    });
  });
  </script>
  <script type="text/javascript">

  $(document).ready(function(){ 
      $('#id_kelas').change(function(){
          var id=$(this).val();
          $.ajax({
              url : "<?php echo base_url();?>index.php/jadwal/get_kode",
              method : "POST",
              data : {id: id},
              async : false,
              dataType : 'json',
              success: function(data){
                  var html = '';
                  var i;
                    for(i=0; i<data.length; i++){
                        html += '<input type="text" class="form-control" style="text-transform: uppercase;" name="id_jadwal" value="'+data[i].nama_kelas+'" required>';
                    }

                  $('.jadwal').html(html);
                    
              }
          });
      });
  });

</script>

</body>
</html>