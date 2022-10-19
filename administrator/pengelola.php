<?php
session_start();
if ($_SESSION['userweb'] == "") {
    header('location:pengelola.php');
    header("location:index.php");
}
if ($_SESSION['level'] == "Administrator") {
    header('location:admin.php');
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
    <title>Halaman Pengelola Data</title>
    <link href="img/favicon.png" rel="icon">
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
                <span class="logo-mini"><b>A</b>KM</span>
                <span class="logo-lg"><b>Admin</b>KMR</span>
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
                            <i class="fa fa-table"></i> <span>Berita</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?php if ($page == "datakategori") {
                                    echo "class='active'";
                                } ?>>
                                <a href="pengelola.php?page=datakategori"><i class="fa fa-circle-o"></i> Kategori Berita</a></li>
                            <li <?php if ($page == "databerita") {
                                    echo "class='active'";
                                } ?>>
                                <a href="pengelola.php?page=databerita"><i class="fa fa-circle-o"></i> Data Berita </a></li>
                        </ul>
                    </li>
                    <li <?php if ($page == "datapengumuman") {
                            echo "class='active'";
                        } ?>>
                        <a href="pengelola.php?page=datapengumuman">
                            <i class="fa fa-newspaper-o"></i>
                            <span>Pengumuman</span>
                        </a>
                    </li>
                    <li <?php if ($page == "datadownload") {
                            echo "class='active'";
                        } ?>>
                        <a href="pengelola.php?page=datadownload">
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
                                <a href="pengelola.php?page=datagallery"><i class="fa fa-circle-o"></i> Semua Gallery </a></li>
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

                case 'datakategori':
                    include "pengelola/datakategori.php";
                    break;
                case 'editkategori':
                    include "pengelola/editkategori.php";
                    break;

                case 'hapuskategori':
                    $id = $_GET['id_kategori'];
                    mysqli_query($koneksi, "DELETE From tbl_kategoriberita where id_kategori='$id'");
                    include "pengelola/datakategori.php";
                    break;

                case 'databerita':
                    include "pengelola/databerita.php";
                    break;
                case 'editberita':
                    include "pengelola/editberita.php";
                    break;

                case 'tambahberita':
                    include "pengelola/tambahberita.php";
                    break;

                case 'hapusberita':
                    $id = $_GET['id_berita'];
                    mysqli_query($koneksi, "DELETE From tbl_berita where id_berita='$id'");
                    include "pengelola/databerita.php";
                    break;

                case 'tambahpengumuman':
                    include "pengelola/tambahpengumuman.php";
                    break;

                case 'datapengumuman':
                    include "pengelola/datapengumuman.php";
                    break;

                case 'editpengumuman':
                    include "pengelola/editpengumuman.php";
                    break;

                case 'hapuspengumuman':
                    $id = $_GET['id_pengumuman'];
                    mysqli_query($koneksi, "DELETE From tbl_pengumuman where id_pengumuman='$id'");
                    include "pengelola/datapengumuman.php";
                    break;

                case 'datadownload':
                    include "pengelola/datadownload.php";
                    break;

                case 'editdownload':
                    include "pengelola/editdownload.php";
                    break;


                case 'tambahdownload':
                    include "pengelola/tambahdownload.php";
                    break;

                case 'hapusdownload':
                    $id = $_GET['id_download'];
                    mysqli_query($koneksi, "DELETE From tbl_download where id_download='$id'");
                    include "pengelola/datadownload.php";
                    break;

                case 'datagallery':
                    include "pengelola/datagallery.php";
                    break;

                case 'editgallery':
                    include "pengelola/editgallery.php";
                    break;

                case 'hapusgallery':
                    $id = $_GET['id_gallery'];
                    mysqli_query($koneksi, "DELETE From tbl_gallery where id_gallery='$id'");
                    include "pengelola/datagallery.php";
                    break;

                default:
                    include "dashboard2.php";
                    break;
            }
            ?>
        </div>

        <footer class="main-footer">
            <strong>Copyright &copy; 2019 <a href="#">Komarudin</a>.</strong> All rights
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