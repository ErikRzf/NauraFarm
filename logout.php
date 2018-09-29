<a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar ?')">[Logout]</a>
 <?php 

session_start();

session_destroy();

echo "<script>alert('anda telah keluar')</script>";
echo "<script>location='index.php';</script>";
 ?>