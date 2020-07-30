<?php

	include 'konek.php'; // menghubungkan dengan file konek.php
	session_start();
	// mengambil data yang dikirim dari halaman Login
	$user = $_POST['user']; // isi form login user
	$pass = md5($_POST['pass']); // isi form login password

	// cek data yang dikirim dari halaman login dengan data di DB
	$cekuser = mysqli_query($koneksi,"select * from pengguna where username='".$user."'"); // query untuk mencari data pengguna dengan username tertentu
	if (mysqli_num_rows($cekuser)!="0") { // mengecek apakah di database terdapat data yang dikirim dari form login

		$cekuserpas = mysqli_query($koneksi,"select * from pengguna where username='".$user."' and password='".$pass."'"); // mengecek user dan password

			if (mysqli_num_rows($cekuserpas)!="0") { // mengecek jika ada data yang cocok
				while ( $rs = mysqli_fetch_array($cekuserpas)) {
					$_SESSION['id'] = $rs['id_pengguna']; // menyimpan data dari db ke dalam session
					$_SESSION['user'] = $rs['username'];  // menyimpan data dari db ke dalam session
					$_SESSION['jabatan'] = $rs['jabatan']; // menyimpan data dari db ke dalam session
					$_SESSION['nama'] = $rs['nama']; // menyimpan data dari db ke dalam session
					$_SESSION['status'] = "login"; // menyimpan data ke dalam session
				}

				header("Location: http://localhost/persediaan/view/main/index.php?h=dashboard"); // mengalihkan halaman 
			}else{
				header("Location: http://localhost/persediaan/index.php?err=405"); // menampilkan error Password Salah

				// echo "Password Salah";
			}

	}else{

				header("Location: http://localhost/persediaan/index.php?err=404"); // menampilkan error Username & Password Salah
				// echo "Username & Password Salah";

	}


?>