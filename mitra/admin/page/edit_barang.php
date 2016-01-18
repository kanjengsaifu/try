<?php 
$id=mysql_real_escape_string($_GET['id']);
		$sql=mysql_query("SELECT barang.id_barang
		,barang.id_kategori
		,barang.nama_barang
		,barang.harga
		,barang.jumlah
		,barang.keterangan
		,barang.gambar
		,kategori.id_kategori
		,kategori.nama_kategori
		FROM barang INNER JOIN kategori ON barang.id_kategori=kategori.id_kategori WHERE barang.id_barang='$id'");
while($data=mysql_fetch_array($sql)){
?>
<div class="col-1">
<div class="box-title"><h1>Edit Data Barang</h1></div>
<form action="./proses/proses.php?action=edit_barang" method="post" enctype="multipart/form-data">
	<table class="tab-in">
	<tr>
		<th class="th-ho">Nama Barang</th><td class="td-in"><input type="text" class="text-in" value="<?php echo $data['nama_barang']; ?>" name="nama"></td>
	</tr>
	<tr>
		<th class="th-ho">Harga Barang</th><td><input class="text-in" type="text" value=" <?php echo $data['harga']; ?>"name="harga"></td>
	</tr>
	<tr>
		<th class="th-ho">Jumlah Barang</th><td><input class="text-in" type="text" value="<?php echo $data['jumlah']; ?>"name="jumlah"></td>
	</tr>
	<tr>
		<th class="th-ho">Kategori</th><td><select name="ktg" class="select">
		<option value="<?php echo $data['id_kategori']; ?>"><?php echo $data['nama_kategori']; ?></option>
		<?php get_kategori(); ?>
		</select></td>
	</tr>
	<input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
	<tr>
		<th class="th-ho">Keterangan</th><td><textarea class="text-area" name="ket"><?php echo $data['keterangan']; ?></textarea></td>
	</tr>
	<tr>
		<th class="th-ho">Gambar</th><td><a href="?redirect=img_p&id=<?php echo $data['id_barang']; ?>">UBAH GAMBAR PRODUK ?</a></td>
	</tr>
<?php } ?>
	</table>
	<div class="list-sub">
	<div class="list-button"><input class="btn" type="submit" value="Update" name="btn"></div>
	<div class="list-button"><input class="btn" type="submit" value="Cancel" name="btn"></div>
	</div>
</form>
</div>