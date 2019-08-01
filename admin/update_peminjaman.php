<?php 
include 'config.php';
$kode_peminjaman=$_POST['kode_peminjaman'];
$nama=$_POST['nama'];
$judul_buku=$_POST['judul_buku'];
$tanggal_pinjam=$_POST['tanggal_pinjam'];
$tanggal_kembali=$_POST['tanggal_kembali'];

mysql_query("update tb_peminjaman set nama='$nama', judul_buku='$judul_buku', tanggal_pinjam='$tanggal_pinjam', tanggal_kembali='$tanggal_kembali' where kode_peminjaman='$kode_peminjaman'");
header("location:peminjaman.php");

?>