<?php 
	require_once "functions.php";
	check_login();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Perpustakaan</title>
	<?php include "contents/headscript.php"; ?>
	<style>
		body{
			background-color: #EEE8AA;
			background-size: 100%;
		}
		.jumbotron{
			background: linear-gradient(to top right, #996633 0%, #cc9900 70%);
		}
	</style>
</head>
<body>
	<?php include "contents/navbar.php"; ?>

	<main>
		<div class="container">
			<div class="jumbotron">
		  		<h1>Selamat Datang</h1>
		  		<p class="lead">Web perpustakaan sederhana</p>
				<hr class="my-4">
				<p>Web aplikasi ini berisi informasi mengenai Buku, Pendaftaran Member, Report Peminjaman </p>
			</div>	
		</div>
		
	</main>


	<?php include "contents/footer.php"; ?>

</body>
</html>