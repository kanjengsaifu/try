<div class="container">
<div class="col-1">
<?php include"./content/side.php"; ?>
<div class="big-col">
<div class="banner">
<a href=""><img src="./img/site/banner2.png" alt="MitraCollection.com" title="MitraCollection.com"></a>
</div>
<div class="produk-title">
<?php @$key=$_POST['key']; ?>
<h1>Hasil Pencarian dengan  keyword : <?php echo $key ?></h1>
</div>

<div class="list-p">
<?php
if($key==""){
 echo"<div class=error>Kata kunci tidak terkait dengan data di website ini</div>";
}else{
	find_search();
} 
?>
</div>

</div>
</div>
<!--end container !-->
</div>