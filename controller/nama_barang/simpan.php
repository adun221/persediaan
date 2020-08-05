<?php 
session_start();
 include '../konek.php'; // untuk mengambil koneksi ke db

 		$lihatkdbarang = mysqli_query($koneksi,"SELECT * from nama_barang order by id desc limit 1");
 		$cekkode  = mysqli_fetch_row($lihatkdbarang);
 		$kd_barang = sprintf("%03s",$cekkode['0']+1);
 		$generate = "KD-".$kd_barang;
 		// echo $generate;
		$queri = mysqli_query($koneksi,"INSERT INTO nama_barang VALUES ('','".$_POST['nama_barang']."','".$generate."')"); // query menambahkan data ke tabel 
		if ($queri) {
		    header("Location: http://localhost/persediaan/view/main/index.php?h=nama_barang&save=0");
		} else {
		    header("Location: http://localhost/persediaan/view/main/index.php?h=nama_barang&save=1");
		}


?>