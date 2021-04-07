<?php 
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="hrd"){
                header("location:login.html");
            }
            error_reporting(0);

$id_berkas = $_GET['id_berkas'];
$update = mysqli_query($sambung, "UPDATE berkas SET confirmed='1' WHERE id_berkas='$id_berkas' ");
if($update)
{
    $select_data = mysqli_query($sambung, "SELECT id_ujian, id_loker, id_berkas FROM pelamar 
    WHERE id_berkas='$id_berkas' ");
    $data= mysqli_fetch_array($select_data);
    
    $add_ujian = mysqli_query($sambung, "INSERT INTO ujian SET id_ujian='".$data['id_ujian']."',
    id_loker='".$data['id_loker']."' , id_berkas='".$data['id_berkas']."', file_jawaban=NULL, submited_at=NULL,
    checked='0', status_ujian=NULL ");
    if($add_ujian)
    {
        echo "<script>alert('Berkas berhasil diverifikasi');window.location='berkas_hrd.php'</script>";
    }
    else
    {
    echo "<script>alert('Berkas gagal diverifikasi');window.location='berkas_hrd.php'</script>";
    }
}
?>