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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

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
            <a href="berkas.php" class="nav-link active">
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
            <h1 class="m-0 text-dark">Berkas</h1>
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
        <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Pengisian Berkas Lamaran</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" action="berkas_proses.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                  <label>Lowongan Yang Dilamar</label>
                  <select class="form-control" name="id_berkas" required>
                  <option value="">Pilih Lowongan</option>
                  <?php 
                  $get_lowongan = mysqli_query($sambung, "SELECT loker.jabatan,pelamar.id_berkas FROM loker INNER JOIN pelamar ON loker.id_loker=pelamar.id_loker WHERE pelamar.id_akun='".$_SESSION['id_akun']."' ");
                  while($d = mysqli_fetch_array($get_lowongan))
                  {
                  ?>
                  <option value="<?php echo $d['id_berkas'];?>"><?php echo $d['jabatan'];?></option>
                  <?php } ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label>Nama Depan</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Depan" name="nama_depan" required>
                  </div>
                  <div class="form-group">
                    <label>Nama Belakang</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nama Belakang" name="nama_belakang" required>
                  </div>
                  <div class="form-group">
                    <label>Tempat, Tanggal Lahir</label>
                    <input type="text" class="form-control" placeholder="*Contoh : Kediri, 12 Agustus 1975" name="ttl" required>
                  </div>
                  <div class="form-group">
                    <label>Agama</label>
                    <input type="text" class="form-control" placeholder="Masukkan Agama" name="agama" required>
                  </div>
                  <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select class="form-control" name="kelamin" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Alamat Tempat Tinggal</label>
                    <input type="text" class="form-control" placeholder="Masukkan Alamat" name="alamat" required>
                  </div>
                  <div class="form-group">
                    <label >Nomor HP</label>
                    <input type="text" class="form-control" placeholder="Masukkan Nomor HP" name="hp" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Masukkan Email" name="email" required>
                  </div>
                  <div class="form-group">
                    <label >File Foto (.jpg/.png)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input  type="file" class="btn-primary" name="fupload0" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label >File Ijasah Terakhir (.pdf)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="btn-primary" name="fupload1" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label >File KTP (.pdf/.jpg/.png)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="btn-primary" name="fupload2" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label >File Kartu Keluarga (.pdf)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="btn-primary" name="fupload3" required>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label >File SKCK (.pdf)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="btn-primary" name="fupload4">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>*Note SKCK</label>
                    <input type="text" class="form-control" placeholder="Diisi apabila belum memiliki file SKCK" name="note">
                  </div>
                  <div class="form-group">
                    <label >File Ide Inovasi (.pdf)</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="btn-primary" name="fupload5" required>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </div>
              </form>
            </div>
        </div>
        </div>

        <?php
        $berkas = mysqli_query($sambung, "SELECT loker.jabatan, pelamar.id_berkas, berkas.confirmed FROM loker INNER JOIN pelamar 
        ON loker.id_loker=pelamar.id_loker INNER JOIN berkas ON pelamar.id_berkas=berkas.id_berkas 
        WHERE pelamar.id_akun='".$_SESSION['id_akun']."' AND berkas.submited='1' ");
        ?>
        <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Berkas Yang Sudah Anda Submit</h3> 
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Lowongan</th>
                      <th>Berkas</th>
                      <th style="width: 40px">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no=1;
                  while($data = mysqli_fetch_array($berkas))
                  {
                  ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $data['jabatan'];?></td>
                      <td><a href="berkas_detail.php?id_berkas=<?php echo $data['id_berkas'];?>">Lihat Berkas</a></td>
                      <td>
                      <?php
                          if ($data['confirmed'] == '1') {
                          echo "<a class=badge style=background:green;color:white>"."Sudah Diverifikasi"."</a>";
                        }
                        else
                          echo "<a class=badge style=background:red;color:white>"."Belum Diverifikasi"."</a>";
                      ?>
                      </td>
                    </tr>
                    <?php $no++; }?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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
