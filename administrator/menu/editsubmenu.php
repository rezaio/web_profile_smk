<?php
if (!defined("INDEX")) die("---");
?>
<section class="content-header">
    <h1>
        Edit Submenu
        <small>Submenu Baru</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Submenu</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border bg-info">
                    <h3 class="box-title">Edit Submenu</h3>
                </div>
                <?php
                $id = $_GET['id_submenu'];
                $query = mysqli_query($koneksi, "SELECT * From tbl_submenu where id_submenu='$id'");
                $menu = mysqli_fetch_array($query);
                ?>
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <label for="Judul" class="control-label">Judul</label>
                            <input type="text" name="judul" class="form-control" value="<?= $menu['judul']; ?>" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Induk" class="control-label">Induk</label>
                            <select class="form-control" name="id_menu">
                                <?php
                                $sqlmenu = mysqli_query($koneksi, "select * from tbl_menu");
                                while ($datamenu = mysqli_fetch_array($sqlmenu)) {
                                    if ($datamenu['id_menu'] == $menu['id_menu']) echo "<option value='$datamenu[id_menu]' selected> $datamenu[judul] </option>";
                                    else  echo "<option value='$datamenu[id_menu]'> $datamenu[judul] </option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Link" class="control-label">Link</label>
                            <input type="text" name="link" class="form-control" value="<?= $menu['link']; ?>" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Urutan" class="control-label">Urutan</label>
                            <input type="text" name="urutan" class="form-control" value="<?= $menu['urutan']; ?>" require autocomplete="off">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="fsimpan" class="btn btn-sm btn-info">Edit</button>
                        <a class="btn btn-sm btn-danger pull-right" href="?page=datasubmenu">Kembali</a>
                    </div>
                </form>
                <?php
                if (isset($_POST['fsimpan'])) {
                    $judul = htmlspecialchars($_POST['judul']);
                    $id_menu = htmlspecialchars($_POST['id_menu']);
                    $link = htmlspecialchars($_POST['link']);
                    $urutan = htmlspecialchars($_POST['urutan']);

                    $q = "UPDATE tbl_submenu SET judul ='$judul', id_menu='$id_menu', link='$link', urutan='$urutan' where id_submenu='$id'";
                    mysqli_query($koneksi, $q);
                    ?>
                    <script type="text/javascript">
                        alert('Berhasil Mengubah Submenu !');
                        document.location.href = "?page=datasubmenu";
                    </script>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
</section>