<div class="container">
<div class="col-1">
<?php include"./content/side.php"; ?>
<div class="big-col">
<div class="banner">
<a href=""><img src="./img/site/banner2.png" alt="MitraCollection.com" title="MitraCollection.com"></a>
</div>
<div class="produk-title">
<h1>Semua Produk Kami </h1>
</div>
<?php all_product();?>
</div>
</div>
<div class="list-p">
<div class="h-b"><h1>PRODUK TERBARU KAMI</h1></div>
<div class="bg-p">
<?php
$sql=get_lastproduct();
while($data=mysql_fetch_array($sql)){ ?>
<div class="col-pb"><a href="?url=more&id=<?php echo $data['id_barang']; ?>">
<center><img src="./img/product/<?php echo $data['gambar']; ?>"></center></a></div>	 
<?php }?>
</div>
</div>
<!--end container !-->
</div>