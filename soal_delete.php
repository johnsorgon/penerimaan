<?php
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="hrd"){
                header("location:login.html");
            }

$id_loker = $_GET['id_loker'];
$get_current = mysqli_query($sambung, "SELECT file_soal FROM soal WHERE id_loker='$id_loker' ");
$data = mysqli_fetch_array($get_current);
$current_file = $data['file_soal'];
$path = "files/$current_file";
unlink($path);
$query = mysqli_query($sambung, "DELETE FROM soal WHERE id_loker='$id_loker' ");
if($query){
    echo "<script>alert('Soal berhasil dihapus');window.location='ujian_hrd.php'</script>";
}
else{
    echo "<script>alert('Soal gagal dihapus');history.go(-1)</script>";
}

?>