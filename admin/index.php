<?php 
include 'header.php';
?>

<?php
$a = mysql_query("select * from tb_buku");
?>

<div class="col-md-10">
	<h3>Selamat datang</h3>	
    <h3>Aplikasi Perpustakaan Mts Al Manar Sempol Malang</h3>
</div>
<!-- kalender -->
<div class="pull-right">
	<div id="kalender"></div>
</div>

<?php 
include 'footer.php';

?>