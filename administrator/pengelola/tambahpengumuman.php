<?php
function uploadpengumuman()
{
    $namaFile = $_FILES['file_pengumuman']['name'];
    $ukuranFIle = $_FILES['file_pengumuman']['size'];
    $error = $_FILES['file_pengumuman']['error'];
    $tmpName = $_FILES['file_pengumuman']['tmp_name'];

    // cek apakah tidak ada file_pengumuman yang diupload
    if ($error === 4) {
        echo "<script>
        alert('pilih file_pengumuman terlebih dahulu!');
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['pdf', 'docx', 'pptx'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('pilih file_pengumuman terlebih dahulu!');
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

    // //lolos pengecekan gambar siap diupload
    // $namaFileBaru = uniqid();
    // $namaFileBaru .= '.';
    // $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'file/pengumuman/' . $namaFile);
    return $namaFile;
}
?>
<section class="content-header">
    <h1>
        Tambah Pengumuman
        <small>Pengumuman Baru</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Pengumuman</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-header with-border bg-info">
                        <h3 class="box-title">Pengumuman</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <label for="Judul Pengumuman" class="control-label">Judul Pengumuman</label>
                            <input type="text" name="judul_pengumuman" class="form-control" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <textarea name="isi_pengumuman" id="editor1" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="fsimpan" class="btn btn-sm btn-info">Simpan</button>
                        <a class="btn btn-sm btn-danger pull-right" href="?page=datapengumuman">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border bg-info">
                        <h3 class="box-title">Option Panel</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <label for="File_pengumuman" class="control-label">File Pengumuman</label>
                            <input type="file" name="file_pengumuman" class="form-control" required autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Tanggal" class="control-label">Tanggal</label>
                            <input type="text" name="tgl_uploadpengumuman" id="datepicker" class="form-control" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Publish" class="control-label">Publish</label>
                            <select name="publish" class="form-control" required autocomplete="off">
                                <option value="">Pilih Publish</option>
                                <option class="form-control">Ya</option>
                                <option class="form-control">Tidak</option>
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
                    </div>
                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['fsimpan'])) {
            $judul_pengumuman = htmlspecialchars($_POST['judul_pengumuman']);
            $isi_pengumuman = $_POST['isi_pengumuman'];
            $file_pengumuman = htmlspecialchars($_POST['file_pengumuman']);
            $publish = htmlspecialchars($_POST['publish']);
            $tgl_uploadpengumuman = htmlspecialchars($_POST['tgl_uploadpengumuman']);
            $id_user = htmlspecialchars($_POST['id_user']);

            //upload gambar
            $file_pengumuman = uploadpengumuman();
            if (!$file_pengumuman) {
                return false;
            } else {

                $q = "INSERT INTO tbl_pengumuman(file_pengumuman,judul_pengumuman,isi_pengumuman, publish,tgl_uploadpengumuman,id_user)
                    VALUES('$file_pengumuman','$judul_pengumuman','$isi_pengumuman', '$publish','$tgl_uploadpengumuman','$id_user')";
                mysqli_query($koneksi, $q);
                ?>
                <script type="text/javascript">
                    alert('Berhasil Menambahkan Pengumuman !');
                    document.location.href = "?page=datapengumuman";
                </script>
            <?php
        }
    }
    ?>
    </div>
</section>