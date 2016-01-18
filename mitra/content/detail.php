<div class="container">
<div class="col-1">
<?php include"./content/side.php"; ?>
<div class="big-col">
<div class="banner">
<a href=""><img src="./img/site/banner2.png" alt="MitraCollection.com" title="MitraCollection.com"></a>
</div>
<div class="produk-title">
<h1>Detail Produk :: <?php echo get_title(mysql_real_escape_string(@$_GET['id'])); ?></h1>
</div>
<?php detail(mysql_real_escape_string(@$_GET['id']));?>
</div>
</div>
<!--end container !-->
</div>