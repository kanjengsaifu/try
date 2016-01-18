<div class="container">
<div class="col-1">
<?php include"./content/side.php"; ?>
<div class="big-col">
<div class="produk-title">
<h1>Detail Pesanan Anda </h1>
</div>
<?php 
$member=get_memberp();
$kode_pesan= get_kodep();
$detai_pesan=get_detailp();
$alamat_kirim=get_alamatkirim();
?>
<div class="list-p">
	<div class="head_list">
	<img src="./img/site/logo.png">
	<div class="head-text">
	<b>No Pemesanan: <?php echo $kode_pesan['kode_p']; ?></b>
	<p>Tgl Pemesanan: <?php echo $member['date']; ?></p>
	<p>Jam Pemesanan: <?php echo $member['time']; ?></p>
	</div>
	</div>
</div>
<div class="list-p">
<div class="b-h">Data Member</div>
<table class="tb-h">
<tr>
<th class="th-h">Nama Member</th>
<th class="th-h">:</th>
<th class="th-v"><?php echo $member['nama']; ?></th>
</tr>
<tr>
<th class="th-h">Kontak</th>
<th class="th-h">:</th>
<th class="th-v"><?php echo $member['no_tlp']; ?></th>
</tr>
<tr>
<th class="th-h">Jenis Kelamin</th>
<th class="th-h">:</th>
<th class="th-v"><?php echo $member['jenis_kelamin']; ?></th>
</tr>
</table>
</div>

<div class="list-p">
<div class="b-h">Detail Barang</div>
<table class="tb-d">
<tr class="tr-d">
<th>No</th>
<th>Nama Barang</th>
<th>Harga Barang</th>
<th>Jumbel</th>
<th>Subtotal</th>
</tr>
<?php 
$no=0;
while($data=mysql_fetch_array($detai_pesan)){
$no++;
@$sub=$data['jumbel']*$data['harga'];
@$grand+=$sub;
?>
<tr class="tr-v">
<td><?php echo $no; ?></td>
<td><?php echo $data['nama_barang']; ?></td>
<td><?php echo rupiah($data['harga']); ?></td>
<td><?php echo $data['jumbel']; ?></td>
<td><?php echo rupiah($sub); ?></td>
</tr>
<?php  } ?>
<tr class="tr-grand">
<th colspan="5">Grand Total : <?php echo rupiah(@$grand); ?></th>
</tr>
</table>
</div>
<div class="list-p">
<div class="b-h">ALamat Kirim</div>
<table class="tb-h">
<tr>
<th class="th-h">Atas Nama</th>
<th class="th-h">:</th>
<th class="th-v"><?php echo $alamat_kirim['atas_nama']; ?></th>
</tr>
<tr>
<th class="th-h">Kontak</th>
<th class="th-h">:</th>
<th class="th-v"><?php echo $alamat_kirim['kontak']; ?></th>
</tr>
<tr>
<th class="th-h">ALamat Kirim</th>
<th class="th-h">:</th>
<th class="th-v"><?php echo $alamat_kirim['alamat_kirim']; ?></th>
</tr>
</table>
</div>
<div class="list-p">
<div><a href="./cetak.php" target="_blank"><img src="./img/site/cetak.png" title="Cetak"></a></div>
</div>
</div>
</div>
<!--end container !-->
</div>