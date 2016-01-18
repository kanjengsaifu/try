<div class="container">
<div class="col-1">
<?php include"./content/side.php"; ?>
<div class="big-col">
<div class="banner">
<a href=""><img src="./img/site/banner2.png" alt="MitraCollection.com" title="MitraCollection.com"></a>
</div>
<div class="produk-title">
<h1>Data Pemesanan : <?php echo $result_user['nama']; ?></h1>
</div>
<?php 
get_notic();
$kode=$_GET['kode'];
?>
<div class="list-p">
<form action="<?php echo htmlspecialchars('?url=kirim_konfirmasi');?>" method="post">
<div class="box-akun">
<div class="b-h">KONFIRMASI PEMBAYARAN::&nbsp;<b><?php echo $kode; ?></b></div>
<input type="hidden" name="kode" value="<?php echo $kode ?>">
</div>
<div class="f-master">
<div class="bg-f">
<div class="b-h">BANK ::</div>
	<div class="f-name">Nama Bank *</div><div class="f-in"><input class="in" type="text" name="nb"></div>
	<div class="f-name">Atas Nama *</div><div class="f-in"><input class="in" type="text" name="an"></div>
	<div class="f-name">No Rekening *</div><div class="f-in"><input class="in" type="text" name="nr"></div>
</div>
<div class="bg-f">
<div class="b-h">BANK TUJUAN ::</div>
	<div class="f-name">Nama Bank *</div><div class="f-in">
	<select name="bt">
	<option value="">Pilih</option>
	<option value="BCA-097361416">BCA-097361416</option>
	<option value="Mandiri-166134">Mandiri-166134</option>
	</select>
	</div>
	<div class="f-name">Tgl Pembayaran *</div><div class="f-in"><input class="in" type="date" name="tglb"> &nbsp;format:mm/dd/yy</div>
	<div class="f-name">Pesan</div><div class="f-in"><textarea placeholder="Pesan boleh di kosongkan.." class="tex-a" name="pesan"></textarea></div>
	<div class="f-btn"><input type="submit" class="btn-sub" name="bk" value="Kirim"></div>
	</form>
</div>
</div>

</div>
</div>
</div>
<!--end container !-->
</div>
