<div class="container">
<div class="col-1">
<?php include"./content/side.php"; ?>
<div class="big-col">
<div class="banner">
<a href=""><img src="./img/site/banner2.png" alt="MitraCollection.com" title="MitraCollection.com"></a>
</div>
<div class="produk-title">
<h1>Akun : <?php echo $result_user['nama']; ?></h1>
</div>
<div class="list-p">
<div class="f-master">
<div class="bg-f">
<div class="b-h">UPLOAD PROFILE</div>
<?php
upload_pic($_GET); 
?>
</div>
</div>
</div>

</div>
</div>
<!--end container !-->
</div>