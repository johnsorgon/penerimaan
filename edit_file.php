<?php
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="pelamar"){
                header("location: login.html");
            }
            error_reporting(0);
// Baca lokasi file sementar dan nama file dari form (fupload)
$id_berkas= $_POST['id_berkas'];
$kolom = $_POST['kolom'];
$get_current = mysqli_query($sambung, "SELECT * FROM berkas WHERE id_berkas='$id_berkas' ");
$data = mysqli_fetch_array($get_current);
$current_file = $data[$kolom];
$path = "files/$current_file";
if($path=='')
{
    $lokasi_file = $_FILES['file']['tmp_name'];
    $nama_file   = $_FILES['file']['name'];
// Tentukan folder untuk menyimpan file
    $folder = "files/$nama_file";
    move_uploaded_file($lokasi_file,"$folder");
    $query = mysqli_query($sambung, "UPDATE berkas SET $kolom='$nama_file' WHERE id_berkas='$id_berkas' ");
    if($query){
    echo "<script>alert('File berhasil diupdate');window.location='berkas_detail.php?id_berkas=$id_berkas'</script>";
    }
    else{
    echo "<script>alert('Berkas lama tidak ada, silahkan upload kembali.');history.go(-1)</script>";
    }
}
else{
unlink($path);
$lokasi_file = $_FILES['file']['tmp_name'];
$nama_file   = $_FILES['file']['name'];
// Tentukan folder untuk menyimpan file
$folder = "files/$nama_file";
move_uploaded_file($lokasi_file,"$folder");
$query2 = mysqli_query($sambung, "UPDATE berkas SET $kolom='$nama_file' WHERE id_berkas='$id_berkas' ");
if($query2){
    echo "<script>alert('File berhasil diupdate');window.location='berkas_detail.php?id_berkas=$id_berkas'</script>";
}
else{
    echo "<script>alert('File gagal diupdate, silahkan upload kembali.');history.go(-1)</script>";
}
}

?>