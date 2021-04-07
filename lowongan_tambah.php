<?php 
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="hrd"){
                header("location: login.html");
            }
    if (isset($_POST['submit'])) {
        $jabatan = $_POST['jabatan'];
        $cek_berkas = mysqli_query($sambung,"SELECT * FROM loker WHERE jabatan='$jabatan' ");
        if(mysqli_num_rows($cek_berkas)>0)
        {
            echo "<script>alert('Anda sudah pernah menambahkan lowongan ini');history.go(-1) </script>";
        }
        else
        {
        $keahlian = $_POST['keahlian'];
        $pengalaman = $_POST['pengalaman'];
        $kualifikasi = $_POST['kualifikasi'];
        $divisi = $_POST['divisi'];
        $jabatan = $_POST['jabatan'];
        $inovasi = $_POST['inovasi'];

        $cek = mysqli_query($sambung, "SELECT max(id_loker) as kodeId FROM loker");
        $data = mysqli_fetch_array($cek);
        $kodeId = $data['kodeId'];
        $urutan = (int) substr($kodeId, 3, 3);
        $urutan++;

        $huruf = 'LK';

        $kodeId = $huruf . sprintf("%03s", $urutan);

        $query = mysqli_query($sambung, "INSERT INTO loker SET id_loker='$kodeId' , keahlian='$keahlian',
         pengalaman='$pengalaman', kualifikasi='$kualifikasi', divisi='$divisi', jabatan='$jabatan', 
         tema='$inovasi', created_at_date=CURDATE() ");
        if (!$query) {
            # code...
            
            echo "<script>alert('Lowongan gagal ditambah');history.go(-1) </script>";

        }
        else
        {
            echo "<script>alert('Lowongan berhasil ditambah');window.location='index_hrd.php'</script>";
        }
        }
        # code...   
    }
    
?>