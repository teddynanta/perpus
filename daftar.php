<?php
include "koneksi.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Form Daftar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Skrip CSS -->
	<link rel="stylesheet" href="w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<style>
		body,
		h1,
		h2,
		h3,
		h4,
		h5 {
			font-family: "Raleway", sans-serif
		}
	</style>
</head>

<body class="w3-indigo" background="yoi.jpg" width="100%">
	<?php
	$username = $_POST['uname'];
	$password = $_POST['pw'];
	if (isset($_POST['login'])) {
		$query = mysql_query("SELECT * FROM login WHERE username = '$username' AND password = '$password'") or die(mysql_error());
		$hasil = mysql_fetch_array($query);
		$login = mysql_num_rows($query);
		if ($login >= 1) {
			$_SESSION['login'] = true;
			if ($hasil['level'] == "admin") {
				echo "<meta http-equiv='refresh' content='0 url=index.php'>";
			} elseif ($hasil['level'] == "user") {
				echo "<meta http-equiv ='refresh' content='0 url=kalender.php'>";
			} elseif ($hasil['level'] == "pimpinan") {
				echo "<meta http-equiv ='refresh' content='0 url=tes.php'>";
			}
		} else {
			echo "<script>alert('Username/Password Anda Salah')</script>";
		}
	}
	?>
	<div class="w3-content" style="max-width:1400px">

		<!-- Header -->
		<header class="w3-container w3-center w3-padding-32">
		<!--	<style type="text/css">
			img{
				position: relative;
				z-index: 1;
				top: 0px;
			}
			h1{
				position: absolute;
				top: 50px;
				right: 50px;
				left: 50px;
				z-index: 2;
				color: black;
				text-align: center;

			}
		</style> -->
			
			<img src="logo2.png" width="15%" height="15%">
			<hr />
		</header>

		<!-- Grid -->
		<div class="w3-row">
			<!-- 	<center>
  		<h2><b>FORM LOGIN PERPUSTAKAAN UNIVERSITAS BINA INSAN</b></h2>
  		<p><b>Login Anggota</b></p>
  		<hr/>
  	</center> -->
			<table align="center" width="30%" border="0" class="w3-card">
				<tr>
					<td>
						<div class="w3-light-blue">
							<div class="w3-main">
								<form action="login.php" method="post" class="w3-container">

									<h4 align="center"><b><u>Daftar</u></b></h4>
									<label class="w3-text-black" for="uname"><b>Username</b></label>
									<input id="uname" name="uname" placeholder="Masukkan Username Anda" type="text" class="w3-input w3-border w3-light-grey"><br>
									<label class="w3-text-black" for="pw"><b>Password</b></label>
									<input id="pw" name="pw" placeholder="Masukkan Password Anda" type="password" class="w3-input w3-border w3-light-grey"><br>
									<!-- <label class="w3-text-black"><b>Password</b></label>
						<input id="password" name="password" placeholder="**********" type="password" class="w3-input w3-border w3-light-grey"><br> -->
									<!-- 						<label class="w3-text-black"><b>NIM</b></label>
						<input id="name" name="nama" placeholder="Masukkan nomor hape/NIK jika anda bukan mahasiswa" type="text" class="w3-input w3-border w3-light-grey"><br>
						<label class="w3-text-black"><b>Jenis</b></label>
						<select name="jenis" class="w3-input w3-border w3-light-grey">
							<option value="mhsw">Mahasiswa</option>
							<option value="pljr">Pelajar</option>
							<option value="pkrj">Pekerja</option>
						</select><br> -->
									<center><input type="submit" name="login" id="login" value="Daftar" class="w3-button w3-blue-grey"></center>
									<div class="w3-padding w3-display-bottomright"> Anda Pengunjung? <a href="login_pengunjung.php">Login Disini</a></div>
								</form>
							</div>
						</div>
					</td>
				</tr>
			</table>
</body>

</html>