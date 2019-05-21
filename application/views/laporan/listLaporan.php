<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Serverside Datatable Codeigniter Custom Filter</title>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan
        <small>Laporan Presensi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Laporan</a></li>
        <li class="active">Laporan Presensi</li>
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
              <h3 class="box-title">Laporan Presensi</h3>
                <div class ="text-right">
                  <div class = btn-group>
                    <a href="<?php echo site_url('laporan/export');?>">
                      <button class="btn btn-primary pull-right" ><i class="fa fa-download"></i> Unduh</button>
                    </a>
                  </div>
                  <div class = btn-group>
                    <!-- <a href="<?php //echo site_url('laporan/email');?>">
                      <button class="btn btn-primary pull-right" ><i class="fa fa-download"></i> Send Email</button>
                    </a> -->
                  </div>
                </div>
            </div>

            <div class="panel-body">
                <form id="form-filter" class="form-horizontal">
                    <div class="form-group">
                        <label for="kelas" class="col-sm-2 control-label">Kelas</label>
                        <div class="col-sm-4">
                          <select class="form-control select2" style="width: 100%;" id="id_kelas" name="id_kelas"> 
                            <option selected disabled>Pilih Kelas</option>
                              <?php foreach ($kelas as $kelas): ?>
                                <option value='<?php echo $kelas->id_kelas; ?>'><?php echo $kelas->id_kelas; ?></option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mapel" class="col-sm-2 control-label">Mata Pelajaran</label>
                        <div class="col-sm-4">
                        <select class="form-control select2" style="width: 100%;" id="id_mapel" name="id_mapel"> 
                            <option selected disabled>Pilih Mata Pelajaran</option>
                            <?php foreach ($mapel as $mapel): ?>
                            <option value='<?php echo $mapel->id_mapel; ?>'><?php echo $mapel->mapel; ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label"></label>
                        <div class="col-sm-4">
                            <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
                            <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
                        </div>
                    </div>
                </form>
    </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>NIS</th>
                  <th>Nama Lengkap</th>
                  <th>Kelas</th>
                  <th>Mata Pelajaran</th>
                  <th>Tanggal</th>
                  <th>Presensi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $i = 1;
                foreach ($data_presensi as $u): ?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $u->nis; ?></td>
                  <td><?php echo $u->nama_depan; ?> <?php  echo $u->nama_belakang; ?></td>
                  <td><?php echo $u->id_kelas;?></td>
                  <td><?php echo $u->mapel;?></td>
                  <td><?php echo $u->tanggal; ?></td>
                  <td><?php echo $u->presensi; ?></td>
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

