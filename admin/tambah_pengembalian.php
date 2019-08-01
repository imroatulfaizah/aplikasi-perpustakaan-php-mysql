<?php 

include 'config.php';
$nama=$_POST['nama'];
$judul_buku=$_POST['judul_buku'];
$tanggal_pinjam=$_POST['tanggal_pinjam'];
$tanggal_kembali=$_POST['tanggal_kembali'];

mysql_query("insert into tb_pengembalian values('','$nama','$judul_buku','$tanggal_pinjam','$tanggal_kembali')")or die(mysql_error());
header("location:pengembalian.php");

?>