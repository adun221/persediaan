<?php 
	include '../../controller/konek.php';

?>
<?php  
$data = array();
$label = array();
$nabar = mysqli_query($koneksi,"SELECT a.id,IFNULL(b.terjual,0) AS terjual FROM bulan a LEFT JOIN (SELECT IFNULL(SUM(jumlah_keluar),0) AS terjual, tanggal_keluar  FROM barang_keluar GROUP BY MONTH(tanggal_keluar)) b ON a.id=MONTH(b.tanggal_keluar) ORDER BY a.id ASC;");
while ($rsnabar = mysqli_fetch_array($nabar)) { 
 $n['data'] = $rsnabar['terjual'];
 $n['label'] = $rsnabar['id'];

 array_push($data, $n['data']);
 array_push($label, $n['label']);
} 
echo json_encode($data);
echo json_encode($label);

?>