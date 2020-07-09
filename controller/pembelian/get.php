<?php
 include '../konek.php'; // untuk mengambil koneksi ke db

		$id = $_POST['id'];

		$query = mysqli_query($koneksi,"SELECT * from barang_masuk where id_masuk='".$id."'");
		$rs = mysqli_fetch_array($query);

		echo json_encode($rs);

	?>