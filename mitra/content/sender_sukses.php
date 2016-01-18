<div class="container">
<div class="col-1">
<?php include"./content/side.php"; ?>
<div class="big-col">
<div class="banner">
<a href=""><img src="./img/site/banner2.png" alt="MitraCollection.com" title="MitraCollection.com"></a>
</div>
<div class="produk-title">
<h1>Verifikasi Telah Di Kirim</h1>
</div>
<?php 
$kode=$_GET['kode'];
?>
<div class="list-p">
<div class="notic">
<center><h1>Verifikasi Dengan Kode <?php echo $kode ?> Telah Berhasil</h1></center>
<p>
	Mohon di tunggu verifikasi yang sudah di respon akan secara otomatis 
	hilang dari data verifikasi di akun anda.
	Jika Data belum juga di respon harap Hubung Admin Webiste <a href="?url=contat_us">Hubungi</a>
</p>

</div>
<div class="list-btn">
<a href="?url=profile"><button class="bt-next">Selsai Verifikasi</button></a>
</div>
</div>
</div>
</div>
<!--end container !-->
</div>