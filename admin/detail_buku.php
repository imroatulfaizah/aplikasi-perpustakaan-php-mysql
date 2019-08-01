<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Buku</h3>
<a class="btn" href="buku.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$kode_buku=mysql_real_escape_string($_GET['kode_buku']);


$det=mysql_query("select * from tb_buku where kode_buku='$kode_buku'")or die(mysql_error());
$no=1;
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>No</td>
			<td>Judul Buku</td>
			<td>Tanggal Terbit</td>
			<td>Pengarang</td>
			<td>Stok</td>
		</tr>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $d['judul_buku'] ?></td>
			<td><?php echo $d['tanggal_terbit'] ?></td>
			<td><?php echo $d['pengarang'] ?></td>
			<td><?php echo $d['stok'] ?></td>
		</tr>
		
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>