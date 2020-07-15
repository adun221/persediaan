<?php 
session_start();
 include '../konek.php'; // untuk mengambil koneksi ke db


$queri = mysqli_query($koneksi,"SELECT a.id_masuk,a.nama_barang, a.jumlah_masuk, COALESCE(b.jumlah_keluar,0) AS jumlah_keluar, (a.jumlah_masuk-COALESCE(b.jumlah_keluar,0)) AS stok FROM 
                                          (SELECT id_masuk, nama_barang,SUM(jumlah_masuk) AS jumlah_masuk FROM barang_masuk GROUP BY nama_barang) a 
                                          LEFT JOIN (SELECT id_masuk, SUM(jumlah_keluar) AS jumlah_keluar FROM barang_keluar GROUP BY id_masuk) b ON a.id_masuk=b.id_masuk ORDER BY a.nama_barang ASC"); // query menambahkan data ke tabel 

while ($rs = mysqli_fetch_array($queri)) {
	$query = mysqli_num_rows(mysqli_query($koneksi,"SELECT * from barang_tersedia where id_masuk='".$rs['id_masuk']."'"));
	if ($query=='0') {
		// echo "baru";
			$simpan = mysqli_query($koneksi,"INSERT INTO barang_tersedia VALUES('','".$rs['id_masuk']."','".$rs['stok']."') ");
			// echo "INSERT INTO barang_tersedia VALUES('','".$rs['id_masuk']."','".$rs['stok']."') "."<br>";
			if ($simpan) {
				echo "Simpan ".$rs['id_masuk']." Berhasil";
			}else{
				echo "Simpan ".$rs['id_masuk']." Gagal";
			}
	}else{
		$query = mysqli_fetch_row(mysqli_query($koneksi,"SELECT * from barang_tersedia where id_masuk='".$rs['id_masuk']."'"));
		// echo $query['2'];
		if ($query['2']==$rs['stok']) {
			// echo "sama";
		}else{
			// echo "beda";
			$simpan = mysqli_query($koneksi,"UPDATE barang_tersedia set jumlah_tersedia='".$rs['stok']."' where id_masuk='".$rs['id_masuk']."' ");
			// echo "Update INTO barang_tersedia VALUES('','".$rs['id_masuk']."','".$rs['stok']."') "."<br>";
			if ($simpan) {
				echo "Update ".$rs['id_masuk']." Berhasil";
			// 	echo "berhasil";
			}else{
				echo "UPDATE barang_tersedia set jumlah_tersedia='".$rs['stok']."' where id_masuk='".$rs['id_masuk']."') ";
				echo "Update ".$rs['id_masuk']." Gagal";
			}
		}
	}
}



?>