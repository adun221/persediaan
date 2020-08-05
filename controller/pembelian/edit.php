<?php 
session_start();
 include '../konek.php'; // untuk mengambil koneksi ke db
 
		$queri = mysqli_query($koneksi,"UPDATE barang_masuk set kd_barang='".$_POST['kd_barang']."' , jumlah_masuk='".$_POST['jumlah_masuk']."', tanggal_masuk='".$_POST['tanggal_masuk']."' where id_masuk='".$_POST['id_masuk']."' "); // query edit data ke tabel 

		if ($queri) {
		    header("Location: http://localhost/persediaan/view/main/index.php?h=pembelian&edit=0"); // otomatis mengalihkan ke halaman
		} else {
		    header("Location: http://localhost/persediaan/view/main/index.php?h=pembelian&edit=1"); // otomatis mengalihkan ke halaman
		}


?>