<?php 
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="admin"){
                header("location: login.html");
            }
    
        $id_akun = $_GET['id_akun'];

        $confirm = mysqli_query($sambung, "UPDATE akses SET status='1', confirmed_at_date=CURDATE() WHERE id_akun='$id_akun'");
        if (!$confirm) {
            # code...
            echo "<script>alert('Gagal Confirm');history.go(-1) </script>";

        }
        else
        {
            echo "<script>alert('Berhasil Confirm');window.location= 'index_admin.php'</script>";
        }
        # code...   
    
?>