  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Presensi
        <small>Jadwal Presensi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Presensi</a></li>
        <li class="active">Jadwal Presensi</li>
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Presensi</h3>              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>ID Jadwal</th>
                  <th>Mata Pelajaran</th>
                  <th>Kelas</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($jadwal as $u): ?>
                <tr>    
                  <td style="text-transform: uppercase;"><?php echo $u->tanggal; ?></td>           
                  <td style="text-transform: uppercase;"><?php echo $u->id_jadwal; ?></td>
                  <td style="text-transform: capitalize;"><?php echo $u->mapel; ?></td>
                  <td style="text-transform: uppercase;"><?php echo $u->id_kelas; ?></td>
                  <td>
                  <?php //foreach ($cek_presensi as $cek): ?>
                    <a class="btn" href="<?php echo site_url('presensi/createPresensi/'.$u->id); ?>">
                      <i class="fa fa-plus"></i> Tambah
                    </a>

                    <!-- <a class="btn" style="cursor: not-allowed; opacity: 0.5; color: currentColor;">
                      <i class="fa fa-plus"></i> Tambah
                    </a> -->
                  <?php //endforeach; ?>
                    <!-- <a class="btn" href="<?php //echo site_url('presensi/formVerifikasi/'.$u->id); ?>">
                      <i class="fa fa-check-square-o"></i> Verifikasi
                    </a> -->
                    <!-- <a class="btn" href="<?php //echo site_url('presensi/updatePresensi/'.$u->id_jadwal); ?>">
                      <i class="fa fa-edit"></i> Update
                    </a> -->
                  </td>
                </tr>
                <!-- <input type="text" name="id_jdwal" value="<?php //echo $u->id; ?>"> -->
                <?php  endforeach; ?>
                </tbody>
              </table>
            </div>
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
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  }); 
  
</script>

</body>
</html>