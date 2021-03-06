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
              <h3 class="box-title">Data Pengajar</h3>
                <div class ="text-right">
                  <div class = btn-group>
                    <a href="<?php echo site_url('pengajar/tambahPengajar');?>">
                      <button type="submit" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> Tambah Data</button>
                    </a>
                  </div>
                  <div class = btn-group>
                    <a href="<?php echo site_url('pengajar/export');?>">
                      <button class="btn btn-primary pull-right" ><i class="fa fa-download"></i> Unduh</button>
                    </a>
                  </div>
                </div>
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
                    <a class="btn" href="<?php echo site_url('pengajar/updatePengajar/'.$u->nip_pengajar); ?>">
                      <i class="fa fa-edit"></i> Edit
                    </a>
                    <a class="btn" href="<?php echo site_url('pengajar/deletePengajar/'.$u->nip_pengajar); ?>"> 
                      <i class="fa fa-remove"></i> Hapus
                    </a>
                  </td>
                </tr>

<!--Modal-->
<div class="modal fade" tabindex="" role="dialog" id="delete">
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
      <a href="<?php echo site_url('pengajar/deletePengajar/'.$u->nip_pengajar); ?>">  
      <button type="button" class="btn btn-primary" id="modal-btn-yes">
        Iya</button></a>
        <button type="button" class="btn btn-default" id="modal-btn-no" data-dismiss="modal">Tidak</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

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

  $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this record ?'))
        {
            $.ajax({
               url: '/item-list/'+id,
               type: 'DELETE',
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Record removed successfully");  
               }
            });
        }
    });
</script>

</body>
</html>