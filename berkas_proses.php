<?php 
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="pelamar"){
                header("location: login.html");
            }
    if (isset($_POST['submit'])) {
        $id_berkas = $_POST['id_berkas'];
        $cek_berkas = mysqli_query($sambung,"SELECT * FROM berkas WHERE id_berkas='$id_berkas' ");
        if(mysqli_num_rows($cek_berkas)>0)
        {
            echo "<script>alert('Anda sudah pernah submit berkas untuk lowongan ini');history.go(-1) </script>";
        }
        else
        {
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $ttl = $_POST['ttl'];
        $agama = $_POST['agama'];
        $kelamin = $_POST['kelamin'];
        $alamat = $_POST['alamat'];
        $hp = $_POST['hp'];
        $email = $_POST['email'];
        $note = $_POST['note'];
        for($i=0; $i <6; $i++)
        {
        $lokasi_file[$i] = $_FILES['fupload'.$i.'']['tmp_name'];
        $nama_file[$i]   = $_FILES['fupload'.$i.'']['name'];
        // Tentukan folder untuk menyimpan file
        $folder = "files/$nama_file[$i]";
        move_uploaded_file($lokasi_file[$i],"$folder");
        }

        $query = mysqli_query($sambung, "INSERT INTO berkas SET id_berkas='$id_berkas' , nama_depan='$nama_depan', nama_belakang='$nama_belakang', tempat_tl='$ttl', agama='$agama', jenis_kelamin='$kelamin', alamat='$alamat', nomor_hp='$hp', email='$email', file_foto='$nama_file[0]', file_ijasah='$nama_file[1]', file_ktp='$nama_file[2]', file_kk='$nama_file[3]',  file_skck='$nama_file[4]', comment_skck='$note', file_inovasi='$nama_file[5]', submited='1', confirmed='0' ");
        if (!$query) {
            # code...
            
            echo "<script>alert('Berkas gagal disubmit');history.go(-1) </script>";

        }
        else
        {
            echo "<script>alert('Berkas berhasil disubmit');window.location='berkas.php'</script>";
        }
        }
        # code...   
    }
    
?>