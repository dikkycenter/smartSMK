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
                    <a class="btn"  id=btn-confirm>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal_confirm">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Konfirmasi Hapus Data</h4>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus data ini ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="modal-btn-yes" data-dismiss="modal">Iya</button>
        <button type="button" class="btn btn-default" id="modal-btn-no" >Tidak</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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

  //fungsi konfirmasi hapus
  var modalConfirm = function(callback){
  
  $("#btn-confirm").on("click", function(){
    $("#modal_confirm").modal('show');
  });

  $("#modal-btn-yes").on("click", function(){
    callback(true);
    $("#mi-modal").modal('hide');
  });
  
  $("#modal-btn-no").on("click", function(){
    callback(false);
    $("#mi-modal").modal('hide');
  });
};

modalConfirm(function(confirm){
  if(confirm){
    //Acciones si el usuario confirma
    window.location = "<?php echo site_url('pengajar/deletePengajar/'.$u->nip_pengajar); ?>";
  }else{
    //Acciones si el usuario no confirma
    $("#mi-modal").modal('hide');
  }
});
</script>

</body>
</html>