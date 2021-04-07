<?php
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="hrd"){
                header("location: login.html");
            }
            error_reporting(0);
// Baca lokasi file sementar dan nama file dari form (fupload)
if (isset($_POST['submit']))
{
$id_loker= $_POST['id_loker'];
$get_current = mysqli_query($sambung, "SELECT file_soal FROM soal WHERE id_loker='$id_loker' ");
$data = mysqli_fetch_array($get_current);
$current_file = $data['file_soal'];
$path = "files/$current_file";

unlink($path);
$lokasi_file = $_FILES['file']['tmp_name'];
$nama_file   = $_FILES['file']['name'];
// Tentukan folder untuk menyimpan file
$folder = "files/$nama_file";
move_uploaded_file($lokasi_file,"$folder");
$query = mysqli_query($sambung, "UPDATE soal SET file_soal='$nama_file' WHERE id_loker='$id_loker' ");
if($query){
    echo "<script>alert('Soal berhasil diupdate');window.location='ujian_hrd.php'</script>";
}
else{
    echo "<script>alert('Soal gagal diupdate, silahkan upload kembali.');history.go(-1)</script>";
}
}
?>