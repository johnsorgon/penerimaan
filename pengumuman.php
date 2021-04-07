<?php 
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="pelamar"){
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
        <img src="dist/img/pelamar.png" class="img-circle">
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
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Lowongan Pekerjaan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="index_pelamar.php" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Lowongan Tersedia</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="moreinfo_lowongan.php" class="nav-link">
                  <i class="far nav-icon"></i>
                  <p>Lowongan Diapply</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="berkas.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Berkas
                <i class=""></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="ujian.php" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Ujian
                <i class=""></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="pengumuman.php" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Pengumuman
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
            <h1 class="m-0 text-dark">Pengumuman Hasil Ujian</h1>
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
        if(isset($_POST['submit']))
        {
          $id_ujian = $_POST['id_ujian'];
          $cek_lulus = mysqli_query($sambung, "SELECT checked,status_ujian FROM ujian WHERE id_ujian='$id_ujian'");
          $lulus = mysqli_fetch_array($cek_lulus);
          if($lulus['checked' == '1'])
          {
            if($lulus['status_ujian'] == 'lolos')
            {
        ?>
        <div class="row">
        <div class="col-md-12">
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Selamat!</h5>
            Selamat <?php echo $_SESSION['username'];?>. Ujian anda dengan ID UJIAN : <?php echo $id_ujian;?>
            telah dinyatakan <strong>LOLOS SELEKSI</strong>. Untuk informasi selanjutnya anda akan
            dihubungi melalui kontak yang tertera pada berkas anda. Mohon pastikan semua kontak yang
            anda tuliskan dalam keadaan aktif dan dapat dihubungi. Terima kasih :)
        </div>
          </div>
          </div>
          <?php 
            }
            else if($lulus['status_ujian'] == 'tidak')
            {
          ?>
            <div class="row">
            <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Maaf :(</h5>
            Mohon maaf <?php echo $_SESSION['username'];?>. Ujian anda dengan ID UJIAN : <?php echo $id_ujian;?>
            telah dinyatakan <strong>TIDAK LOLOS SELEKSI</strong>. Terima kasih telah bekerja keras selama
            mengikuti proses seleksi di perusahaan kami. Tetap semangat dan pantang menyerah :)
            </div>
            </div>
            </div>
            <?php 
            }
            else
            {
            ?>
            <div class="row">
            <div class="col-md-12">
            <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i> Info</h5>
            Mohon maaf <?php echo $_SESSION['username'];?>. Ujian anda dengan ID UJIAN : <?php echo $id_ujian;?>
            <strong>SEDANG DIPERIKSA</strong> oleh HRD. Mohon menunggu hingga HRD selesai memeriksa ujian anda.
            </div>
            </div>
            </div>
            <?php
            }
            ?>
          <?php
          }
          else
          {
          ?>
            <div class="row">
            <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-exclamation-triangle"></i> Pemberitahuan</h5>
            Mohon maaf <?php echo $_SESSION['username'];?>. Ujian anda dengan ID UJIAN : <?php echo $id_ujian;?>
            masih <strong>BELUM DIPERIKSA</strong> oleh HRD. Mohon menunggu hingga jawaban diperiksa oleh HRD.
            </div>
            </div>
            </div>
          <?php 
          }
          ?>
        <?php 
        }?>
        <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Cek Hasil Ujian Anda</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="pengumuman.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>ID Ujian</label>
                    <input type="text" class="form-control" name="id_ujian" placeholder="Masukkan ID Ujian anda" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success" name="submit">Submit</button>
                  <button type="reset" class="btn btn-danger">Clear</a>
                </div>
              </form>
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