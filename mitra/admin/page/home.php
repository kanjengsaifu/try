<div class="col-1">
<div class="box-title"><img src="../img/site/ds-ic.png"><h1>DASHBOARD</h1></div>
<div class="box-kiri">
<div class="col-m">
<a href="?redirect=order" title="Order Masuk">
<button class="col-m-btn-orin"></button>
<center>Order Masuk <?php masuk(); ?></center>
</a>
</div>
<div class="col-m">
<a href="?redirect=order_batal"  title="Order Batal">
<button class="col-m-btn-batal"></button>
<center>Order Batal <?php batal(); ?></center>
</a>
</div>
<div class="col-m">
<a href="?redirect=order_proses" title="Menunggu Konfirmasi">
<button class="col-m-btn-tunggu"></button>
<center>Order Menunggu (<?php echo cek_orderpro(); ?>)</center>
</a>
</div>
<div class="col-m">
<a href="?redirect=pembayaran" title="Konfirmasi Pembayaran">
<button class="col-m-btn-konfirmasi"></button>
<center>Konfirmasi(<?php cek_pembayaran(); ?>)</center>
</a>
</div>
<div class="h-tesmo">
<img src="../img/site/msg.png"><b>Message:</b>
</div>
<div class="col-tesmo">
<?php
$sql=get_pesan_member();
$cek_messeage=mysql_num_rows($sql);
if($cek_messeage==0){
	echo"<div class=bx-msg><center>Tidak ada Pesan Masuk</center></div>";
}else{ ?>
<?php 
while($data=mysql_fetch_array($sql)){
?>
	<div class="bx-msg"><b><?php echo $data['nama']; ?>:</b>&nbsp;<?php echo $data['pesan']; ?></div>
<?php } }?>
</div>
</div>

<div class="box-kanan">
<div class="h-admin">SELAMAT DATANG:<?php echo $admin_data['nama_lengkap']; ?></div>
<div class="pic-admin">
<img src="../img/user/<?php echo $admin_data['profile']; ?>">
</div>
<div class="bio-admin">
<table>
<tr>
<th>Nama</th>
<th>:</th>
<th><?php echo $admin_data['nama_lengkap']; ?></th>
</tr>
<tr>
<th>Kontak</th>
<th>:</th>
<th><?php echo $admin_data['kontak']; ?></th>
</tr>
</table>
</div>
<div class="bt-admin">
<a href="?redirect=edit_admin"><button class="btn">EDIT</button></a>
<a href="?redirect=rekrut_admin"><button class="btn">REKRUT ADMIN</button></a></div>
</div>

</div>