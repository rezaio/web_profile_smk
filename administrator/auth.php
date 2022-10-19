<?php
session_start();
include("../lib/koneksi.php");
$username = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['username']));
$password = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['password']));
$password = md5($_POST['password']);
$cek 	= mysqli_query($koneksi, "select * from tbl_user where username='$username' and password='$password'");
$data	= mysqli_fetch_array($cek);
$jumlah = mysqli_num_rows($cek);
if ($jumlah < 1) {
	?>
	<br>
	<div class="alert alert-danger" style="text-align:center">
		Maaf Username Atau Password Tidak Cocok !
		<br><b><a href='index.php'>ULANGI</a></b>
	</div>
<?php
} else {
	if ($data['status'] == "Tidak Aktif") {
		?>
		<br>
		<div class="alert alert-danger" style="text-align:center">
			Maaf Username Anda belom aktif !
			<br><b><a href='index.php'>ULANGI</a></b>
		</div>
	<?php
} else if ($data['status'] == "Aktif") {
	$_SESSION['userweb'] = $data['id_user'];
	$_SESSION['level'] = $data['level'];
	if ($data['level'] == "Administrator") {
		header('location:admin.php');
	} else if ($data['level'] == "Pengelola Data") {
		header('location:pengelola.php');
	}
}
}
?>