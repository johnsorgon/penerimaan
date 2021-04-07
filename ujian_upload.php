<?php
session_start();
include 'koneksi.php';
// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level'] !=="pelamar"){
    header("location:login.html");
}
// Baca lokasi file sementar dan nama file dari form (fupload)
$id_ujian= $_POST['id_ujian'];
$lokasi_file = $_FILES['jawaban']['tmp_name'];
$nama_file   = $_FILES['jawaban']['name'];
// Tentukan folder untuk menyimpan file
$folder = "files/$nama_file";
move_uploaded_file($lokasi_file,"$folder");
$query = mysqli_query($sambung, "UPDATE ujian SET file_jawaban='$nama_file', submited_at=CURDATE() WHERE id_ujian='$id_ujian' ");
if($query){
    echo "<script>alert('Jawaban berhasil disubmit');window.location='ujian.php'</script>";
}
else{
    echo "<script>alert('Berkas gagal disubmit, silahkan upload kembali.');window.location='ujian.php?req=upload&id_ujian=$id_ujian'</script>";
}
?>