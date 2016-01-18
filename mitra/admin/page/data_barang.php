<div class="col-1">
<div class="box-title"><h1>Data Barang::</h1></div>
<div class="m-top">
<ul>
	<li><a href="?redirect=add_barang" class="add">Tambah Barang</a></li>
	<li><a href="?redirect=kategori" class="ktg"> Data Kategori (<?php get_row_ktg(); ?>)</a></li>
</ul>
</div>
<table class="tab">
	<tr class="tr-h">
		<th>No</th>
		<th class="head-name">Nama Barang</td>
		<th>Kategori</td>
		<th>Harga</td>
		<th>Stok</td>
		<th colspan="2">Pilihan</td>
	</tr>
<?php get_barang(); ?>
</table>
</div>


