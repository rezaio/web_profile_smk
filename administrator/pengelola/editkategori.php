<section class="content-header">
    <h1>
        Edit Kategori
        <small>Kategori Baru</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Kategori</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border bg-info">
                    <h3 class="box-title">Edit Kategori</h3>
                </div>
                <?php
                $id = $_GET['id_kategori'];
                $query = mysqli_query($koneksi, "SELECT * From tbl_kategoriberita where id_kategori='$id'");
                $menu = mysqli_fetch_array($query);
                ?>
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <label for="Nama Kategori" class="control-label">Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" value="<?= $menu['nama_kategori']; ?>" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Link" class="control-label">Keterangan</label>
                            <textarea name="keterangan" cols="30" rows="10" class="form-control"><?= $menu['keterangan']; ?></textarea>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="Status" class="control-label">Status</label>
                            <select name="status_aktif" class="form-control" require>
                                <option <?php if ($menu['status_aktif'] == "Aktif") {
                                            echo "selected";
                                        } ?> class="form-control">Aktif</option>
                                <option <?php if ($menu['status_aktif'] == "Tidak") {
                                            echo "selected";
                                        } ?> class="form-control">Tidak</option>
                            </select>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="fsimpan" class="btn btn-sm btn-info">Edit</button>
                        <a class="btn btn-sm btn-danger pull-right" href="?page=datakategori">Kembali</a>
                    </div>
                </form>
                <?php
                if (isset($_POST['fsimpan'])) {
                    $nama_kategori = htmlspecialchars($_POST['nama_kategori']);
                    $keterangan = htmlspecialchars($_POST['keterangan']);
                    $status_aktif = htmlspecialchars($_POST['status_aktif']);

                    $q = "UPDATE tbl_kategoriberita SET nama_kategori ='$nama_kategori', keterangan='$keterangan', status_aktif='$status_aktif' where id_kategori='$id'";
                    mysqli_query($koneksi, $q);
                    ?>
                    <script type="text/javascript">
                        alert('Berhasil Mengubah Kategori !');
                        document.location.href = "?page=datakategori";
                    </script>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
</section>