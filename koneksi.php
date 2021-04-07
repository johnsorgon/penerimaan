<?php
$host="localhost";
$user="root";
$pass="";
$db="penerimaan";
$sambung=mysqli_connect($host, $user, $pass, $db);
if($sambung){
	$buka= mysqli_select_db($sambung, $db);
	if(!$buka){
		die("tidak konek");
	}
}
else{
	die("no konek");
}
?>