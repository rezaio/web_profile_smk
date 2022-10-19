<?php
if (!defined("INDEX")) die("---");
?>

<section class="content-header">
    <h1>
        Manajemen halaman
        <small>Data halaman</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Manajemen halaman</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Data halaman</h3>
                    <a class="btn-sm btn-primary pull-right" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus-circle"></i> Tambah</a>
                </div>
                <div class="table-responsive">
                    <table id="komarudin" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Link Halaman</th>
                                <th width="15%">
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_halaman order by id_halaman desc");
                            while ($data = mysqli_fetch_array($tampil)) {
                                ?>
                                <tr>
                                    <td> <?php echo $no; ?> </td>
                                    <td> <?php echo $data['judul']; ?> </td>
                                    <td> ?tampil=halaman&id=<?php echo $data['id_halaman']; ?> </td>
                                    <td>
                                        <center>
                                            <a onclick="return confirm('Anda yakin akan menghapusnya ?')" title="hapus" href="admin.php?page=hapushalaman&id_halaman=<?php echo $data['id_halaman']; ?>" class="btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
                                            <a title="edit" href="admin.php?page=edithalaman&id_halaman=<?php echo $data['id_halaman']; ?>" class="btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
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
                                <h4 class="modal-title">Tambah halaman</h4>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="Judul" class="control-label">Judul</label>
                                        <input type="text" name="judul" class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="Isi" class="control-label">Isi</label>
                                        <textarea name="isi" id="editor1" cols="30" rows="10"></textarea>
                                    </div>
                                    <input type="submit" name="fsimpankom" class="btn btn-sm btn-primary" value="Simpan">
                                    <a class="btn btn-sm btn-danger pull-right" href="?page=datahalaman">Kembali</a>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['fsimpankom'])) {
                                $judul = htmlspecialchars($_POST['judul']);
                                $isi = $_POST['isi'];

                                $q = "INSERT INTO tbl_halaman(judul, isi)
                                VALUES('$judul', '$isi')";
                                mysqli_query($koneksi, $q);
                                ?>
                                <script type="text/javascript">
                                    alert('Berhasil Menambahkan Halaman !');
                                    document.location.href = "?page=datahalaman";
                                </script>
                            <?php
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