<?php 
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="admin"){
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
          <img src="dist/img/admin.png" class="img-circle">
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
            <a href="index_admin.php" class="nav-link active">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
                <i class="right fas "></i>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="user_manage.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User Manage
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
            <h1 class="m-0 text-dark">Dashboard</h1>
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
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php 
                $pelamar = mysqli_query($sambung, "SELECT * FROM akses WHERE level='pelamar'");
                $jumlah_pelamar = mysqli_num_rows($pelamar);
                ?>
                <h3><?php echo $jumlah_pelamar;?></h3>

                <p>Jumlah Akun Pelamar</p>
              </div>
              <div class="icon">
                <i class="fas fa-briefcase"></i>
              </div>
              <a class="small-box-footer"><i class="fas"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php 
                $konfirm = mysqli_query($sambung, "SELECT * FROM akses WHERE level='pelamar' AND status='1' ");
                $jumlah_konfirm = mysqli_num_rows($konfirm);
                ?>
                <h3><?php echo $jumlah_konfirm;?></h3>

                <p>Pelamar Dikonfirmasi</p>
              </div>
              <div class="icon">
                <i class="fas fa-folder-plus"></i>
              </div>
              <a class="small-box-footer"><i class="fas"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php 
                $not_konfirm = mysqli_query($sambung, "SELECT * FROM akses WHERE level='pelamar' AND status='0' ");
                $jumlah_not_konfirm = mysqli_num_rows($not_konfirm);
                ?>
                <h3><?php echo $jumlah_not_konfirm;?></h3>

                <p>Pelamar Belum Dikonfirmasi</p>
              </div>
              <div class="icon">
                <i class="fas fa-tags"></i>
              </div>
              <a class="small-box-footer"><i class="fas"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
        <div class="col-md-12">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Akun Pelamar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="mydata" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Confirmed At</th>
                    <th>Status</th>
                    <th>Konfirmasi Akun</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    while($data = mysqli_fetch_array($pelamar))
                    {
                    ?>
                  <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $data['nama'];?></td>
                    <td><?php echo $data['jenis_kelamin'];?></td>
                    <td><?php echo $data['email'];?></td>
                    <td><?php echo $data['created_at_date'];?></td>
                    <td><?php echo $data['confirmed_at_date'];?></td>
                    <td>
                      <?php
                          if ($data['status'] == '0') {
                          echo "<a class=badge style=background:red;color:white>"."Belum Diverifikasi"."</a>";
                        }
                        else{
                            echo "<a class=badge style=background:green;color:white>"."Sudah Diverifikasi"."</a>";
                        }
                        ?>
                    </td>
                    <td>
                    <?php
                        if ($data['status'] == '0') {
                        ?>
                        <a class="btn" style="background:green;color:white" href="confirm_pelamar.php?id_akun=<?php echo $data['id_akun'];?>">
                        CONFIRM
                        </a>
                        <?php } 
                        else{
                        ?>
                        <a class="btn" style="background:yellow;color:black" href="cancel_pelamar.php?id_akun=<?php echo $data['id_akun'];?>">
                        CANCEL
                        </a>
                        <?php } ?>
                    </td>
                    <td><a href="delete_pelamar.php?id_akun=<?php echo $data['id_akun'];?>" class="btn" style="background:red;color:white">DELETE</a></td>
                  </tr>
                  <?php $no++;} ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
