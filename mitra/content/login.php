<div class="container">
<div class="col-1">
<?php include"./content/side.php"; ?>
<div class="big-col">
<div class="banner">
<a href=""><img src="./img/site/banner2.png" alt="MitraCollection.com" title="MitraCollection.com"></a>
</div>
<div class="produk-title">
<h1>Login::</h1>
</div>
<?php 
if(isset($_POST['login'])){
	loggin($_POST['email'],$_POST['password']);
}?>
<div class="list-p">
<div class="f-master">
<div class="bg-f">
<div class="b-h">FORM LOGIN::</div>
<form action="<?php echo htmlspecialchars('index.php?url=login');?>" method="post">
<div class="f-name">Email</div><div class="f-in"><input  class="in"type="text" name="email"></div>
<div class="f-name">Password</div><div class="f-in"><input class="in" type="password" name="password"></div>
<div class="f-btn">
<input class="btn-sub" type="submit" value="login" name="login">
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<!--end container !-->
</div>