  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Event
        <small>List Data Event</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Event</a></li>
        <li class="active">List Data Event</li>
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
              <h3 class="box-title">Data Event</h3>
              <a href="<?php echo site_url('jadwal/createEvent');?>">
                <button type="submit" class="btn btn-success pull-right" ><i class="fa fa-plus"></i> Tambah Event</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Tanggal</th>
                  <th>ID Jadwal</th>
                  <th>Nama Event</th>
                  <th>Interval</th>
                  <th>Mulai</th>
                  <th>Berakhir</th>
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
                    <a class="btn" href="<?php echo site_url('jadwal/createEvent/'.$u->id_jadwal); ?>"> 
                      <i class="fa fa-calendar-plus-o"></i> Buat Event
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