<?php

	include 'konek.php';
	session_start();
	// mengambil data yang dikirim dari halaman Login
	$user = $_POST['user']; // isi form login user
	$pass = md5($_POST['pass']); // isi form login password

	// cek data yang dikirim dari halaman login dengan data di DB
	$cekuser = mysqli_query($koneksi,"select * from pengguna where username='".$user."'");
	if (mysqli_num_rows($cekuser)!="0") {

		$cekuserpas = mysqli_query($koneksi,"select * from pengguna where username='".$user."' and password='".$pass."'");

			if (mysqli_num_rows($cekuserpas)!="0") {
				while ( $rs = mysqli_fetch_array($cekuserpas)) {
					$_SESSION['id'] = $rs['id_pengguna'];
					$_SESSION['user'] = $rs['username'];
					$_SESSION['jabatan'] = $rs['jabatan'];
					$_SESSION['nama'] = $rs['nama'];
					$_SESSION['status'] = "login";
				}

				header("Location: http://localhost/persediaan/view/main/index.php?h=dashboard");
			}else{
				header("Location: http://localhost/persediaan/index.php?err=405");

				// echo "Password Salah";
			}

	}else{

				header("Location: http://localhost/persediaan/index.php?err=404");
				// echo "Username & Password Salah";

	}


?>