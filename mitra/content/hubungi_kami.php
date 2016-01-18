<div class="container">
<div class="col-1">
<?php include"./content/side.php"; ?>
<div class="big-col">
<div class="banner">
<a href=""><img src="./img/site/banner2.png" alt="MitraCollection.com" title="MitraCollection.com"></a>
</div>
<div class="produk-title">
<h1>Contat Us</h1> 
</div>
<?php 
if(isset($_POST['con'])){
	send_hubungi();
}
?>
<div class="list-p">
<div class="f-master">
<div class="bg-f">
<div class="b-h">FORM CONTAC US::</div>
<form action="<?php echo htmlspecialchars('index.php?url=contat_us');?>" method="post">
	<div class="f-name">Nama Lengkap :</div><div class="f-in"><input class="in" type="text" name="nama"></div>
	<div class="f-name">Email :</div><div class="f-in"><input class="in" type="text" name="email"></div>
	<div class="f-name">Pesan :</div><div class="f-in"><textarea name="pesan" class="tex-a"></textarea></div>
	<div class="f-btn"><input class="btn-sub"type="submit" class="btn-reg" name="con" value="Kirim"></div>
</form>
</div>
</div>
</div>
</div>
</div>
<!--end container !-->
</div>