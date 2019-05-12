  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Presensi
        <small>Presensi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Presensi</a></li>
        <li class="active">Presensi</li>
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
            <!-- form start -->
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo site_url('presensi/savePresensi'); ?>">
              <div class="box-body">
                <div class="form-group">
                  <?php foreach ($mapel as $k): ?>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" placeholder="" name="id_jadwal" value="<?php echo $k['id']; ?>"> 
                  </div>
                  <?php endforeach; ?>
                </div>

                <div class="form-group">
                  <div class="col-sm-1">
                    <label for="id_mapel">Mata Pelajaran</label>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" placeholder="Mata Pelajaran" name="id_mapel" value="<?php echo $k['mapel']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-1">
                    <label for="id_mapel">Hari / Tanggal</label>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" placeholder="Mata Pelajaran" name="id_mapel" value="<?php echo $k['hari']; ?>, <?php echo date('d M Y') ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-1">
                    <label for="id_mapel">Mulai - Berakhir</label>
                  </div>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" placeholder="Mata Pelajaran" name="id_mapel" value="<?php echo $k['start']; ?> - <?php echo $k['end']; ?>" readonly>
                  </div>
                </div>

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 2px;">No.</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Hadir</th>
                    <th>Alpa</th>
                    <th>Sakit</th>
                    <th>Izin</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $i = 1;
                  $x = 0;
                  foreach ($array_siswa as $u): ?>
                  <tr ng-repeat="checkpoint in checkpoints">
                    <td style="text-transform: uppercase;"><?php echo $i; ?></td>
                    <td style="text-transform: uppercase;"><input type="text" name="nis[]" style="border: 0px;" value="<?php echo $u['nis']; ?>"></td>
                    <td style="text-transform: uppercase;"><?php echo $u['nama_depan']; ?> <?php echo $u['nama_belakang']; ?></td>
                    <td style="text-transform: uppercase;"><?php echo $u['kelas']; ?> - <?php echo $u['nama_jurusan']; ?></td>
                    <td style="text-transform: uppercase;"><input id="checkbox" type="radio" class="minimal presensi" name="presensi[<?php echo $x; ?>]" value="Hadir" checked></td>
                    <td style="text-transform: uppercase;"><input id="checkbox" type="radio" class="minimal presensi" name="presensi[<?php echo $x; ?>]" value="Alpa"></td>
                    <td style="text-transform: uppercase;"><input id="checkbox" type="radio" class="minimal presensi" name="presensi[<?php echo $x; ?>]" value="Sakit"></td>
                    <td style="text-transform: uppercase;"><input id="checkbox" type="radio" class="minimal presensi" name="presensi[<?php echo $x; ?>]" value="Izin"></td>
                  </tr>
                  <?php $i++; $x++; endforeach; ?>
                  </tbody>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right" name="simpan">Simpan</button>
                <button type="button" class="btn btn-danger pull-right" name="back" onClick="goBack()" style="margin-right: 2px;">Kembali</button>
              </div>
            </form>
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
<script type="text/javascript">

// var x = document.getElementsByClassName("presensi");

// if(getElementsByClassName("suci").disabled){
//   var inputElements = document.getElementsByClassName('suci');

//   for(var i=0; inputElements[i]; ++i){
//         if(inputElements[i].disabled){
//             checkedValue = inputElements[i].value;
//             break;
//         }
//   }
// }

// var x = document.getElementsByClassName("suci");
// var i;
// for (i=0; i<x.length; i++){
//   x[i].value = 1;
// }


function goBack() {
  window.history.back();
}

  // var checkedValue = $('.suci:disabled').val();
  // var inputElements = document.getElementsByid('suci');
  // for(var i=0; inputElements[i]; ++i){
  //       if(inputElements[i].disabled){
  //           checkedValue = inputElements[i].value;
  //           break;
  //       }
  // }

// var x = document.getElementsByClassName("presensi");
// var i;
// for (i=0; i<x.length; i++){
//     if(document.getElementById("checkbox").checked = true){
//       document.getElementById("checkbox").value = 1;
//   } else if(document.getElementById("checkbox").checked = false){
//     document.getElementById("checkbox")[i].value = 2;
//   }
// }

function myFunction() {
    document.getElementById("checkbox").value = "1";
}
  
</script>

</body>
</html>