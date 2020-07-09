<?php 
session_start();
 include '../konek.php'; // untuk mengambil koneksi ke db

	$cekpengguna = mysqli_query($koneksi,"SELECT * from pengguna where username='".$_POST['username']."'"); 
	if (mysqli_num_rows($cekpengguna)=="0") { 

		$queri = mysqli_query($koneksi,"INSERT INTO pengguna VALUES ('','".$_POST['username']."','".md5($_POST['password'])."','".$_POST['nama']."','".$_POST['jabatan']."')"); // query menambahkan data ke tabel 

		if ($queri) {
		    header("Location: http://localhost/persediaan/view/main/index.php?h=pengguna&save=0");
		} else {
		    header("Location: http://localhost/persediaan/view/main/index.php?h=pengguna&save=1");
		}

	}else{

		    header("Location: http://localhost/persediaan/view/main/index.php?h=pengguna&save=2");

	}



?>