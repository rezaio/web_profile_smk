<?php
function uploadbanner()
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

    move_uploaded_file($tmpName, 'img/slideshow/' . $namaFileBaru);
    return $namaFileBaru;
}
?>
<section class="content-header">
    <h1>
        Edit Banner
        <small>Banner Baru</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Banner</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border bg-info">
                    <h3 class="box-title">Edit banner</h3>
                </div>
                <?php
                $id = $_GET['id_banner'];
                $query = mysqli_query($koneksi, "SELECT * From tbl_banner where id_banner='$id'");
                $banner = mysqli_fetch_array($query);
                ?>
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="box-body">
                        <input type="hidden" name="gambarLama" class="form-control" value="<?= $banner['gambar']; ?>">
                        <div class="form-group  col-md-12">
                            <label for="gambar" class="control-label">Gambar</label>
                            <br>
                            <img class="img-thumbnail pull-left" src="img/slideshow/<?= $banner['gambar']; ?>" width="100px;">
                            <input type="file" name="gambar" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Judul Depan" class="control-label">Judul Depan</label>
                            <input type="text" name="judul_depan" class="form-control" value="<?= $banner['judul_depan']; ?>" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Judul Belakang" class="control-label">Judul Belakang</label>
                            <input type="text" name="judul_belakang" class="form-control" value="<?= $banner['judul_belakang']; ?>" require autocomplete="off">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="fsimpan" class="btn btn-sm btn-info">Edit banner</button>
                        <a class="btn btn-sm btn-danger pull-right" href="?page=databanner">Kembali</a>
                    </div>
                </form>
                <?php
                if (isset($_POST['fsimpan'])) {
                    $gambarLama = htmlspecialchars($_POST['gambarLama']);
                    $judul_depan = htmlspecialchars($_POST['judul_depan']);
                    $judul_belakang = htmlspecialchars($_POST['judul_belakang']);

                    if ($_FILES['gambar']['error'] === 4) {
                        $gambar = $gambarLama;
                    } else {
                        $gambar = uploadbanner();
                    }

                    $q = "UPDATE tbl_banner SET gambar ='$gambar', judul_depan='$judul_depan', judul_belakang='$judul_belakang' where id_banner='$id'";
                    mysqli_query($koneksi, $q);
                    ?>
                    <script type="text/javascript">
                        alert('Berhasil Merubah data banner !');
                        document.location.href = "?page=databanner";
                    </script>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
</section>