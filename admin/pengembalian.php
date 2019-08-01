<?php include 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Pengembalian</h3>
<br/>
<br/>

<?php 
$per_hal=5;
$jumlah_record=mysql_query("SELECT COUNT(*) from tb_pengembalian");
$jum=mysql_result($jumlah_record, 0);
$halaman=ceil($jum / $per_hal);
$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $per_hal;
?>
<div class="col-md-12">
	<table class="col-md-2">
		<tr>
			<td>Jumlah Record</td>		
			<td><?php echo $jum; ?></td>
		</tr>
		<tr>
			<td>Jumlah Halaman</td>	
			<td><?php echo $halaman; ?></td>
		</tr>
	</table>
	<a style="margin-bottom:10px" href="lap_pengembalian.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<form action="cari_pengembalian.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-2">Kode Pengembalian</th>
		<th class="col-md-2">Nama Mahasiswa</th>
		<th class="col-md-2">Judul Buku</th>
		<th class="col-md-2">Tanggal Pinjam</th>
		<th class="col-md-2">Tanggal Kembali</th>
		<th class="col-md-2">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from tb_pengembalian where kode_pengembalian like '$cari' or nama like '$cari' or judul_buku like '$cari'");
	}else{
		$brg=mysql_query("select * from tb_pengembalian limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['kode_pengembalian'] ?></td>
			<td><?php echo $b['nama'] ?></td>
			<td><?php echo $b['judul_buku'] ?></td>
			<td><?php echo $b['tanggal_pinjam'] ?></td>
			<td><?php echo $b['tanggal_kembali'] ?></td>
			<td>
				<a href="detail_pengembalian.php?kode_pengembalian=<?php echo $b['kode_pengembalian']; ?>" class="btn btn-info">Detail</a></td>
				<td><a href="edit_pengembalian.php?kode_pengembalian=<?php echo $b['kode_pengembalian']; ?>" class="btn btn-warning">Edit</a></td>
				<td><a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_pengembalian.php?kode_pengembalian=<?php echo $b['kode_pengembalian']; ?>' }" class="btn btn-danger">Hapus</a>
			</td>
		</tr>		
		<?php 
	}
	?>
	
</table>
<ul class="pagination">			
			<?php 
			for($x=1;$x<=$halaman;$x++){
				?>
				<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
				<?php
			}
			?>						
		</ul>
<!-- modal input -->



<?php 
include 'footer.php';

?>