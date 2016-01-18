<?php
date_default_timezone_set('Asia/Jakarta');
$tanggal=date("y-m-d");
$jam=date('H:i:s');
$link=mysql_connect("localhost","root","");
mysql_select_db("gms",$link) or die("Database not found");
?>