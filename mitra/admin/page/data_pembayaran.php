<div class="col-1">
<table class="tab">
<div class="box-title"><h1>Pembayaran</h1></div>
<div class="m-top">
<ul>
	<li><a href="?redirect=order_batal" class="w-con">Pemesanan Batal (<?php echo batal(); ?>)</a></li>
	<li><a href="?redirect=order_proses" class="w-con">Menunggu Konfirmasi (<?php echo cek_orderpro(); ?>)</a></li>
</ul>
</div>
<tr class="tr-h">
<th class="head-no">No</th>
<th>Kode Pesan</th>
<th>Atas Nama</th>
<th>Nama Bank</th>
<th>No Rekening</th>
<th>Tgl Pembayaran</th>
<th>Bank Tujuan</th>
<th colspan="2">Option</th>
</tr>
<?php 
data_konfirmasi();
?>
</table>
</div>