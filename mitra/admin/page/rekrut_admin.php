<div class="col-1">
<div class="box-title">Rekrut Admin</div>
<?php
if(isset($_POST['simpan'])){
	simpan_admin();
}
?>
<form  action="?redirect=rekrut_admin" method="post">
<table class="tab-in">
<tr>
<th class="th-ho">Nama</th>
<th class="th-v"><input class="text-in" type="text" name="nama_lengkap"></th>
</tr>
<tr>
<th class="th-ho">User Name</th>
<th class="th-v"><input class="text-in" type="text" name="user"></th>
</tr>
<tr>
<th class="th-ho">Kontak</th>
<th class="th-v"><input class="text-in" type="text" name="kontak"></th>
</tr>
<tr>
<th class="th-ho">Password</th>
<th class="th-v"><input class="text-in" type="password" name="password"></th>
</tr>
</table>
<div class="list-sub">
<div class="list-button"><input class="btn" type="submit" name="simpan" value="Simpan"></th></div>
</div>
</form>
</div>