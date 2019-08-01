<?php 
include 'config.php';
$npm=$_GET['npm'];
mysql_query("delete from tb_mahasiswa where npm='$npm'");
header("location:mahasiswa.php");

?>