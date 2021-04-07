<?php 
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="hrd"){
                header("location: login.html");
            }
    
        $id_berkas = $_GET['id_berkas'];

        $cancel = mysqli_query($sambung, "UPDATE berkas SET confirmed='0' WHERE id_berkas='$id_berkas'");
        if (!$cancel) {
            # code...
            echo "<script>alert('Gagal Cancel');history.go(-1) </script>";

        }
        else
        {
            $del_ujian= mysqli_query($sambung, "DELETE FROM ujian WHERE id_berkas='$id_berkas' ");
            echo "<script>alert('Berhasil Cancel');window.location= 'berkas_hrd.php'</script>";
        }
        # code...   
    
?>