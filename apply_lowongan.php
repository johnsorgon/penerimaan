<?php 
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="pelamar"){
                header("location: login.html");
            }
    
        $akun = $_GET['id_akun'];
        $id_loker = $_GET['id_loker'];

        $cek = mysqli_query($sambung, "SELECT max(id_berkas) as kodeId FROM pelamar ");
        $data = mysqli_fetch_array($cek);
        $kodeId = $data['kodeId'];
        $urutan = (int) substr($kodeId, 3, 3);
        $urutan++;
        $huruf = 'BKS';

        $kodeId = $huruf . sprintf("%03s", $urutan);

        $cek_uji = mysqli_query($sambung, "SELECT max(id_ujian) as kodeUji FROM pelamar ");
        $data_uji = mysqli_fetch_array($cek_uji);
        $kodeUji = $data_uji['kodeUji'];
        $urutan_uji = (int) substr($kodeUji, 3, 3);
        $urutan_uji++;
        $huruf_uji = 'EXM';

        $kodeUji = $huruf_uji . sprintf("%03s", $urutan_uji);

        $add = mysqli_query($sambung, "INSERT INTO pelamar SET id=NULL, id_akun='$akun' , id_loker='$id_loker', id_berkas='$kodeId', id_ujian='$kodeUji' ");
        if (!$add) {
            # code...
            echo "<script>alert('Gagal Apply');history.go(-1) </script>";

        }
        else
        {
            echo "<script>alert('Berhasil Apply');window.location= 'index_pelamar.php'</script>";
        }
        # code...   
    
?>