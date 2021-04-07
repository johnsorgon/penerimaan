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
            <a href="ujian.php" class="nav-link active">
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
        <div class="row">
          <div class="col-md-8">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ujian Yang Dapat Anda Ikuti</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
                $cek_data = mysqli_query($sambung, "SELECT ujian.id_ujian , loker.jabatan, soal.file_soal,
                ujian.file_jawaban FROM ujian 
                INNER JOIN loker ON ujian.id_loker = loker.id_loker INNER JOIN soal ON 
                ujian.id_loker = soal.id_loker INNER JOIN pelamar ON pelamar.id_ujian = ujian.id_ujian
                WHERE pelamar.id_akun='".$_SESSION['id_akun']."' ");
                ?>
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>ID Ujian</th>
                      <th>Lowongan</th>
                      <th>Soal</th>
                      <th>Jawaban</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    while($data = mysqli_fetch_array($cek_data))
                    {
                    ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $data['id_ujian'];?></td>
                      <td><?php echo $data['jabatan'];?></td>
                      <td>
                      <?php 
                            if($data['file_soal'] == NULL)
                            {
                                echo "<a>"."Soal Belum Diupload"."</a>";
                            }
                            else
                            {?>
                                <a href="files/<?php echo $data['file_soal'];?>">Lihat Soal</a>
                            <?php }
                        ?>
                      </td>
                      <td>
                      <?php
                          if ($data['file_jawaban'] == NULL) {
                          echo "<a class=badge style=background:red;color:white>"."Belum Upload Jawaban"."</a>";
                        }
                        else{
                          ?>
                          <a href="files/<?php echo $data['file_jawaban'];?>">Lihat Jawaban</a>
                        <?php
                        }
                        ?>
                      </td>
                      <td>
                      <?php
                        if ($data['file_jawaban'] == NULL) {
                        ?>
                        <a class="badge" style="background:blue;color:white" href="ujian.php?req=upload&id_ujian=<?php echo $data['id_ujian'];?>">
                        UPLOAD
                        </a>
                        <?php } 
                        else{
                        ?>
                        <a class="badge" style="background:green;color:white" 
                        href="ujian.php?req=update&id_ujian=<?php echo $data['id_ujian'];?>&file=<?php echo $data['file_jawaban'];?>">
                        UPDATE
                        </a>
                        <?php } ?>
                      </td>
                    </tr>
                    <?php $no++;} ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
              </div>
            </div>
            <!-- /.card -->
          </div>
          <?php
          if($_GET['req']=='upload')
          {?>
            <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Upload File Jawaban</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" action="ujian_upload.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>ID Ujian</label>
                    <input type="text" class="form-control" name="id_ujian" value="<?php echo $_GET['id_ujian'];?>" readonly>
                  </div>
                  <div class="form-group">
                    <label >File Jawaban (.pdf/.docx)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="btn-primary" name="jawaban" required>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="ujian.php" class="btn btn-danger">Back</a>
                </div>
              </form>
            </div>
          <?php
          }
          else if($_GET['req']=='update')
          {
          ?>
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Update File Jawaban</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" action="ujian_update.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>ID Ujian</label>
                    <input type="text" class="form-control" name="id_ujian" value="<?php echo $_GET['id_ujian'];?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>File Jawaban Lama</label>
                    <input type="text" class="form-control" name="current_file" value="<?php echo $_GET['file'];?>" readonly>
                  </div>
                  <div class="form-group">
                    <label >File Jawaban Baru (.pdf/.docx)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="btn-success" name="jawaban" required>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <a href="ujian.php" class="btn btn-danger">Back</a>
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