<?php
function uploadberita()
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

    move_uploaded_file($tmpName, 'img/berita/' . $namaFileBaru);
    return $namaFileBaru;
}
?>
<section class="content-header">
    <h1>
        Edit Berita
        <small>Berita Baru</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Berita</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <form role="form" method="POST" enctype="multipart/form-data">
            <?php
            $id = $_GET['id_berita'];
            $query = mysqli_query($koneksi, "SELECT * From tbl_berita where id_berita='$id'");
            $menu = mysqli_fetch_array($query);
            ?>
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border bg-info">
                        <h3 class="box-title">Berita</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <label for="Judul Berita" class="control-label">Title</label>
                            <input type="text" name="judul" class="form-control" value="<?= $menu['judul']; ?>" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="isi" id="editor1" cols="30" rows="10" class="form-control"><?= $menu['isi']; ?></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="fsimpan" class="btn btn-sm btn-info">Edit</button>
                        <a class="btn btn-sm btn-danger pull-right" href="?page=databerita">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border bg-info">
                        <h3 class="box-title">Option Panel</h3>
                    </div>
                    <div class="box-body">
                        <input type="hidden" name="gambarLama" class="form-control" value="<?= $menu['gambar']; ?>">
                        <div class="form-group col-md-6">
                            <label for="Kategori" class="control-label">Kategori</label>
                            <select class="form-control" name="id_kategori">
                                <?php
                                $sqlmenu = mysqli_query($koneksi, "select * from tbl_kategoriberita");
                                while ($datamenu = mysqli_fetch_array($sqlmenu)) {
                                    if ($datamenu['id_kategori'] == $menu['id_kategori']) echo "<option value='$datamenu[id_kategori]' selected> $datamenu[nama_kategori] </option>";
                                    else  echo "<option value='$datamenu[id_kategori]'> $datamenu[nama_kategori] </option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Penerbit" class="control-label">Author</label>
                            <select class="form-control" name="id_user">
                                <?php
                                $sqlmenu = mysqli_query($koneksi, "select * from tbl_user");
                                while ($datamenu = mysqli_fetch_array($sqlmenu)) {
                                    if ($datamenu['id_user'] == $menu['id_user']) echo "<option value='$datamenu[id_user]' selected> $datamenu[username] </option>";
                                    else  echo "<option value='$datamenu[id_user]'> $datamenu[username] </option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="gambar" class="control-label">Cover Image</label>
                            <img class="img-thumbnail pull-left" src="img/berita/<?= $menu['gambar']; ?>">
                            <input type="file" name="gambar" class="dropify">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Publish" class="control-label">Publish</label>
                            <select name="publish" class="form-control" require>
                                <option <?php if ($menu['publish'] == "Ya") {
                                            echo "selected";
                                        } ?> class="form-control">Ya</option>
                                <option <?php if ($menu['publish'] == "Tidak") {
                                            echo "selected";
                                        } ?> class="form-control">Tidak</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="Tanggal" class="control-label">Tanggal</label>
                            <input type="text" name="tglupload" id="datepicker" class="form-control" value="<?= $menu['tglupload']; ?>" require autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['fsimpan'])) {
            $gambarLama = htmlspecialchars($_POST['gambarLama']);
            $judul = htmlspecialchars($_POST['judul']);
            $id_kategori = htmlspecialchars($_POST['id_kategori']);
            $isi = $_POST['isi'];
            $publish = htmlspecialchars($_POST['publish']);
            $tglupload = htmlspecialchars($_POST['tglupload']);
            $id_user = htmlspecialchars($_POST['id_user']);

            if ($_FILES['gambar']['error'] === 4) {
                $gambar = $gambarLama;
            } else {
                $gambar = uploadberita();
            }

            $q = "UPDATE tbl_berita SET gambar ='$gambar', judul='$judul', id_kategori='$id_kategori', 
                         isi='$isi', publish='$publish', tglupload='$tglupload', id_user='$id_user' where id_berita='$id'";
            mysqli_query($koneksi, $q);
            ?>
            <script type="text/javascript">
                alert('Berhasil Merubah data BErita !');
                document.location.href = "?page=databerita";
            </script>
        <?php
    }
    ?>
    </div>
</section>