<?php
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="pelamar"){
                header("location: login.html");
            }
            error_reporting(0);
$id_berkas = $_GET['id_berkas'];

$hapus_data= mysqli_query($sambung, "SELECT file_foto, file_ktp, file_kk, file_skck, file_ijasah, file_inovasi
    FROM berkas WHERE id_berkas='$id_berkas'");
while($data=mysqli_fetch_array($hapus_data))
{
    unlink("files/$data[file_foto]");
    unlink("files/$data[file_ktp]");
    unlink("files/$data[file_kk]");
    unlink("files/$data[file_skck]");
    unlink("files/$data[file_ijasah]");
    unlink("files/$data[file_inovasi]");
}

//echo "<script>alert('File berhasil diupdate');window.location='berkas_detail.php?id_berkas=$id_berkas'</script>";
$hapus = mysqli_query($sambung, "DELETE FROM berkas WHERE id_berkas='$id_berkas'");

if (!$hapus) {
    echo "<script>alert('Gagal menghapus berkas, periksa kembali :)');history.go(-1) </script>";
}
else
{
    echo "<script>alert('Data berhasil dihapus');window.location='berkas.php'</script>";
}
?>