<?php
if (!defined("INDEX")) die("---");
function uploadtags()
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

    move_uploaded_file($tmpName, 'img/tags/' . $namaFileBaru);
    return $namaFileBaru;
}

?>

<section class="content-header">
    <h1>
        Manajemen tags
        <small>Data tags</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Manajemen tags</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Data tags</h3>
                    <a class="btn-sm btn-primary pull-right" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus-circle"></i> Tambah</a>
                </div>
                <div class="table-responsive">
                    <table id="komarudin" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Judul Foto</th>
                                <th>Tanggal</th>
                                <th width="15%">
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($koneksi, "SELECT * from tbl_tags order by id_tags desc");
                            while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td style="text-align:center;"><img src="img/tags/<?= $row['gambar']; ?>" width="35"></td>
                                    <td><?php echo $row['judul_tags']; ?></td>
                                    <td><?php echo $row['tanggal']; ?></td>
                                    <td>
                                        <center>
                                            <a onclick="return confirm('Anda yakin akan menghapusnya ?')" title="hapus" href="admin.php?page=hapustags&id_tags=<?php echo $row['id_tags']; ?>" class="btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
                                            <a title="edit" href="admin.php?page=edittags&id_tags=<?php echo $row['id_tags']; ?>" class="btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                                        </center>
                                    </td>
                                </tr>
                                </tfoot>
                                <?php
                                $no++;
                            }
                            ?>
                    </table>
                </div>

                <!-- Tambah User -->
                <div id="tambah" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Tambah tags</h4>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="gambar" class="control-label">Gambar</label>
                                        <input type="file" name="gambar" class="dropify" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Depan" class="control-label">Judul</label>
                                        <input type="text" name="judul_tags" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="Tanggal" class="control-label">Tanggal</label>
                                        <input type="text" name="tanggal" id="datepicker" class="form-control" autocomplete="off">
                                    </div>
                                    <input type="submit" name="fsimpan" class="btn btn-sm btn-primary" value="Simpan">
                                    <a class="btn btn-sm btn-danger pull-right" href="?page=datatags">Kembali</a>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['fsimpan'])) {
                                $gambar = htmlspecialchars($_POST['gambar']);
                                $judul_tags = htmlspecialchars($_POST['judul_tags']);
                                $tanggal = htmlspecialchars($_POST['tanggal']);

                                //upload gambar
                                $gambar = uploadtags();
                                if (!$gambar) {
                                    return false;
                                } else {

                                    $q = "INSERT INTO tbl_tags(gambar, judul_tags, tanggal)
                                VALUES('$gambar', '$judul_tags', '$tanggal')";
                                    mysqli_query($koneksi, $q);
                                    ?>
                                    <script type="text/javascript">
                                        alert('Berhasil Menambahkan tags !');
                                        document.location.href = "?page=datatags";
                                    </script>
                                <?php
                            }
                        }
                        ?>
                        </div>
                    </div>
                </div>
                <!-- tambah user Akhir -->
            </div>
        </div>
    </div>
</section>