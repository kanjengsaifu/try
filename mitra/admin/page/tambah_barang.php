<div class="col-1">
<div class="box-title"><h1>Tambah Data Barang</h1></div>
<form action="./proses/proses.php?action=simpan_barang" method="post" enctype="multipart/form-data" onsubmit="return check_login_form()">
	<table class="tab-in">
	<tr>
		<th class="th-ho">Nama Barang</th><td class="td-in"><input type="text" class="text-in" name="nama"></td>
	</tr>
	<tr>
		<th class="th-ho">Harga Barang</th><td><input class="text-in" type="text" name="harga"></td>
	</tr>
	<tr>
		<th class="th-ho">Jumlah Barang</th><td><input class="text-in" type="text" name="jumlah"></td>
	</tr>
	<tr>
		<th class="th-ho">Kategori</th><td><select name="kategori" class="select">
		<option value="">Pilih</option>
		<?php get_kategori(); ?>
		</select></td>
	</tr>
	<tr>
		<th class="th-ho">Keterangan</th><td><textarea class="text-area" name="ket"></textarea></td>
	</tr>
	<tr>
		<th class="th-ho">Gambar</th><td><input class="fl" class="filein" type="file" name="gambar">&nbsp; Ukuran gambar :150px x 200px </td>
	</tr>
	</table>
	<div class="list-sub">
	<div class="list-button"><input class="btn" type="submit" value="Simpan Barang" name="btn"></div>
	<div class="list-button"><input class="btn" type="reset" value="Batalkan" name="btn"></div>
	</div>
</form>
</div>