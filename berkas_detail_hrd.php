<?php 
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="hrd"){
                header("location:login.html");
            }
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
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
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
                Lowongan_Pekerjaan
                <i class="right fas "></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="berkas_hrd.php" class="nav-link active">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Berkas
                <i class=""></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="ujian_hrd.php" class="nav-link">
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
            <h1 class="m-0 text-dark">Detail Berkas</h1>
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
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-md-8">
        <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                    </thead>
                    <?php
                    $id = $_GET['id_berkas'];
                    $select_berkas= mysqli_query($sambung, "SELECT * FROM berkas WHERE id_berkas='$id' ");
                    $data= mysqli_fetch_array($select_berkas);
                    ?>
                    <tbody>
                      <tr>
                        <td><strong>Nama Depan : </strong><?php echo $data['nama_depan'];?></td>
                        <td rowspan="5" width="200px" height="auto"><img src="files/<?php echo $data['file_foto'];?>" height="250px" width="200px"></td>
                      </tr>
                      <tr>
                        <td><strong>Nama Belakang : </strong><?php echo $data['nama_belakang'];?></td>
                      </tr>
                      <tr>
                        <td><strong>Tempat, Tanggal Lahir : </strong><?php echo $data['tempat_tl'];?></td>
                      </tr>
                      <tr>
                        <td><strong>Agama : </strong><?php echo $data['agama'];?></td>
                      </tr>
                      <tr>
                        <td><strong>Jenis Kelamin : </strong><?php echo $data['jenis_kelamin'];?></td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>Alamat : </strong><?php echo $data['alamat'];?></td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>Nomor HP : </strong><?php echo $data['nomor_hp'];?></td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>Email : </strong><?php echo $data['email'];?></td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>File Foto : </strong><a href="files/<?php echo $data['file_foto'];?>">Lihat File</a></td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>File Ijasah : </strong><a href="files/<?php echo $data['file_ijasah'];?>">Lihat File</a></td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>File KTP : </strong><a href="files/<?php echo $data['file_ktp'];?>">Lihat File</a></td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>File Kartu Keluarga : </strong><a href="files/<?php echo $data['file_kk'];?>">Lihat File</a></td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>File SKCK : </strong>
                        <?php 
                            if($data['file_skck'] == NULL)
                            {
                                echo "<a>"."Belum Upload"."</a>";
                            }
                            else
                            {?>
                                <a href="files/<?php echo $data['file_skck'];?>">Lihat File</a>
                            <?php }
                        ?>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>*Note SKCK : </strong><?php echo $data['comment_skck'];?></td>
                      </tr>
                      <tr>
                        <td colspan="2"><strong>File Ide Inovasi : </strong><a href="files/<?php echo $data['file_inovasi'];?>">Lihat File</a></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
          </div>
          
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
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>