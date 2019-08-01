<?php 
include 'config.php';
$kode_pengembalian=$_POST['kode_pengembalian'];
$nama=$_POST['nama'];
$judul_buku=$_POST['judul_buku'];
$tanggal_pinjam=$_POST['tanggal_pinjam'];
$tanggal_kembali=$_POST['tanggal_kembali'];

mysql_query("update tb_pengembalian set nama='$nama', judul_buku='$judul_buku', tanggal_pinjam='$tanggal_pinjam', tanggal_kembali='$tanggal_kembali' where kode_pengembalian='$kode_pengembalian'");
header("location:pengembalian.php");

?>