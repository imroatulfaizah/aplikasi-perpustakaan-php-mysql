<?php 
include 'config.php';
$kode_buku=$_GET['kode_buku'];
mysql_query("delete from tb_buku where kode_buku='$kode_buku'");
header("location:buku.php");

?>