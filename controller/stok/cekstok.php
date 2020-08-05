<?php
 include '../konek.php'; // untuk mengambil koneksi ke db

		$id = $_POST['id'];

		$query = mysqli_query($koneksi,"SELECT * from barang_tersedia where kd_barang='".$id."' ");
		// $query = mysqli_query($koneksi,"SELECT a.nama_barang, a.jumlah_masuk, COALESCE(b.jumlah_keluar,0) AS jumlah_keluar, (a.jumlah_masuk-COALESCE(b.jumlah_keluar,0)) AS stok FROM 
                                          // (SELECT id_masuk, nama_barang,SUM(jumlah_masuk) AS jumlah_masuk FROM barang_masuk GROUP BY nama_barang) a 
                                          // LEFT JOIN (SELECT id_masuk, SUM(jumlah_keluar) AS jumlah_keluar FROM barang_keluar GROUP BY id_masuk) b ON a.id_masuk=b.id_masuk WHERE (a.jumlah_masuk-COALESCE(b.jumlah_keluar,0))!='0' and  a.id_masuk='".$id."' ORDER BY a.nama_barang ASC");

		$rs = mysqli_fetch_array($query);

		echo json_encode($rs);

	?>