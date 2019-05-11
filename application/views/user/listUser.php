  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data User
        <small>List Data User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data User</a></li>
        <li class="active">List Data User</li>
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
              <h3 class="box-title">Data User</h3>
              <a href="<?php echo site_url('User/tambahUser');?>">
                <button type="submit" class="btn btn-primary pull-right" ><i class="fa fa-plus"></i> Tambah Data</button>
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Hak Akses</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $i = 1;
                foreach ($data_user as $u): ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $u->username; ?></td>
                  <td><?php echo $u->password; ?></td>
                  <td><?php 
                        if ($u->kategori_user <=1) { 
                            echo "Admin";
                          } elseif ($u->kategori_user <=2) { 
                            echo "Wali Siswa";
                          } elseif ($u->kategori_user <=3) { 
                            echo "Pengajar";
                          } elseif ($u->kategori_user <=4) { 
                            echo "Siswa";
                          } 
                      ?>
                  </td>
                  <td><?php if($u->status >0 ){ echo "Aktif"; } else { echo "Tidak Aktif"; } ?></td>
                  <td>                    
                    <a class="btn" href="<?php echo site_url('user/updateUser/'.$u->id_user); ?>">
                      <i class="fa fa-edit"></i> Edit
                    </a>

                    <?php if($u->status >0 ){ ?>
                    <a class="btn" href="<?php echo site_url('user/takedown/'.$u->username); ?>"> 
                      <i class="fa fa-remove"></i> Non-aktifkan
                    </a>
                    <?php } else { ?>
                      <a class="btn" href="<?php echo site_url('user/takeup/'.$u->username); ?>"> 
                      <i class="fa fa-check"></i> Aktifkan
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