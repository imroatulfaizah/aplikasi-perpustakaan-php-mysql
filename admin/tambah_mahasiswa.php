<?php 

include 'config.php';
$npm=$_POST['npm'];
$nama=$_POST['nama'];
$tempat_lahir=$_POST['tempat_lahir'];
$tanggal_lahir=$_POST['tanggal_lahir'];
$jurusan=$_POST['jurusan'];
$tanggal_masuk=$_POST['tanggal_masuk'];

mysql_query("insert into tb_mahasiswa values('$npm','$nama','$tempat_lahir','$tanggal_lahir','$jurusan','$tanggal_masuk')")or die(mysql_error());
header("location:mahasiswa.php");

?>