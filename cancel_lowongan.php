<?php 
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="pelamar"){
                header("location: login.html");
            }
    
        $id_akun = $_GET['id_akun'];
        $id_loker = $_GET['id_loker'];

        $cancel = mysqli_query($sambung, "DELETE FROM pelamar WHERE id_akun='$id_akun' AND id_loker='$id_loker'  ");
        if (!$cancel) {
            # code...
            echo "<script>alert('Gagal Cancel');history.go(-1) </script>";

        }
        else
        {
            echo "<script>alert('Berhasil Cancel');window.location= 'index_pelamar.php'</script>";
        }
        # code...   
    
?>