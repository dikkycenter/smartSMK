  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Jadwal
        <small>List Data Jadwal</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Jadwal</a></li>
        <li class="active">List Data Jadwal</li>
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

    <?php 
      $data = $this->session->flashdata('gagal');
      if($data!="") { ?>
      <div class="alert alert-danger" role="alert"><Strong>Sukses!</Strong>
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
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Jadwal</h3>
              <a href="<?php echo site_url('jadwal/tambahJadwal');?>">
                <button type="submit" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> Tambah Data</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>ID Jadwal</th>
                  <th>Hari</th>
                  <th>Waktu (Start - End)</th>
                  <th>Mapel</th>
                  <th>Kelas</th>
                  <th>Pengajar</th>
                  <th>Input Date</th>
                  <th>Update Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $i = 1;                
                foreach ($jadwal as $u): ?>
                <tr>
                  <td style="text-transform: uppercase;"><?php echo $i; ?></td>
                  <td style="text-transform: uppercase;"><?php echo $u->id_jadwal; ?></td>
                  <td style="text-transform: uppercase;"><?php echo $u->hari; ?></td>
                  <td style="text-transform: uppercase;"><?php echo $u->start; ?> - <?php echo $u->end; ?></td>
                  <td style="text-transform: uppercase;"><?php echo $u->mapel; ?></td>
                  <td style="text-transform: uppercase;"><?php echo $u->id_kelas; ?></td>
                  <td style="text-transform: uppercase;"><?php echo $u->nama_depan; ?> <?php echo $u->nama_belakang; ?>, <?php echo $u->gelar; ?></td>                  
                  <td style="text-transform: uppercase;"><?php echo $u->input_date; ?></td>
                  <td style="text-transform: uppercase;"><?php echo $u->update_date; ?></td>
                  <td>
                    <a class="btn" href="<?php echo site_url('jadwal/dataDetail/'.$u->id_jadwal); ?>">
                      <i class="fa fa-eye"></i> Lihat
                    </a>
                    <a class="btn" href="<?php echo site_url('jadwal/updateJadwal/'.$u->id_jadwal); ?>">
                      <i class="fa fa-edit"></i> Edit
                    </a>
                    <a class="btn" href="<?php echo site_url('jadwal/deleteJadwal/'.$u->id_jadwal); ?>"> 
                      <i class="fa fa-remove"></i> Hapus
                    </a>
                    <?php if($u->event_status < 1) { ?>
                    <a class="btn" href="<?php echo site_url('jadwal/createEvent/'.$u->id_jadwal); ?>"> 
                      <i class="fa fa-calendar-plus-o"></i> Buat Event
                    </a>
                    <?php } else { ?>
                      <a class="btn" href="<?php echo site_url('jadwal/deleteEvent/'.$u->id_jadwal); ?>"> 
                      <i class="fa fa-calendar-times-o "></i> Hapus Event
                    </a>
                    <?php } ?>

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