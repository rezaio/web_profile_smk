<?php
function uploadclient()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFIle = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'JPG'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFIle > 5000000) {
        echo "<script>
        alert('Ukuran Gambar Terlalu Besar');
        </script>";
        return false;
    }

    //lolos pengecekan gambar siap diupload
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/client/' . $namaFileBaru);
    return $namaFileBaru;
}
?>
<section class="content-header">
    <h1>
        Edit Client
        <small>Client Baru</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Client</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border bg-info">
                    <h3 class="box-title">Edit client</h3>
                </div>
                <?php
                $id = $_GET['id_client'];
                $query = mysqli_query($koneksi, "SELECT * From tbl_client where id_client='$id'");
                $client = mysqli_fetch_array($query);
                ?>
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <input type="hidden" name="gambarLama" class="form-control" value="<?= $client['gambar']; ?>">
                        <div class="form-group  col-md-12">
                            <label for="gambar" class="control-label">Gambar</label>
                            <br>
                            <img class="img-thumbnail pull-left" src="img/client/<?= $client['gambar']; ?>" width="100px;">
                            <input type="file" name="gambar" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="nama" class="control-label">Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= $client['nama']; ?>" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Keterangan" class="control-label">Keterangan</label>
                            <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"><?= $client['keterangan']; ?></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="fsimpan" class="btn btn-sm btn-info">Edit client</button>
                        <a class="btn btn-sm btn-danger pull-right" href="?page=dataclient">Kembali</a>
                    </div>
                </form>
                <?php
                if (isset($_POST['fsimpan'])) {
                    $gambarLama = htmlspecialchars($_POST['gambarLama']);
                    $nama = htmlspecialchars($_POST['nama']);
                    $keterangan = htmlspecialchars($_POST['keterangan']);

                    if ($_FILES['gambar']['error'] === 4) {
                        $gambar = $gambarLama;
                    } else {
                        $gambar = uploadclient();
                    }

                    $q = "UPDATE tbl_client SET gambar ='$gambar', nama='$nama', keterangan='$keterangan' where id_client='$id'";
                    mysqli_query($koneksi, $q);
                    ?>
                    <script type="text/javascript">
                        alert('Berhasil Merubah data client !');
                        document.location.href = "?page=dataclient";
                    </script>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
</section>