<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Detail Pengembalian</h3>
<a class="btn" href="mahasiswa.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$kode_pengembalian=mysql_real_escape_string($_GET['kode_pengembalian']);


$det=mysql_query("select * from tb_pengembalian where kode_pengembalian='$kode_pengembalian'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<table class="table">
		<tr>
			<td>Kode Pengembalian</td>
			<td><?php echo $d['kode_pengembalian'] ?></td>
		</tr>
		<tr>
			<td>Nama Mahasiswa</td>
			<td><?php echo $d['nama'] ?></td>
		</tr>
		<tr>
			<td>Judul Buku</td>
			<td><?php echo $d['judul_buku'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Pinjam</td>
			<td><?php echo $d['tanggal_pinjam'] ?></td>
		</tr>
		<tr>
			<td>Tanggal Kembali</td>
			<td><?php echo $d['tanggal_kembali'] ?></td>
		</tr>
	</table>
	<?php 
}
?>
<?php include 'footer.php'; ?>