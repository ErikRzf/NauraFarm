<?php  
session_start();

//nyambung database
$koneksi = new mysqli("localhost","root","","buahnaga");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Buah Naga</title>\

	<link rel="stylesheet"  href="admin/assets/css/bootstrap.css">
</head>
<body>
 <!-- navbar -->

<nav class="navbar navbar-default">
	<div class="container">
	<ul class="nav navbar-nav">
			<li><a href="index.php">Home</a></li>
			<li><a href="admin/login.php">Login Admin</a></li>

			<!--jika sd login (session pelaggan)	-->
			<?php if (isset($_SESSION["pelanggan"])): ?>
				<li><a href="logout.php" onclick ="return confirm('Apakah Anda Ingin Keluar')">Logout</a></li>
				
				<!--selain itublm login berarti kan-->
			<?php else: ?>
					<li><a href="login.php">Login</a></li>
					<li><a href="regis.php">Daftar</a></li>
			<?php endif ?>
			
			
		</ul>
	</div>

</nav>
<!-- konten -->


</body>
</html>
<h2>SELAMAT DATANG</h2>