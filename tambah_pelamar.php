<?php 
    include 'koneksi.php';
    if (isset($_POST['submit'])) {
        $fullname = $_POST['fullname'];
        $kelamin = $_POST['kelamin'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = 'pelamar';

        $cek = mysqli_query($sambung, "SELECT max(id_akun) as kodeId FROM akses WHERE level='$level'");
        $data = mysqli_fetch_array($cek);
        $kodeId = $data['kodeId'];
        $urutan = (int) substr($kodeId, 3, 3);
        $urutan++;

        $huruf = 'PLM';

        $kodeId = $huruf . sprintf("%03s", $urutan);

        $query = mysqli_query($sambung, "INSERT INTO akses SET id_akun='$kodeId' , nama='$fullname', jenis_kelamin='$kelamin', username='$username', email='$email', password='$password', level='$level', created_at_date=CURDATE(), confirmed_at_date=NULL, status='0' ");
        if (!$query) {
            # code...
            echo "<script>alert('Gagal Membuat Akun');history.go(-1) </script>";

        }
        else
        {
            echo "<script>alert('Akun berhasil dibuat');window.location='login.html'</script>";
        }
        # code...   
    }
    
?>