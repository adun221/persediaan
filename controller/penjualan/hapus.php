<?php 
session_start();
 include '../konek.php'; // untuk mengambil koneksi ke db


		$queri = mysqli_query($koneksi,"DELETE from barang_keluar where id_keluar='".$_GET['id']."'"); // query edit data ke tabel 

		if ($queri) {
			// echo mysqli_error($koneksi);
		    header("Location: http://localhost/persediaan/view/main/index.php?h=penjualan&del=0"); // otomatis mengalihkan ke halaman
		} else {
			// echo mysqli_error($koneksi);
		    header("Location: http://localhost/persediaan/view/main/index.php?h=penjualan&del=1"); // otomatis mengalihkan ke halaman
		}


?>