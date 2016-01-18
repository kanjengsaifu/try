<div class="col-1">
<div class="box-title"><h1>Data Kategori</h1></div>
	<form action="./proses/proses.php?action=simpan_kategori" method="post" enctype="multipart/form-data">
	<table class="tab">
	<tr>
		<th class="th-ho">Add New Kategori</th>
		<th class="th-tx-ktg"><input type="text" class="text-in" name="nama"></th>
		<th class="sub-ktg"><input class="btn" class="submit" type="submit" value="Simpan Kategori" name="btn"></th>
		<th class="sub-ktg"></th>
	</tr>
	</table>
	</form>
	<table class="tab">
	<tr class="tr-h">
		<th class="head-no">No</th>
		<th>Nama Kategori</td>
		<th colspan="2">Pilihan</td>
	</tr>
<?php
$batas=10;
@$halaman=$_GET['halaman'];
if(empty($halaman)){
	$posisi=0;
	$halaman=1;
}else{
	$posisi=($halaman-1)*$batas;
}
$no=1;
$sql=mysql_query("SELECT * FROM kategori LIMIT $posisi,$batas");
while($data=mysql_fetch_array($sql)){
?>
	<tr class="tr-value">
		<td><?php echo $no; ?></td>
		<td class="val-name-ktg"><?php echo $data['nama_kategori']; ?></td>
		<td class="edit"><a href="?redirect=edit_ktg&id=<?php echo $data['id_kategori']; ?>">Edit</a></td>
		<td class="hapus"><a href="./proses/proses.php?action=hapus_kategori&id=<?php echo $data['id_kategori'] ?>">Hapus</a></td>
	</tr>
<?php $no++; }?>
	</table>
	<div class="paging">
<?php
$tampil=mysql_query("SELECT*FROM kategori ");
$jumlah_data=mysql_num_rows($tampil);
$jumlah_halaman=ceil($jumlah_data/$batas); 
?>
	<ul>
<?php if($halaman > 1){
		$prev= $halaman - 1;
		echo"<li><a href='index.php?redirect=barang&halaman=$prev'>Prev</a></li>";
	}else{
		echo"<li><a href='#'>Prev</a></li>";
	}
	for($i=1;$i<=$jumlah_halaman;$i++){
		if($i!=$halaman){
		echo"<li><a href='index.php?redirect=barang&halaman=$i'>$i</a></li>";
		}else{
		echo"<li><a href='#'>$i</a></li>";
		}
	}
	if($halaman < $jumlah_halaman){
		$next=$halaman+1;
		echo"<li><a href='index.php?redirect=barang&halaman=$next'>Next</a></li>";
	}else{
		echo"<li><a href='#'>Next</a></li>";
	}
	?>
	</ul>
	</div>
</div>

