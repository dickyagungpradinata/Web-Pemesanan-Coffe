<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.login.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from kasir where `username`='$username' and `password`='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);



// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);
        $id_admin = $data['id_admin'];

	// cek jika user login sebagai admin
	if($data['id_akses']=="1"){

		// buat session login dan username
                $_SESSION['id_admin'] = $id_admin;
		$_SESSION['username'] = $username;
		$_SESSION['id_akses'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:halaman.admin.php");


	// cek jika user login sebagai petugas
	}else if($data['id_akses']=="2"){
		// buat session login dan username
                $_SESSION['id_admin'] = $id_admin;
		$_SESSION['username'] = $username;
		$_SESSION['id_akses'] = "petugas";
		// alihkan ke halaman dashboard petugas
		header("location:halaman.petugas.php");
                
	}else{
		
	}	
}

?>