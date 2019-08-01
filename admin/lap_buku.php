<?php
include 'config.php';
require('../assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('foto/unikama.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'Perpustakaan Mts Al-Manar',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 0341-6677889',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl Raya Sempol, Malang',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.mts-almanar.com email : mts-almanar@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Buku",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'Kode Buku', 1, 0, 'C');
$pdf->Cell(7, 0.8, 'Judul Buku', 1, 0, 'C');
$pdf->Cell(4, 0.8, 'Tanggal Terbit', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'Pengarang', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'Jumlah', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysql_query("select * from tb_buku");
while($lihat=mysql_fetch_array($query)){
	$pdf->Cell(1, 0.8, $no , 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['kode_buku'], 1, 0,'C');
	$pdf->Cell(7, 0.8, $lihat['judul_buku'],1, 0, 'C');
	$pdf->Cell(4, 0.8, $lihat['tanggal_terbit'],1, 0, 'C');
	$pdf->Cell(4.5, 0.8, $lihat['pengarang'], 1, 0,'C');
	$pdf->Cell(2, 0.8, $lihat['stok'],1, 1, 'C');

	$no++;
}

$pdf->Output("laporan_buku.pdf","I");

?>

