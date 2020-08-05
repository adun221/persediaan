<?php 
session_start();
 include '../konek.php'; // untuk mengambil koneksi ke db
 
		$queri = mysqli_query($koneksi,"UPDATE barang_keluar set jumlah_keluar='".$_POST['jumlah_keluar']."', tanggal_keluar='".$_POST['tanggal_keluar']."' where id_keluar='".$_POST['id_keluar']."' "); // query edit data ke tabel 

			// echo mysqli_error($koneksi);
		if ($queri) {
		    header("Location: http://localhost/persediaan/view/main/index.php?h=penjualan&edit=0"); // otomatis mengalihkan ke halaman
		} else {
		    header("Location: http://localhost/persediaan/view/main/index.php?h=penjualan&edit=1"); // otomatis mengalihkan ke halaman
		}


?>