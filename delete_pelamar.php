<?php 
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="admin"){
                header("location: login.html");
            }
    
        $id_akun = $_GET['id_akun'];

        $delete = mysqli_query($sambung, "DELETE FROM akses WHERE id_akun='$id_akun'");
        if (!$delete) {
            # code...
            echo "<script>alert('Gagal Menghapus');history.go(-1) </script>";

        }
        else
        {
            echo "<script>alert('Berhasil Menghapus');window.location= 'index_admin.php'</script>";
        }
        # code...   
    
?>