<?php 
include 'header.php';
?>

<h3><span class="glyphicon glyphicon-briefcase"></span> Pengembalian</h3>
<a class="btn" href="pengembalian.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>

<?php
$kode_pengembalian=mysql_real_escape_string($_GET['kode_pengembalian']);

$det=mysql_query("select * from tb_pengembalian where kode_pengembalian='$kode_pengembalian'")or die(mysql_error());
while($d=mysql_fetch_array($det)){
	?>					
	<form action="update_pengembalian.php" method="post">
		<table class="table">
			<tr>
				<td></td>
				<td><input type="hidden" name="kode_pengembalian" value="<?php echo $d['kode_pengembalian'] ?>"></td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>
					<select class="form-control" name="nama">
						<?php 
						$brg=mysql_query("select * from tb_pengembalian");
						while($b=mysql_fetch_array($brg)){
							?>	
							<option <?php if($d['nama']==$b['nama']){echo "selected"; } ?> value="<?php echo $b['nama']; ?>"><?php echo $b['nama'] ?></option>
							<?php 
						}
						?>
					</select>
				</td>
			</tr>	
			<tr>
				<td>Judul Buku</td>
				<td>
					<select class="form-control" name="judul_buku">
						<?php 
						$brg=mysql_query("select * from tb_buku");
						while($b=mysql_fetch_array($brg)){
							?>	
							<option <?php if($d['judul_buku']==$b['judul_buku']){echo "selected"; } ?> value="<?php echo $b['judul_buku']; ?>"><?php echo $b['judul_buku'] ?></option>
							<?php 
						}
						?>
					</select>
				</td>
			</tr>	

			<tr>
				<td>Tanggal Pinjam</td>
				<td><input type="date" class="form-control" name="tanggal_pinjam" value="<?php echo $d['tanggal_pinjam'] ?>"></td>
			</tr>
			<tr>
				<td>Tanggal Kembali</td>
				<td><input type="date" class="form-control" name="tanggal_kembali" value="<?php echo $d['tanggal_kembali'] ?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" class="btn btn-info" value="Simpan"></td>
			</tr>
		</table>
	</form>
	<?php 
}
?>
 <script type="text/javascript">
        $(document).ready(function(){

            $('#tgl').datepicker({dateFormat: 'yy/mm/dd'});

        });
    </script>
<?php 
include 'footer.php';

?>