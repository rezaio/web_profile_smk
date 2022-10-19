-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2022 pada 13.51
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_portal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id_banner` int(11) NOT NULL,
  `id_berita` int(11) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `judul_depan` varchar(100) DEFAULT NULL,
  `judul_belakang` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_banner`
--

INSERT INTO `tbl_banner` (`id_banner`, `id_berita`, `gambar`, `judul_depan`, `judul_belakang`) VALUES
(2, NULL, '5d09782b27805.png', 'Selamat Datang Di PORTAL ', 'Teknik Komputer Dan Informatika SMKN 1 Gedong Tataan'),
(3, NULL, '5d0978580a3d1.jpeg', 'Pakarnya IT Muda', 'TIK SMKN 1 Gedong Tataan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(11) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `publish` enum('Ya','Tidak') NOT NULL DEFAULT 'Ya',
  `tglupload` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `gambar`, `judul`, `id_kategori`, `isi`, `publish`, `tglupload`, `id_user`) VALUES
(1, '5d0a474f99c13.jpg', 'SEBENARNYA APA ITU SISTEM OPERASI ?. . .', 2, '<p>Sistem Operasi (Operating System) adalah perangkat lunak sistem yang mengatur sumber daya dari perangkat keras dan pernagkat lunak, tanpa sistem operasi pengguna tidak dapat menjalankan program aplikasi pada komputer mereka, kecuali program booting.</p>\r\n\r\n<p>Sistem operasi mempunyai penjadwalan yang sistematis mencakup perhitungan penggunaan memori, pemrosesan data, penyimpanan data, dan sumber daya lainnya. Untuk fungsi-fungsi perangkat keras seperti sebagai masukan dan keluaran dan alokasi memori, sistem operasi bertindak sebagai perantara antara program aplikasi dan perangkat keras komputer, meskipun kode aplikasi biasanya dieksekusi langsung oleh perangkat keras dan seringkali akan menghubungi OS atau terputus oleh itu. Sistem operasi yang berisi komputer dari ponsel dan konsol permainan video untuk superkomputer dan server web. Contoh sistem operasi modern adalah Linux,Android,IOS,Mac OS X,dan Microsoft Windows</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Biasanya, istilah sistem operasi sering ditujukan kepada semua perangkat lunak yang masuk dalam satu paket dengan sistem komputer sebelum aplikasi-aplikasi perangkat lunak terinstal. Sistem operasi adalah perangkat lunak sistem yang bertugas untuk melakukan kontrol dan manajemen perangkat keras serta operasi-operasi dasar sistem, termasuk menjalankan perangkat lunak aplikasi seperti program-program pengolah kata dan perambanan web.</p>\r\n\r\n<p>Secara umum, sistem operasi adalah perangkat lunak pada lapisan pertama yang ditempatkan pada memori komputer pada saat komputer dinyalakan booting.</p>\r\n\r\n<p>Sedangkan software-software lainnya dijalankan setelah sistem operasi berjalan, dan sistem operasi akan melakukan layanan inti untuk software-software itu. Layanan inti tersebut seperti akses ke disk, manajemen memori, penjadwalan tugas schedule task, dan antar-muka user GUI/CLI. Sehingga masing-masing software tidak perlu lagi melakukan tugas-tugas inti umum tersebut, karena dapat dilayani dan dilakukan oleh sistem operasi. Bagian kode yang melakukan tugas-tugas inti dan umum tersebut dinamakan dengan &ldquo;kernel&rdquo; suatu sistem operasi.</p>\r\n\r\n<p>Kalau sistem komputer terbagi dalam lapisan-lapisan, maka sistem operasi adalah penghubung antara lapisan hardware dengan lapisan software. Sistem operasi melakukan semua tugas-tugas penting dalam komputer, dan menjamin aplikasi-aplikasi yang berbeda dapat berjalan secara bersamaan dengan lancar. Sistem operasi menjamin aplikasi lainnya dapat menggunakan memori, melakukan input dan output terhadap peralatan lain, dan memiliki akses kepada sistem berkas. Apabila beberapa aplikasi berjalan secara bersamaan, maka Sistem operasi mengatur schedule yang tepat, sehingga sedapat mungkin semua proses yang berjalan mendapatkan waktu yang cukup untuk menggunakan prosesor (CPU) serta tidak saling mengganggu.</p>\r\n\r\n<p>Dalam banyak kasus, Sistem Operasi menyediakan suatu pustaka dari fungsi-fungsi standar, di mana aplikasi lain dapat memanggil fungsi-fungsi itu, sehingga dalam setiap pembuatan program baru, tidak perlu membuat fungsi-fungsi tersebut dari awal.</p>\r\n\r\n<p>Sistem operasi secara umum terdiri dari beberapa bagian:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>*Mekanisme Boot, yaitu meletakkan kernel ke dalam memory</p>\r\n\r\n<p>*Kernel, yaitu inti dari sebuah sistem operasi Command Interpreter atau shell, yang&nbsp; &nbsp;bertugas membaca input dari pengguna</p>\r\n\r\n<p>*Pustaka-pustaka, yaitu yang menyediakan kumpulan fungsi dasar dan standar yang dapat dipanggil oleh aplikasi lain</p>\r\n\r\n<p>*Driver untuk berinteraksi dengan hardware eksternal, sekaligus untuk mengontrolnya.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sebagian Sistem operasi hanya mengizinkan satu aplikasi saja yang berjalan pada satu waktu (misalnya DOS), tetapi sebagian besar Sistem Operasi baru mengizinkan beberapa aplikasi berjalan secara simultan pada waktu yang bersamaan. Sistem operasi seperti ini disebut sebagai Multi-tasking Operating System (misalnya keluarga sistem operasi UNIX). Beberapa Sistem Operasi berukuran sangat besar dan kompleks, serta inputnya tergantung kepada input pengguna, sedangkan sistem operasi lainnya sangat kecil dan dibuat dengan asumsi bekerja tanpa intervensi manusia sama sekali. Tipe yang pertama sering disebut sebagai Desktop OS, sedangkan tipe kedua adalah Real-Time OS, contohnya adalah Windows, Linux, free BSD, Solaris, Palm, Symbian dan sebagainya.</p>\r\n\r\n<p><a href=\"https://3.bp.blogspot.com/-_8z3bQ1tqNg/W_ohyRImSrI/AAAAAAAAAbU/jv9g0gUnDLM_MeMQG31TH2ZpXOQBzvWMgCLcBGAs/s1600/k.jpg\"><img src=\"https://3.bp.blogspot.com/-_8z3bQ1tqNg/W_ohyRImSrI/AAAAAAAAAbU/jv9g0gUnDLM_MeMQG31TH2ZpXOQBzvWMgCLcBGAs/s400/k.jpg\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>*Sistem operasi saat ini</p>\r\n\r\n<p>Sistem operasi utama yang digunakan komputer umum (termasuk PC, komputer personal) terbagi menjadi 3 kelompok besar:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>* Sistem Microsoft Windows - yang antara lain terdiri dari Windows Desktop Environment (versi 1.x hingga versi 3.x), Windows 9x (Windows 95, 98, dan Windows ME), dan Windows NT (Windows NT 3.x, Windows NT 4.0, Windows 2000, Windows XP, Windows Server 2003, Windows Vista, Windows Server 2008, Windows 7 (Seven) yang dirilis pada tahun 2009, Windows 8 yang dirilis pada Oktober 2012), dan Windows Terakhir yaitu Windows 10 (Dirilis pada Juli 2015)).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>* Sistem Unix yang menggunakan antarmuka sistem operasi POSIX, seperti SCO UNIX, keluarga BSD (Berkeley Software Distribution), GNU/Linux, Zeath OS (berbasis kernel linux yang dimodifikasi.)MacOS/X (berbasis kernel BSD yang dimodifikasi, dan dikenal dengan nama Darwin) dan GNU/Hurd.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>* Sistem Mac OS, adalah sistem operasi untuk komputer keluaran Apple yang biasa disebut Mac atau Macintosh. Sistem operasi yang terbaru adalah Mac OS X versi 10.12 (Sierra).</p>\r\n\r\n<p>Sedangkan komputer Mainframe, dan Super Komputer menggunakan banyak sekali sistem operasi yang berbeda-beda, umumnya merupakan turunan dari sistem operasi UNIX yang dikembangkan oleh vendor seperti IBM AIX, HP/UX, dll.</p>\r\n', 'Ya', '2019-06-04', 30),
(2, '5d0a47cbec506.jpg', 'MEMAHAMI SUBNETTING DAN IP ADDRESS', 2, '<p>Subneting adalah proses memecah suatu IP jaringan ke sub jaringan yang lebih kecil yang disebut &quot;subnet.&quot; Setiap subnet deskripsi non-fisik (atau ID) untuk jaringan-sub fisik (biasanya jaringan beralih dari host yang mengandung satu router -router dalam jaringan multi).IP (Internet Protocol) adalah&nbsp; deretan angka biner antara 32 bit sampai 128 bit yang dipakai sebagai alamat identifikasi untuk tiap komputer host dalam jaringan Internet. Panjang dari angka ini adalah 32Bit (untuk IPv4 atau IP versi 4), dan 128 bit (untuk IPv4 atau IP v6) yang menunjukkan alamat dari komputer tersebut pada jaringan Internet berbasis TCP/IP.Pengiriman data dalam jaringan TCP/IP berdasarkan IP address komputer pengirim dan komputer penerima. IP address memiliki dua bagian, yaitu alamat jaringan (network address) dan alamat komputer lokal (host address) dalam sebuah jaringan.</p>\r\n\r\n<p><br />\r\nAlamat IPv4 terbagi menjadi beberapa jenis, yakni sebagai berikut:</p>\r\n\r\n<p>Alamat Unicast, merupakan alamat IPv4 yang ditentukan untuk sebuah antarmuka jaringan yang dihubungkan ke sebuah Internetwork IP. Alamat Unicast digunakan dalam komunikasi point-to-point atau one-to-one.</p>\r\n\r\n<p>Alamat Broadcast, merupakan alamat IPv4 yang didesain agar diproses oleh setiap node IP dalam segmen jaringan yang sama. Alamat broadcast digunakan dalam komunikasi one-to-everyone.</p>\r\n\r\n<p>Alamat Multicast, merupakan alamat IPv4 yang didesain agar diproses oleh satu atau beberapa node dalam segmen jaringan yang sama atau berbeda. Alamat multicast digunakan dalam komunikasi one-to-many.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Berikut Tabel Nilai Oktet pertama disetiap kelasnya :</strong></p>\r\n\r\n<table border=\"1\" cellspacing=\"0\" style=\"width:354px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; border-color:black; text-align:left; vertical-align:top; width:123.75pt\">\r\n			<p>Kelas</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; border-color:black; text-align:left; vertical-align:top; width:128.25pt\">\r\n			<p>Nilai Oktet Pertama</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; text-align:left; vertical-align:top; width:123.75pt\">\r\n			<p>Kelas A</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; border-color:black; text-align:left; vertical-align:top; width:128.25pt\">\r\n			<p>1&ndash;126</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; text-align:left; vertical-align:top; width:123.75pt\">\r\n			<p>Kelas B</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; border-color:black; text-align:left; vertical-align:top; width:128.25pt\">\r\n			<p>128&ndash;191</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; text-align:left; vertical-align:top; width:123.75pt\">\r\n			<p>Kelas C</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; border-color:black; text-align:left; vertical-align:top; width:128.25pt\">\r\n			<p>192&ndash;223</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; text-align:left; vertical-align:top; width:123.75pt\">\r\n			<p>Kelas D</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; border-color:black; text-align:left; vertical-align:top; width:128.25pt\">\r\n			<p>224-239</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; text-align:left; vertical-align:top; width:123.75pt\">\r\n			<p>Kelas E</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; border-color:black; text-align:left; vertical-align:top; width:128.25pt\">\r\n			<p>240-255</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Prefix :</strong></p>\r\n\r\n<table border=\"1\" cellspacing=\"0\" style=\"width:205px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; border-color:black; text-align:left; vertical-align:top; width:24pt\">\r\n			<p>128</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; border-color:black; text-align:left; vertical-align:top; width:15.75pt\">\r\n			<p>64</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; border-color:black; text-align:left; vertical-align:top; width:15.75pt\">\r\n			<p>32</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; border-color:black; text-align:left; vertical-align:top; width:15.75pt\">\r\n			<p>16</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; border-color:black; text-align:left; vertical-align:top; width:8.25pt\">\r\n			<p>8</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; border-color:black; text-align:left; vertical-align:top; width:8.25pt\">\r\n			<p>4</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; border-color:black; text-align:left; vertical-align:top; width:8.25pt\">\r\n			<p>2</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; border-color:black; text-align:left; vertical-align:top; width:6.75pt\">\r\n			<p>1</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; text-align:left; vertical-align:top; width:24pt\">\r\n			<p>1</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; text-align:left; vertical-align:top; width:15.75pt\">\r\n			<p>1</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; text-align:left; vertical-align:top; width:15.75pt\">\r\n			<p>1</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; text-align:left; vertical-align:top; width:15.75pt\">\r\n			<p>1</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; text-align:left; vertical-align:top; width:8.25pt\">\r\n			<p>1</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; text-align:left; vertical-align:top; width:8.25pt\">\r\n			<p>1</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; text-align:left; vertical-align:top; width:8.25pt\">\r\n			<p>1</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; border-color:black; text-align:left; vertical-align:top; width:6.75pt\">\r\n			<p>1</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Contoh Soal :</p>\r\n\r\n<p>IP Address : 192.168.10.1 /26</p>\r\n\r\n<p>Subnetmask : 255.255.255.192</p>\r\n\r\n<p>11111111.11111111.11111111.11000000</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Jumlah Subnet : 2x= 22=4</p>\r\n\r\n<p>Jumlah Host : 2y-2= 26-2 = 64-2=62</p>\r\n\r\n<p>Jumlah Blok : 256-192 = 64</p>\r\n\r\n<p>64+64=128 , 128+64=192 (0,64,128.192)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table border=\"1\" cellspacing=\"0\" style=\"width:668px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; height:14.5pt; text-align:left; vertical-align:top; width:63.9pt\">\r\n			<p>Subnet</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; height:14.5pt; text-align:left; vertical-align:top; width:23.3pt\">\r\n			<p>0</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; height:14.5pt; text-align:left; vertical-align:top; width:34.9pt\">\r\n			<p>64</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; height:14.5pt; text-align:left; vertical-align:top; width:29.1pt\">\r\n			<p>128</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; height:14.5pt; text-align:left; vertical-align:top; width:28.8pt\">\r\n			<p>192</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; height:17.4pt; text-align:left; vertical-align:top; width:63.9pt\">\r\n			<p>Host Awal</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; height:17.4pt; text-align:left; vertical-align:top; width:23.3pt\">\r\n			<p>1</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; height:17.4pt; text-align:left; vertical-align:top; width:34.9pt\">\r\n			<p>65</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; height:17.4pt; text-align:left; vertical-align:top; width:29.1pt\">\r\n			<p>129</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; height:17.4pt; text-align:left; vertical-align:top; width:28.8pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; height:18.15pt; text-align:left; vertical-align:top; width:63.9pt\">\r\n			<p>Hos Akhir</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; height:18.15pt; text-align:left; vertical-align:top; width:23.3pt\">\r\n			<p>62</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; height:18.15pt; text-align:left; vertical-align:top; width:34.9pt\">\r\n			<p>126</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; height:18.15pt; text-align:left; vertical-align:top; width:29.1pt\">\r\n			<p>190</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; height:18.15pt; text-align:left; vertical-align:top; width:28.8pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"background-color:#ffffff; height:17.4pt; text-align:left; vertical-align:top; width:63.9pt\">\r\n			<p>BroadCast</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; height:17.4pt; text-align:left; vertical-align:top; width:23.3pt\">\r\n			<p>63</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; height:17.4pt; text-align:left; vertical-align:top; width:34.9pt\">\r\n			<p>127</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; height:17.4pt; text-align:left; vertical-align:top; width:29.1pt\">\r\n			<p>191</p>\r\n			</td>\r\n			<td style=\"background-color:#ffffff; height:17.4pt; text-align:left; vertical-align:top; width:28.8pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>IP Valid : 192.168.10.1 - 192.168.10.62</p>\r\n\r\n<p>192.168.10.65 - 192.168.10.126</p>\r\n\r\n<p>192.168.10.129 - 192.168.10.190</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Ya', '2019-06-05', 30),
(3, '5d0a4925d1cb3.jpg', 'JENIS JENIS KABEL JARINGAN', 2, '<p><strong>S</strong>angat penting bagi kita untuk mengetahui karakteristik dari tiap kabel tersebut, sebelum memulai untuk membangun sebuah jaringan. Sebelumnya telah dibahas lebih dalam mengenai kabel jaringan jenis Unshield Twisted Pair ( UTP), namun pada kesempatan ini kita akan membahasnya kembali secara garis besar. Berikut jenis-jenis kabel jaringan beserta penjelasannya yang perlu anda ketahui:<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>1. Kabel Coaxial</strong></p>\r\n\r\n<p><strong><strong><a href=\"https://3.bp.blogspot.com/-zn_2-u6xaOs/W_lUbeSLEvI/AAAAAAAAAao/vql2YLX9guEaVWCiGjuiAQSQFIvyUXDUQCLcBGAs/s1600/coaxial.jpg\"><img src=\"https://3.bp.blogspot.com/-zn_2-u6xaOs/W_lUbeSLEvI/AAAAAAAAAao/vql2YLX9guEaVWCiGjuiAQSQFIvyUXDUQCLcBGAs/s400/coaxial.jpg\" style=\"height:210px; width:400px\" /></a></strong></strong></p>\r\n\r\n<p>Kabel coaxial merupakan kabel yang digunakan untuk mentransmisikan signal elektrik dengan frekuensi tinggi melalui inti core tunggalnya. Umumnya kita ketahui bahwa kabel coaxial digunakan untuk menghubungkan televisi dengan perangkat antena. Namun kabel jenis coaxial juga dapat kita gunakan untuk membangun jaringan komputer, menghubungkan keinternet, dan juga sebagai jalur radio.</p>\r\n\r\n<p>Kabel coaxial terdiri dari beberapa lapisan, masing-masing lapisan memiliki peran yang berbeda dalam melindungi inti core. Lapisan pertama disebut insulator yang berfungsi untuk melindungi inti core dan mencegah terjadinya crosstalk. Pada lapisan berikutnya terdapat shieldyang berperan untuk mencegah gangguan elektromagnetik dari luar yang dapat mengganggu signal data dan juga mencegah terjadinya kebocoran signal.</p>\r\n\r\n<p>Shield ini memiliki dua macam bentuk, yaitu bentuk anyaman kabel dan bentuk foil. Pada lapisan terakhir dari kabel coaxial disebut jacketyang berperan untuk melindungi kabel dari kelembapan dan kondisi lingkungan disekitarnya. Kabel coaxial dulunya sangat populer digunakan untuk jaringan ethernet sekitar pada tahun 1980-an hingga awal tahun 1990. Kabel coaxial sendiri memiliki dua macam jenis yaitu thinetdengan standar 10BASE2 dan thicknet dengan standar 10BASE5. Namun saat ini penggunaan kabel coaxial pada jaringan komputer telah digantikan dengan kabel jenis twisted pair, disebabkan karena bentuk fisik dari kabel coaxial yang terkesan kaku sehingga menyebkan kesulitan ketika akan melakukan pemasangan dan perawatan pada kabel.<br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;<strong>2. Kabel Twisted Pair</strong></p>\r\n\r\n<p><strong><strong><a href=\"https://3.bp.blogspot.com/-7y8RRGHRXmc/W_lUbm4Ed-I/AAAAAAAAAas/ODLO084HojMU_hI8uzwDnaMMJcGkrgi6wCEwYBhgL/s1600/twe.jpg\"><img src=\"https://3.bp.blogspot.com/-7y8RRGHRXmc/W_lUbm4Ed-I/AAAAAAAAAas/ODLO084HojMU_hI8uzwDnaMMJcGkrgi6wCEwYBhgL/s400/twe.jpg\" style=\"height:196px; width:400px\" /></a></strong></strong></p>\r\n\r\n<p>Kabel jenis twisted pair merupakan kabel yang populer digunakan dalam jaringan komputer. Kabel jenis ini telah menggantikan peran dari kabel coaxial dalam membangun jaringan komputer karena kecepatan, kehandalan serta kemudahannya dari kabel jenis twisted pair bila dibandingkan dengan kabel jenis coaxial. Kabel twisted pair terdiri dari delapan buah kabel dengan warna unik yang dililit berpasang-pasangan, hal ini bertujuan untuk mengurangi induksi dan kebocoran pada kabel. Kabel jenis twisted pair memiliki berbagai macam jenis kategori dengan kemampuan transmisi data yang berbeda, hingga artikel ini diterbitkan kategori twisted pair yang terbaru adalah CAT 7 dengan kecepatan transmisi data hingga 10Gbps. Kabel twisted pair memiliki dua jenis standar yang sudah ditetapkan oleh industri, masing-masing jenis tersebut memiliki kelebihan tersendiri. Adapun jenis kabel twisted pair yaitu :</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>1. Unshield Twisted Pair (UTP)</strong>&nbsp;Seperti namanya Unshield Twisted Pair yang berarti kabel twisted pair jenis ini tidak dilengkapi dengan shield yang melindungi dari gangguan elektromagnetik. Kabel jenis ini memiliki harga yang lebih murah dibandingkan kabel jenis STP sehingga cocok digunakan pada jaringan rumahan dan bahkan untuk kantor yang membutuhkan biaya rendah.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>2. Shield Twisted Pair (STP)&nbsp;</strong>Shield Twisted Pair merupakan jenis kabel yang memiliki shield yang melindungi dari gangguan elektromagnetik. Kabel jenis ini memiliki harga yang lebih mahal dari jenis UTP karena dilengkapi dengan shield yang membungkus sepanjang kabel, yang juga membuat kabel sedikit kaku dan lebih berat. Kabel jenis ini cocok untuk digunakan pada perusahaan skala besar yang membutuhkan kinerja yang maksimal.<br />\r\nPenerapan shield pada kabel jenis twisted pair memiliki tiga macam tipe, yaitu :</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>a. Individual Shield (U/FTP) Individual Shield melindungi tiap pasang kabel dengan aluminium foil. Tipe ini melindungi kabel dari gangguan elektromagnetik dari luar dan juga mencegah terjadinya crosstalk pada tiap pasang kabel.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>b. Overall Shield (F/UTP, S/UTP, dan SF/UTP) Overall Shield melindungi seluruh pasang kabel dengan aluminium foil. Tipe ini melindungi kabel dari gangguan elektromagnetik dari luar.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>c. Individual dan Overall Shield (F/FTP, S/FTP, dan SF/FTP) Tipe ini merupakan gabungan dari Individual dan Overall Shield yang mana melindungi setiap pasang kabel dan juga seluruh pasang kabel dengan foil. Hal ini berfungsi untuk melindungi kabel dari gangguan elektromagnetik dari luar dan juga mencegah terjadinya crosstalk pada tiap pasang kabel.</p>\r\n\r\n<p><strong>3. Kabel Fiber Optic</strong></p>\r\n\r\n<p><strong><strong><a href=\"https://3.bp.blogspot.com/-2RmsyZYzZZ0/W_lUbF0Hy0I/AAAAAAAAAaw/FgB_8k8SVzkoX2S1_Ztl378w9ylMLf1NACEwYBhgL/s1600/fiber.jpg\"><img src=\"https://3.bp.blogspot.com/-2RmsyZYzZZ0/W_lUbF0Hy0I/AAAAAAAAAaw/FgB_8k8SVzkoX2S1_Ztl378w9ylMLf1NACEwYBhgL/s400/fiber.jpg\" style=\"height:225px; width:400px\" /></a></strong></strong></p>\r\n\r\n<p>Kabel fiber optic sedikit berbeda dengan jenis kabel yang sudah dibahas sebelumnya. Karena kabel jenis fiber optik tidak menggunakan tembaga untuk penghantarnya, melainkan menggunakan serat kaca tipis yang digunakan untuk menghantarkan data dalam bentuk cahaya. Signal elektrik seperti televisi, suara dan data dikonversi menjadi sinyal optik menggunakan optical transmitter dan kemudian dikirim dengan kecepatan cahaya. Inti dari kabel fiber optic diselimuti dengan berbagai macam lapis. Lapisan pertama disebut sebagai cladding.</p>\r\n\r\n<p>Cladding berperan sebagai reflektor yang memantulkan cahaya sepanjang kabel, agar cahaya tersebut tetap fokus pada inti core. Di lapisan berikutnya terdapat bufferyang berperan untuk melindungi claddingdan inti core dari kerusakan dan kelembapan. Lapisan berikutnya adalah strength member yang juga berperan melindungi claddingdan inti core dari tekanan yang mungkin terjadi selama proses pemasangan.</p>\r\n\r\n<p>Sekumpulan kabel optik tersebut kemudian dibungkus dengan lapisan yang disebut jacket yang mana tidak hanya berfungsi untuk melindungi kabel dari lingkungan luar, tetapi juga mencegah terjadinya kebocoran cahaya yang keluar dari inti core.</p>\r\n\r\n<p>Kecepatan transmisi data yang lumayan cepat dan ketahannya terhadap gangguan elektromagnetik membuat kabel fiber optic sangat efektik digunakan untuk ukuran koneksi jaringan dalam skala besar. Namun meski demikian, dalam penerapannya kabel jenis fiber optik masih terbilang sulit dan juga mahal. Sebagai tambahan kabel jenis fiber optik tidak memiliki kemampuan untuk menghantarkan daya jika dibandingkan dengan jenis kabel tembaga.<br />\r\n&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;Itulah jenis-jenis kabel jaringan beserta gambar dan fungsinya. Mengenali masing-masing fungsi dari kabel jaringan tersebut akan memudahkan anda untuk memilih kabel jaringan mana yang cocok untuk jaringan yang anda bangun nanti.</p>\r\n', 'Ya', '2019-06-06', 30),
(4, '5d0a49564b940.jpg', 'Apa itu HTML ? . . ', 2, '<p><strong>&nbsp;S</strong>ebelum melangsekah terlalu jauh, alangkah baiknya kita harus tahu tentang definisi&nbsp;<strong>HTML,&nbsp;</strong>Mungkin ada yang sudah tahu apa itu HTML dan mungkin ada juga sebagian orang yang belum tahu apa itu HTML ??.. Nah, berdasarkan definisi tentang HTML yang saya dapet dari Sekolah Menengah Kejuruan dan kebetulan saya ngambil jurusan Rekayasa Perangkat Lunak (RPL).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp; HTML&nbsp;</strong>atau sering disebut dengan&nbsp;<strong>Hyper Text Markup Language&nbsp;</strong>adalah&nbsp;sebuah bahasa markup yang digunakan untuk membuat sebuah halaman web dan menampilkan berbagai informasi di dalam sebuah browser Internet. Bermula dari sebuah bahasa yang sebelumnya banyak digunakan di dunia penerbitan dan percetakan yang disebut dengan&nbsp;<strong>SGML</strong>&nbsp;(<strong>Standard Generalized Markup Language</strong>),&nbsp;&nbsp;<strong>HTML</strong>&nbsp;adalah sebuah standar yang digunakan secara luas untuk menampilkan halaman web.&nbsp;<strong>HTML&nbsp;</strong>saat ini merupakan standar Internet yang didefinisikan dan dikendalikan penggunaannya oleh&nbsp;<strong>World Wide Web Consortium</strong>&nbsp;(<strong>W3C</strong>).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp; HTML</strong>&nbsp;berupa kode-kode tag yang menginstruksikan browser untuk menghasilkan tampilan sesuai dengan yang diinginkan. untuk menjalan kan sebuah file HTML kita bisa melalui browser web seperti : Google Chrome, Mozillia Firefox dan beberapa browser lain.&nbsp;</p>\r\n\r\n<p>Cara sederhana membuat halaman HTML dalam contoh ini kita menggunakan aplikasi Notepad. buka Notepad dan kalian bisa isikan kode dibawah ini :</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\nBelajar HTML di Informasi Com</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>saya sedang belajar html di situs Informasi com</em></p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>&nbsp;</p>\r\n</p>\r\n</p>\r\n</p>\r\n</p>\r\n\r\n<p>Setelah itu di Simpan/Save notepad dan berinama misal &quot;<strong>Latihan</strong>&quot;, nah akan muncul notepad &quot;<strong>Latihan.txt</strong>&quot; kemudin format &quot;<strong>txt&nbsp;</strong>ganti dengan&nbsp;<strong>html</strong>&quot;.<br />\r\nBuka Open file html tersebut, dan lihatlah pada browser kalian, itulah kode&nbsp;<strong>HTML&nbsp;</strong>yang muncul.<br />\r\n<br />\r\nKeterangan Kode Diatas :</p>\r\n\r\n<p>&nbsp;\r\n<p><br />\r\n&nbsp;merupakan penandaan bahwa halaman HTML di mulai<br />\r\n<br />\r\n&nbsp;merupakan tanda bahwa halaman html ditutup<br />\r\n<br />\r\n&nbsp;ini adalah awal kepala<br />\r\n<br />\r\n&nbsp;ini artinya merupakan akhir bagian kepala<br />\r\n<br />\r\n&nbsp;menujukkan judul yang akan keluar pada Bar atas yang ditutup dengan&nbsp;<br />\r\n<br />\r\n&nbsp;isi Konten / halaman, Misal isinya berupa kata &quot;&nbsp;<strong>Saya Sedang Belajar HTML&nbsp;</strong>&nbsp;<strong>di situs Informasi com</strong>&quot;<br />\r\ndan ditutup dengan akhir isi halaman,yaitu&nbsp;</p>\r\n</p>\r\n\r\n<p>&nbsp;\r\n<p>&nbsp;\r\n<p>&nbsp;ini awal agar text berada di tengah<br />\r\n&nbsp;</p>\r\n&nbsp;ini merupakan akhir bagian dari membuat text rata tengah tersebut</p>\r\n</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<blockquote>Itulah sedikit pengalaman yang saya dapat dari SMK, Semoga temen-temen semua bisa memahami apa itu HTML.</blockquote>\r\n\r\n<ul>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n', 'Ya', '2019-06-06', 30),
(5, '5d0a498789fac.jpg', 'Mengetahui Penggunaan Media Penyimpanan SO ( SISTEM OPERASI )', 2, '<p><strong>Mengetahui dan Memahami Penggunaan Media Penyimpanan pada Sistem Operasi</strong>&nbsp;-&nbsp;</p>\r\n\r\n<p>&nbsp; &nbsp; Media penyimpanan merupakan perangkat yang dapat digunakan untuk menyimpan data/informasi. Data disini dapat berupa dokumen, program atau lainnya. Cara menyimpan informasi pada media penyimpanan ini bermacam-macam, mulai dengan cara manual melalui penulisan tangan, vibrasi akustik pada perekaman suara, hingga modulasi elektromagnetik pada tape dan disk optik.</p>\r\n\r\n<p><br />\r\nBerdasarkan aksesnya media penyimpanan dibedakan menjadi 2 macam, yakni media penyimpanan primer dan media penyimpanan sekunder.&nbsp;<strong>Media penyimpanan primer</strong>&nbsp;adalah media yang dapat diakses secara langsung oleh prosesor. RAM dan ROM adalah contoh media primer.&nbsp;<strong>Media penyimpanan sekunder</strong>&nbsp;adalah media yang aksesnya dilakukan melalui perantara media penyimpanan primer. Pada bahasan kali ini akan difokuskan pada media penyimapanan sekunder.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Media penyimpanan saat ini lebih banyak dikembangkan dengan menggunakan komponen-komponen elektronika. Oleh karena itu memerlukan daya untuk menyimpan dan membaca datanya. Kestabilan daya dapat mempengaruhi kinerja media. Bentuk dari media penyimpanan ini juga bermacam-macam, seperti harddisk usb flash drive, floppy disk, solid state drive dan sejenisnya.<br />\r\n<br />\r\nInstalasi sistem operasi saat ini, khususnya Linux dapat dilakukan pada banyak jenis media penyimpanan baik itu harddisk, USB flash drive, floppy disk, CD ROM, DVD ROM, dan solid state drive. Sistem operasi yang dijalankan langsung melalui DVD/CD/USB flash drive dikenal sebagai Live Operating System. Ada banyak sistem operasi Linux yang mampu dijalankan secara langsung, diantaranya adalah&nbsp;Knoppix, Ubuntu, Mint, Slackware, dan Fedora. Jadi, dengan adanya Live OS ini memungkinkan semua orang dapat mencoba suatu sistem operasi baru tanpa perlu menginstalnya terlebih dahulu.<br />\r\n<br />\r\nSelain jenis media penyimpanan yang telah ditujunkkan diatas, sekarang ada juga media penyimpanan online&nbsp;(cloud storage)&nbsp;yang sampai saat ini masih banyak digunakan untuk penyimpanan data atau file. Ada juga sistem operasi yang dapat diakses secara online&nbsp;(cloud operating system)seperti&nbsp;Google Chrome OS,&nbsp;ZeroPC.com,&nbsp;Jolicloud.com,&nbsp;iSpaces.com, dan&nbsp;eyeOS.com.&nbsp;</p>\r\n\r\n<p>Pengelolaan Media Penyimpanan</p>\r\n\r\n<p>Kegiatan yang tercakup dalam pengelolaan media penyimpanan ini meliputi.</p>\r\n\r\n<p>a. Pemantauan kapasitas<br />\r\nb. Perluasan kapasitas<br />\r\nc. Migrasi media penyimpanan<br />\r\nd. Backup dan recovery<br />\r\ne. Virtualisasi sistem<br />\r\nf. Penghapusan data<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Pemantauan Kapasitas</strong></p>\r\n\r\n<p><br />\r\nPerluasan ini merupakan kegiatan untuk menambah daya tampung dari suatu sistem dengan tambahan media penyimpanan.&nbsp;<em>Redundant Array of Independent Disks</em>&nbsp;(RAID) merupakan salah satu teknologi yang digunakan untuk menambah media penyimapanan. Dalam teknologi RAID media penyimpanan, dalam hal ini harddisk, dihubungkan satu sama lain sedemikian rupa hingga membentuk suatu kaitan. &nbsp;Tujuannya tiada lain adalah untuk memperluas kapasitas, kemampuan dan kehandalan sistem.<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Migrasi Media Penyimpanan</strong></p>\r\n\r\n<p>Kegiatan ini dapat dikatakan sebagai lanjutan dari proses pemantauan kapasitas yang dilakukan sebelumnya. Migrasi ini dapat terjadi karena beberapa alasan, misalnya karena adanya kebutuhan transfer data yang lebih besar besar dan lebih cepat. Proses migrasi media penyimpanan ini secara prinsip sama dengan menyalin setiap file yang ada di media penyimpanan lama ke yang baru. Aplikasinya, di Linux dapat menggunakan tr, dd, rsync atau sejenisnya.<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>Backup dan Restore</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; Mengingat pentingnya menjaga keutuhan data pada media penyimpanan, kegiatan ini memerlukan perhatian tersendiri. Materi lebih lanjut mengenai backup dan restore dapat dilihat pada materi tentang Backup dan Restore.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Virtualisasi/Kloning Sistem</strong></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;Virtualisasi merupakan kegiatan yang dilakukan untuk menyalin suatu sistem ke media penyimpanan lain, sehingga memungkinkan untuk melakukan restore apabila terjadi masalah pada sistem berjalan saat ini. Aplikasinya dapat menggunakan dd, partimage, gparted ataupun clonezilla.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Penghapusan Data</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Penghapusan data berkaitan dengan masalah keamanan data. Aplikasi Linux yang dapat digunakan untuk melakukan operasi ini, diantaranya rm, srm, wipe, shred dan dd. Penghapusan ini sekiranya perlu diperhatikan agar jangan sampai menghapus file penting di sistem. Berikut ini diberikan beberapa format perintah penghapusan menggunakan rm.</p>\r\n\r\n<blockquote><em>rm -f /lokasi/file.ext</em></blockquote>\r\n\r\n<p>atau</p>\r\n\r\n<blockquote><em>rm -rf /lokasi/direktori</em></blockquote>\r\n\r\n<p>Perintah pertama dapat digunakan untuk meghapus file dan yang kedua untuk direktori beserta semua file yang ada didalamnya. Penghapusan semua file pada satu partisi dapat dengan menggunakan aplikasi shred, wipe ataupun dd.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Demikianlah artikel kali ini tentang&nbsp;<strong>Mengetahui Penggunaan Media Penyimpanan SO.</strong>&nbsp;Semoga bermanfaat bagi Anda. Sekian dan terima kasih.</p>\r\n', 'Ya', '2019-06-07', 30),
(6, '5d0a4a7becfb8.jpg', 'SMKN 1 Gedong Tataan Pelopor Sistem CBT', 1, '<p><strong>Sekolah Menengah Kejuruan (SMK) Negeri 1 Gedongtataan menjadi pelopor pelaksanaan&nbsp; ujian semester menggunakan sistem CBT (computer base test) di Kabupaten Pesawaran.</strong></p>\r\n\r\n<p>Kepala SMKN 1 Gedongtataan Sutomo mengatakan, penggunaan fasilitas CBT ini sesuai dengan program pemerintah melaksanakan KBM (kegiatan belajar mengajar) berbasis IT (informasi teknologi)</p>\r\n\r\n<p>&ldquo;Program ini sudah disosialisasikan pemerintah saat pelaksanaan UN (ujian nasional). Program itu kita lanjutkan. Jadi bukan hanya pada saat UN, tapi ujian semeter juga menggunakan sistem CBT ini,&ldquo; kata Sutomo</p>\r\n\r\n<p>Sutomo menerangkan, pihaknya masih terus melakukan pembenahan dalam pelaksanaan ujian semester mau pun KBM dengan sistem CBT ini.&nbsp; &ldquo;Masih banyak yang harus kita lengkapi untuk memenuhi sarana CBT, termasuk memberikan pemahaman kepada siswa, terkait cara penggunaan fasilitas ini,&ldquo; terangnya.</p>\r\n\r\n<p>Menurut dia, seluruh pemasangan perangkat CBT di SMKN 1 Gedongtataan tidak menggunakan jasa teknisi. &ldquo;Pemasangan sistem perangkat ini semuanya dilakukan oleh guru dan siswa, tanpa melibatkan teknisi dari luar,&ldquo; ungkapnya.</p>\r\n\r\n<p>Di tempat sama, Wakil Kepala SMKN 1 Gedongtataan Bidang Kurikulum Susilawati mengatakan, dengan sistem CBT, pelaksanaan ujian semester dan KBM, lebih efektif dibanding sistem manual yang selama ini diterapkan.</p>\r\n\r\n<p>Dia berharap penggunaan sistem CBT dalam ujian semester dan KBM dapat mendongkrak prestasi akademik siswa.</p>\r\n', 'Ya', '2019-06-10', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id_client` int(11) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_client`
--

INSERT INTO `tbl_client` (`id_client`, `gambar`, `nama`, `keterangan`) VALUES
(1, '5d097b72e965a.jpg', 'Komarudin', 'Orang-orang hebat di bidang apapun bukan baru bekerja karena mereka Terinspirasi. Namun mereka menjadi terinspirasi karena mereka lebih suka Bekerja ..');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_download`
--

CREATE TABLE `tbl_download` (
  `id_download` int(11) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `file_download` varchar(100) DEFAULT NULL,
  `tgl_uploadfile` date NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_download`
--

INSERT INTO `tbl_download` (`id_download`, `nama_file`, `keterangan`, `file_download`, `tgl_uploadfile`, `id_user`) VALUES
(2, 'Modul Pembelajaran Aplikasi E-Learning', '<p>SMKN&nbsp; 1 Gedong Tataan Mebuat Modul Cara Pemakai Aplikasi E-learning</p>\r\n', 'APLIKASI E-LEARNING.pptx', '2019-06-12', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_fitur`
--

CREATE TABLE `tbl_fitur` (
  `id_fitur` int(11) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_fitur`
--

INSERT INTO `tbl_fitur` (`id_fitur`, `icon`, `nama`, `keterangan`) VALUES
(3, 'fa fa-html5 color3', 'HTML', 'Hypertext Markup Language adalah sebuah bahasa markah yang digunakan untuk membuat sebuah halaman web.'),
(4, 'fa fa-css3', 'CSS', 'Cascading Style Sheet (CSS) merupakan aturan untuk mengatur beberapa komponen dalam sebuah web sehingga akan lebih terstruktur dan seragam.'),
(5, 'fa fa-code color2', 'PHP', 'Hypertext Preprocessor adalah bahasa skrip yang dapat ditanamkan atau disisipkan ke dalam HTML. PHP banyak dipakai untuk memprogram situs web dinamis.'),
(6, 'fa fa-android color1', 'Android', 'Android adalah sistem operasi berbasis Linux yang dirancang untuk perangkat bergerak layar sentuh seperti telepon pintar dan komputer tablet.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id_gallery` int(11) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id_gallery`, `gambar`, `judul`, `tanggal`) VALUES
(2, '5d0978c5ea8be.jpg', 'Sosialisasi', '2019-06-15'),
(9, '5d097940b55c9.jpg', 'Menunggu Shalat', '2019-06-15'),
(10, '5d0979657372f.jpg', 'UKK TKJ', '2019-06-15'),
(11, '5d09798f7ea05.jpg', 'OSIS SMKN 1', '2019-06-15'),
(12, '5d0979b5802ae.jpg', 'Quick Count', '2019-06-15'),
(13, '5d0979cb81b34.jpg', 'ATPH', '2019-06-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_halaman`
--

CREATE TABLE `tbl_halaman` (
  `id_halaman` int(5) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `isi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_halaman`
--

INSERT INTO `tbl_halaman` (`id_halaman`, `judul`, `isi`) VALUES
(1, 'Visi Dan Misi', '<p><strong>Visi</strong></p>\r\n\r\n<p>Menjadikan&nbsp;<strong>Program Keahlian Teknik Komputer Dan Informatika</strong>&nbsp;sebagai pusat program keahlian yang memiliki keunggulan ilmu dan teknologi dalam bidang informasi dan komunikasi menjelang era globalisasi.</p>\r\n\r\n<p><strong>Misi</strong></p>\r\n\r\n<ol>\r\n	<li>Mengembangkan Sumber Daya Manusia yang mempunyai keunggulan dalam bidang teknologi informasi dan komunikasi yang dilandasi keimanan dan ketakwaan</li>\r\n	<li>Menyiapkan tenaga kerja tingkat menengah untuk mengisi kebutuhan dunia usaha dan dunia industri dalam bidang teknologi informasi dan komunikasi</li>\r\n	<li>Menyiapkan tamatan agar menjadi warga negara yang produktif, kreatif, dan inovatif</li>\r\n	<li>Menyiapkan peserta diklat untuk memasuki dunia kerja, serta mengembangkan sikap professional</li>\r\n	<li>Menyiapkan peserta diklat untuk melanjutkan ke jenjang pendidikan yang lebih tinggi</li>\r\n	<li>Menyiapkan tamatan untuk membuka usaha sendiri atau berwiraswasta</li>\r\n</ol>\r\n'),
(2, 'Sejarah', '<p><strong>SEJARAH PERKEMBANGAN TEKNIK KOMPUTER DAN INFORMATIKA</strong></p>\r\n\r\n<p><strong>Teknik Komputer Dan Informatika</strong>&nbsp;telah berkembang sejak pertama kali diciptakan pada tahun 1940-an hingga kini. Fokus utama pengembangannya adalah untuk mengembangkan praktek dan teknologi untuk meningkatkan produktivitas para praktisi pengembang perangkat lunak dan kualitas aplikasi yang dapat digunakan oleh pemakai.</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategoriberita`
--

CREATE TABLE `tbl_kategoriberita` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `status_aktif` enum('Aktif','Tidak') DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kategoriberita`
--

INSERT INTO `tbl_kategoriberita` (`id_kategori`, `nama_kategori`, `keterangan`, `status_aktif`) VALUES
(1, 'Info Terbaru', '', 'Aktif'),
(2, 'Materi', '', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_berita` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`id_komentar`, `id_berita`, `nama`, `email`, `komentar`, `tanggal`, `website`) VALUES
(1, 5, 'Komarudin', 'sulungkomar@gmail.com', 'f', '2019-06-01', 'smkn1gedongtataan.sch.id'),
(2, 5, 'Firli', 'komarftik@gmail.com', 'ddds', '2019-06-02', 'kdsds'),
(3, 3, 'komar', 'komarftik@gmail.com', 'tes', '2019-06-17', 'www.smkn1gedongtataan.sch.id'),
(4, 1, 'komar', 'komarftik@gmail.com', 'ds', '2019-06-17', 'smkn1gedongtataan.sch.id');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(5) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `urutan` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `judul`, `link`, `urutan`) VALUES
(15, 'Profile', '#', 2),
(16, 'Informasi', '#', 3),
(18, 'Contact', '?tampil=contact', 6),
(19, 'Curriculum', '', 4),
(20, 'Gallery', '#', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengumuman`
--

CREATE TABLE `tbl_pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `judul_pengumuman` varchar(100) DEFAULT NULL,
  `isi_pengumuman` text DEFAULT NULL,
  `file_pengumuman` varchar(100) DEFAULT NULL,
  `publish` enum('Ya','Tidak') DEFAULT 'Ya',
  `tgl_uploadpengumuman` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengumuman`
--

INSERT INTO `tbl_pengumuman` (`id_pengumuman`, `judul_pengumuman`, `isi_pengumuman`, `file_pengumuman`, `publish`, `tgl_uploadpengumuman`, `id_user`) VALUES
(1, 'Jadwal PPDB SMKN 1 Gedong Tataan', '<p>PEMERINTAH PROVINSI LAMPUNG DINAS PENDIDIKAN KEBUDAYAAN SMKN 1 GEDONG TATAAN</p>\r\n', 'Penerimaan Siswa Baru SMKN 1 Gedong Tataan.pdf', 'Ya', '2019-06-12', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesan`
--

CREATE TABLE `tbl_pesan` (
  `id_pesan` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `subjek` varchar(50) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`id_pesan`, `nama`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
(4, 'Komarudin', 'andanpranata@yahoo.co.id', 'tes', 'mantab cuy', '2019-06-02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_profil`
--

CREATE TABLE `tbl_profil` (
  `id_profil` int(11) NOT NULL,
  `Judul_perusahan` varchar(100) DEFAULT NULL,
  `Nama_perusahan` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_telp` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_profil`
--

INSERT INTO `tbl_profil` (`id_profil`, `Judul_perusahan`, `Nama_perusahan`, `alamat`, `email`, `no_telp`, `website`) VALUES
(1, 'PORTAL TEKNIK KOMPUTER DAN INFORMATIKA SMKN 1 Gedong Tataan', 'PORTAL TIK SKANSA', 'Jln. Veteran II Dam C Desa Wiyono Kecamatan Gedong Tataan Kabupaten Pesawaran Kode Pos 35371', 'sulungkomar@gmail.com', '085769774979', 'www.tik-smkn1gedongtataan.000webhostapp.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_submenu`
--

CREATE TABLE `tbl_submenu` (
  `id_submenu` int(5) NOT NULL,
  `id_menu` int(5) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `urutan` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_submenu`
--

INSERT INTO `tbl_submenu` (`id_submenu`, `id_menu`, `judul`, `link`, `urutan`) VALUES
(2, 15, 'Sejarah', '?tampil=halaman&amp;id=2', 2),
(3, 15, 'Visi Dan Misi', '?tampil=halaman&amp;id=1', 1),
(4, 16, 'Pengumuman', '?tampil=pengumuman', 1),
(5, 19, 'Student', '?tampil=404', 1),
(6, 16, 'Download', '?tampil=download', 2),
(7, 20, 'Gallery Foto', '?tampil=gallery', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` enum('Aktif','Tidak Aktif') DEFAULT NULL,
  `level` enum('Administrator','Pengelola Data') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `gambar`, `username`, `password`, `status`, `level`) VALUES
(30, '5cea75b015f5f.jpg', 'komarudin', '8f2fdb2c96a6f644bf461e7a71d39286', 'Aktif', 'Administrator'),
(31, '5cf1e44476d66.png', 'pengelola', '21232f297a57a5a743894a0e4a801fc3', 'Aktif', 'Pengelola Data');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indeks untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indeks untuk tabel `tbl_download`
--
ALTER TABLE `tbl_download`
  ADD PRIMARY KEY (`id_download`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_fitur`
--
ALTER TABLE `tbl_fitur`
  ADD PRIMARY KEY (`id_fitur`);

--
-- Indeks untuk tabel `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indeks untuk tabel `tbl_halaman`
--
ALTER TABLE `tbl_halaman`
  ADD PRIMARY KEY (`id_halaman`);

--
-- Indeks untuk tabel `tbl_kategoriberita`
--
ALTER TABLE `tbl_kategoriberita`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `tbl_profil`
--
ALTER TABLE `tbl_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  ADD PRIMARY KEY (`id_submenu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id_banner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_download`
--
ALTER TABLE `tbl_download`
  MODIFY `id_download` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_fitur`
--
ALTER TABLE `tbl_fitur`
  MODIFY `id_fitur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_halaman`
--
ALTER TABLE `tbl_halaman`
  MODIFY `id_halaman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategoriberita`
--
ALTER TABLE `tbl_kategoriberita`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengumuman`
--
ALTER TABLE `tbl_pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_profil`
--
ALTER TABLE `tbl_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  MODIFY `id_submenu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  ADD CONSTRAINT `tbl_submenu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `tbl_menu` (`id_menu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
