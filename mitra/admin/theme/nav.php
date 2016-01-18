<div class="head">
<div class="in-head">
<h1>ADMIN MITRA COLLECTION</h1>
</div>
</div>
<div class="menu">
<div class="in-menu">
	<ul>
	<li><a href="?redirect=home">Dashboard</a></li>
	<li><a href="?redirect=order">Data Pemesanan</a></li>
	<li><a href="?redirect=barang">Data Barang</a></li>
	<li><a href="?redirect=transaksi">Data Penjualan</a></li>
	<li><a href="?redirect=data_member">Data Member</a></li>
	<li><a href="./proses/proses.php?action=logout">logout</a></li>
	<ul>
</div>
</div>
<?php 
require_once('../function/function.php');
$admin_data=data_admin(); 
?>
<div class="container">