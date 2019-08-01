<?php 
include 'config.php';
$judul_buku=$_POST['judul_buku'];
$tanggal_terbit=$_POST['tanggal_terbit'];
$pengarang=$_POST['pengarang'];
$stok=$_POST['stok'];


mysql_query("insert into tb_buku values('','$judul_buku','$tanggal_terbit','$pengarang','$stok')");
header("location:buku.php");

 ?>