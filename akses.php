<?php
session_start();
include 'koneksi.php';
if (isset($_POST['submit'])) {
	if (empty($_POST['username'])) {
		if (empty($_POST['pass'])) {
			echo "<script>alert('Username dan Password kosong , Silahkan diisi !!');history.go(-1) </script>";
		}
		else{
		echo "<script>alert('Username kosong , Silahkan diisi !!');history.go(-1) </script>";
		}
	}
	else if (empty($_POST['pass'])) {
		echo "<script>alert('Password kosong , Silahkan diisi !!');history.go(-1) </script>";
	}
	else
	{
		$user= $_POST['username'];
		$pass= $_POST['pass'];
		$sql = mysqli_query($sambung, "SELECT * FROM akses WHERE username = '$user' ");
		$cek = mysqli_num_rows($sql);

		if ($cek == TRUE)
		{
			$data = mysqli_fetch_array($sql);
			if ($data['username'] == $user) 
			{
				if ($data['password'] == $pass) 
				{
					
					if ($data['level'] =="pelamar") {
						$_SESSION['username']=$user;
                        $_SESSION['level'] = "pelamar";
                        $_SESSION['id_akun'] = $data['id_akun'];
                        if($data['status']=='0')
                        {
                            echo "<script>alert('Akun anda belum diverifikasi oleh Admin , mohon menunggu');history.go(-1) </script>";
                        }
                        else
                        {
                            header("location: index_pelamar.php");
                        }
						
					} 
					elseif ($data['level'] =="hrd") {
						$_SESSION['username']=$user;
						$_SESSION['level'] = "hrd";
						header("location: index_hrd.php");
					}
					elseif ($data['level'] =="direksi") {
						$_SESSION['username']=$user;
						$_SESSION['level'] = "direksi";
						header("location: index_direksi.php");
                    }
                    elseif ($data['level'] =="admin") {
						$_SESSION['username']=$user;
						$_SESSION['level'] = "admin";
						header("location: index_admin.php");
					}
					else {
						header("location: login.html");	
					}	
				}
				else
				{
					echo "<script>alert('Password salah, silahkan periksa kembali !!');history.go(-1) </script>";	
				}
			}
			
		}
		else
		{
			echo "<script>alert('Username tidak dapat ditemukan, silahkan periksa kembali !!');history.go(-1) </script>";
		}
	}
}

?>