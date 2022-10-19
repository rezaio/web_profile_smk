<?php
if (!defined("INDEX")) die("---");
$client = query("SELECT * FROM tbl_client order by id_client desc");
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

    move_uploaded_file($tmpName, 'img/client/' . $namaFileBaru);
    return $namaFileBaru;
}

?>

<section class="content-header">
    <h1>
        Manajemen Client
        <small>Data Client</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Manajemen client</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Data Client</h3>
                    <a class="btn-sm btn-primary pull-right" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus-circle"></i> Tambah</a>
                </div>
                <div class="table-responsive">
                    <table id="komarudin" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>nama</th>
                                <th>Keterangan</th>
                                <th width="15%">
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($client as $row) :
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td style="text-align:center;"><img src="img/client/<?= $row['gambar']; ?>" width="35"></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td><?php echo $row['keterangan']; ?></td>
                                    <td>
                                        <center>
                                            <a onclick="return confirm('Anda yakin akan menghapusnya ?')" title="hapus" href="admin.php?page=hapusclient&id_client=<?php echo $row['id_client']; ?>" class="btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
                                            <a title="edit" href="admin.php?page=editclient&id_client=<?php echo $row['id_client']; ?>" class="btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                                        </center>
                                    </td>
                                </tr>
                                </tfoot>
                                <?php
                                $no++;
                            endforeach;
                            ?>
                    </table>
                </div>

                <!-- Tambah User -->
                <div id="tambah" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Tambah Client</h4>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="gambar" class="control-label">Gambar</label>
                                        <input type="file" name="gambar" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="Nama Depan" class="control-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan" class="control-label">Keterangan</label>
                                        <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <input type="submit" name="fsimpan" class="btn btn-sm btn-primary" value="Simpan">
                                    <a class="btn btn-sm btn-danger pull-right" href="?page=dataclient">Kembali</a>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['fsimpan'])) {
                                $gambar = htmlspecialchars($_POST['gambar']);
                                $nama = htmlspecialchars($_POST['nama']);
                                $keterangan = htmlspecialchars($_POST['keterangan']);

                                //upload gambar
                                $gambar = uploadclient();
                                if (!$gambar) {
                                    return false;
                                } else {

                                    $q = "INSERT INTO tbl_client(gambar, nama, keterangan)
                                VALUES('$gambar', '$nama','$keterangan')";
                                    mysqli_query($koneksi, $q);
                                    ?>
                                    <script type="text/javascript">
                                        alert('Berhasil Menambahkan client !');
                                        document.location.href = "?page=dataclient";
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