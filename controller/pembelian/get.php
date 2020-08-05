<?php
 include '../konek.php'; // untuk mengambil koneksi ke db

		$id = $_POST['id'];

		$query = mysqli_query($koneksi,"SELECT a.*,b.kd_barang AS kodbar , b.nama_barang FROM barang_masuk a JOIN nama_barang b ON a.kd_barang=b.id where a.id_masuk='".$id."'");
		$rs = mysqli_fetch_array($query);

		echo json_encode($rs);

	?>