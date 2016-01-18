<div class="container">
<div class="col-1">
<?php include"./content/side.php"; ?>
<div class="big-col">
<div class="banner">
<a href=""><img src="./img/site/banner2.png" alt="MitraCollection.com" title="MitraCollection.com"></a>
</div>
<div class="produk-title">
<h1>Profile: <?php echo $result_user['nama']; ?></h1>
</div>
<div class="list-p">
<div class="box-akun">
	<div class="b-h">DETAIL AKUN ANDA</div>
	<div class="b-n">Nama : <?php echo $result_user['nama']; ?></div>
	<div class="b-n">Jenis Kelamin : <?php echo $result_user['jenis_kelamin']; ?></div>
	<div class="b-n">No Tlp : <?php echo $result_user['no_tlp']; ?></div>
	<div class="b-n">Email : <?php echo $result_user['email']; ?></div>
<div class="b-l">
	<a href="?url=edit&id=<?php echo $_SESSION['member']; ?>">Edit Akun</a> 
	<a href="?url=upload_pic&id=<?php echo $_SESSION['member']; ?>">Upload Foto Profile</a>
	<a href="?url=ubah_password">Ubah Password</a>
</div>
</div>
</div>

<div class="list-p">
<div class="box-akun">
	<div class="b-h">DATA PEMESANAN</div>
	<table class="tb">
	<tr class="tr-h">
	<th>No</th>
	<th>Kode Pemesanan</th>
	<th>Tgl Pemesanan</th>
	<th>Jam Pemesanan</th>
	<th>Option</th>
	</tr>
	<?php 
	$sql=get_datakonfirmasi();
	?>
	</table>
</div>
</div>

</div>
</div>
<!--end container !-->
</div>