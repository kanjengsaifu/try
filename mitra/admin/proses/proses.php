<?php
session_start();
include"../../config/koneksi.php";
@$action=mysql_real_escape_string($_GET['action']); 
switch($action){
	case'login':
	$us=$_POST['user'];
	$ps=md5($_POST['password']);
	$us=mysql_real_escape_string($us);
	$ps=mysql_real_escape_string($ps);
	if(!$us ||!$ps){
		echo "<script>alert('incorrect password and username');location='../login.php'</script>";
	}else{
		$sql=mysql_query("SELECT*FROM admin WHERE user_name='$us' AND password='$ps' ");
		$cek=mysql_num_rows($sql);
		if($cek==1){
		while($data=mysql_fetch_array($sql)){
			$user=$data['id'];
			//tambahkan variabel di sini jika ingin menambah session
			//----------------------------------------
		}
		$_SESSION['admin']=$user;
		header('location:../index.php');
		}else{
		echo "<script>alert('incorrect password and username');location='../login.php'</script>";
		}
	}	
	break;
	case'logout':
		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
			header('location:../login.php');
		}
	break;
	case'simpan_barang':
		$nb=mysql_real_escape_string($_POST['nama']);
		$ktg=mysql_real_escape_string($_POST['kategori']);
		$hrg=mysql_real_escape_string($_POST['harga']);
		$jml=mysql_real_escape_string($_POST['jumlah']);
		$ket=mysql_real_escape_string($_POST['ket']);
		//file proprrtis
		$gb=$_FILES['gambar'] ['name'];
		$flt=$_FILES['gambar'] ['type']; 
		$fltp=$_FILES['gambar']['tmp_name'];
		$random_digit=rand(0000,9999);
		$nama_baru=$random_digit.$gb;
		if(!$nb||!$ktg||!$hrg||!$jml||!$ket || !$gb){
		echo"<script>alert('Isi semua filed');location='../index.php?redirect=add_barang'</script>";	
		}else{
			if(!eregi("[0-9]",$hrg) || !eregi("[0-9]",$jml) ){
			echo"<script>alert('Harga dan stok hanya boleh angka');location='../index.php?redirect=add_barang'</script>";	
			}else{
				$sql=mysql_query("SELECT*FROM barang WHERE nama_barang='$nb'");
				$cek=mysql_num_rows($sql);
				if($cek==0){
					move_uploaded_file($fltp,"../../img/product/".$nama_baru);
					mysql_query("INSERT INTO `barang`(id_kategori,nama_barang,harga,jumlah,keterangan,gambar) 
					VALUES ('$ktg','$nb','$hrg','$jml','$ket','$nama_baru')");
					header('location:../index.php?redirect=barang');	
				}else{
					echo"<script>alert('Data sudah ada di database');location='../index.php?redirect=add_barang'</script>";	
				}
			}
		}
	break;
	
	case'simpan_kategori':
	
		$kat=mysql_real_escape_string($_POST['nama']);
		if(!$kat){
			echo"<script>alert('Nama Kategori Kosong');location='../index.php?redirect=kategori'</script>";
		}else{
		$sql=mysql_query("SELECT * FROM `kategori` WHERE nama_kategori='$kat'");
		$cek=mysql_num_rows($sql);
		if($cek==1){
			echo"<script>alert('Data sudah ada di database');location='../index.php?redirect=kategori'</script>";
		}else{
			$SQL2="INSERT INTO kategori(nama_kategori) VALUES ('$kat')";
			if($cek==0){
			mysql_query("INSERT INTO kategori(nama_kategori) VALUES ('$kat')");
			header('location:../index.php?redirect=kategori');
			}else{
			echo"<script>alert('Proses gagal');location='../index.php?redirect=kategori'</script>";
			}
		}
		}
	break;
	
	case'hapus_kategori':
		$id=mysql_real_escape_string($_GET['id']);
		$SQL="DELETE FROM kategori WHERE id_kategori='$id'";
		if(mysql_query($SQL)){
		header('location:../index.php?redirect=kategori');
		}else{
		echo"<script>alert('Gagal di hapus');location='../index.php?redirect=kategori'</script>";
		}
		
	break;
	
	case'ubah_kategori':
		$id=mysql_real_escape_string($_POST['id']);
		$value=mysql_real_escape_string($_POST['nama_kategori']);
		if(!$id || !$value){
		echo"<script>alert('Isi Semua Filed');location='../index.php?redirect=edit_ktg&id=$id'</script>";	
		}else{
		mysql_query("UPDATE kategori SET nama_kategori='$value' WHERE id_kategori='$id'");
		echo"<script>alert('Data Telah Terupdate');location='../index.php?redirect=edit_ktg&id=$id'</script>";	
		}
	break;
	
	case'del_ps':
		$id=mysql_real_escape_string($_GET['id']);
		$SQL="DELETE FROM pesanan WHERE id_pesan='$id'";
		if(mysql_query($SQL)){
		header('location:../index.php?redirect=order');
		}else{
		echo"<script>alert('Gagal di hapus');location='../index.php?redirect=order'</script>";
		}
	break;
	
	case'hapus_barang':
		$id=mysql_real_escape_string($_GET['id']);
		$sql="DELETE FROM barang WHERE id_barang=$id";
		if(mysql_query($sql)){
		header('location:../index.php?redirect=barang');
		}else{
		echo"<script>alert('Data gagal di hapus');location='../index.php?redirect=barang'</script>";		
		}
	break;
	
	case'edit_barang':
			$id=mysql_real_escape_string($_POST['id_barang']);
			$nama=mysql_real_escape_string($_POST['nama']);
			$harga=mysql_real_escape_string($_POST['harga']);
			$jumlah=mysql_real_escape_string($_POST['jumlah']);
			$ktg=mysql_real_escape_string($_POST['ktg']);
			$des=mysql_real_escape_string($_POST['ket']);
			if(!$nama || !$harga || !$jumlah || !$ktg || !$des ){
				echo"<script>alert('Filed Tidak Boleh Kosong');location='../index.php?redirect=edit_barang&id=$id'</script>";		
			}else{
				$sql=mysql_query("UPDATE `barang` SET `id_kategori`='$ktg',
				`nama_barang`='$nama',`harga`='$harga',`jumlah`='$jumlah',`keterangan`='$des' WHERE id_barang='$id'");
				if(isset($sql)){
				echo"<script>alert('Data Berhasil Di Update');location='../index.php?redirect=edit_barang&id=$id'</script>";
				}else{
				echo"<script>alert('Gagal Update');location='../index.php?redirect=edit_barang&id=$id'</script>";
				}
			}
	break;
	
	case'ubah_gambar':
		$id=mysql_real_escape_string($_POST['id']);
		@$gb=$_FILES['gambar'] ['name'];
		@$flt=$_FILES['gambar'] ['type']; 
		@$fltp=$_FILES['gambar']['tmp_name'];
		@$random_digit=rand(0000,9999);
		@$nama_baru=$random_digit.$gb;
		if(!$gb){
		echo"<script>alert('Pilih File Terlebih Dahulu');location='../index.php?redirect=img_p&id=$id'</script>";	
		}else{
			move_uploaded_file($fltp,"../../img/product/".$nama_baru);	
			mysql_query("UPDATE barang SET gambar='$nama_baru' WHERE id_barang='$id'");
			header("location:../?redirect=img_p&id=$id");
		}
		
	break;
	
	case'update_status':
			$id=mysql_real_escape_string($_POST['id']);
			$subid=mysql_real_escape_string($_POST['subid']);
			$kode=mysql_real_escape_string($_POST['kode']);
			$status=mysql_real_escape_string($_POST['status']);
			if($status==="Proses"){
				mysql_query("UPDATE pesanan SET status='$status' WHERE id_pesan='$id' ") or die (mysql_error());
				header("location:../?redirect=order");
			}else{
				if($status==="Lunas"){
				mysql_query("UPDATE pesanan SET status='$status' WHERE id_pesan='$id' ") or die (mysql_error());
				header("location:../?redirect=order");	
				}else{
					$sql=mysql_query("SELECT*FROM detail_pesan WHERE id_pesan='$id'");
					while($data=mysql_fetch_array($sql)){
						mysql_query("UPDATE barang SET jumlah=jumlah+$data[jumbel] WHERE id_barang='$data[id_barang]'");
					}
				mysql_query("UPDATE pesanan SET status='$status' WHERE id_pesan='$id' ") or die (mysql_error());
				header("location:../?redirect=order");	
				}
			}
			
	break;
	
	case'hapus_konfirmasi':
		$id=mysql_real_escape_string($_GET['id']);
		$sql="DELETE FROM `konfirmasi_pemesanan` WHERE id='$id'";
		if(mysql_query($sql)){
		header("location:../?redirect=pembayaran");		
		}else{
			echo"GAGAL HAPUS";
		}
	break;
	
	default:
	echo"ERROR:_ACTION";
	break;
}
?>