<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Mahasiswa</h3>
<a class="btn" href="mahasiswa.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$npm=mysql_real_escape_string($_GET['npm']);


$det=mysql_query("select * from tb_mahasiswa where npm='$npm'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>NPM</td>
			<td><?php echo $d['npm'] ?></td>
		</tr>
		<tr>
			<td>Nama Mahasiswa</td>
			<td><?php echo $d['nama'] ?></td>
		</tr>
		<tr>
			<td>Tempat Lahir</td>
			<td><?php echo $d['tempat_lahir'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td><?php echo $d['tanggal_lahir'] ?></td>
		</tr>
		<tr>
			<td>Jurusan</td>
			<td><?php echo $d['jurusan'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Masuk</td>
			<td><?php echo $d['tanggal_masuk'] ?></td>
		</tr>
		<tr>
			<td>Meminjam</td>
			<td><?php echo $d['count'] ?></td>
		</tr>

	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>