<?php
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="hrd"){
                header("location:login.html");
            }
if(isset($_POST['submit']))
{
$id_loker = $_POST['id_loker'];
$keahlian = $_POST['keahlian'];
$pengalaman = $_POST['pengalaman'];
$kualifikasi = $_POST['kualifikasi'];
$divisi = $_POST['divisi'];
$jabatan = $_POST['jabatan'];
$inovasi = $_POST['inovasi'];

$query = mysqli_query($sambung, "UPDATE loker SET keahlian='$keahlian',
         pengalaman='$pengalaman', kualifikasi='$kualifikasi', divisi='$divisi', jabatan='$jabatan', 
         tema='$inovasi' WHERE id_loker='$id_loker' ");
if($query){
    echo "<script>alert('Lowongan berhasil diupdate');window.location='index_hrd.php'</script>";
}
else{
    echo "<script>alert('Lowongan gagal diupdate');window.location='ujian.php?req=update&id_ujian=$id_ujian'</script>";
}
}
?>