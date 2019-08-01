<?php 
include 'config.php';
$kode_buku=$_POST['kode_buku'];
$judul_buku=$_POST['judul_buku'];
$tanggal_terbit=$_POST['tanggal_terbit'];
$pengarang=$_POST['pengarang'];
$stok=$_POST['stok'];

mysql_query("update tb_buku set judul_buku='$judul_buku', tanggal_terbit='$tanggal_terbit', pengarang='$pengarang', stok='$stok' where kode_buku='$kode_buku'");
header("location:buku.php");

?>