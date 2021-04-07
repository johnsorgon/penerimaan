<?php 
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="hrd"){
                header("location:login.html");
            }
            error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Penerimaan Karyawan</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="icon" type="image/png" href="dist/img/AdminLTELogo.png">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-blue navbar-light">
  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="dist/img/rsz_1pawitra-net.jpg" class="">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="dist/img/hrd.png" class="img-circle">
        </div>
        <div class="info">
          <a class="d-block"><?php echo $_SESSION['username'].' '.'('.$_SESSION['level'].')'; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="index_hrd.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Lowongan Pekerjaan
                <i class="right fas "></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="berkas_hrd.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Berkas
                <i class=""></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="ujian_hrd.php" class="nav-link active">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Ujian
                <i class=""></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="hasil_ujian.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Hasil Ujian
                <i class=""></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
                <i class=""></i>
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Ujian</h1>
          </div>
          <!-- /.col -->
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php
        $lowongan = mysqli_query($sambung, "SELECT loker.jabatan, soal.file_soal, soal.id_loker FROM loker INNER JOIN soal 
        ON loker.id_loker=soal.id_loker ");
        ?>
        <div class="row">
        <div class="col-md-12">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Manajemen Soal Ujian</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="mydata" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Lowongan</th>
                    <th>Soal</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    while($data = mysqli_fetch_array($lowongan))
                    {
                    ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $data['jabatan'];?></td>
                    <td>
                    <?php 
                            if($data['file_soal'] == NULL)
                            {
                                echo "<a>"."Belum Upload"."</a>";
                            }
                            else
                            {?>
                                <a href="files/<?php echo $data['file_soal'];?>">Lihat Soal</a>
                            <?php }
                        ?>
                    </td>
                    <td>
                        <a href="ujian_hrd.php?req=update&id_loker=<?php echo $data['id_loker'];?>" class="btn" style="background:blue;color:white">UPDATE</a>
                        <a href="soal_delete.php?id_loker=<?php echo $data['id_loker'];?>" class="btn" style="background:red;color:white">DELETE</a>
                    </td>
                  </tr>
                  <?php $no++;} ?>
                  </tbody>
                </table>
                <a href="#" class="btn" style="background:green;color:white" data-toggle="modal" data-target="#modal-id">TAMBAH DATA</a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.modal -->
      <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Soal Ujian</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" enctype="multipart/form-data" action="soal_tambah.php" method="POST">
              <div class="form-group">
                  <label>Lowongan</label>
                  <select class="form-control" name="id_loker" required>
                  <option value="">Pilih Lowongan</option>
                  <?php 
                  $get_lowongan = mysqli_query($sambung, "SELECT jabatan,id_loker FROM loker ");
                  while($d = mysqli_fetch_array($get_lowongan))
                  {
                  ?>
                  <option value="<?php echo $d['id_loker'];?>"><?php echo $d['jabatan'];?></option>
                  <?php } ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label >Browse File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="btn-primary" name="file" required>
                      </div>
                    </div>
                  </div>

                <!-- /.card-body -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
         </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

<!-- /.modal -->
<?php
          if($_GET['req']=='update')
          {
            $get_lowongan = mysqli_query($sambung, "SELECT * FROM soal WHERE id_loker='".$_GET['id_loker']."' ");
            $data_edit = mysqli_fetch_array($get_lowongan);
          ?>
            <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Soal Ujian</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" action="soal_update.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                  <label>ID Loker</label>
                  <input type="text" class="form-control" name="id_loker" value="<?php echo $data_edit['id_loker'];?>" readonly>
                  </div>
                  <div class="form-group">
                  <label>File Soal Saat Ini</label>
                  <input type="text" class="form-control" value="<?php echo $data_edit['file_soal'];?>" readonly>
                  </div>
                  <div class="form-group">
                    <label >Browse File</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="btn-primary" name="file">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Update</button>
                  <a href="ujian_hrd.php" class="btn btn-danger">Back</a>
                </div>
              </form>
            </div>
            <?php }?>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a >Pawitra Network</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#mydata").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
