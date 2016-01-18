<div class="col-1">
<div class="box-title"><h1>Ubah Password</h1></div>
<?php
if(isset($_POST['simpan'])){
	ubah_password();
}
?>
<form  action="?redirect=ubah_password" method="post">
<table class="tab-in">
<tr>
<th class="th-h">Masukan Password Lama</th>
<th class="th-v"><input class="text-in" type="password" name="ps_lama"></th>
</tr>
<tr>
<th class="th-h">Masukan Password Baru</th>
<th class="th-v"><input class="text-in" type="password" name="ps_baru"></th>
</tr>
</table>
<div class="list-sub">
<div class="list-button"><input type="submit" name="simpan" value="Simpan"></th></div>
</div>
</form>
</div>