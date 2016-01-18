<div class="small-col">
	<div class="big-logo">
	<a href="index.php"><img src="./img/site/logo.png" alt="MitraCollection.com" title="MitraCollection.com"></a>
	</div>
	<?php $sql_kategori=data_kategori(); ?>
	<div class="sosial">
	<b>Ikuti Kami:</b>
	<div class="sosial-list">
	<a href="http://www.twitter.com" target="_blank"><img src="./img/site/twitter.png" title="twitter"></a>
	<a href="http://www.facebook.com" target="_blank"><img src="./img/site/facebook.png" title="facebook"></a>
	<a href="http://www.path.com"target="_blank"><img src="./img/site/paath.png" title="path"></a>
	<a href="http://www.instagram.com" target="_blank"><img src="./img/site/instagram.png" title="instagram"></a>
	</div>
	</div>
	<div class="side">
	<?php if(!@$_SESSION['member']){ ?>
	<div class="box-produk">
	<a href="?url=bantuan"><img src="./img/site/cara_belanja.png"></a>
	</div>
	
	<div class="h-b"><b>Kategori</b></div>
	<div class="box-produk">
	<?php 
	while($data=mysql_fetch_array($sql_kategori)){
		$sqlc=mysql_query("SELECT*FROM barang WHERE id_kategori=$data[id_kategori]");
		$hitung=mysql_num_rows($sqlc);
	?>
	<ul>
	<li><a href="?url=kategori&id=<?php echo $data['id_kategori']; ?>">-<?php echo $data['nama_kategori']; ?>
	&nbsp;<?php echo $hitung?></a>
	</ul>
	<?php } ?>
	</div>
	
	<div class="h-b"><b>Dukungan Pengiriman</b></div>
	<div class="box-produk">
	<img src="./img/site/jne-tiki.jpg">
	</div>
	
	<?php } else{
	$result_user=sql_user(); 
	?>
	<div class="box-profile">
	<div class="h-p">Profile Member</div>
	<center><img src="./img/user/<?php echo $result_user['profile']; ?>"></center>
		<div class="p-name">
		<h1>Nama : <?php echo $result_user['nama'] ?></h1>
		<h2><a class="active" href='?url=keranjang'>Keranjang Belanja : <?php cek_chart();?> Item(s)</a></h2>
		<h2><a href='?url=profile'>Verifikasi Pembayaran : <?php cek_konfirmasi(); ?></a></h2>
		</div>
	</div>
	
	<div class="box-produk">
	<a href="?url=bantuan"><b><img src="./img/site/cara_belanja.png"></b></a>
	</div>
	
	<div class="h-b"><b>Kategori</b></div>
	<div class="box-produk">
	<?php while($data=mysql_fetch_array($sql_kategori)){
		$sqlc=mysql_query("SELECT*FROM barang WHERE id_kategori=$data[id_kategori]");
		$hitung=mysql_num_rows($sqlc);
	?>
	<ul>
	<li><a href="?url=kategori&id=<?php echo $data['id_kategori']; ?>">-<?php echo $data['nama_kategori']; ?>
	(<?php echo $hitung?>)</a>
	</ul>
	<?php } ?>
	</div>	
	
		
	<div class="h-b"><b>Dukungan Pengiriman</b></div>
	<div class="box-produk">
	<img src="./img/site/jne-tiki.jpg">
	</div>
	
	<?php } ?>
	<div class="h-b"><b>Verifikasi By:</b></div>
	<div class="box-produk">
	<a href="http://www.polisionline.com/" target="_blank"><img src="./img/site/polisi_online.png"></a>
	</div>
	</div>
</div>