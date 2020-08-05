<?php
 include '../konek.php'; // untuk mengambil koneksi ke db

		$id = $_POST['id'];

		$query = mysqli_query($koneksi,"SELECT id_keluar,b.id AS kodbar, nama_barang, jumlah_keluar,tanggal_keluar,c.nama,d.jumlah_tersedia+a.jumlah_keluar AS stok FROM barang_keluar a JOIN nama_barang b ON a.kd_barang=b.id JOIN pengguna c ON a.id_pengguna=c.id_pengguna JOIN barang_tersedia d ON b.id=d.kd_barang where a.id_keluar='".$id."'");
		$rs = mysqli_fetch_array($query);

		echo json_encode($rs);

	?>