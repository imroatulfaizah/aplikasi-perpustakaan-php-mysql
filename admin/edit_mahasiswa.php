<?php 
include 'header.php';
?>
<h3><span class="glyphicon glyphicon-briefcase"></span>  Edit Mahasiswa</h3>
<a class="btn" href="mahasiswa.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
<?php
$npm=mysql_real_escape_string($_GET['npm']);
$det=mysql_query("select * from tb_mahasiswa where npm='$npm'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
?>					
	<form action="update_mahasiswa.php" method="post">
		<table class="table">
			<tr>
				<td>NPM</td>
				<td><input type="text" name="npm" value="<?php echo $d['npm'] ?>"></td>
			</tr>
			<tr>
				<td>Nama Mahasiswa</td>
				<td><input type="text" class="form-control" name="nama" value="<?php echo $d['nama'] ?>"></td>
			</tr>
			<tr>
				<td>Tempat Lahir</td>
				<td><input type="text" class="form-control" name="tempat_lahir" value="<?php echo $d['tempat_lahir'] ?>"></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td><input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $d['tanggal_lahir'] ?>"></td>
			</tr>
			<tr>
				<td>Jurusan</td>
				<td><input type="text" class="form-control" name="jurusan" value="<?php echo $d['jurusan'] ?>"></td>
			</tr>
			<tr>
				<td>Tanggal Masuk</td>
				<td><input type="text" class="form-control" name="tanggal_masuk" value="<?php echo $d['tanggal_masuk'] ?>"></td>
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