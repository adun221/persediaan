<?php
 include '../konek.php'; // untuk mengambil koneksi ke db

		$id = $_POST['id'];

		$query = mysqli_query($koneksi,"SELECT * from nama_barang where id='".$id."'");
		$rs = mysqli_fetch_array($query);
		echo json_encode($rs);

	?>