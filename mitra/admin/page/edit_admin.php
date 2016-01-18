<?php
$sql=edit_admin(); 
?>
<div class="col-1">
<div class="box-title">
<h1>EDIT ADMIN</h1>
</div>
<?php
if(isset($_POST['update'])){
	update_admin();
} 
?>
<form  action="?redirect=edit_admin" method="post">
<table class="tab-in">
<?php
while($data=mysql_fetch_array($sql)){ ?>
<tr>
<th class="th-ho">Nama</th>
<th class="th-v"><input class="text-in" type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>"></th>
</tr>
<tr>
<th class="th-ho">User Name</th>
<th class="th-v"><input class="text-in" type="text" name="user" value="<?php echo $data['user_name']; ?>"></th>
</tr>
<tr>
<th class="th-ho">Kontak</th>
<th class="th-v"><input class="text-in" type="text" name="kontak" value="<?php echo $data['kontak']; ?>"></th>
</tr>
<tr>
<th class="th-ho">Ubah Password</th>
<th class="th-v"><a href="?redirect=ubah_password">Ubah</a></th>
</tr>
<tr>
<th class="th-ho">Tambah Foto</th>
<th class="th-v"><a href="?redirect=foto_admin">Upload</a></th>
</tr>
<?php }?>
</table>
<div class="list-sub">
<div class="list-button"><input class="btn" type="submit" name="update" value="Update"></th></div>
</div>
</form>
</div>