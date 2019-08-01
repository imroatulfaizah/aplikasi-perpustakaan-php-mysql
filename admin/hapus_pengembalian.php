<?php 
include 'config.php';
$kode_pengembalian=$_GET['kode_pengembalian'];
mysql_query("delete from tb_pengembalian where kode_pengembalian='$kode_pengembalian'");
header("location:pengembalian.php");

?>