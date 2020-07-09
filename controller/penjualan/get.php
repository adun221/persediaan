<?php
 include '../konek.php'; // untuk mengambil koneksi ke db

		$id = $_POST['id'];

		$query = mysqli_query($koneksi,"SELECT a.*,b.nama_barang FROM barang_keluar a JOIN barang_masuk b ON a.id_masuk=b.id_masuk where a.id_keluar='".$id."'");
		$rs = mysqli_fetch_array($query);

		echo json_encode($rs);

	?>