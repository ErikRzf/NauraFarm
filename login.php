<?php 
session_start();
$koneksi = new mysqli("localhost","root","","buahnaga");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Pelanggan</title>
	<!--koneksi css nya-->
	<link rel="stylesheet"  href="admin/assets/css/bootstrap.css">
</head>
<body>
	 <!-- navbar -->

<nav class="navbar navbar-default">
	<div class="container">
	<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
			
			<!--jika sd login (session pelaggan)	-->
			<?php if (isset($_SESSION["pelanggan"])): ?>
				<li><a href="logout.php">Logout</a></li>
				<!--selain itublm login berarti kan-->
			<?php else: ?>
					<li><a href="login.php">Login</a></li>
			<?php endif ?>
			
			
		</ul>
	</div>

</nav>

	<div class= "container">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						
					
					<h3 class="panel-title">Login Pelanggan</h3>
				</div>
				<div class="panel-body">
					<form method="post">
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email">
						</div>
						<div class="form-group">
							<label>Kata Sandi</label>
							<input type="password" class="form-control" name="password">
						</div>
						<button class="btn btn-primary" name="masuk">Masuk</button>
						<hr> Belum Punya Akun ? <a href="regis.php" >klik Disini </a>
					
					</form>

				</div>
				</div>
		</div>
	</div>		
</div>
<?php 
//jika da tombol simpan(simpan di tekan)
if (isset($_POST['masuk']))
 {
	$email = $_POST["email"];
	$password = $_POST["password"];
	// melakukan query cek akun di tabel database
	$ambil = $koneksi->query("SELECT * FROM Pelanggan
		WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

	//ngitung akun yg terambil
	$akuncocok = $ambil->num_rows;
	//jika salah satu akun cpcok mama login
	
	if ($akuncocok==1) 
	{
		//sukse login dan mendapatkan akun dlm bentuk array
		$akun = $ambil->fetch_assoc();
		//simpan di session pelanggan
		$_SESSION["pelanggan"] = $akun; 
		echo "<script>alert('Anda sukses lohin')</script>";
		echo "<script>location = 'index.php'</script>";
	}
	elseif (empty($email)) {
		echo "<script>alert('Data Kosong')</script>";
		echo "<script>location = 'login.php'</script>";
	}
	elseif (empty($password)) {
		echo "<script>alert('Data Kosong')</script>";
		echo "<script>location = 'login.php'</script>";
	}
	else{
		//ggl login
		echo "<script>alert('email atau kata sandi anda salah')</script>";
		echo "<script>location = 'login.php'</script>";
	}
}
 ?>

</body>
</html>