<?php 
            session_start();
            include 'koneksi.php';
            // cek apakah yang mengakses halaman ini sudah login
            if($_SESSION['level'] !=="admin"){
                header("location: login.html");
            }
    if (isset($_POST['submit'])) {
        $id_akun = $_POST['id_akun'];
        $fullname = $_POST['nama'];
        $kelamin = $_POST['jenis_kelamin'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $level = $_POST['level'];

        $query = mysqli_query($sambung, "INSERT INTO akses SET id_akun='$id_akun' , nama='$fullname', 
        jenis_kelamin='$kelamin', username='$username', email='$email', password='$password', 
        level='$level', created_at_date=CURDATE(), confirmed_at_date=CURDATE() , status='1' ");
        if (!$query) {
            # code...
            echo "<script>alert('Username sudah digunakan , masukkan username lain');history.go(-1) </script>";

        }
        else
        {
            echo "<script>alert('Akun berhasil dibuat');window.location='user_manage.php'</script>";
        }
        # code...   
    }
    
?>