<div class="col-1">
<?php 
@$id=mysql_real_escape_string($_GET['id']);
$sql=mysql_query("SELECT*FROM kategori WHERE id_kategori='$id'");
if(!$id){
	echo"<div>Data Tidak Ditemukan</div>";
}else{
	while($data=mysql_fetch_array($sql)){ ?>
	<table class="tab-in">
	<tr>
	<th class="th-ho">Edit Kategori</th>
	<form action="./proses/proses.php?action=ubah_kategori" method="post">
	<input type="hidden" name="id" value="<?php echo $data['id_kategori']; ?>">
	<th class="td-in"><input class="text-in" type="text" name="nama_kategori" value="<?php echo $data['nama_kategori']; ?>"></th>
	</tr>
	<tr>
	<th><input class="btn"type="submit" value="Ubah Katerori"></th>
	</tr>
	</form>
	</table>
<?php	} 
}?>
</div>