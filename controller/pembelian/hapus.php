<?php 
session_start();
 include '../konek.php'; // untuk mengambil koneksi ke db

		// $queri = mysqli_query($koneksi,"SELECT * from barang_masuk where id_masuk='".$_GET['id']."'"); // query edit data ke tabel 
		// $rs = mysqli_fetch_row($queri);
		//  $id_masuk = $rs[0];
		//  $nama_barang = $rs[1];
		//  $jumlah_masuk = $rs[2];

		// $queribm = mysqli_fetch_row(mysqli_query($koneksi,"SELECT *,SUM(jumlah_masuk) AS jmlmsk FROM barang_masuk WHERE nama_barang='".$nama_barang."' GROUP BY nama_barang ORDER BY id_masuk ASC")); // query edit data ke tabel 

		// $queribk = mysqli_fetch_row(mysqli_query($koneksi,"SELECT *,SUM(jumlah_keluar) AS jmlkluar FROM barang_keluar WHERE id_masuk='".$queribm['0']."' GROUP BY id_masuk")); // query edit data ke tabel 

		// $bm = $queribm[5]-$jumlah_masuk;
		// $bk = $queribk[5];
		// $final = $bm-$bk;
		// echo $final;
		
		// $queribt = mysqli_fetch_row(mysqli_query($koneksi,"SELECT * from barang_tersedia where id_masuk='".$id_masuk."'")); // query edit data ke tabel 

		// $akhir = $queribt['2']-$jumlah_keluar;

		// $simpan = mysqli_query($koneksi,"UPDATE barang_tersedia set jumlah_tersedia='".$akhir."' where id_tersedia='".$queribt['0']."'"); // query menambahkan data ke tabel 

		$queri = mysqli_query($koneksi,"DELETE from barang_masuk where id_masuk='".$_GET['id']."'"); // query Hapus data ke tabel 

		if ($queri) {
			// echo mysqli_error($koneksi);
		    header("Location: http://localhost/persediaan/view/main/index.php?h=pembelian&del=0"); // otomatis mengalihkan ke halaman
		} else {
			// echo mysqli_error($koneksi);
		    header("Location: http://localhost/persediaan/view/main/index.php?h=pembelian&del=1"); // otomatis mengalihkan ke halaman
		}


?>