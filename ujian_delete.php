<?php
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="hrd"){
                header("location:login.html");
            }

$id_ujian = $_GET['id_ujian'];

$hapus_jawaban= mysqli_query($sambung, "SELECT file_jawaban FROM ujian WHERE id_ujian='$id_ujian'");
$data_jawaban=mysqli_fetch_array($hapus_jawaban);

unlink("files/$data_jawaban[file_jawaban]");

$delete_ujian = mysqli_query($sambung, "DELETE FROM ujian WHERE id_ujian='$id_ujian' ");
$select_berkas = mysqli_query($sambung, "SELECT id_berkas FROM pelamar WHERE id_ujian='$id_ujian'");
$data = mysqli_fetch_array($select_berkas);
$hapus_file= mysqli_query($sambung, "SELECT file_foto, file_ktp, file_kk, file_skck, file_ijasah, file_inovasi
    FROM berkas WHERE id_berkas='".$data['id_berkas']."'");
$data_file=mysqli_fetch_array($hapus_file);

unlink("files/$data_file[file_foto]");
unlink("files/$data_file[file_ktp]");
unlink("files/$data_file[file_kk]");
unlink("files/$data_file[file_skck]");
unlink("files/$data_file[file_ijasah]");
unlink("files/$data_file[file_inovasi]");

$delete_berkas = mysqli_query($sambung, "DELETE FROM berkas WHERE id_berkas='".$data['id_berkas']."' ");
$delete_pelamar = mysqli_query($sambung, "DELETE FROM pelamar WHERE id_ujian='$id_ujian' ");
if($delete_pelamar){
    echo "<script>alert('Data Ujian berhasil dihapus');window.location='hasil_ujian.php'</script>";
}
else{
    echo "<script>alert('Data Ujian gagal dihapus');history.go(-1)</script>";
}

?>