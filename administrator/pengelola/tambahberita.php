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
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
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
        Tambah Berita
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
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border bg-info">
                        <h3 class="box-title">Berita</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <label for="Judul Berita" class="control-label">Title</label>
                            <input type="text" name="judul" class="form-control" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="isi" id="editor1" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="fsimpan" class="btn btn-sm btn-info">Tambah</button>
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
                        <div class="form-group col-md-6">
                            <label for="Kategori" class="control-label">Kategori</label>
                            <select name="id_kategori" class="form-control">
                                <?php
                                $sqlmenu = mysqli_query($koneksi, "select * from tbl_kategoriberita");
                                while ($datamenu = mysqli_fetch_array($sqlmenu)) {
                                    echo "<option value='$datamenu[id_kategori]'> $datamenu[nama_kategori] </option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Penerbit" class="control-label">Author</label>
                            <select name="id_user" class="form-control">
                                <?php
                                $sqlmenu = mysqli_query($koneksi, "select * from tbl_user");
                                while ($datamenu = mysqli_fetch_array($sqlmenu)) {
                                    echo "<option value='$datamenu[id_user]'> $datamenu[username] </option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="gambar" class="control-label">Cover Image</label>
                            <input type="file" name="gambar" class="dropify" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Publish" class="control-label">Publish</label>
                            <select name="publish" class="form-control" required>
                                <option value="">Pilih Publish</option>
                                <option class="form-control">Ya</option>
                                <option class="form-control">Tidak</option>
                            </select>
                        </div>

                        <div class="form-group col-md-8">
                            <label for="Tanggal" class="control-label">Tanggal</label>
                            <input type="text" name="tglupload" id="datepicker" class="form-control" require autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['fsimpan'])) {
            $gambar = htmlspecialchars($_POST['gambar']);
            $judul = htmlspecialchars($_POST['judul']);
            $id_kategori = htmlspecialchars($_POST['id_kategori']);
            $isi = $_POST['isi'];
            $publish = htmlspecialchars($_POST['publish']);
            $tglupload = htmlspecialchars($_POST['tglupload']);
            $id_user = htmlspecialchars($_POST['id_user']);

            //upload gambar
            $gambar = uploadberita();
            if (!$gambar) {
                return false;
            } else {

                $q = "INSERT INTO tbl_berita(gambar,judul,id_kategori,isi,publish,tglupload,id_user)
                    VALUES('$gambar','$judul','$id_kategori','$isi','$publish','$tglupload','$id_user')";
                mysqli_query($koneksi, $q);
                ?>
                <script type="text/javascript">
                    alert('Berhasil Menambahkan BErita !');
                    document.location.href = "?page=databerita";
                </script>
            <?php
        }
    }
    ?>
    </div>
</section>