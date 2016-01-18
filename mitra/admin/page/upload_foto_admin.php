<div class="col-1">
<div class="box-title"><h1>Profile Admin</h1></div>
<?php
if(isset($_POST['upload'])){
	upload_foto();
}
?>
<form  action="?redirect=foto_admin" method="post" enctype="multipart/form-data">
<table class="tab-in">
<tr>
<th class="th-h"><img src="../img/user/<?php echo $admin_data['profile'];?>"></th>
</tr>
<tr>
<th class="th-v"><input type="file" name="gambar"></th>
</tr>
</table>
<div class="list-sub">
<div class="list-button"><input type="submit" name="upload" value="Upload"></th></div>
</div>
</form>
</div>