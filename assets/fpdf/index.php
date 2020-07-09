<?php
// memanggil library FPDF
require('fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('P','mm','A4');
// membuat halaman baru
$pdf->AddPage();
// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',14);
// mencetak string 
$pdf->Cell(190,10,'Laporan Barang Masuk',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,10,'Bulan ',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',11);
$pdf->Cell(10,8,'No',1,0);
$pdf->Cell(55,8,'NAMA BARANG',1,0);
$pdf->Cell(40,8,'JUMLAH MASUK',1,0);
$pdf->Cell(40,8,'USER',1,0);
$pdf->Cell(40,8,'TANGGAL MASUK',1,0);
// adf
$pdf->SetFont('Arial','',10);
	$pdf->Cell(10,6,"1",1,0);
	$pdf->Cell(55,6,'asdasd',1,0);
	$pdf->Cell(40,6,'asdasd',1,0);
	$pdf->Cell(40,6,'asdasd',1,0);
	$pdf->Cell(40,6,'asdasd',1,1);



$pdf->Output();
?>