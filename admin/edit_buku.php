<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Buku</h3>
<a class="btn" href="buku.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$kode_buku=mysql_real_escape_string($_GET['kode_buku']);
$det=mysql_query("select * from tb_buku where kode_buku='$kode_buku'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="update.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="kode_buku" value="<?php echo $d['kode_buku'] ?>"></td>
			</tr>
			<tr>
				<td>Judul Buku</td>
				<td><input type="text" class="form-control" name="judul_buku" value="<?php echo $d['judul_buku'] ?>"></td>
			</tr>
			<tr>
				<td>Tanggal Terbit</td>
				<td><input type="date" class="form-control" name="tanggal_terbit" value="<?php echo $d['tanggal_terbit'] ?>"></td>
			</tr>
			<tr>
				<td>Pengarang</td>
				<td><input type="text" class="form-control" name="pengarang" value="<?php echo $d['pengarang'] ?>"></td>
			</tr>
			<tr>
				<td>Stok</td>
				<td><input type="text" class="form-control" name="stok" value="<?php echo $d['stok'] ?>"></td>
			</tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
<?php include 'footer.php'; ?>