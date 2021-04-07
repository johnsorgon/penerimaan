<?php
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="hrd"){
                header("location: login.html");
            }
// Baca lokasi file sementar dan nama file dari form (fupload)
if (isset($_POST['submit']))
{
$id_ujian= $_POST['id_ujian'];
$status_jawaban = $_POST['status_jawaban'];
if($status_jawaban=='0')
{
    $query = mysqli_query($sambung, "UPDATE ujian SET checked='$status_jawaban' , status_ujian=
    '' WHERE id_ujian='$id_ujian' ");
    if($query){
    echo "<script>alert('Status Jawaban dan Hasil Ujian berhasil diupdate');window.location='hasil_ujian.php'</script>";
    }
    else{
    echo "<script>alert('Status Jawaban dan Hasil Ujian gagal diupdate');history.go(-1)</script>";
    }
}
else{
    $status_ujian = $_POST['status_ujian'];
    $query = mysqli_query($sambung, "UPDATE ujian SET checked='$status_jawaban' , status_ujian=
    '$status_ujian' WHERE id_ujian='$id_ujian' ");
    if($query){
    echo "<script>alert('Status Jawaban dan Hasil Ujian berhasil diupdate');window.location='hasil_ujian.php'</script>";
    }
    else{
    echo "<script>alert('Status Jawaban dan Hasil Ujian gagal diupdate');history.go(-1)</script>";
    }
}

}
?>