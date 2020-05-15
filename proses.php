	<?php

	include "koneksi.php";
	$username = isset($_POST['uname']) ? $_POST['uname'] : '';
	$password = isset($_POST['pw']) ? $_POST['pw'] : '';
	$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
	$tipe = isset($_POST['user']) ? $_POST['user'] : '';
	$query = mysql_query("INSERT INTO login VALUES ('','$username','$password' ,'$nama','$tipe')");

	echo "Data Berhasil Diinput! Mohon Tunggu Sebentar";
	echo "<meta http-equiv='refresh' content='2;
				url=index.php?hal=3'>";
	?>