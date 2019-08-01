<?php 
include 'config.php';
$npm=$_POST['npm'];
$nama=$_POST['nama'];
$tempat_lahir=$_POST['tempat_lahir'];
$tanggal_lahir=$_POST['tanggal_lahir'];
$jurusan=$_POST['jurusan'];
$tanggal_masuk=$_POST['tanggal_masuk'];

mysql_query("update tb_mahasiswa set npm='$npm', nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', jurusan='$jurusan', tanggal_masuk='$tanggal_masuk' where npm='$npm'");
header("location:mahasiswa.php");

?>