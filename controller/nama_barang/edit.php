<?php 
session_start();
 include '../konek.php'; // untuk mengambil koneksi ke db
 
		$queri = mysqli_query($koneksi,"UPDATE nama_barang set nama_barang='".$_POST['nama_barang']."' where id='".$_POST['id']."' "); // query edit data ke tabel 

		if ($queri) {
		    header("Location: http://localhost/persediaan/view/main/index.php?h=nama_barang&edit=0"); // otomatis mengalihkan ke halaman
		} else {
		    header("Location: http://localhost/persediaan/view/main/index.php?h=nama_barang&edit=1"); // otomatis mengalihkan ke halaman
		}


?>