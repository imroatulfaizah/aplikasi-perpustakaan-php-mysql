<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Buku</h3>
<a class="btn" href="buku.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$kode_buku=mysql_real_escape_string($_GET['kode_buku']);


$det=mysql_query("select * from tb_buku where kode_buku='$kode_buku'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Kode Buku</td>
			<td><?php echo $d['kode_buku'] ?></td>
		</tr>
		<tr>
			<td>Judul Buku</td>
			<td><?php echo $d['judul_buku'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Terbit</td>
			<td><?php echo $d['tanggal_terbit'] ?></td>
		</tr>
		<tr>
			<td>Pengarang</td>
			<td><?php echo $d['pengarang'] ?></td>
		</tr>
		<tr>
			<td>Stok</td>
			<td><?php echo $d['stok'] ?></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>