<body>
<div class="menu">
<div class="in-menu">
		<ul>
		<li><a href="http://localhost/gmsnew/">Home</a></li>
		<li><a href="?url=all_product">Product</a></li>
		<li><a href='?url=contat_us'>Hubungi Kami</a></li>
		<?php
		if(!@$_SESSION['member']){
		echo"<li><a href='?url=login'>Login</a></li>";
		echo"<li><a href='?url=reg'>Register</a></li>";
		}else{ ?>
		<li><a href='?url=profile'>Akun</a></li>	
		<li><a href='?url=logout'>Logout</a></li>
	<?php 	}?>
	<ul>
	<form action="?url=result" method="post">
		<li><div class="cari"><input placeholder="Cari Barang..." class="in-search" type="text" name="key"><input type="submit" value="" class="btn-c"></div></li>
	</ul>
	</form>
		<ul>
</div>
</div>