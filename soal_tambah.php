<?php
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="hrd"){
                header("location: login.html");
            }
if (isset($_POST['submit'])) {
    $id_loker= $_POST['id_loker'];
    $cek_berkas = mysqli_query($sambung,"SELECT * FROM soal WHERE id_loker='$id_loker' ");
    if(mysqli_num_rows($cek_berkas)>0)
        {
             echo "<script>alert('Anda sudah pernah menambahkan soal untuk lowongan ini');history.go(-1) </script>";
        }
    else
    {
        $lokasi_file = $_FILES['file']['tmp_name'];
        $nama_file   = $_FILES['file']['name'];
        // Tentukan folder untuk menyimpan file
        $folder = "files/$nama_file";
        move_uploaded_file($lokasi_file,"$folder");
        $query = mysqli_query($sambung, "INSERT INTO soal SET id='', file_soal='$nama_file',
        id_loker='$id_loker' ");
        if($query){
            echo "<script>alert('Soal berhasil ditambah');window.location='ujian_hrd.php'</script>";
            }
        else{
            echo "<script>alert('Soal gagal ditambah, silahkan upload kembali.');history.go(-1)</script>";
        }
    }

}
?>