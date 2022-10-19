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
        Edit Download
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
       <?php
        $id = $_GET['id_download'];
        $query = mysqli_query($koneksi, "SELECT * From tbl_download where id_download='$id'");
        $menu = mysqli_fetch_array($query);
        ?>
        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header with-border bg-info">
                    <h3 class="box-title">Download</h3>
                </div>
                    <div class="box-body"> 
                        <div class="form-group col-md-12">
                            <label for="nama file" class="control-label">Nama File</label>
                            <input type="text" name="nama_file" class="form-control" value="<?= $menu['nama_file']; ?>" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12"> 
                            <textarea name="keterangan" id="editor1" cols="30" rows="10" class="form-control"><?= $menu['keterangan']; ?></textarea>
                        </div> 
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="fsimpan" class="btn btn-sm btn-info">Edit</button>
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
                        <input type="hidden" name="file_downloadlam" class="form-control" value="<?= $menu['file_download']; ?>" required>
                        <div class="form-group col-md-12">
                            <label for="File" class="control-label">File download</label>
                            <input type="text" class="form-control" value="<?= $menu['file_download']; ?>">
                            <input type="file" name="file_download" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Tanggal" class="control-label">Tanggal</label>
                            <input type="text" name="tgl_uploadfile" id="datepicker" autocomplete="off" class="form-control" value="<?= $menu['tgl_uploadfile']; ?>" require>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Penerbit" class="control-label">Penerbit</label>
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
                    </div> 
            </div>
        </div>
        </form>
                <?php
                if (isset($_POST['fsimpan'])) {
                    $nama_file = htmlspecialchars($_POST['nama_file']);
                    $keterangan = $_POST['keterangan'];
                    $file_downloadlam = htmlspecialchars($_POST['file_downloadlam']);
                    $tgl_uploadfile = htmlspecialchars($_POST['tgl_uploadfile']);
                    $id_user = htmlspecialchars($_POST['id_user']);

                    if ($_FILES['file_download']['error'] === 4) {
                        $file_download = $file_downloadlam;
                    } else {
                        $file_download = uploaddownload();
                    }

                    $q = "UPDATE tbl_download SET nama_file='$nama_file', keterangan='$keterangan', file_download ='$file_download',  
                        tgl_uploadfile='$tgl_uploadfile', id_user='$id_user' where id_download='$id'";
                    mysqli_query($koneksi, $q);
                    ?>
                    <script type="text/javascript">
                        alert('Berhasil Merubah data download !');
                        document.location.href = "?page=datadownload";
                    </script>
                <?php
            }
            ?>
    </div>
</section>