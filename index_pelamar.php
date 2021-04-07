<?php 
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="pelamar"){
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
            <a href="pengumuman.php" class="nav-link">
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
            <h1 class="m-0 text-dark">Lowongan Pekerjaan</h1>
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
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php 
                $lowongan = mysqli_query($sambung, "SELECT * FROM loker ORDER BY created_at_date DESC");
                $jumlah_lowongan = mysqli_num_rows($lowongan);
                ?>
                <h3><?php echo $jumlah_lowongan;?></h3>

                <p>Lowongan Tersedia</p>
              </div>
              <div class="icon">
                <i class="fas fa-briefcase"></i>
              </div>
              <a class="small-box-footer"><i class="fas"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php 
                $apply = mysqli_query($sambung, "SELECT * FROM pelamar WHERE id_akun='".$_SESSION['id_akun']."' ");
                $jumlah_apply = mysqli_num_rows($apply);
                ?>
                <h3><?php echo $jumlah_apply;?></h3>

                <p>Lowongan Diapply</p>
              </div>
              <div class="icon">
                <i class="fas fa-folder-plus"></i>
              </div>
              <a class="small-box-footer"><i class="fas"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php 
                $submit = mysqli_query($sambung, "SELECT * FROM pelamar INNER JOIN berkas ON pelamar.id_berkas=berkas.id_berkas WHERE pelamar.id_akun='".$_SESSION['id_akun']."' AND berkas.submited='1' ");
                $jumlah_submit = mysqli_num_rows($submit);
                ?>
                <h3><?php echo $jumlah_submit;?></h3>

                <p>Berkas Disubmit</p>
              </div>
              <div class="icon">
                <i class="fas fa-tags"></i>
              </div>
              <a class="small-box-footer"><i class="fas"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php 
                $verify = mysqli_query($sambung, "SELECT * FROM pelamar INNER JOIN berkas ON pelamar.id_berkas=berkas.id_berkas WHERE pelamar.id_akun='".$_SESSION['id_akun']."' AND berkas.confirmed='1' ");
                $jumlah_verify = mysqli_num_rows($verify);
                ?>
                <h3><?php echo $jumlah_verify;?></h3>

                <p>Berkas Terverifikasi</p>
              </div>
              <div class="icon">
                <i class="fas fa-clipboard-check"></i>
              </div>
              <a class="small-box-footer"><i class="fas"></i></a>
            </div>
          </div>
        </div>
        <?php
        while($data = mysqli_fetch_array($lowongan))
        {
        ?>
        <div class="row">
        <div class="col-md-12">
            <!-- Box Comment -->
            <div class="card card-widget">
              <div class="card-header">
                <div class="user-block">
                  <img class="img-circle" src="dist/img/user1-128x128.jpg" alt="User Image">
                  <span class="username"><a href=""><?php echo $data['jabatan'];?></a></span>
                  <span class="description">Shared publicly - <?php echo $data['created_at_date'];?></span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
                <p>Keahlian yang dibutuhkan : <?php echo $data['keahlian'];?></p>
                <p>Pengalaman Bekerja : <?php echo $data['pengalaman'];?></p>
                <p>Kualifikasi : <?php echo $data['kualifikasi'];?></p>
                <p>Divisi yang akan ditempati : <?php echo $data['divisi'];?></p>
                <p>Jabatan yang akan ditempati : <?php echo $data['jabatan'];?></p>

                <p>Jika anda memenuhi persyaratan diatas , silahkan untuk mengklik tombol "Apply"
                     untuk selanjutnya melengkapi berkas yang dibutuhkan. *Catatan : dimohon untuk melampirkan file Ide Inovasi dengan Tema : "
                     <?php echo $data['tema'];?> ".   File dalam format pdf
                </p>
              </div>
              <!-- /.card-body -->
            <!-- /.card-footer -->
            <?php 
                $cek_button = mysqli_query($sambung, "SELECT * FROM pelamar WHERE id_akun='".$_SESSION['id_akun']."' AND id_loker='".$data['id_loker']."' ");
                $hasil = mysqli_num_rows($cek_button);
            ?>
            <div class="card-footer">

                <?php 
                    if($hasil>0)
                    {
                        echo "<a href='cancel_lowongan.php?id_akun=".$_SESSION['id_akun']."&id_loker=".$data['id_loker']."' class='btn btn-danger'>"."CANCEL"."</a>";
                    }
                    else
                    {
                        echo "<a href='apply_lowongan.php?id_akun=".$_SESSION['id_akun']."&id_loker=".$data['id_loker']."' class='btn btn-primary'>"."APPLY"."</a>";
                    }
                ?>
              </div>
              
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <?php } ?>
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
