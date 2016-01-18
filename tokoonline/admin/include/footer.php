<? session_start();
if (session_is_registered('id'))
{
?>
	<html>
	<head>
		<title></title>
	</head>
	<body>
	<img src="./img/footer.jpg" border="1">
	
	</body>
	</html>
<?
}else{
	echo "<script> document.location.href='konfirmasi.php?id=session'; </script>";
}
?>