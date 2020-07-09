<?php 
session_start();
 include '../konek.php'; // untuk mengambil koneksi ke db

		$queri = mysqli_query($koneksi,"INSERT INTO barang_keluar VALUES ('','".$_POST['id_masuk']."','".$_POST['jumlah_keluar']."','".$_POST['tanggal_keluar']."','".$_SESSION['id']."')"); // query menambahkan data ke tabel 

		if ($queri) {

		    header("Location: http://localhost/persediaan/view/main/index.php?h=penjualan&save=0");
		} else {
		    header("Location: http://localhost/persediaan/view/main/index.php?h=penjualan&save=1");
		}


?>