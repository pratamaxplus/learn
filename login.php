<?php require "functions.php"?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<title>َLogin Form</title>
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?= BASE_URL ?>assets/css/signin.css">

	<script type="text/javascript" src="<?= BASE_URL ?>assets/js/jquery-3.5.1.slim.min.js"></script>
	<script type="text/javascript" src="<?= BASE_URL ?>assets/js/popper.min.js"></script>
	<script type="text/javascript" src="<?= BASE_URL ?>assets/js/bootstrap.min.js"></script>
</head>
<body class="text-center">
	<div class="container">
	<h2>Web Perpustakaan Sederhana</h2>
	<form class="form-signin" method="POST">
		<img src="img/book.png" width="100">
		<br><br>
		<h1 class="h3 mb-3 font-weight-normal">Silahkan Login</h1>
		<input class="form-control" type="email" name="username" placeholder="Email" autocomplete="off">
		<input class="form-control" type="password" name="password" placeholder="Password">
		<button class="btn btn-block btn-primary"type="submit">Login</button>

		<?php 
		if (isset($_SESSION['username'])) {
			redirect('index.php');
		}
		if(isset($_POST['username']) && isset($_POST['password'])){
			require "koneksi.php";
		//Buka Koneksi
			$conn = buka_koneksi();
		//query mysql
			$query ="SELECT * FROM user WHERE email = '$_POST[username]' AND pass = MD5('$_POST[password]')";
		//echo "$query";
		//eksekusi query
			$hasil = mysqli_query($conn, $query);
		//baca hasil
			if($isi = mysqli_fetch_assoc($hasil)){
				$_SESSION['username'] = $isi['username'];
				redirect('index.php');
			}else{
				echo '<div class="alert alert-danger" role="alert">Username dan Password Salah</div>';
			}
		}	
		?>
	</form>
	</div>
	<?php include "contents/footer.php"; ?>
</body>
</html>
