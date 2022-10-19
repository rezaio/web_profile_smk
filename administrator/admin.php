<?php
session_start();
if ($_SESSION['userweb'] == "") {
  header('location:admin.php');
  header("location:index.php");
}
if ($_SESSION['level'] == "Pengelola Data") {
  header('location:pengelola.php');
}

include("../lib/koneksi.php");
define("INDEX", true);
$user = mysqli_query($koneksi, "SELECT * From tbl_user where id_user='$_SESSION[userweb]'");
$data = mysqli_fetch_array($user);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Halaman Administrator</title>
  <link href="../img/favicon.png" rel="icon">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="vendors/dropify/dropify.min.css">
  <link rel="stylesheet" href="vendors/summernote/dist/summernote-bs4.css">
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <a href="admin.php?page=dashboard" class="logo">
        <span class="logo-mini"><b></b>SMK</span>
        <span class="logo-lg"><b>Admin</b>SMK</span>
      </a>
      <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="img/user/<?= $data['gambar']; ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $data['username'] ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="img/user/<?= $data['gambar']; ?>" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $data['username'] ?> - Web Developer
                    <small>Member since Mar. 2019</small>
                  </p>
                </li>
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="?page=profil" class="btn btn-default btn-flat">Profile</a>
                    &ThinSpace;&ThinSpace;&ThinSpace;&ThinSpace;&ThinSpace;&ThinSpace;
                    <a href="../" target="blank" class="btn btn-default btn-flat">Preview</a>
                  </div>
                  <div class="pull-right">
                    <a href="../lib/keluar.php" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Menampilkan Menu -->
    <aside class="main-sidebar">
      <section class="sidebar">
        <div class="user-panel">
          <div class="pull-left image">
            <img src="img/user/<?= $data['gambar']; ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $data['username'] ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <?php
          @$page = $_GET['page'];
          ?>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li <?php if ($page == "dashboard") {
                    echo "class='active'";
                  } ?>><a href="?page=dashboard"><i class="fa fa-circle-o"></i>Home</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-plus"></i> <span>UI Menu</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li <?php if ($page == "datamenu") {
                    echo "class='active'";
                  } ?>><a href="admin.php?page=datamenu"><i class="fa fa-circle-o"></i> Menu</a></li>
              <li <?php if ($page == "datasubmenu") {
                    echo "class='active'";
                  } ?>><a href="admin.php?page=datasubmenu"><i class="fa fa-circle-o"></i> Submenu</a></li>
            </ul>
          </li>
          <li <?php if ($page == "datahalaman") {
                echo "class='active'";
              } ?>><a href="admin.php?page=datahalaman">
              <i class="fa fa-clone"></i>
              <span>Laman</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-table"></i> <span>Berita</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li <?php if ($page == "databerita") {
                    echo "class='active'";
                  } ?>>
                <a href="admin.php?page=databerita"><i class="fa fa-circle-o"></i> Semua Berita </a></li>
              <li <?php if ($page == "tambahberita") {
                    echo "class='active'";
                  } ?>>
                <a href="admin.php?page=tambahberita"><i class="fa fa-circle-o"></i> Tambah Baru </a></li>
              <li <?php if ($page == "datakategori") {
                    echo "class='active'";
                  } ?>>
                <a href="admin.php?page=datakategori"><i class="fa fa-circle-o"></i> Kategori</a></li>
            </ul>
          </li>
          <li <?php if ($page == "datapengumuman") {
                echo "class='active'";
              } ?>>
            <a href="admin.php?page=datapengumuman">
              <i class="fa fa-newspaper-o"></i>
              <span>Pengumuman</span>
            </a>
          </li>
          <li <?php if ($page == "datadownload") {
                echo "class='active'";
              } ?>>
            <a href="admin.php?page=datadownload">
              <i class="fa fa-paperclip"></i>
              <span>File Download</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-picture-o"></i> <span>Gallery</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li <?php if ($page == "datagallery") {
                    echo "class='active'";
                  } ?>>
                <a href="admin.php?page=datagallery"><i class="fa fa-circle-o"></i> Semua Gallery </a></li>
              <li <?php if ($page == "datatags") {
                    echo "class='active'";
                  } ?>>
                <a href="admin.php?page=datatags"><i class="fa fa-circle-o"></i> Tags </a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-folder-open-o"></i> <span>Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li <?php if ($page == "datastudent") {
                    echo "class='active'";
                  } ?>>
                <a href="admin.php?page=datastudent"><i class="fa fa-circle-o"></i> Data Siswa </a></li>
              <li <?php if ($page == "tambahstudent") {
                    echo "class='active'";
                  } ?>>
                <a href="admin.php?page=tambahstudent"><i class="fa fa-circle-o"></i> Tambah Siswa </a></li>
            </ul>
          </li>
          <li <?php if ($page == "datapesan") {
                echo "class='active'";
              } ?>><a href="admin.php?page=datapesan">
              <i class="fa fa-envelope-o"></i>
              <span>Pesan</span>
            </a>
          </li>
          <li class="header">SETTINGS</li>
          <li <?php if ($page == "profil") {
                echo "class='active'";
              } ?>><a href="admin.php?page=profil">
              <i class="fa fa-edit"></i>
              <span>Edit Profil</span>
            </a>
          </li>
          <li <?php if ($page == "datauser") {
                echo "class='active'";
              } ?>><a href="admin.php?page=datauser">
              <i class="fa fa-user"></i>
              <span>Manajemen User</span>
            </a>
          </li>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-credit-card"></i> <span>Featured</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li <?php if ($page == "databanner") {
                    echo "class='active'";
                  } ?>><a href="?page=databanner"><i class="fa fa-circle-o"></i> Slideshow</a></li>
              <li <?php if ($page == "datafitur") {
                    echo "class='active'";
                  } ?>>
                <a href="admin.php?page=datafitur"><i class="fa fa-circle-o"></i> Services</a></li>
              <li <?php if ($page == "dataclient") {
                    echo "class='active'";
                  } ?>>
                <a href="admin.php?page=dataclient"><i class="fa fa-circle-o"></i> Client</a></li>
            </ul>
          </li>
        </ul>
      </section>
    </aside>
    <!-- Menampilkan menu akhir -->

    <div class="content-wrapper">
      <?php
      error_reporting(0);
      switch ($_GET['page']) {

        case 'databanner':
          include "menu/databanner.php";
          break;
        case 'editbanner':
          include "menu/editbanner.php";
          break;

        case 'hapusbanner':
          $id = $_GET['id_banner'];
          mysqli_query($koneksi, "DELETE From tbl_banner where id_banner='$id'");
          include "menu/databanner.php";
          break;

        case 'datauser':
          include "menu/datauser.php";
          break;
        case 'edituser':
          include "menu/edituser.php";
          break;

        case 'hapususer':
          $id = $_GET['id_user'];
          mysqli_query($koneksi, "DELETE From tbl_user where id_user='$id'");
          include "menu/datauser.php";
          break;

        case 'datamenu':
          include "menu/datamenu.php";
          break;

        case 'editmenu':
          include "menu/editmenu.php";
          break;

        case 'hapusmenu':
          $id = $_GET['id_menu'];
          mysqli_query($koneksi, "DELETE From tbl_menu where id_menu='$id'");
          include "menu/datamenu.php";
          break;

        case 'datasubmenu':
          include "menu/datasubmenu.php";
          break;
        case 'editsubmenu':
          include "menu/editsubmenu.php";
          break;

        case 'hapussubmenu':
          $id = $_GET['id_submenu'];
          mysqli_query($koneksi, "DELETE From tbl_submenu where id_submenu='$id'");
          include "menu/datasubmenu.php";
          break;

        case 'datahalaman':
          include "menu/datahalaman.php";
          break;
        case 'edithalaman':
          include "menu/edithalaman.php";
          break;

        case 'hapushalaman':
          $id = $_GET['id_halaman'];
          mysqli_query($koneksi, "DELETE From tbl_halaman where id_halaman='$id'");
          include "menu/datahalaman.php";
          break;

        case 'datakategori':
          include "menu/datakategori.php";
          break;
        case 'editkategori':
          include "menu/editkategori.php";
          break;

        case 'hapuskategori':
          $id = $_GET['id_kategori'];
          mysqli_query($koneksi, "DELETE From tbl_kategoriberita where id_kategori='$id'");
          include "menu/datakategori.php";
          break;

        case 'databerita':
          include "menu/databerita.php";
          break;
        case 'editberita':
          include "menu/editberita.php";
          break;

        case 'tambahberita':
          include "menu/tambahberita.php";
          break;

        case 'hapusberita':
          $id = $_GET['id_berita'];
          mysqli_query($koneksi, "DELETE From tbl_berita where id_berita='$id'");
          include "menu/databerita.php";
          break;

        case 'datagallery':
          include "menu/datagallery.php";
          break;

        case 'editgallery':
          include "menu/editgallery.php";
          break;

        case 'hapusgallery':
          $id = $_GET['id_gallery'];
          mysqli_query($koneksi, "DELETE From tbl_gallery where id_gallery='$id'");
          include "menu/datagallery.php";
          break;

        case 'datatags':
          include "menu/datatags.php";
          break;

        case 'edittags':
          include "menu/edittags.php";
          break;

        case 'hapustags':
          $id = $_GET['id_tags'];
          mysqli_query($koneksi, "DELETE From tbl_tags where id_tags='$id'");
          include "menu/datatags.php";
          break;

        case 'datafitur':
          include "menu/datafitur.php";
          break;
        case 'editfitur':
          include "menu/editfitur.php";
          break;

        case 'hapusfitur':
          $id = $_GET['id_fitur'];
          mysqli_query($koneksi, "DELETE From tbl_fitur where id_fitur='$id'");
          include "menu/datafitur.php";
          break;


        case 'tambahpengumuman':
          include "menu/tambahpengumuman.php";
          break;

        case 'datapengumuman':
          include "menu/datapengumuman.php";
          break;

        case 'editpengumuman':
          include "menu/editpengumuman.php";
          break;

        case 'hapuspengumuman':
          $id = $_GET['id_pengumuman'];
          mysqli_query($koneksi, "DELETE From tbl_pengumuman where id_pengumuman='$id'");
          include "menu/datapengumuman.php";
          break;

        case 'datadownload':
          include "menu/datadownload.php";
          break;

        case 'editdownload':
          include "menu/editdownload.php";
          break;


        case 'tambahdownload':
          include "menu/tambahdownload.php";
          break;

        case 'hapusdownload':
          $id = $_GET['id_download'];
          mysqli_query($koneksi, "DELETE From tbl_download where id_download='$id'");
          include "menu/datadownload.php";
          break;

        case 'datastudent':
          include "menu/datastudent.php";
          break;

        case 'editstudent':
          include "menu/editstudent.php";
          break;


        case 'tambahstudent':
          include "menu/tambahstudent.php";
          break;

        case 'hapusstudent':
          $id = $_GET['id_student'];
          mysqli_query($koneksi, "DELETE From tbl_student where id_student='$id'");
          include "menu/datastudent.php";
          break;

        case 'profil':
          include "menu/profil.php";
          break;

        case 'editprofil':
          include "menu/editprofil.php";
          break;


        case 'hapuspesan':
          $id = $_GET['id_pesan'];
          mysqli_query($koneksi, "DELETE From tbl_pesan where id_pesan='$id'");
          include "menu/datapesan.php";
          break;

        case 'datapesan':
          include "menu/datapesan.php";
          break;

        case 'balaspesan':
          include "menu/balaspesan.php";
          break;

        case 'hapusclient':
          $id = $_GET['id_client'];
          mysqli_query($koneksi, "DELETE From tbl_client where id_client='$id'");
          include "menu/dataclient.php";
          break;

        case 'dataclient':
          include "menu/dataclient.php";
          break;

        case 'editclient':
          include "menu/editclient.php";
          break;

        case 'import':
          include "menu/import.php";
          break;

        case 'importaksi':
          include "menu/importaksi.php";
          break;


        default:
          include "dashboard.php";
          break;
      }
      ?>
    </div>

    <footer class="main-footer">
      <strong>Copyright &copy; 2019 <a href="#">Gink Ngoprek</a>.</strong> All rights
      reserved.
    </footer>

    <div class="control-sidebar-bg"></div>
  </div>
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="bower_components/ckeditor/ckeditor.js"></script>
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="dist/js/adminlte.min.js"></script>
  <script src="dist/js/pages/dashboard.js"></script>
  <script src="dist/js/demo.js"></script>
  <script src="vendors/dropify/dropify.min.js"></script>
  <script src="vendors/summernote/dist/summernote-bs4.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/editorDemo.js"></script>
  <script src="js/dropify.js"></script>
  <script>
    $(function() {
      //Date picker
      $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true,
      })
      // Replace the <textarea id="editor1"> with a CKEditor
      // tabel
      $('#komarudin').DataTable()
      $('#KMR').DataTable({
        'paging': true,
        'lengthChange': false,
        'searching': false,
        'ordering': true,
        'info': true,
        'autoWidth': false
      })
      // tabel
      // instance, using default configuration.
      CKEDITOR.replace('editor1')
      //bootstrap WYSIHTML5 - text editor
      $('.textarea').wysihtml5()
    })
  </script>
</body>

</html>