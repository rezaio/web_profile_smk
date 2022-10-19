<section class="content-header">
    <h1>
        Edit Fitur
        <small>Fitur Baru</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Fitur</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border bg-info">
                    <h3 class="box-title">Edit fitur</h3>
                </div>
                <?php
                $id = $_GET['id_fitur'];
                $query = mysqli_query($koneksi, "SELECT * From tbl_fitur where id_fitur='$id'");
                $fitur = mysqli_fetch_array($query);
                ?>
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <label for="Icon" class="control-label">Icon</label>
                            <input type="text" name="icon" class="form-control" value="<?= $fitur['icon']; ?>" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Judul Depan" class="control-label">nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= $fitur['nama']; ?>" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Keterangan" class="control-label">Keterangan</label>
                            <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"><?= $fitur['keterangan']; ?></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="fsimpan" class="btn btn-sm btn-info">Edit fitur</button>
                        <a class="btn btn-sm btn-danger pull-right" href="?page=datafitur">Kembali</a>
                    </div>
                </form>
                <?php
                if (isset($_POST['fsimpan'])) {
                    $icon = htmlspecialchars($_POST['icon']);
                    $nama = htmlspecialchars($_POST['nama']);
                    $keterangan = htmlspecialchars($_POST['keterangan']);

                    $q = "UPDATE tbl_fitur SET icon ='$icon', nama='$nama', keterangan='$keterangan' where id_fitur='$id'";
                    mysqli_query($koneksi, $q);
                    ?>
                    <script type="text/javascript">
                        alert('Berhasil Merubah data fitur !');
                        document.location.href = "?page=datafitur";
                    </script>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
</section>