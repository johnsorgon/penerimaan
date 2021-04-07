<?php 
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="admin"){
                header("location: login.html");
            }
    
        $id_akun = $_GET['id_akun'];

        $cancel = mysqli_query($sambung, "UPDATE akses SET status='0' WHERE id_akun='$id_akun'");
        if (!$cancel) {
            # code...
            echo "<script>alert('Gagal Cancel');history.go(-1) </script>";

        }
        else
        {
            echo "<script>alert('Berhasil Cancel');window.location= 'index_admin.php'</script>";
        }
        # code...   
    
?>