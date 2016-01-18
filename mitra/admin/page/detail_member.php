<?php 
$result=detail_member(); 
?>
<div class="col-1">
<table class="tab-in">
<div class="box-title"><h1>DETAIL MEMBER : <?php echo $result['nama']; ?></h1></div>
<tr>
<th rowspan="4" class="tr-img"><img src="../img/user/<?php echo $result['profile']; ?>"></th>
<th class="th-ho">Nama</th>
<th class="th-pv"><?php echo $result['nama']; ?></th>
</tr>
<tr>
<th class="th-ho">Jenis Kelamin</th>
<th class="th-pv"><?php echo $result['jenis_kelamin']; ?></th>
</tr>
<tr>
<th class="th-ho">Kontak</th>
<th class="th-pv"><?php echo $result['no_tlp']; ?></th>
</tr>
<tr>
<th class="th-ho">Email</th>
<th class="th-pv"><?php echo $result['email']; ?></th>
</tr>
</table>

<table class="tab-in">
<div class="box-title"><h1>KIRIM EMAIL</h1></div>
<tr>
<th class="th-ho">To:</th>
<th class="th-pv"><input class="text-in" type="text" name="email" value="<?php echo $result['email']; ?>"></th>
</tr>
<tr>
<th class="th-ho">Pesan</th>
<th class="th-pv"><textarea class="text-area"></textarea></th>
</tr>
</table>
<div class="list-sub">
	<div class="list-button"><input class="btn" class="submit" type="submit" value="Kirim" name="btn"></div>
</div>
</div>