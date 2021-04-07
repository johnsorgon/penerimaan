<?php
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="hrd"){
                header("location:login.html");
            }

$id_loker = $_GET['id_loker'];

$query = mysqli_query($sambung, "DELETE FROM loker WHERE id_loker='$id_loker' ");
if($query){
    echo "<script>alert('Lowongan berhasil dihapus');window.location='index_hrd.php'</script>";
}
else{
    echo "<script>alert('Lowongan gagal dihapus');history.go(-1)</script>";
}

?>