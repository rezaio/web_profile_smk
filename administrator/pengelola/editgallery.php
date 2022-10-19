<?php
function uploadgallery()
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

    move_uploaded_file($tmpName, 'img/gallery/' . $namaFileBaru);
    return $namaFileBaru;
}
?>
<section class="content-header">
    <h1>
        Edit gallery
        <small>gallery Baru</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">gallery</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <?php
        $id = $_GET['id_gallery'];
        $query = mysqli_query($koneksi, "SELECT * From tbl_gallery where id_gallery='$id'");
        $gallery = mysqli_fetch_array($query);
        ?>
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border bg-info">
                        <h3 class="box-title">Edit gallery</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <label for="nama" class="control-label">Judul</label>
                            <input type="text" name="judul" class="form-control" value="<?= $gallery['judul']; ?>" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Tanggal" class="control-label">Tanggal</label>
                            <input type="text" name="tanggal" id="datepicker" class="form-control" value="<?= $gallery['tanggal']; ?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="fsimpan" class="btn btn-sm btn-info">Edit gallery</button>
                        <a class="btn btn-sm btn-danger pull-right" href="?page=datagallery">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border bg-info">
                        <h3 class="box-title">Option Panel</h3>
                    </div>
                    <div class="box-body">
                        <input type="hidden" name="gambarLama" class="form-control" value="<?= $gallery['gambar']; ?>">
                        <div class="form-group  col-md-12">
                            <label for="gambar" class="control-label">Gambar</label>
                            <br>
                            <img class="img-thumbnail pull-left" src="img/gallery/<?= $gallery['gambar']; ?>">
                            <input type="file" name="gambar" class="dropify">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['fsimpan'])) {
            $gambarLama = htmlspecialchars($_POST['gambarLama']);
            $judul = htmlspecialchars($_POST['judul']);
            $tanggal = htmlspecialchars($_POST['tanggal']);

            if ($_FILES['gambar']['error'] === 4) {
                $gambar = $gambarLama;
            } else {
                $gambar = uploadgallery();
            }

            $q = "UPDATE tbl_gallery SET gambar ='$gambar', judul='$judul', tanggal='$tanggal' where id_gallery='$id'";
            mysqli_query($koneksi, $q);
            ?>
            <script type="text/javascript">
                alert('Berhasil Merubah data gallery !');
                document.location.href = "?page=datagallery";
            </script>
        <?php
    }
    ?>
    </div>
</section>