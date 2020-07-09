<?php 
session_start();
 include '../konek.php'; // untuk mengambil koneksi ke db

	 	$cekid = mysqli_query($koneksi,"SELECT * from pengguna where username='".$_POST['username']."' and id_pengguna='".$_POST['id_pengguna']."'");

	 	if (mysqli_num_rows($cekid)=='1') {

	 		$queri = mysqli_query($koneksi,"UPDATE pengguna set username='".$_POST['username']."' , password='".md5($_POST['password'])."', nama='".$_POST['nama']."', jabatan='".$_POST['jabatan']."' where id_pengguna='".$_POST['id_pengguna']."' "); // query edit data ke tabel 

			if ($queri) {
			    header("Location: http://localhost/persediaan/view/main/index.php?h=pengguna&edit=0"); // otomatis mengalihkan ke halaman
			} else {
			    header("Location: http://localhost/persediaan/view/main/index.php?h=pengguna&edit=1"); // otomatis mengalihkan ke halaman
			}

	 	 }else{

		 	$cekpengguna = mysqli_query($koneksi,"SELECT * from pengguna where username='".$_POST['username']."'"); 

			if (mysqli_num_rows($cekpengguna)=="0") { 

				$queri = mysqli_query($koneksi,"UPDATE pengguna set username='".$_POST['username']."' , password='".md5($_POST['password'])."', nama='".$_POST['nama']."', jabatan='".$_POST['jabatan']."' where id_pengguna='".$_POST['id_pengguna']."' "); // query edit data ke tabel 

				if ($queri) {
				    header("Location: http://localhost/persediaan/view/main/index.php?h=pengguna&edit=0"); // otomatis mengalihkan ke halaman
				} else {
				    header("Location: http://localhost/persediaan/view/main/index.php?h=pengguna&edit=1"); // otomatis mengalihkan ke halaman
				}

			}else{

				    header("Location: http://localhost/persediaan/view/main/index.php?h=pengguna&edit=2");

			}

	 	 }




?>