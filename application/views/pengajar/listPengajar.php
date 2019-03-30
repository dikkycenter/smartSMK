  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pengajar
        <small>List Data Pengajar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Pengajar</a></li>
        <li class="active">List Data Pengajar</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Pengajar</h3>
              <a href="<?php echo site_url('pengajar/tambahPengajar');?>">
                <button type="submit" class="btn btn-success pull-right" ><i class="fa fa-plus"></i> Tambah Data</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>NIP</th>
                  <th>Nama Lengkap</th>
                  <th>Tempat, Tanggal Lahir</th>
                  <th>Email</th>
                  <th>Foto</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $i = 1;
                foreach ($data_pengajar as $u): ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $u->nip_pengajar; ?></td>
                  <td><?php echo $u->nama_depan; ?> <?php  echo $u->nama_belakang; ?>, <?php  echo $u->gelar; ?></td>
                  <td><?php echo $u->tempat_lahir;?>, <?php echo $u->tanggal_lahir; ?></td>
                  <td><?php echo $u->email; ?></td>
                  <td><img src="<?php echo base_url();?>assets/images/pengajar/<?php echo $u->foto_pengajar; ?>" width="50"></td>
                  <td>
                    <a class="btn" href="<?php echo site_url('pengajar/dataDetail/'.$u->nip_pengajar); ?>">
                      <i class="fa fa-eye"></i> Lihat
                    </a>
                    <a class="btn">
                      <i class="fa fa-edit"></i> Edit
                    </a>
                    <a class="btn">
                      <i class="fa fa-remove"></i> Hapus
                    </a>
                  </td>
                </tr>
                <?php $i++; endforeach; ?>
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