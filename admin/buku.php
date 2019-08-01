<?php require_once 'header.php'; ?>

<h3><span class="glyphicon glyphicon-briefcase"></span>  Data Buku</h3>
<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2"><span class="glyphicon glyphicon-plus"></span>Tambah Buku</button>
<br/>
<br/>

<?php 
$periksa=mysql_query("select * from tb_buku where stok <=3");
while($q=mysql_fetch_array($periksa)){	
	if($q['stok']<=3){	
		?>	
		<script>
			$(document).ready(function(){
				$('#pesan_sedia').css("color","red");
				$('#pesan_sedia').append("<span class='glyphicon glyphicon-asterisk'></span>");
			});
		</script>
		<?php
		echo "<div style='padding:5px' class='alert alert-warning'><span class='glyphicon glyphicon-info-sign'></span> Stok  <a style='color:red'>". $q['judul_buku']."</a> yang tersisa sudah kurang dari 3 . Anda bisa menambah jumlah buku !!</div>";	
	}
}
?>
<?php 
$per_hal=5;
$jumlah_record=mysql_query("SELECT COUNT(*) from tb_buku");
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
	<a style="margin-bottom:10px" href="lap_buku.php" target="_blank" class="btn btn-default pull-right"><span class='glyphicon glyphicon-print'></span>  Cetak</a>
</div>
<form action="cari_act.php" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari barang di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<table class="table table-hover">
	<tr>
		<th class="col-md-1">No</th>
		<th class="col-md-1">Kode Buku</th>
		<th class="col-md-3">Judul Buku</th>
		<th class="col-md-3">Tanggal Terbit</th>
		<th class="col-md-2">Pengarang</th>
		<th class="col-md-2">Jumlah Tersedia</th>
		<!-- <th class="col-md-1">Sisa</th>		 -->
		<th class="col-md-4">Opsi</th>
	</tr>
	<?php 
	if(isset($_GET['cari'])){
		$cari=mysql_real_escape_string($_GET['cari']);
		$brg=mysql_query("select * from tb_buku where judul_buku like '$cari' or pengarang like '$cari'");
	}else{
		$brg=mysql_query("select * from tb_buku limit $start, $per_hal");
	}
	$no=1;
	while($b=mysql_fetch_array($brg)){

		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $b['kode_buku'] ?></td>
			<td><?php echo $b['judul_buku'] ?></td>
			<td><?php echo $b['tanggal_terbit'] ?></td>
			<td><?php echo $b['pengarang'] ?></td>
			<td><?php echo $b['stok'] ?></td>
			<td>
				<a href="detail_buku.php?kode_buku=<?php echo $b['kode_buku']; ?>" class="btn btn-info">Detail</a></td>
				<td><a href="edit_buku.php?kode_buku=<?php echo $b['kode_buku']; ?>" class="btn btn-warning">Edit</a></td>
				<td><a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_buku.php?kode_buku=<?php echo $b['kode_buku']; ?>' }" class="btn btn-danger">Hapus</a>
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
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Buku Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tambah_buku.php" method="post">
					<div class="form-group">
						<label>Judul Buku</label>
						<input name="judul_buku" type="text" class="form-control" placeholder="Judul Buku..">
					</div>
					<div class="form-group">
						<label>Tanggal Terbit</label>
						<input name="tanggal_terbit" type="date" class="form-control" placeholder="Tanggal terbit ..">
					</div>
					<div class="form-group">
						<label>Pengarang</label>
						<input name="pengarang" type="text" class="form-control" placeholder="Pengarang ..">
					</div>
					<div class="form-group">
						<label>Stok</label>
						<input name="stok" type="text" class="form-control" placeholder="Stok ..">
					</div>																	

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>



<?php 
include 'footer.php';

?>