<?php 
@$relink=htmlspecialchars($_GET['url']);
switch($relink){
	
	case'def':
			include"./content/home.php";
	break;
	case'all_product':
		include"./content/all_produk.php";
	break;
	case'more':
			include"./content/detail.php";
	break;
	
	case'keranjang':
			if($_SESSION['member']==""){
			header('location:?url=login');	
			}else{
			include"./content/chart.php";	
			}
	break;
	case'check':
		if($_SESSION['member']==""){
		header('location:?url=login');	
			}else{
			cek_stok();
		}
	break;
	
	case'update_cart':
		if(@$_GET['token']==md5(@$_SESSION['member'])){
			update_cart(@mysql_real_escape_string($_POST));
		}else{
			echo"Legal Action";
		}
	break;
	
	case'delete_cart':
		if(@$_GET['token']==md5(@$_SESSION['member'])){
			delete_cart(@mysql_real_escape_string($_GET['id']));
		}else{
			echo"Legal Action";
		}
	break;
	
	case'finish':
		
		if(@$_GET['token']==md5(@$_SESSION['member'])){
			finish_shop(is_array($_POST));
		}else{
			echo"Legal Action";
		}
	
	break;
	case'next':
	if($_SESSION['member']==""){
		header('location:index.php');	
	}else{
		include"./content/pengiriman.php";
	}
	break;
	
	case'notic':
		include"./content/notic.php";
	break;
	
	case'save_addres':
		if(@$_GET['hot_key']==md5(@$_SESSION['member'])){
		simpan_alamat(is_array($_POST));
		}else{
		echo"Legal Action";	
		}
	break;
	
	case'detail_p':
		include"./content/detail_pesan.php";
	break;
	
	case'reg':
			if(!@$_SESSION['member']){
			include"./content/register.php";
			}else{
			header('location:index.php');	
			}
	break;
	
	case'login':
		if(!@$_SESSION['member']){
		include"./content/login.php";	
		}else{
		header('location:index.php');	
		}
			
	break;
	
	case'logout':
			if(isset($_SESSION['member']) && isset($_SESSION['nama'])){
				unset($_SESSION['member']);
				unset($_SESSION['nama']);
				header('location:index.php');
			}
	break;
	
	case'profile':
		if($_SESSION['member']==""){
		header('location:index.php');	
		}else{
		include"./content/user.php";	
		}
			
	break;
	
	case'bantuan':
			include"./content/help.php";
	break;
	case'contat_us':
		include"./content/hubungi_kami.php";	
	break;
	case'upload_pic':
		if($_SESSION['member']==""){
		   	header('location:index.php');
		}else{
			include"./content/upload_foto.php";	
		}
	break;
	case'pro_upload':
		if($_SESSION['member']==""){	
		header('location:index.php');
		}else{
		 pro_upload(is_array($_POST));
		}
	break;
	
	case'edit':
		if(!@$_SESSION['member']){
		   	header('location:index.php');
		}else{
			include"./content/account_edit.php";	
		}
	break;
	/*
	case'go_edit':
		if(!@$_SESSION['member']){
		   	header('location:index.php');
		}else{
			pro_edit(is_array($_POST));
		}
	break;
	*/
	
	case'konfirmasi':
		if(!@$_SESSION['member']){
		   	header('location:index.php');
		}else{
		include"./content/confrim.php";	
		}
	break;
	
	case'kirim_konfirmasi':
		if(!@$_SESSION['member']){
		   	header('location:index.php');
		}else{
			kirim_konfirmasi($_POST);
		}
	break;
	case'ubah_password':
		include"./content/ubah_password.php";	
	break;
	
	case'kategori':
		include"./content/barang_kategori.php";	
	break;
	
	case'sukses':
		include"./content/sender_sukses.php";	
	break;
	case'result':
		include"./content/result.php";	
	break;
	
default:
include"./content/home.php";
break;
}
?>