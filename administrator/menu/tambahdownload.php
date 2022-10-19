<?php
function uploaddownload()
{
    $namaFile = $_FILES['file_download']['name'];
    $ukuranFIle = $_FILES['file_download']['size'];
    $error = $_FILES['file_download']['error'];
    $tmpName = $_FILES['file_download']['tmp_name'];

    // cek apakah tidak ada file_download yang diupload
    if ($error === 4) {
        echo "<script>
        alert('pilih file_download terlebih dahulu!');
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['pdf', 'docx', 'pptx'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('pilih file_download terlebih dahulu!');
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

    move_uploaded_file($tmpName, 'file/download/' . $namaFile);
    return $namaFile;
}
?>
<section class="content-header">
    <h1>
        Tambah Download
        <small>Download Baru</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Download</li>
    </ol>
</section>
<section class="content">
    <div class="row">
     <form role="form" method="post" enctype="multipart/form-data">
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border bg-info">
                    <h3 class="box-title">Download</h3>
                </div>
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <label for="Judul download" class="control-label">Judul download</label>
                            <input type="text" name="nama_file" class="form-control" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12"> 
                            <textarea name="keterangan" id="editor1" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="fsimpan" class="btn btn-sm btn-info">Simpan</button>
                        <a class="btn btn-sm btn-danger pull-right" href="?page=datadownload">Kembali</a>
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
                            <label for="File_download" class="control-label">File download</label>
                            <input type="file" name="file_download" class="form-control" required autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Tanggal" class="control-label">Tanggal</label>
                            <input type="text" name="tgl_uploadfile" id="datepicker" class="form-control" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Penerbit" class="control-label">Penerbit</label>
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
                    $nama_file = htmlspecialchars($_POST['nama_file']);
                    $keterangan = $_POST['keterangan'];
                    $file_download = htmlspecialchars($_POST['file_download']);
                    $tgl_uploadfile = htmlspecialchars($_POST['tgl_uploadfile']);
                    $id_user = htmlspecialchars($_POST['id_user']);

                    //upload gambar
                    $file_download = uploaddownload();
                    if (!$file_download) {
                        return false;
                    } else {

                        $q = "INSERT INTO tbl_download(file_download, nama_file, keterangan, tgl_uploadfile, id_user)
                    VALUES('$file_download','$nama_file','$keterangan', '$tgl_uploadfile','$id_user')";
                        mysqli_query($koneksi, $q);
                        ?>
                        <script type="text/javascript">
                            alert('Berhasil Menambahkan download !');
                            document.location.href = "?page=datadownload";
                        </script>
                    <?php
                }
            }
            ?>
    </div>
</section>