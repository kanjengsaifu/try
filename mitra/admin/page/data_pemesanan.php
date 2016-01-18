<div class="col-1">
<table class="tab">
<div class="box-title"><h1>Pesanan Masuk</h1></div>
<div class="m-top">
<ul>
	<li><a href="?redirect=order_batal" class="w-con">Pemesanan Batal (<?php echo batal(); ?>)</a></li>
	<li><a href="?redirect=order_proses" class="w-con">Menunggu Konfirmasi (<?php echo cek_orderpro(); ?>)</a></li>
</ul>
</div>
<tr class="tr-h">
<th class="head-no">No</th>
<th>Kode Pesan</th>
<th>Tanggal Pesan</th>
<th>Jam Pesan</th>
<th>Status Pesan</th>
<th colspan="2">Option</th>
</tr>
<?php 
get_order();
?>
</table>
</div>