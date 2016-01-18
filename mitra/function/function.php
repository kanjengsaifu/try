<?php 
function all_product(){
	include"./config/koneksi.php";
	$batas=5;
				@$halaman=$_GET['halaman'];
				if(empty($halaman)){
					$posisi=0;
					$halaman=1;
				}else{
					$posisi=($halaman-1)*$batas;
				}
    $SQL=mysql_query("SELECT barang.id_barang,barang.id_kategori,barang.nama_barang,barang.harga,barang.jumlah,barang.keterangan,barang.gambar
                     ,kategori.id_kategori,kategori.nama_kategori
                     FROM barang INNER JOIN kategori ON barang.id_kategori=kategori.id_kategori ORDER BY id_barang DESC LIMIT $posisi,$batas");
					$cek=mysql_num_rows($SQL);
					if($cek==0){
					echo"<div class=list-p><div class='notic'>Content Tidak Tersedia</div></div>"; 
					 }else{
				 while($data=mysql_fetch_array($SQL)){ ?>
					<div class='list-p'>
					<div class='col-img'>
					<a href="?url=more&id=<?php echo $data['id_barang']; ?>"><img src='./img/product/<?php echo $data['gambar']; ?>' alt='gambar-produk' title='<?php echo $data['nama_barang']; ?>'>
					</a>
					</div>
					<div class='col-des'>
					<div class='box-name'><h1><a href="?url=more&id=<?php echo $data['id_barang']; ?>"><?php echo $data['nama_barang']; ?></a></h1></div>
					<div class='box-list'>
					<div class='box-harga'><?php echo rupiah($data['harga']); ?></div>
					<div class='box-stok'>/	Stok : <?php
						if($data['jumlah']==0){
						echo"<span class='off'>HABIS</span>";	
						}else{
						echo "<span class='on'>Tersedia</span>";	
						}
					?></div>
					</div>
					<div class='box-kategori'>Category	:	<?php echo $data['nama_kategori']; ?></div>
					<div class="box-view">comment:</div>
					<div class='box-des'>
					 <p><?php echo $data['keterangan'];?></p>
					</div>
					<form action="index.php?url=check" method="post">
					<input type="hidden" value="<?php echo $data['id_barang']; ?>" name="id_barang">
					<input type="hidden" value="<?php echo @$_SESSION['member']; ?>" name="id_member">
					<input type="hidden" value="<?php echo $data['nama_barang']; ?>" name="nama_barang">
					<input type="hidden" value="<?php echo $data['harga']; ?>" name="harga_barang">
					<div class='box-btn'><input class="btn" type="submit" value="Beli Barang"></div>
					</form>
					</div>
					</div>	 
			<?php }/*end while*/ ?>
			<div class="pg">
			<?php 
				/*box paging*/
					//hitung total data dan halaman
						$tampil=mysql_query("SELECT barang.id_barang,barang.id_kategori,barang.nama_barang,barang.harga,barang.jumlah,barang.keterangan,barang.gambar,kategori.id_kategori
						,kategori.nama_kategori
						FROM barang INNER JOIN kategori ON barang.id_kategori=kategori.id_kategori");
						$jumlah_data=mysql_num_rows($tampil);
						$jumlah_halaman=ceil($jumlah_data/$batas);
						//link halaman sebelumnya (prev)
						if($halaman > 1){
							$prev= $halaman - 1;
							echo"<a class='pg-enable' href='?url=all_product&halaman=$prev'> Prev </a>";
						}else{
							echo"<div class='pg-disable'>Prev</div>";
						}
						//tampil link halaman 1,2,3...
						for($i=1;$i<=$jumlah_halaman;$i++){
							if($i !=$halaman){
								echo"<a class='pg-enable' href='?url=all_product&halaman=$i'>$i</a>";
							}else{
								echo"<div class='pg-disable'>$i</div>";
							}
							
						}
						//link halaman berikutnya (Next)
						if($halaman < $jumlah_halaman ){
							$next=$halaman+1;
							echo"<a class='pg-enable' href='?url=all_product&halaman=$next'>Next</a>";
						}else{
							echo"<div class='pg-disable'>Next</div>";
	
	
					} ?>
				</div>
			<?php 
				/*end paging*/
				}/*edn if */				
}

function rupiah($angka){
	$convert="Rp.".number_format($angka,0,',','.');
	return $convert;
}


function detail($id){
	include"./config/koneksi.php";
	$SQL=mysql_query("SELECT barang.id_barang,barang.id_kategori,barang.nama_barang,barang.harga,barang.jumlah,barang.keterangan,barang.gambar,kategori.id_kategori,kategori.nama_kategori
                     FROM barang INNER JOIN kategori ON barang.id_kategori=kategori.id_kategori WHERE id_barang='$id'");
					 $cek=mysql_num_rows($SQL);
				if($cek==0){
				echo"<div class=list-p><div class='error'>Halaman Tidak Di temukan</div></div>"; 
				}else{
				 while($data=mysql_fetch_array($SQL)){ ?>
					<div class='list-p'>
					<div class="img-detail">
					<img src='./img/product/<?php echo $data['gambar']; ?>'
					alt='gambar-produk' title='<?php echo $data['nama_barang'];  ?>'>
					</div>
					<div class="box-detail">
					<div class="bg-f">
					<h1>Nama Barang : <?php echo $data['nama_barang']; ?></h1>
					<h2>Harga : <?php echo rupiah($data['harga']); ?> / Stok (<?php echo $data['jumlah']; ?>)</h2>
					</div>
					<div class="des-detail">
					<?php echo $data['keterangan']; ?>
					</div>
					<form action="index.php?url=check" method="post">
					<input type="hidden" value="<?php echo $data['id_barang']; ?>" name="id_barang">
					<input type="hidden" value="<?php echo @$_SESSION['member']; ?>" name="id_member">
					<input type="hidden" value="<?php echo $data['nama_barang']; ?>" name="nama_barang">
					<input type="hidden" value="<?php echo $data['harga']; ?>" name="harga_barang">
					<div class='box-btn'><input class="btn" type="submit" value="Beli" name="btnb"></div>
					</form>
					</div>
					</div>
						
			<?php }/*end while*/ ?> 
<?php				}/*edn if */		
	
	
}

function get_title($id){
	include"./config/koneksi.php";
	$SQL=mysql_query("SELECT barang.id_barang,barang.id_kategori,barang.nama_barang,barang.harga,barang.jumlah,barang.keterangan,barang.gambar,kategori.id_kategori
                     ,kategori.nama_kategori
                     FROM barang INNER JOIN kategori ON barang.id_kategori=kategori.id_kategori WHERE id_barang='$id'");
					 $cek=mysql_num_rows($SQL);
			if($cek==0){
					
			}else{
				 while($data=mysql_fetch_array($SQL)){ 
				 echo"<span>$data[nama_barang]</span> / Category : $data[nama_kategori]";
				}/*end while*/ 
			}/*edn if */		
	
	
}

function loggin($email,$password){
	$clean_email=mysql_real_escape_string($email);
	$clean_password=mysql_real_escape_string($password);
	$encrptye_password=md5($clean_password);
	include"./config/koneksi.php";
	$sql=mysql_query("SELECT*FROM member WHERE email='$clean_email' AND password='$encrptye_password'");
	$cek=mysql_num_rows($sql);
	if(!$clean_email && !$clean_password){
		echo'<div class=error>Email & Password Kosong <a href="?url=login">Close</a></div>';
	}else{
		if(!filter_var($clean_email,FILTER_VALIDATE_EMAIL)){
		echo'<div class=error>Format Email Tdiak Valid</div>';
		}else{
			if(!$clean_email){
			echo'<div class=error>Email Kosong</div>';
			}else{
				if(!$clean_password){
				echo'<div class=error>Email Kosong</div>';
				}else{
					if($cek==1){
						$result=mysql_fetch_array($sql);
						$_SESSION['member']=$result['id_member'];
						$_SESSION['nama']=$result['nama'];
						header('location:index.php?url=profile');
					}else{
					echo'<div class=error>Akun Tidak Di Temukan</div>';	
					}
				}
			}
		}
	}
	
}

function register(){
	$nama=mysql_real_escape_string($_POST['nama']);
	$jk=mysql_real_escape_string(@$_POST['jk']);
	$tlp=mysql_real_escape_string($_POST['tlp']);
	$email=mysql_real_escape_string($_POST['email']);
	$ps=mysql_real_escape_string($_POST['ps']);
	$ps2=mysql_real_escape_string($_POST['ps2']);
	
	if(!$nama && !$jk && !$tlp && !$email && !$ps && !$ps2 ){
		echo '<div class=error>Isi Semua Bidang</div>';
	}else{
		$format_email='^.+@.+\.((com)|(net)|(org))$';
		if(!eregi($format_email,$email)){
			echo'<div class=error>Format Email Tidak Valid</div>';
		}else{
		if(!eregi("[0-9]",$tlp)){
			echo'<div class=error>No Telp Hanya Boleh Berformat Angka</div>';	
		}else{
			if(!$jk){
			echo'<div class=error>Isi Semua Bidang</div>';	
			}else{
				if(strlen($tlp)<5){
			echo'<div class=error>No Telp Kurang Dari Batas Normal</div>';	
			}else{
			if($ps!=$ps2){
			echo'<div class=error>Password Tidak Sama</div>';		
			}else{
			include"./config/koneksi.php";
			$query=mysql_query("SELECT*FROM member WHERE email='$email'");
			$cek=mysql_num_rows($query);
			if($cek==1){
			echo'<div class=error>Email Sudah Terdaftar</div>';	
			}else{
				$fixps=md5($ps);
				$sql="INSERT INTO member (nama,jenis_kelamin,no_tlp,email,password,profile) 
				VALUES ('$nama','$jk','$tlp','$email','$fixps','no-pic.png')";
				if(mysql_query($sql)){
				echo'<div class=sukses>Anda Berhasil Mendaftarkan Akun Silahkan <a href=?url=login>loggin</a></div>';		
				}else{
				echo'<div class=error>Gagal Mendaftrakan Akun FATAL_ERROR::Register...</div>';		
				}
			}
		}
		}
		}
	}
	}
 }
	
}

//*keranjang*/

function keranjang(){
	include"./config/koneksi.php";
	$id_member=$_SESSION['member'];
	$query=mysql_query("SELECT*FROM keranjang INNER JOIN barang
	ON keranjang.id_barang=barang.id_barang WHERE keranjang.id_member='$id_member'");
	return $query;

	
}
/*cek kondisi keranjang member*/
function cek_status_keranjang(){
	include"./config/koneksi.php";
	$id_member=$_SESSION['member'];
	$cek=mysql_query("SELECT*FROM keranjang WHERE id_member='$id_member'");
	return $cek;
	
}
function random_key(){
	$date=date('D-m-Y');
	$enx=md5($date);
	return $enx;
}
function get_notic(){
	@$error=$_GET['error'];
	switch($error){
		case'1':
		echo"<div class=error>Isi Semua Bidang</div>";
		break;
		case'2':
		echo"<div class=error>Gagal Esekusi</div>";
		break;
		default:
		break;
	}
	
	
}

function update_cart(){
	include"./config/koneksi.php";
	$jumbel=$_POST['jumbel'];
	$id_barang=$_POST['id_barang'];
	$id_member=$_POST['id_member'];
	$count=$_POST['count'];
	for($i=0;$i<$count; $i++)
	{
		$sqlb=mysql_query("SELECT*FROM barang WHERE id_barang=$id_barang[$i]");
		$rb=mysql_fetch_array($sqlb);
		$jb=$rb['jumlah'];
		if(empty($jumbel[$i])){
			$sql=mysql_query("DELETE FROM keranjang WHERE id_member='$id_member[$i]' AND id_barang='$id_barang[$i]'");
			 header('location:?url=keranjang');
		}else{
			if($jumbel[$i]>$jb){
				 header('location:?url=keranjang&error=');
			}else{
				$sql=mysql_query("UPDATE keranjang SET jumbel=$jumbel[$i] WHERE id_member=$id_member[$i] AND id_barang=$id_barang[$i]");
				 header('location:?url=keranjang');
			}
		}
	}


}

function delete_cart(){
	include"./config/koneksi.php";
	$id_barang=mysql_real_escape_string($_GET['id']);
	$id_member=$_SESSION['member'];
	$sql=mysql_query("DELETE FROM keranjang WHERE id_member='$id_member' AND id_barang='$id_barang'");
	if(isset($sql)){
	header('location:index.php?url=keranjang');		
	}else{
	echo"Gagal Hapus";
	}
}

//* fungsi beli*/
function beli(){
		include"./config/koneksi.php";
		$id_member=mysql_real_escape_string($_POST['id_member']);
		$id_barang=mysql_real_escape_string($_POST['id_barang']);
		$nama_barang=mysql_real_escape_string($_POST['nama_barang']);
		$harga=mysql_real_escape_string($_POST['harga_barang']);
		$cek=mysql_query("SELECT*FROM keranjang WHERE id_member='$id_member' AND id_barang='$id_barang'");
		$jumbel=1;
		$result_cek=mysql_num_rows($cek);
		if($result_cek==1){
		header('location:index.php?url=keranjang');
		}else{
		$sql="INSERT INTO keranjang(id_member,id_barang,nama_barang,jumbel,harga) 
		VALUES ('$id_member','$id_barang','$nama_barang','$jumbel','$harga')";
		if(mysql_query($sql)){
		header('location:index.php?url=keranjang');	
		}else{
			echo"gagal";
		}
		}
		 
 }
 function create_code()//set new no trans
{
	$query="SELECT max(kode_p) as maxID from detail_pesan";
	$hasil=mysql_query($query);
	$data=mysql_fetch_array($hasil);
	$idmax=$data['maxID'];
	$no_urut= (int) substr ($idmax,3,5);
	$no_urut++;
	$kde='PSE'.sprintf("%05s",$no_urut);
	return $kde;
}

function arg_cart(){
	$value_cart= array();
	$sid = $_SESSION['member'];
	$sql = mysql_query("SELECT * FROM keranjang WHERE id_member='$sid'");
	
	while ($row = mysql_fetch_array($sql)) {
		$value_cart[] = $row;
	}
	return $value_cart;
}
 /*selsai belanja*/
 
 function finish_shop(){
	 include"./config/koneksi.php";
	 $id_member=mysql_real_escape_string($_POST['id_member']);
	 $id_barang=mysql_real_escape_string($_POST['id_barang']);
	 $nama_barang=mysql_real_escape_string($_POST['nama_barang']);
	 $harga=mysql_real_escape_string($_POST['harga']);
	 $jumbel=mysql_real_escape_string($_POST['jumbel']);
	 $date=date('d-m-Y');$time=date('H:i:s A');
	 $sql=mysql_query("INSERT INTO pesanan(id_member,date,time,status)
	 VALUES ('$id_member','$date','$time','Terkirim')");
	 $get_id=mysql_insert_id();
	 $kp=create_code();
	 /*get fungsi array pada cart*/
	 $arg_cart=arg_cart();
	 $value_c=count($arg_cart);
	 for($i=0;$i<$value_c;$i++){
	 mysql_query("INSERT INTO detail_pesan(id_pesan,kode_p,id_barang,jumbel,harga) 
	 VALUES ('$get_id','$kp',{$arg_cart[$i]['id_barang']},{$arg_cart[$i]['jumbel']},{$arg_cart[$i]['harga']})");
	 }
	 for ($i=0;$i<$value_c;$i++){
		 mysql_query("UPDATE barang SET jumlah=jumlah-{$arg_cart[$i]['jumbel']} WHERE id_barang={$arg_cart[$i]['id_barang']}");
	 }
	 for($i=0;$i<$value_c;$i++){
		mysql_query("DELETE FROM keranjang WHERE id_member={$arg_cart[$i]['id_member']}");	 
	 }
	 header("location:?url=next&id=$get_id");
 }
 
 function get_memberp(){
	 $id_pesan=$_GET['id'];
	 include"./config/koneksi.php";
	 $id_member=$_SESSION['member'];
	 $query=mysql_query("SELECT*FROM pesanan INNER JOIN 
	 member ON pesanan.id_member=member.id_member WHERE pesanan.id_pesan='$id_pesan'");
	 $result=mysql_fetch_array($query);
	 return $result;
 }
 

 /* errrorr kode pemesanan error perbaiki perubahan kode pemesanan saat di klik next--- id mebingukan--- --*/
  function simpan_alamat(){
	 include"./config/koneksi.php";
	 $idp=$_POST['id_pesan'];
	 $nama=$_POST['nama'];
	 $kontak=$_POST['kontak'];
	 $alamat=$_POST['alamat'];
	 if(!$idp || !$alamat || !$nama || !$kontak){
		 header("location:?url=next&id=$idp&error=1"); 
	 }else{
	$sql="INSERT INTO alamat_kirim (id_pesan,atas_nama,kontak,alamat_kirim) VALUES 
	 ('$idp','$nama','$kontak','$alamat')";
		 if(mysql_query($sql)){
		mysql_query("UPDATE pesanan SET status='Baru' WHERE id_pesan='$idp'");
		header("location:?url=detail_p&id=$idp"); 	 
		 }else{
		header("location:?url=next&id=$idp&&error=2"); 	 
		 }
	 }
 }

 function get_kodep(){
	 $id_pesan=$_GET['id'];
	 include"./config/koneksi.php";
	 $id_member=$_SESSION['member'];
	 $query=mysql_query("SELECT*FROM pesanan WHERE id_member='$id_member' AND id_pesan='$id_pesan'");
	 $resultid=mysql_fetch_array($query);
	 $id_pesan=$resultid['id_pesan'];
	 $querykd=mysql_query("SELECT*FROM detail_pesan WHERE id_pesan='$id_pesan'");
	 $result=mysql_fetch_array($querykd);	 
	 return $result;
 }

 function get_detailp(){
	include"./config/koneksi.php";
	$id_pesan=$_GET['id'];
	 $id_member=$_SESSION['member'];
	 $query=mysql_query("SELECT*FROM pesanan WHERE id_member='$id_member' AND status='Baru' AND id_pesan='$id_pesan'");
	 $resultid=mysql_fetch_array($query);
	 $id_pesan=$resultid['id_pesan'];
	 $queryr=mysql_query("SELECT*FROM detail_pesan INNER JOIN barang ON detail_pesan.id_barang=barang.id_barang WHERE id_pesan='$id_pesan'"); 
	 return $queryr;
 }
 
 function get_alamatkirim(){
	 $id_pesan=$_GET['id'];
	 $sql=mysql_query("SELECT*FROM alamat_kirim WHERE id_pesan='$id_pesan'");
	 $result=mysql_fetch_array($sql);
	 return $result;
 }

 
 
 function cek_chart(){
	 include"./config/koneksi.php";
	 $id_member=$_SESSION['member'];
	 $sql=mysql_query("SELECT*FROM keranjang WHERE id_member=$id_member");
	 $cek=mysql_num_rows($sql);
	 echo $cek;
 }
 
 function sql_user(){
	 include"./config/koneksi.php";
	 $id_member=$_SESSION['member'];
	 $sql=mysql_query("SELECT*FROM member WHERE id_member='$id_member'");
	 $data=mysql_fetch_array($sql);
	 return $data;
 }

 
 function cek_stok(){
	 $id=mysql_real_escape_string($_POST['id_barang']);
	 include"./config/koneksi.php";
	 $sql=mysql_query("SELECT*FROM barang WHERE id_barang='$id' AND jumlah='0'");
	 $cek=mysql_num_rows($sql);
	 if($cek==0){
		beli($_POST);
	 }else{
		header("location:index.php?url=notic");
	 }
 }
/*upload profile pic */
 function upload_pic(){
	 include"./config/koneksi.php";
	 $id=mysql_real_escape_string($_GET['id']);
	 $sql=mysql_query("SELECT*FROM member WHERE id_member='$id'");
	 $cek=mysql_num_rows($sql);
	 if($cek==0){
		 echo"<div class=error>Halaman Tidak Tersedia</div>";
	 }else{
	$result=mysql_fetch_array($sql);
		 ?>
		<div class="b-img">
		<img src="./img/user/<?php echo $result['profile']; ?>">
		</div>
		<form action="?url=pro_upload" method="post" enctype="multipart/form-data">
		<div class="b-l"><input type="file" name="gambar"></div>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="f-btn"><input class="btn-sub"type="submit" name="up" value="Upload"></div>
		</form>
<?php	}
	 
 }
 
 function pro_upload(){
	include"./config/koneksi.php";
	$id=mysql_real_escape_string($_POST['id']);
	$gb=$_FILES['gambar'] ['name'];
	$flt=$_FILES['gambar'] ['type']; 
	$fltp=$_FILES['gambar']['tmp_name'];
	$random_digit=rand(0000,9999);
	$nama_baru=$random_digit.$gb;
	$sql="UPDATE member SET profile='$nama_baru' WHERE id_member='$id'";
	if(!$gb){
		header("location:?url=upload_pic&id=$id");
	}else{
		if(mysql_query($sql)){
		move_uploaded_file($fltp,"./img/user/".$nama_baru);
		header("location:?url=upload_pic&id=$id");
	}else{
		echo"gagal";
	}
		
		
	}
	 
 }
 /*upload profile pic end */
 /*edit akun*/
 
 function pro_edit(){
	 include"./config/koneksi.php";
	 $id=mysql_real_escape_string($_POST['id']);
	 $nama=mysql_real_escape_string($_POST['nama']);
	 $jk=mysql_real_escape_string($_POST['jk']);
	 $kontak=mysql_real_escape_string($_POST['kontak']);
	 if(!$id || !$nama || !$jk || !$kontak ){
		 echo"<div class=error>Isi Semua Filed</div>";
		/*header("location:?url=edit&id=$id");*/ 
	 }else{
		  $sql=mysql_query("UPDATE member SET 
		 `nama`='$nama',`jenis_kelamin`='$jk',
		 `no_tlp`='$kontak' WHERE id_member='$id'");
		  echo"<div class=error>Berhasil Update</div>";
		 if(isset($sql)){ 
		 /* header("location:?url=edit&id=$id"); */
		 }else{
			 echo"<div class=error>Gagal Update</div>";
		 }
	 }
 }
 /*end edit akun*/
 
 function cek_konfirmasi(){
	 $id_member=$_SESSION['member'];
	 $sql=mysql_query("SELECT*FROM pesanan WHERE id_member='$id_member' AND status='Proses'");
	 $cek=mysql_num_rows($sql);
	 echo $cek;
 }
 
function get_datakonfirmasi(){
	$id_member=$_SESSION['member'];
	$sql=mysql_query("SELECT*FROM pesanan WHERE id_member=$id_member AND status='Proses'");
	$no=1;
	while($data=mysql_fetch_array($sql)){
	$sqlk=mysql_query("SELECT*FROM detail_pesan WHERE id_pesan=$data[id_pesan]");
	$dps=mysql_fetch_array($sqlk);
	$hitung=mysql_num_rows($sql);
	?>
	<tr class="tr-val">
	<th><?php echo $no; ?></th>
	<th><?php echo $dps['kode_p']; ?></th>
	<th><?php echo $data['date']; ?></th>
	<th><?php echo $data['time'];?></th>
	<th><a href="?url=konfirmasi&kode=<?php echo $dps['kode_p']; ?>">Verifikasi</a></th>
	</tr>
<?php $no++;} }
//Veritifikasi pembayaran*/
function kirim_konfirmasi(){
	$kode=mysql_real_escape_string($_POST['kode']);
	$nb=mysql_real_escape_string($_POST['nb']);
	$an=mysql_real_escape_string($_POST['an']);
	$nr=mysql_real_escape_string($_POST['nr']);
	$bt=mysql_real_escape_string($_POST['bt']);
	$tglb=mysql_real_escape_string($_POST['tglb']);
	$pesan=mysql_real_escape_string($_POST['pesan']);
	if($kode=="" || $nb=="" || $an=="" || $bt=="" || $tglb=="" || $nr==""){
		header("location:?url=konfirmasi&kode=$kode&error=1");
	}else{
	 include"./config/koneksi.php";
		$sql=mysql_query("INSERT INTO konfirmasi_pemesanan(kode_p,
		nama_bank,
		atas_nama,
		no_rekening,
		bank_tujuan,
		tgl_bayar,pesan)
		VALUES ('$kode','$nb','$an','$nr','$bt','$tglb','$pesan')") or die (mysql_error());
		if(isset($sql)){
		header("location:?url=sukses&kode=$kode");
		}else{
		header("location:?url=konfirmasi&kode=$kode&error=2");	
		}
		
	}
}
function get_lastproduct(){
	include"./config/koneksi.php";
	$sql=mysql_query("SELECT*FROM barang ORDER BY id_barang DESC LIMIT 4");
	return $sql;
}

function send_hubungi(){
	@$nama=mysql_real_escape_string($_POST['nama']);
	@$email=mysql_real_escape_string($_POST['email']);
	@$pesan=mysql_real_escape_string($_POST['pesan']);
	if(!$nama || !$email || !$pesan){
		echo"<div class=col-p><div class=error>Semua filed wajib di isi</div></div>";
	}else{
		$format_email='^.+@.+\.((com)|(net)|(org))$';
		if(!eregi($format_email,$email)){
		echo"<div class=col-p><div class=error>Email tidak valid</div></div>";	
		}else{
			$sql="INSERT INTO `contat_us`
			(`nama`, `email`, `pesan`) VALUES ('$nama','$email','$pesan')";
			if(mysql_query($sql)){
			echo"<div class=col-p><div class=notic>Pesan anda sudak terkirim</div></div>";		
			}else{
				echo"<div class=col-p><div class=error>Gagal Mengirim !</div></div>";	
			}
		}
	}
	
}

function update_password(){
	$id_member=$_SESSION['member'];
	$pl=md5($_POST['pl']);
	$pb=md5($_POST['pb']);
	$sql=mysql_query("SELECT*FROM member WHERE password='$pl' AND id_member='$id_member'");
	$cek=mysql_num_rows($sql);
	if($cek==0){
		echo"<div class=error>Password lama tidak cocok</div>";
	}else{
		mysql_query("UPDATE member SET password='$pb' WHERE id_member='$id_member'");
		echo"<div class=notic>Password Telah Terupdate</div>";
	}
}
function data_kategori(){
	include"./config/koneksi.php";
	$sql=mysql_query("SELECT*FROM kategori");
	return $sql;
}


function short_kategori(){
	include"./config/koneksi.php";
	$id_kategori=$_GET['id'];
	$batas=5;
				@$halaman=$_GET['halaman'];
				if(empty($halaman)){
					$posisi=0;
					$halaman=1;
				}else{
					$posisi=($halaman-1)*$batas;
				}
    $SQL=mysql_query("SELECT barang.id_barang,barang.id_kategori,barang.nama_barang,barang.harga,barang.jumlah,barang.keterangan,barang.gambar
                     ,kategori.id_kategori,kategori.nama_kategori
                     FROM barang INNER JOIN kategori ON barang.id_kategori=kategori.id_kategori WHERE kategori.id_kategori='$id_kategori' ORDER BY id_barang DESC LIMIT $posisi,$batas");
					$cek=mysql_num_rows($SQL);
					if($cek==0){
					echo"<div class=list-p><div class='notic'>Content Tidak Tersedia</div></div>"; 
					 }else{
				 while($data=mysql_fetch_array($SQL)){ ?>
					<div class='list-p'>
					<div class='col-img'>
					<a href="?url=more&id=<?php echo $data['id_barang']; ?>"><img src='./img/product/<?php echo $data['gambar']; ?>' alt='gambar-produk' title='<?php echo $data['nama_barang']; ?>'>
					</a>
					</div>
					<div class='col-des'>
					<div class='box-name'><h1><a href="?url=more&id=<?php echo $data['id_barang']; ?>"><?php echo $data['nama_barang']; ?></a></h1></div>
					<div class='box-list'>
					<div class='box-harga'><?php echo rupiah($data['harga']); ?></div>
					<div class='box-stok'>/	Stok : <?php
						if($data['jumlah']==0){
						echo"<span class='off'>HABIS</span>";	
						}else{
						echo "<span class='on'>Tersedia</span>";	
						}
					?></div>
					</div>
					<div class='box-kategori'>Category	:	<?php echo $data['nama_kategori']; ?></div>
					<div class="box-view">Ranting : 20</div>
					<div class='box-des'>
					 <p><?php echo $data['keterangan'];?></p>
					</div>
					<form action="index.php?url=check" method="post">
					<input type="hidden" value="<?php echo $data['id_barang']; ?>" name="id_barang">
					<input type="hidden" value="<?php echo @$_SESSION['member']; ?>" name="id_member">
					<input type="hidden" value="<?php echo $data['nama_barang']; ?>" name="nama_barang">
					<input type="hidden" value="<?php echo $data['harga']; ?>" name="harga_barang">
					<div class='box-btn'><input class="btn" type="submit" value="Beli Barang"></div>
					</form>
					</div>
					</div>	 
			<?php }/*end while*/ ?>
			<div class="pg">
			<?php 
				/*box paging*/
					//hitung total data dan halaman
						$tampil=mysql_query("SELECT barang.id_barang,barang.id_kategori,barang.nama_barang,barang.harga,barang.jumlah,barang.keterangan,barang.gambar,kategori.id_kategori
						,kategori.nama_kategori
						FROM barang INNER JOIN kategori ON barang.id_kategori=kategori.id_kategori WHERE kategori.id_kategori='$id_kategori'");
						$jumlah_data=mysql_num_rows($tampil);
						$jumlah_halaman=ceil($jumlah_data/$batas);
						//link halaman sebelumnya (prev)
						if($halaman > 1){
							$prev= $halaman - 1;
							echo"<a class='pg-enable' href='?url=kategori&halaman=$prev'> Prev </a>";
						}else{
							echo"<div class='pg-disable'>Prev</div>";
						}
						//tampil link halaman 1,2,3...
						for($i=1;$i<=$jumlah_halaman;$i++){
							if($i !=$halaman){
								echo"<a class='pg-enable' href='?url=kategori&halaman=$i'>$i</a>";
							}else{
								echo"<div class='pg-disable'>$i</div>";
							}
							
						}
						//link halaman berikutnya (Next)
						if($halaman < $jumlah_halaman ){
							$next=$halaman+1;
							echo"<a class='pg-enable' href='?url=kategori&halaman=$next'>Next</a>";
						}else{
							echo"<div class='pg-disable'>Next</div>";
	
	
					} ?>
				</div>
			<?php 
				/*end paging*/
				}/*edn if */				
}



function find_search(){
	$key=mysql_real_escape_string($_POST['key']);
	$batas=5;
				@$halaman=$_GET['halaman'];
				if(empty($halaman)){
					$posisi=0;
					$halaman=1;
				}else{
					$posisi=($halaman-1)*$batas;
				}
    $SQL=mysql_query("SELECT barang.id_barang,barang.id_kategori,
	barang.nama_barang,barang.harga,barang.jumlah,
	barang.keterangan,barang.gambar
    ,kategori.id_kategori,kategori.nama_kategori
    FROM barang INNER JOIN kategori ON barang.id_kategori=kategori.id_kategori WHERE barang.nama_barang LIKE'$key%' 
	LIMIT $posisi,$batas");
					$cek=mysql_num_rows($SQL);
					if($cek==0){
					echo"<div class='error'>Kata kunci tidak terkait dengan data di website ini</div>"; 
					 }else{
				 while($data=mysql_fetch_array($SQL)){ ?>
					<div class='list-p'>
					<div class='col-img'>
					<a href="?url=more&id=<?php echo $data['id_barang']; ?>"><img src='./img/product/<?php echo $data['gambar']; ?>' alt='gambar-produk' title='<?php echo $data['nama_barang']; ?>'>
					</a>
					</div>
					<div class='col-des'>
					<div class='box-name'><h1><a href="?url=more&id=<?php echo $data['id_barang']; ?>"><?php echo $data['nama_barang']; ?></a></h1></div>
					<div class='box-list'>
					<div class='box-harga'><?php echo rupiah($data['harga']); ?></div>
					<div class='box-stok'>/	Stok : <?php
						if($data['jumlah']==0){
						echo"<span class='off'>HABIS</span>";	
						}else{
						echo "<span class='on'>Tersedia</span>";	
						}
					?></div>
					</div>
					<div class='box-kategori'>Category	:	<?php echo $data['nama_kategori']; ?></div>
					<div class="box-view">comment:</div>
					<div class='box-des'>
					 <p><?php echo $data['keterangan'];?></p>
					</div>
					<form action="index.php?url=check" method="post">
					<input type="hidden" value="<?php echo $data['id_barang']; ?>" name="id_barang">
					<input type="hidden" value="<?php echo @$_SESSION['member']; ?>" name="id_member">
					<input type="hidden" value="<?php echo $data['nama_barang']; ?>" name="nama_barang">
					<input type="hidden" value="<?php echo $data['harga']; ?>" name="harga_barang">
					<div class='box-btn'><input class="btn" type="submit" value="Beli Barang"></div>
					</form>
					</div>
					</div>	 
			<?php }/*end while*/ ?>
			<div class="pg">
			<?php 
				/*box paging*/
					//hitung total data dan halaman
						$tampil=mysql_query("SELECT barang.id_barang,
						barang.id_kategori,barang.nama_barang,
						barang.harga,barang.jumlah,
						barang.keterangan,barang.gambar,kategori.id_kategori
						,kategori.nama_kategori
						FROM barang INNER JOIN kategori ON barang.id_kategori=kategori.id_kategori
						WHERE barang.nama_barang LIKE'$key%'");
						$jumlah_data=mysql_num_rows($tampil);
						$jumlah_halaman=ceil($jumlah_data/$batas);
						//link halaman sebelumnya (prev)
						if($halaman > 1){
							$prev= $halaman - 1;
							echo"<a class='pg-enable' href='?url=result&halaman=$prev'> Prev </a>";
						}else{
							echo"<div class='pg-disable'>Prev</div>";
						}
						//tampil link halaman 1,2,3...
						for($i=1;$i<=$jumlah_halaman;$i++){
							if($i !=$halaman){
								echo"<a class='pg-enable' href='?url=result&halaman=$i'>$i</a>";
							}else{
								echo"<div class='pg-disable'>$i</div>";
							}
							
						}
						//link halaman berikutnya (Next)
						if($halaman < $jumlah_halaman ){
							$next=$halaman+1;
							echo"<a class='pg-enable' href='?url=result&halaman=$next'>Next</a>";
						}else{
							echo"<div class='pg-disable'>Next</div>";
	
	
					} ?>
				</div>
			<?php 
				/*end paging*/
				}/*edn if */		
	
	
}
?>