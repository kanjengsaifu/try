<div class="container">
<div class="col-1">
<?php include"./content/side.php"; ?>
<div class="big-col">
<div class="banner">
<a href=""><img src="./img/site/banner2.png" alt="MitraCollection.com" title="MitraCollection.com"></a>
</div>
<div class="produk-title">
<h1>Keranjang Belanja: <?php echo $_SESSION['nama']; ?></h1>
</div>
<div class='list-p'>
<?php get_notic(); ?>
</div>
<?php
$query_cek=cek_status_keranjang();
$result=mysql_num_rows($query_cek);
if($result==0){
echo"<div class=list-p><div class=error>Keranjang Anda Kosong :: <a href=?url=all_product>Mulai Belanja?</a></div></div>";
}else{
?>
<div class='list-p'>
<a href="?url=all_product"><button  class="bt-back">Kembali Belanja</button></a>
</div>
<div class='list-p'>
<table class="tb-cart">
<tr>
<th class="head-no">No</th>
<th class="head-name">Nama Barang</th>
<th class="head-stok">Stok Barang</th>
<th class="head-jumbel">Jumbel</th>
<th class="head-harga">Harga</th>
<th class="head-sub">Subtotal</th>
<th colspan="2" class="head-act">Action</th>
</tr>
<?php
$result=keranjang();
$no=0;
$i=0;
while($data=mysql_fetch_array($result)){
$no++;
$sub=$data['jumbel']*$data['harga'];
$grand=$i+=$sub;
$count=mysql_num_rows($result);
 ?>
 <tr class="tr-val">
<td class="val-no"><?php echo $no ?></td>
<td class="val-nama"><?php echo $data['nama_barang']; ?></td>
<td class="val-stok"><?php echo $data['jumlah']; ?></td>
<form action="index.php?url=update_cart&token=<?php echo md5($_SESSION['member']); ?>" method="post">
<input type="hidden" value="<?php echo $count; ?>" name="count">
<td class="val-jumbel"><input class="in-jumbel" type="text" name="jumbel[]" value="<?php echo $data['jumbel']; ?>"></td>
<input type="hidden" name="id_barang[]" value="<?php echo $data['id_barang'];?>">
<input type="hidden" name="id_member[]" value="<?php echo $_SESSION['member'];?>">
<td class="val-harga"><?php echo rupiah($data['harga']); ?></td>
<td class="val-sub"><?php echo rupiah($sub); ?></td>
<td class="val-del"><a href="index.php?url=delete_cart&token=<?php echo md5(@$_SESSION['member']); ?>&id=<?php echo $data['id_barang']; ?>">Hapus</a></td>
</tr>
<?php } /*end while*/?>
<tr>
<th colspan="2" class="val-grand">Grand Total :<span class="red"><?php echo rupiah($grand); ?></span></th>
</tr>
</table>
</div>
<div class="list-p">
<div class="l-update""><input type="submit" class="bt-up" value="Update" name="update"></div>
</form>
<form action="index.php?url=finish&token=<?php echo md5($_SESSION['member']); ?>" method="post">
<?php
$count=mysql_num_rows($query_cek);
while($datend=mysql_fetch_array($query_cek)){ ?>
<input type="hidden" name="id_barang" value="<?php echo $datend['id_barang']; ?>">
<input type="hidden" name="id_member" value="<?php echo $_SESSION['member']; ?>">
<input type="hidden" name="nama_barang" value="<?php echo $datend['nama_barang']; ?>">
<input type="hidden" name="jumbel" value="<?php echo $datend['jumbel']; ?>">
<input type="hidden" name="harga" value="<?php echo $datend['harga']; ?>">
<?php }?>
<div class="l-finish"><input type="submit" class="bt-next" value="Next Step" name="bts"></div>
</form>
</div>
<?php } /*end if*/ ?>
</div>
<!--end container !-->
</div>