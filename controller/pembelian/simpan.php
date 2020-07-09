<?php 
session_start();
 include '../konek.php'; // untuk mengambil koneksi ke db

		$queri = mysqli_query($koneksi,"INSERT INTO barang_masuk VALUES ('','".$_POST['nama_barang']."','".$_POST['jumlah_masuk']."','".$_POST['tanggal_masuk']."','".$_SESSION['id']."')"); // query menambahkan data ke tabel 
		if ($queri) {
		    // header("Location: http://localhost/persediaan/controller/stok/simpan.php?h=".$_POST['nama_barang']."&jumlah=".$_POST['jumlah_masuk']);
		    header("Location: http://localhost/persediaan/view/main/index.php?h=pembelian&save=0");
		} else {
		    header("Location: http://localhost/persediaan/view/main/index.php?h=pembelian&save=1");
		}


?>