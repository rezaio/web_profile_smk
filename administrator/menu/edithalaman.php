<?php
if (!defined("INDEX")) die("---");
?>
<section class="content-header">
    <h1>
        Edit Halaman
        <small>Halaman Baru</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Halaman</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border bg-info">
                    <h3 class="box-title">Edit halaman</h3>
                </div>
                <?php
                $id = $_GET['id_halaman'];
                $query = mysqli_query($koneksi, "SELECT * From tbl_halaman where id_halaman='$id'");
                $menu = mysqli_fetch_array($query);
                ?>
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <label for="Judul" class="control-label">Judul</label>
                            <input type="text" name="judul" class="form-control" value="<?= $menu['judul']; ?>" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Isi" class="control-label">Isi</label>
                            <textarea name="isi" id="editor1" cols="30" rows="10"><?= $menu['isi']; ?></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="fsimpan" class="btn btn-sm btn-info">Edit</button>
                        <a class="btn btn-sm btn-danger pull-right" href="?page=datahalaman">Kembali</a>
                    </div>
                </form>
                <?php
                if (isset($_POST['fsimpan'])) {
                    $judul = htmlspecialchars($_POST['judul']);
                    $isi = $_POST['isi'];

                    $q = "UPDATE tbl_halaman SET judul ='$judul', isi='$isi' where id_halaman='$id'";
                    mysqli_query($koneksi, $q);
                    ?>
                    <script type="text/javascript">
                        alert('Berhasil Mengubah halaman !');
                        document.location.href = "?page=datahalaman";
                    </script>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
</section>