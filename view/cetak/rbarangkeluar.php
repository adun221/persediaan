<?php
// memanggil library FPDF
setlocale(LC_ALL, 'id-ID', 'id_ID');
require('../../assets/fpdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',14);
if ($_GET['b']=='1') {
	$bulan = "Januari";
}elseif ($_GET['b']=='2') {
	$bulan = "Februari";
}elseif ($_GET['b']=='3') {
	$bulan = "Maret";
}elseif ($_GET['b']=='4') {
	$bulan = "April";
}elseif ($_GET['b']=='5') {
	$bulan = "Mei";
}elseif ($_GET['b']=='6') {
	$bulan = "Juni";
}elseif ($_GET['b']=='7') {
	$bulan = "Juli";
}elseif ($_GET['b']=='8') {
	$bulan = "Agustus";
}elseif ($_GET['b']=='9') {
	$bulan = "Setember";
}elseif ($_GET['b']=='10') {
	$bulan = "Oktober";
}elseif ($_GET['b']=='11') {
	$bulan = "November";
}elseif ($_GET['b']=='12') {
	$bulan = "Desember";
}
// mencetak string 
$image1 = "../../assets/image/logo.jpeg";
$pdf->Cell( 1, 30, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 30.30), 0, 0, 'L', false );

// $pdf->SetFont('Arial','B',12);
$pdf->Cell(190,10,'UD. KA DISTRIBUTION',0,1,'C');
$pdf->Cell(190,10,'Laporan Barang Keluar',0,1,'C');
// $pdf->SetFont('Arial','B',12);
$pdf->Cell(190,10,'Bulan '.$bulan." ".$_GET['t'],0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,10,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,7,'No',1,0);
$pdf->Cell(35,7,'KODE BARANG',1,0);
$pdf->Cell(40,7,'NAMA BARANG',1,0);
$pdf->Cell(35,7,'JUMLAH KELUAR',1,0);
$pdf->Cell(25,7,'USER',1,0);
$pdf->Cell(38,7,'TANGGAL KELUAR',1,1);
// adf
$pdf->SetFont('Arial','',10);
include '../../controller/konek.php';
$n = '0';
$query = mysqli_query($koneksi, "SELECT d.`kd_barang`,a.jumlah_keluar,a.tanggal_keluar,b.nama,d.nama_barang FROM barang_keluar a JOIN pengguna b ON a.id_pengguna=b.id_pengguna JOIN barang_masuk c ON a.kd_barang=c.kd_barang JOIN nama_barang d ON a.kd_barang=d.id where month(a.tanggal_keluar)='".$_GET['b']."' and year(a.tanggal_keluar)='".$_GET['t']."' order by a.tanggal_keluar,d.nama_barang ASC");
if($cek= mysqli_num_rows($query)!='0'){

	while ($row = mysqli_fetch_array($query)){ $n++;
	    $pdf->Cell(10,6,$n,1,0);
	    $pdf->Cell(35,6,$row['kd_barang'],1,0);
	    $pdf->Cell(40,6,$row['nama_barang'],1,0);
	    $pdf->Cell(35,6,$row['jumlah_keluar'],1,0);
	    $pdf->Cell(25,6,$row['nama'],1,0);
	    $pdf->Cell(38,6,strftime("%d %B %Y",  strtotime($row['tanggal_keluar'])),1,1); 
	}
} else {
	$pdf->Cell(185,6,"Tidak Ada Data Pada Bulan Ini",1,1);
}

$pdf->Cell(10,7,'',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90,6,"",0,0,'C');
$pdf->Cell(95,6,'Purwokerto, '.strftime("%d %B %Y", strtotime(date("Y-m-d"))),0,1,'C');

$pdf->Cell(10,20,'',0,1);

$pdf->SetFont('Arial','',10);
$pdf->Cell(90,6,"",0,0,'C');
$pdf->Cell(95,6,'(...........................)',0,1,'C');

$fileName = 'Barang Keluar - ' .date("d").' '.$bulan.' '.$_GET['t'] . '.pdf';
$pdf->Output($fileName, 'D');
// $pdf->Output();
?>

