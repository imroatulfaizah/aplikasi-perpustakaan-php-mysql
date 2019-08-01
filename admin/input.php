<?php 
include 'koneksi.php';
$db = new database();
 
 if(isset($_POST['simpan'])){
 	$db->insertbuku($_POST['kode_buku'],$_POST['judul_buku'],$_POST['tanggal_terbit'],$_POST['pengarang'],$_POST['stok']);
 	header("location:indexbuku.php");
 }
?>
<center>
<h1>CRUD OOP PHP</h1>
<h3>Tambah Data Buku</h3>
 
<form action="" method="post">

<table>
	<tr>
		<td>Kode Buku</td>
		<td><input type="text" name="kode_buku"></td>
	</tr>
	<tr>
		<td>Judul Buku</td>
		<td><input type="text" name="judul_buku"></td>
	</tr>
	<tr>
		<td>Tanggal Terbit</td>
		<td><input type="date" name="tanggal_terbit"></td>
	</tr>
	<tr>
		<td>Pengarang</td>
		<td><input type="text" name="pengarang"></td>
	</tr>
	<tr>
		<td>Pengarang</td>
		<td><input type="text" name="stok"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Simpan" name="simpan"></td>
	</tr>
</table>
</center>
</form>