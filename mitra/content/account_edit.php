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
	pro_edit();
}
?>
<div class="list-p">
<div class="f-master">
<div class="bg-f">
<!--?url=go_edit!-->
<form action="" method="post">
<div class="b-h">FORM EDIT AKUN</div>
<div class="f-name">Nama</div><div class="f-in"><input class="in" type="text" name="nama" value="<?php echo $result_user['nama']; ?>"></div>
<div class="f-name">Jenis Kelamin</div><div class="f-in"><select name="jk" class="">
<option value="<?php echo $result_user['jenis_kelamin']; ?>">-Pilih-</option>
<option value="Perempuan">Perempuan</option>
<option value="Laki-laki">Laki-laki</option>
</select></div>
<input type="hidden" name="id" value="<?php echo $result_user['id_member']; ?>">
<div class="f-name">No Tlp </div><div class="f-in"><input class="in" type="text" name="kontak" value="<?php echo $result_user['no_tlp']; ?>"></div>
<div class="f-name">Email </div><div class="f-in"><input class="in" type="text" name="email" value="<?php echo $result_user['email']; ?>"  disabled></div>
<div class="f-btn"><input class="btn-sub" type="submit" value="Update" name="up"></div>
</form>
</div>
</div>

</div>
</div>
<!--end container !-->
</div>