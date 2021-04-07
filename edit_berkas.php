<?php 
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="pelamar"){
                header("location: login.html");
            }
    if (isset($_POST['submit'])) 
    {
        $id_berkas = $_POST['id_berkas'];
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $ttl = $_POST['ttl'];
        $agama = $_POST['agama'];
        $kelamin = $_POST['kelamin'];
        $alamat = $_POST['alamat'];
        $hp = $_POST['hp'];
        $email = $_POST['email'];
        $note = $_POST['note'];

        $query = mysqli_query($sambung, "UPDATE berkas SET nama_depan='$nama_depan', nama_belakang='$nama_belakang', tempat_tl='$ttl', agama='$agama', jenis_kelamin='$kelamin', alamat='$alamat', nomor_hp='$hp', email='$email', comment_skck='$note' WHERE id_berkas='$id_berkas' ");
        if (!$query) {
            # code...
            
            echo "<script>alert('Berkas gagal diupdate');history.go(-1) </script>";

        }
        else
        {
            echo "<script>alert('Berkas berhasil diupdate');window.location='berkas_detail.php?id_berkas=$id_berkas'</script>";
        }
        
        # code...   
    }
    
?>