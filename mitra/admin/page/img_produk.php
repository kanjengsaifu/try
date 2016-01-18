<div class="col-1">
<?php 
$id=mysql_real_escape_string($_GET['id']);
if(!$id){
	echo"<div>Data Tidak Di Temukan</div>";
}else{
$sql=mysql_query("SELECT* FROM barang WHERE id_barang='$id'");
while($data=mysql_fetch_array($sql)){	
?>
<table class="tab-in">
<tr>
<th><center><img src="../img/product/<?php echo $data['gambar']; ?>"></center></th>
</tr>
<form action="./proses/proses.php?action=ubah_gambar" enctype="multipart/form-data"  method="post">
<input type="hidden" name="id" value="<?php echo $data['id_barang']; ?>">
<tr>
<th class="th-v"><input type="file" name="gambar" ></th>
</tr>
<tr>
<th class="th-v"><input class="btn" type="submit" value="Upload"></th>
</tr>
</form>
</table>
<?php } }?>
</div>