<?php
$id=$_GET['id'];
if(empty($_GET['id'])){
	header('location:index.php');
}else{
?>	
<div class="container">
<div class="col-1">
<?php include"./content/side.php"; ?>
<div class="big-col">
<div class="banner">
<a href=""><img src="./img/site/banner2.png" alt="MitraCollection.com" title="MitraCollection.com"></a>
</div>
<div class="produk-title">
<h1>Masukan Alamat Pengiriman Barang</h1>
</div>
<?php

	$member_data=get_memberp();
	$kode_pesan= get_kodep();
?>
<?php 
get_notic();
?>	
<div class="list-p">
	<div class="notic">
	<b>NOTE ::</b><br>
	ALAMAT KIRIM WAJIB DIISI SEBELUM MENYELESAIKAN PESANAN
	<br>
	PASTIKAN ANDA MENULIS ALAMAT KIRIM DENGAN BENAR & MELAKUKAN 
	<br>
	KONFIRMASI PEMBAYARAN SEBELUM JATUH TEMPO
	<br>
	JIKA ANDA BELUM MELAKUKAN KONFIRMASI PEMBAYARAN SETELAH 3 HARI PEMESANAN
	<br>
	MAKA PESANAN ANDA AKAN KAMI ANGGAP BATAL & DATA PEMESANAN ANDA AKAN KAMI HAPUS. 
	<br>
	Terimakasih.
	<br>
	Regards<br> 
	<a href="#">admin@mitracc.co.id</a>
	</div>
</div>
<div class="list-p">
<div class="box-h">
	<div class="text-name">Nama</div><div class="text-filed"><?php echo $member_data['nama']; ?></div>
	<div class="text-name">No Pemesanan</div><div class="text-filed"><?php echo $kode_pesan['kode_p']; ?></div>
	<div class="text-name">Tanggal Pesan</div><div class="text-filed"><?php echo $member_data['date']; ?></div>
	<div class="text-name">Jam Pesan</div><div class="text-filed"><?php echo $member_data['time']; ?></div>
</div>
<div class="box-h">
<form action="?url=save_addres&hot_key=<?php echo md5($_SESSION['member']); ?>" method="post">
<input type="hidden" name="id_pesan" value="<?php echo $id; ?>">
<div class="name-filed">Alamat Kirim:</div>
<div><input type="text" placeholder="Nama Penerima" name="nama" class="in"></div>
<div class="name-filed"></div>
<div><input type="text" placeholder="Nomor Telp" name="kontak" class="in"></div>
<div class="name-filed"></div>
<div><textarea name="alamat" class="text-area" placeholder="Alamat Kirim..."></textarea></div>
</div>
</div>
<div class="list-p">
<input type="submit" class="bt-next" value="Selesai Belanja" name="btsub">
</form>
</div>
</div>
</div>
<!--end container !-->
</div>	
<?php } ?>