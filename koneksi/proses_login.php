<?php

session_start();

include 'koneksi.php';

$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$pass = mysqli_real_escape_string($koneksi, $_POST['password']);

$login = mysqli_query($koneksi,"SELECT * from user where email='$email' and password='$pass'");
$cek = mysqli_num_rows($login);

if($cek > 0){

    $data = mysqli_fetch_array($login);

    if($data['jabatan']=="admin"){	
			$_SESSION['id_user'] = $data['id_user'];
			$_SESSION['email'] = $data['email'];
			$_SESSION['jabatan'] = "admin";
			$_SESSION['nama'] = $data['nama'];
            header("location:../Admin/dashboard.php?alert=berhasil");
	}else{
	
			header("location:../login.php?pesan=gagal");
	}
    }else{
		header("location:../login.php?pesan=gagal");
	}

?>