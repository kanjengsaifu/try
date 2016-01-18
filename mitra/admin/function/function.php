<?php 
function f_rupiah($angka){
	$convert="Rp.".number_format($angka,0,',','.');
	return $convert;
}

function get_kategori(){
	$SQL=mysql_query("SELECT*FROM kategori");
	while($data=mysql_fetch_array($SQL)){
		echo"<option value=$data[id_kategori]>$data[nama_kategori]</option>";
	}
}
function data_admin(){
	$id=$_SESSION['admin'];
	$sql=mysql_query("SELECT*FROM admin WHERE id='$id'");
	$data=mysql_fetch_array($sql);
	return $data;
}
function get_row_ktg(){
	$SQL=mysql_query("SELECT*FROM kategori");
	$jumlah=mysql_num_rows($SQL);
	echo"$jumlah";
	
}
/*session admin*/
function cek_session(){
	session_start();
	if(!isset($_SESSION['admin']) || empty($_SESSION['admin'])){
	header('location:login.php');
	}
}
/*cek status pemesanan*/

function cek_pembayaran(){
	$sql=mysql_query("SELECT * FROM konfirmasi_pemesanan");
	$cek=mysql_num_rows($sql);
	echo $cek;
}

function batal(){
	$sql=mysql_query("SELECT * FROM pesanan WHERE status='Batal'");
	$cek=mysql_num_rows($sql);
	echo $cek;
}

function masuk(){
	$sql=mysql_query("SELECT * FROM pesanan WHERE status='Baru'");
	$cek=mysql_num_rows($sql);
	echo $cek;
}

function data_konfirmasi(){
	$sql=mysql_query("SELECT * FROM konfirmasi_pemesanan  ORDER BY id DESC");
	$cek=mysql_num_rows($sql);
	if($cek==0){
		echo"<tr><th colspan='5'>Belum Ada Pesanan Masuk</th></tr>";
	}else{
		$no=0;
		while($data=mysql_fetch_array($sql)){ 
		$no++;
		?>	
		<tr class="tr-value">
		<td><?php echo $no; ?></td>
		<td><?php echo $data['kode_p']; ?></td>
		<td><?php echo $data['atas_nama']; ?></td>
		<td><?php echo $data['nama_bank']; ?></td>
		<td><?php echo $data['no_rekening']; ?></td>
		<td><?php echo $data['tgl_bayar']; ?></td>
		<td><?php echo $data['bank_tujuan']; ?></td>
		<td><a href="?redirect=pesan_konfirmasi&id=<?php echo $data['id']; ?>">Baca</a></td>
		<td><a href="./proses/proses.php?action=hapus_konfirmasi&id=<?php echo $data['id']; ?>">Hapus</a></td>
		</tr>
			
<?php		}
	}	
}

function data_pemesanan_batal(){
	$sql=mysql_query("SELECT * FROM pesanan WHERE status='Batal' ORDER BY id_pesan DESC");
	$cek=mysql_num_rows($sql);
	if($cek==0){
		echo"<tr><th colspan='5'>Belum Ada Pesanan Masuk</th></tr>";
	}else{
		$no=0;
		while($data=mysql_fetch_array($sql)){ 
		$no++;
		$idp=$data['id_pesan'];
		$sql_kode=mysql_query("SELECT * FROM `detail_pesan` WHERE id_pesan='$idp'");
		$res_id=mysql_fetch_array($sql_kode);
		?>	
		<tr class="tr-value">
		<td><?php echo $no; ?></td>
		<td><?php echo $res_id['kode_p']; ?></td>
		<td><?php echo $data['date']; ?></td>
		<td><?php echo $data['time']; ?></td>
		<td><?php if($data['status']==='Baru'){
			echo"<span class='new'>$data[status]</span>";
		}else{
			if($data['status']==='Proses'){
			echo"<span class='pro'>$data[status]</span>";	
			}else{
				if($data['status']=='Lunas'){
			echo"<span class='lunas'>$data[status]</span>";
				}else{
			echo"<span class='batal'>$data[status]</span>";		
				}
			}
		} ?></td>
		<td><a href="?redirect=del_order&id=<?php echo $data['id_pesan']; ?>">Hapus</a></td>
		</tr>
			
<?php		}
	}	
}

/*get data orer*/
function get_order(){
	include"../config/koneksi.php";
	$sql=mysql_query("SELECT * FROM pesanan WHERE status='Baru' ORDER BY id_pesan DESC");
	$cek=mysql_num_rows($sql);
	if($cek==0){
		echo"<tr><th colspan='5'>Belum Ada Pesanan Masuk</th></tr>";
	}else{
		$no=0;
		while($data=mysql_fetch_array($sql)){ 
		$no++;
		$idp=$data['id_pesan'];
		$sql_kode=mysql_query("SELECT * FROM `detail_pesan` WHERE id_pesan='$idp'");
		$res_id=mysql_fetch_array($sql_kode);
		?>	
		<tr class="tr-value">
		<td><?php echo $no; ?></td>
		<td><?php echo $res_id['kode_p']; ?></td>
		<td><?php echo $data['date']; ?></td>
		<td><?php echo $data['time']; ?></td>
		<td><?php if($data['status']==='Baru'){
			echo"<span class='new'>$data[status]</span>";
		}else{
			if($data['status']==='Proses'){
			echo"<span class='pro'>$data[status]</span>";	
			}else{
				if($data['status']=='Lunas'){
			echo"<span class='lunas'>$data[status]</span>";
				}else{
			echo"<span class='batal'>$data[status]</span>";		
				}
			}
		} ?></td>
		<td><a href="?redirect=detail_order&id=<?php echo $data['id_pesan']; ?>&subid=<?php echo $data['id_member']; ?>&kode=<?php 
		echo $res_id['kode_p'];?>">Baca</a></td>
		<td><a href="?redirect=del_order&id=<?php echo $data['id_pesan']; ?>">Hapus</a></td>
		</tr>
			
<?php		}
	}
}

/*order proses*/
function cek_orderpro(){
	$sql=mysql_query("SELECT * FROM pesanan WHERE status='Proses'");
	$cek=mysql_num_rows($sql);
	echo"$cek";
}
function get_orderpro(){
	include"../config/koneksi.php";
	$sql=mysql_query("SELECT * FROM pesanan WHERE status='Proses' ORDER BY id_pesan DESC");
	$cek=mysql_num_rows($sql);
	if($cek==0){
		echo"<tr><th colspan='5'>Belum Ada Pesanan Masuk</th></tr>";
	}else{
		$no=0;
		while($data=mysql_fetch_array($sql)){ 
		$no++;
		$idp=$data['id_pesan'];
		$sql_kode=mysql_query("SELECT * FROM `detail_pesan` WHERE id_pesan='$idp'");
		$res_id=mysql_fetch_array($sql_kode);
		?>	
		<tr class="tr-value">
		<td><?php echo $no; ?></td>
		<td><?php echo $res_id['kode_p']; ?></td>
		<td><?php echo $data['date']; ?></td>
		<td><?php echo $data['time']; ?></td>
		<td><?php if($data['status']==='Baru'){
			echo"<span class='new'>$data[status]</span>";
		}else{
			if($data['status']==='Proses'){
			echo"<span class='pro'>$data[status]</span>";	
			}else{
				if($data['status']=='Lunas'){
			echo"<span class='lunas'>$data[status]</span>";
				}else{
			echo"<span class='batal'>$data[status]</span>";		
				}
			}
		} ?></td>
		<td><a href="?redirect=detail_order&id=<?php echo $data['id_pesan']; ?>&subid=<?php echo $data['id_member']; ?>&kode=<?php 
		echo $res_id['kode_p'];?>">Baca</a></td>
		<td><a href="?redirect=del_order&id=<?php echo $data['id_pesan']; ?>">Hapus</a></td>
		</tr>
			
<?php		}
	}
}


/*----*/
function get_barang(){
		$batas=10;
		@$halaman=$_GET['halaman'];
		if(empty($halaman)){
			$posisi=0;
			$halaman=1;
		}else{
			$posisi=($halaman-1)*$batas;
		}
		$SQL=mysql_query("SELECT barang.id_barang
		,barang.id_kategori
		,barang.nama_barang
		,barang.harga
		,barang.jumlah
		,barang.keterangan
		,barang.gambar	
		,kategori.id_kategori
		,kategori.nama_kategori
		FROM barang INNER JOIN kategori ON barang.id_kategori=kategori.id_kategori ORDER BY barang.id_barang DESC  LIMIT $posisi,$batas ");
		$cek=mysql_num_rows($SQL);
		if($cek==0){
		echo"<tr><th colspan='6'><span class='error'>DATA BARANG BELUM ADA !!</span></th></tr>";	
		}else{
		$no=$posisi+1;
		while($data=mysql_fetch_array($SQL)){ ?>
		<tr class="tr-value">
		<td><?php echo $no ?></td>
		<td class="val-name"><?php echo $data['nama_barang']; ?></td>
		<td><?php echo $data['nama_kategori']; ?></td>
		<td><?php echo f_rupiah($data['harga']); ?></td>
		<td><?php echo $data['jumlah']; ?></td>
		<td class="edit"><a href="./index.php?redirect=edit_barang&id=<?php echo $data['id_barang'] ?>">Edit</a></td>
		<td class="hapus"><a href="./proses/proses.php?action=hapus_barang&id=<?php echo $data['id_barang'] ?>">Hapus</a></td>
		</tr>
		<?php $no++;} /*end while */ ?>
		</table>
	<?php 	/*paging */
	$tampil=mysql_query("SELECT barang.id_barang
	,barang.id_kategori
	,barang.nama_barang
	,barang.harga
	,barang.jumlah
	,barang.keterangan
	,barang.gambar
	,kategori.id_kategori
	,kategori.nama_kategori
	FROM barang INNER JOIN kategori ON barang.id_kategori=kategori.id_kategori");
	$jumlah_data=mysql_num_rows($tampil);
	$jumlah_halaman=ceil($jumlah_data/$batas); ?>
	<div class="paging">
	<ul>
	<?php if($halaman > 1){
		$prev= $halaman - 1;
		echo"<li><a href='index.php?redirect=barang&halaman=$prev'>Prev</a></li>";
	}else{
		echo"<li><a href='#'>Prev</a></li>";
	}
	for($i=1;$i<=$jumlah_halaman;$i++){
		if($i!=$halaman){
		echo"<li><a href='index.php?redirect=barang&halaman=$i'>$i</a></li>";
		}else{
		echo"<li><a href='#'>$i</a></li>";
		}
	}
	if($halaman < $jumlah_halaman){
		$next=$halaman+1;
		echo"<li><a href='index.php?redirect=barang&halaman=$next'>Next</a></li>";
	}else{
		echo"<li><a href='#'>Next</a></li>";
	}
	}?></ul></div>	
<?php } /*end function */


function detai_order(){
	@$idp=mysql_real_escape_string($_GET['id']);
	@$subid=mysql_real_escape_string($_GET['subid']);
	@$kode=mysql_real_escape_string($_GET['kode']);
	if(!$idp || !$subid){
		echo"<tr><th>DATA TIDAK DITEMUKAN !!</th></tr>";
	}else{
		$sqlp=mysql_query("SELECT*FROM pesanan WHERE id_pesan='$idp'");
		$datap=mysql_fetch_array($sqlp);
		$sqlm=mysql_query("SELECT*FROM member WHERE id_member='$datap[id_member]'");
		$datam=mysql_fetch_array($sqlm);
	?>
	<div class="box-title"><h1>KODE PEMESANAN/ <?php echo $kode; ?></h1></div>
	<table class="tab-in">
	<tr>
	<th class="th-ho">Nama Member</th>
	<th class="th-v"><a href="?redirect=detail_member&id=<?php echo $datam['id_member']; ?>"><?php echo $datam['nama']; ?></a></th>
	</tr>
	<tr>
	<th class="th-ho">Jenis Kelamin</th>
	<th class="th-v"><?php echo $datam['jenis_kelamin']; ?></th>
	</tr>
	<tr>
	<th class="th-ho">No Telp</th>
	<th class="th-v"><?php echo $datam['no_tlp']; ?></th>
	</tr>
	<tr>
	<th class="th-ho">Email</th>
	<th class="th-v"><?php echo $datam['email']; ?></th>
	</tr>
	</table>
	<table class="tab">
		<tr class="tr-h">
		<th>Tanggal Pesan</th>
		<th>Jam Pesan</th>
		<th>Status Pesan</th>
		<th></th>
		</tr>
		<tr class="tr-value">
		<th><?php echo $datap['date']; ?></th>
		<th><?php echo $datap['time']; ?></th>
		<th>
		<form action="./proses/proses.php?action=update_status" method="post">
		<input type="hidden" name="id" value="<?php echo $idp; ?>">
		<input type="hidden" name="subid" value="<?php echo $subid; ?>">
		<input type="hidden" name="kode" value="<?php echo $kode; ?>">
		<select class="select" name="status">
		<option value="Baru">Pilih</option>
		<option value="Proses">Proses</option>
		<option value="Lunas">Lunas</option>
		<option value="Batal">Batal</option>
		</select></th>
		<th><input class="btn"type="submit" value="Ubah Status Pemesanan"></th>
		</form>
		</tr>
	</table>
	<table class="tab">
	<tr class="tr-h">
	<th>No</th>
	<th>Nama Barang</th>
	<th>Jumbel</th>
	<th>Harga Barang</th>
	<th>Subtotal</th>
	</tr>
	<?php 
		$sqldetail=mysql_query("SELECT*FROM detail_pesan INNER JOIN barang ON detail_pesan.id_barang= barang.id_barang WHERE 
		detail_pesan.id_pesan='$idp'");
		$no=1;
		while($data=mysql_fetch_array($sqldetail)){
		$sub=$data['jumbel']*$data['harga'];
		@$grand+=$sub;
		?>
			<tr class="tr-value">
			<th><?php echo $no; ?></th>
			<th><?php echo  $data['nama_barang']; ?></th>
			<th><?php echo  $data['jumbel']; ?></th>
			<th><?php echo  f_rupiah($data['harga']); ?></th>
			<th><?php echo  f_rupiah($sub); ?></th>
			</tr>
	<?php $no++; } ?>
	<tr class="list-grand">
	<td colspan="2" class="grand">GRAND TOTAL : <?php echo f_rupiah($grand);  ?></td>
	</tr>
	</table>
	<div class="box-title"><h1>Alamat Kirim </h1></div>
	<?php 
	$sql=mysql_query("SELECT*FROM alamat_kirim WHERE id_pesan='$idp'");
	$result=mysql_fetch_array($sql);
	?>
	<table class="tab-in">
	<tr>
	<th class="th-ho">Nama Penerima</th>
	<th class="th-v"><?php echo $result['atas_nama']; ?></th>
	</tr>
	<tr>
	<th class="th-ho">No Telp</th>
	<th class="th-v"><?php echo $result['kontak']; ?></th>
	</tr>
	<tr>
	<th class="th-ho">Alamat Kirim</th>
	<th class="th-v"><?php echo $result['alamat_kirim']; ?></th>
	</tr>
	</table>
<?php  		
	}
	
	
}

function del_order(){
	$id=mysql_real_escape_string($_GET['id']);
	$sql=mysql_query("SELECT*FROM detail_pesan WHERE id_pesan='$id'");
	while($data=mysql_fetch_array($sql)){
		mysql_query("UPDATE barang SET jumlah=jumlah+$data[jumbel] WHERE id_barang='$data[id_barang]'");
		mysql_query("DELETE FROM detail_pesan WHERE id_pesan='$data[id_pesan]'");
		mysql_query("DELETE FROM alamat_kirim WHERE id_pesan='$data[id_pesan]'");
		mysql_query("DELETE FROM pesanan WHERE id_pesan='$data[id_pesan]'");
		header('location:?redirect=order');
	}
}

function get_datatrans(){
	$sql=mysql_query("SELECT*FROM pesanan INNER JOIN detail_pesan ON pesanan.id_pesan=detail_pesan.id_pesan  
	WHERE pesanan.status='Lunas' ORDER BY pesanan.id_pesan DESC ");
	$no=0;
	$total=0;
	$cek=mysql_num_rows($sql);
	if($cek==0){
		echo"<tr><th>Data Penjualan Belum Ada</th></tr>";
	}else{

		while($data=mysql_fetch_array($sql)){
		$sqlb=mysql_query("SELECT*FROM barang WHERE id_barang='$data[id_barang]'");
		$datab=mysql_fetch_array($sqlb);
		$sub=$data['jumbel']*$data['harga'];
		$no++;
		$total+=$sub;
		?>
		<tr class="tr-value">
		<th><?php echo $no; ?></th>
		<th><?php echo $data['date']; ?></th>
		<th><?php echo $data['kode_p']; ?></th>
		<th class="val-name"><?php echo "$datab[nama_barang]"; ?></th>
		<th><?php echo $data['jumbel']; ?></th>
		<th><?php echo f_rupiah($data['harga']); ?></th>
		<th><?php echo f_rupiah($sub); ?></th>
		</tr>
<?php  } ?>
		<tr class="list-grand"><th colspan="4">Total Penjualan :&nbsp;<span class='grand'><?php echo f_rupiah($total); ?></span></th></tr>
<?php 
	}
}
function pesan(){
$id=mysql_real_escape_string($_GET['id']);
$sql=mysql_query("SELECT*FROM konfirmasi_pemesanan WHERE id='$id'");
$cek=mysql_num_rows($sql);
if($cek==0){
		echo"DATA TIDAK DI TEMUKAN";
}else{ 
while($data=mysql_fetch_array($sql)){?>	
<table>
<tr>
<th><?php 
if($data['pesan']==""){
	echo"Tidak Ada Pesan Yang Terlampir";
}
echo $data['pesan'] ?>
</th>
</tr>
</table>
<?php }}
}

function edit_admin(){
	$id=$_SESSION['admin'];
	$sql=mysql_query("SELECT*FROM admin WHERE id='$id'");
	return $sql;
}

function update_admin(){
	$id=$_SESSION['admin'];
	$nama=mysql_real_escape_string($_POST['nama_lengkap']);
	$user_name=mysql_real_escape_string($_POST['user']);
	$kontak=mysql_real_escape_string($_POST['kontak']);
	if(!$nama || !$user_name || !$kontak){
		echo"<script>alert('Isi Semua Filed');location='./index.php?redirect=edit_admin'</script>";
	}else{
		mysql_query("UPDATE admin SET nama_lengkap='$nama',user_name='$user_name',kontak='$kontak' WHERE id='$id'");
		echo"<script>alert('Data Terupdate');location='./index.php?redirect=edit_admin'</script>";
	}
}

function simpan_admin(){
	$nama_lengkap=mysql_real_escape_string($_POST['nama_lengkap']);
	$user_name=mysql_real_escape_string($_POST['user']);
	$kontak=mysql_real_escape_string($_POST['kontak']);
	$password=mysql_real_escape_string($_POST['password']);
	if(!$nama_lengkap || !$user_name || !$kontak || !$password){
	echo"<script>alert('Isi Semua Filed');location='./index.php?redirect=rekrut_admin'</script>";	
	}else{
		$sql=mysql_query("SELECT*FROM admin WHERE user_name='$user_name'");
		$cek=mysql_num_rows($sql);
		if($cek==0){
		$en=md5($password);
		mysql_query("INSERT INTO `admin`( `user_name`, `password`, `nama_lengkap`, `kontak`, `profile`) 
		VALUES ('$user_name','$en','$nama_lengkap','$kontak','no-pic.png')");
		echo"<script>alert('Berhasi Di Tambahakn');location='./index.php?redirect=rekrut_admin'</script>";		
		}else{
		echo"<script>alert('Username Sudah ada');location='./index.php?redirect=rekrut_admin'</script>";		
		}
		
	}
}


function ubah_password(){
		$id=$_SESSION['admin'];
		$ps_lama=md5($_POST['ps_lama']);
		$ps_baru=md5($_POST['ps_baru']);
		$sql=mysql_query("SELECT*FROM admin WHERE id='$id' AND password='$ps_lama'");
		$cek=mysql_num_rows($sql);
		if($cek==0){
		echo"<script>alert('Password Lama Tidak Cocok');location='./index.php?redirect=ubah_password'</script>";		
		}else{
		mysql_query("UPDATE admin SET password='$ps_baru' WHERE id='$id'");	
		echo"<script>alert('Berhasil di Update');location='./index.php?redirect=ubah_password'</script>";	
		}
	}
	
function upload_foto(){
		$id=$_SESSION['admin'];
		$gb=$_FILES['gambar'] ['name'];
		$flt=$_FILES['gambar'] ['type']; 
		$fltp=$_FILES['gambar']['tmp_name'];
		$random_digit=rand(0000,9999);
		$nama_baru=$random_digit.$gb;
		if(!$gb){
		echo"<script>alert('Pilih File !');location='./index.php?redirect=foto_admin'</script>";		
		}else{
		move_uploaded_file($fltp,".././img/user/".$nama_baru);
		mysql_query("UPDATE admin SET profile='$nama_baru' WHERE id='$id'");
		header("location:.?redirect=foto_admin");
		}
}

function get_data_member(){
	
	$batas=10;
		@$halaman=$_GET['halaman'];
		if(empty($halaman)){
			$posisi=0;
			$halaman=1;
		}else{
			$posisi=($halaman-1)*$batas;
		}
		$SQL=mysql_query("SELECT * FROM member  LIMIT $posisi,$batas ");
		$cek=mysql_num_rows($SQL);
		if($cek==0){
		echo"<tr><th colspan='6'><span class='error'>DATA MEMBER BELUM ADA !!</span></th></tr>";	
		}else{
		$no=$posisi+1;
		while($data=mysql_fetch_array($SQL)){ ?>
		<tr class="tr-value">
		<td><?php echo $no ?></td>
		<td class="val-name"><?php echo $data['nama']; ?></td>
		<td><?php echo $data['no_tlp']; ?></td>
		<td><?php echo $data['email']; ?></td>
		<td class="edit"><a href="./index.php?redirect=detail_member&id=<?php echo $data['id_member'] ?>">Detail</a></td>
		</tr>
		<?php $no++;} /*end while */ ?>
		</table>
	<?php 	/*paging */
	$tampil=mysql_query("SELECT* FROM member");
	$jumlah_data=mysql_num_rows($tampil);
	$jumlah_halaman=ceil($jumlah_data/$batas); ?>
	<div class="paging">
	<ul>
	<?php if($halaman > 1){
		$prev= $halaman - 1;
		echo"<li><a href='index.php?redirect=data_member&halaman=$prev'>Prev</a></li>";
	}else{
		echo"<li><a href='#'>Prev</a></li>";
	}
	for($i=1;$i<=$jumlah_halaman;$i++){
		if($i!=$halaman){
		echo"<li><a href='index.php?redirect=data_member&halaman=$i'>$i</a></li>";
		}else{
		echo"<li><a href='#'>$i</a></li>";
		}
	}
	if($halaman < $jumlah_halaman){
		$next=$halaman+1;
		echo"<li><a href='index.php?redirect=data_member&halaman=$next'>Next</a></li>";
	}else{
		echo"<li><a href='#'>Next</a></li>";
	}
	}?></ul></div>	
	
<?php }


function detail_member(){
	$id=$_GET['id'];
	$sql=mysql_query("SELECT*FROM member WHERE id_member='$id'");
	$result=mysql_fetch_array($sql);
	return $result;
	
}

function get_pesan_member(){
	$sql=mysql_query("SELECT*FROM contat_us");
	return $sql;
}