<?php
if (!defined("INDEX")) die("---");

if (isset($_GET['tampil'])) $tampil = $_GET['tampil'];
else $tampil = "home";
?>

	<?php
	if ($tampil == "home")					include("konten/home.php");
	elseif ($tampil == "halaman")			include("konten/halaman.php");
	elseif ($tampil == "gallery")			include("konten/gallery.php");
	elseif ($tampil == "gallery_detail")	include("konten/gallery_detail.php");
	elseif ($tampil == "berita")			include("konten/berita.php");
	elseif ($tampil == "berita_detail")		include("konten/berita_detail.php");
	elseif ($tampil == "kategori")			include("konten/kategori.php");
	elseif ($tampil == "pengumuman")		include("konten/pengumuman.php");
	elseif ($tampil == "detail_pengumuman")	include("konten/detail_pengumuman.php");
	elseif ($tampil == "download")			include("konten/download.php");
	elseif ($tampil == "student")			include("konten/student.php");
	elseif ($tampil == "contact")			include("konten/contact.php");
	elseif ($tampil == "kontak_proses")		include("konten/kontak_proses.php");
	elseif ($tampil == "komentar_proses")	include("konten/komentar_proses.php");
	elseif ($tampil == "404")		include("konten/404.php");
	else echo "<?php include 'konten/404.php' ; ?>";
	?>
