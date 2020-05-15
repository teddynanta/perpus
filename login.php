<?php
include "koneksi.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Form Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16" />
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<!-- Skrip CSS -->
	<link rel="stylesheet" href="css/w3.css">
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

		body {
			background-image: url('img/book1s.jpg');
			background-size: 100%;
		}

		.s {
			text-shadow: 3px 2px 3px black;
		}

		@media (max-width : 800px) {
			table {
				width: 80%;
			}

		}
	</style>
</head>

<body class="w3-white">
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
				$_SESSION['admin'] = true;
				$_SESSION['nama'] = $hasil['nama_lengkap'];
				echo "<meta http-equiv='refresh' content='0 url=index.php'>";
			} elseif ($hasil['level'] == "user") {
				$_SESSION['user'] = true;
				$_SESSION['nama'] = $hasil['nama_lengkap'];
				echo "<meta http-equiv ='refresh' content='0 url=index.php'>";
			} elseif ($hasil['level'] == "pimpinan") {
				$_SESSION['pimpinan'] = true;
				$_SESSION['nama'] = $hasil['nama_lengkap'];
				echo "<meta http-equiv ='refresh' content='0 url=index.php'>";
			}
		} else {
			echo "<script>alert('Username/Password Anda Salah')</script>";
		}
	}
	?>
	<div class="w3-content" style="max-width:1400px">

		<!-- Header -->
		<header class="w3-container w3-center w3-text-white">
			<img src="img/logo22.png" width="10%" height="10%" style="margin-top : 5px; shadow : rgba(0,0,0,0.5)">
			<h1><b class="s">PERPUSTAKAAN UNIVERSITAS BINA INSAN</b></h1>
		</header>

		<!-- Grid -->
		<div class="w3-row">
			<table align="center" width="30%" border="0" class="w3-card">
				<tr>
					<td>
						<div class="w3-white">
							<div class="w3-main">
								<form action="login.php" method="post" class="w3-container">
									<h4 align="center"><b>Login</b></h4>
									<hr class="w3-margin-bottom">
									<label class="w3-text-black" for="uname"><b>Username</b></label>
									<input id="uname" name="uname" placeholder="Masukkan Username Anda" type="text" class="w3-input w3-border w3-light-grey"><br>
									<label class="w3-text-black" for="pw"><b>Password</b></label>
									<input id="pw" name="pw" placeholder="Masukkan Password Anda" type="password" class="w3-input w3-border w3-light-grey"><br>
									<center><input type="submit" name="login" id="login" value="Login" class="w3-button w3-blue"></center>
									<hr class="w3-margin-top">
									<div>Belum Punya Akun? Hubungi <a href="admins.php">Admin</a></div>
								</form>
							</div>
						</div>
					</td>
				</tr>
			</table>
</body>

</html>