<div class="container">
<div class="col-1">
<?php include"./content/side.php"; ?>
<div class="big-col">
<div class="banner">
<a href=""><img src="./img/site/banner2.png" alt="MitraCollection.com" title="MitraCollection.com"></a>
</div>
<div class="produk-title">
<h1>Edit Akun : <?php echo $result_user['nama']; ?></h1>
</div>
<?php
if(isset($_POST['up'])){
	update_password();
} 
?>
<div class="list-p">
<div class="f-master">
<div class="bg-f">
<form action="?url=ubah_password" method="post">
<div class="b-h">FORM UBAH PASSWORD</div>
<div class="f-name">Password Lama</div><div class="f-in"><input class="in" type="password" name="pl"></div>
<input type="hidden" name="id" value="<?php echo $result_user['id_member']; ?>">
<div class="f-name">Passwod Baru</div><div class="f-in"><input class="in" type="password" name="pb"></div>
<div class="f-btn"><input class="btn-sub" type="submit" value="Update" name="up"></div>
</form>
</div>
</div>

</div>
</div>
<!--end container !-->
</div>