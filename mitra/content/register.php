<div class="container">
<div class="col-1">
<?php include"./content/side.php"; ?>
<div class="big-col">
<div class="banner">
<a href=""><img src="./img/site/banner2.png" alt="MitraCollection.com" title="MitraCollection.com"></a>
</div>
<div class="produk-title">
<h1>Daftar Akun:</h1> 
</div>
<?php 
if(isset($_POST['register'])){
	register(is_array($_POST));
}
?>
<div class="list-p">
<div class="f-master">
<div class="bg-f">
<div class="b-h">FORM PENDAFTARAN::</div>
<form action="<?php echo htmlspecialchars('index.php?url=reg');?>" method="post">
	<div class="f-name">Nama Lengkap :</div><div class="f-in"><input class="in" type="text" name="nama"></div>
	<div class="f-name">Jenis Kelamin:</div><div class="f-in"><input  type="radio" name="jk" value="Laki-laki">Laki-laki<input type="radio" name="jk" value="Perempuan">Perempuan</div>
	<div class="f-name">No Telepon :</div><div class="f-in"><input class="in" type="text" name="tlp"></div>
	<div class="f-name">Email :</div><div class="f-in"><input class="in" type="text" name="email"></div>
	<div class="f-name">Password :</div><div class="f-in"><input class="in" type="password" name="ps"></div>
	<div class="f-name">Ulangi Password :</div><div class="f-in"><input class="in" type="password" name="ps2"></div>
	<div class="f-btn"><input type="submit" class="btn-sub" name="register" value="Register"></div>
</form>
</div>
</div>
</div>
</div>
</div>
<!--end container !-->
</div>