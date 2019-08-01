<?php 
include 'config.php';
$kode_peminjaman=$_GET['kode_peminjaman'];
mysql_query("delete from tb_peminjaman where kode_peminjaman='$kode_peminjaman'");
header("location:peminjaman.php");

?>