<?php
if (!defined("INDEX")) die("---");
?>
<section class="content-header">
    <h1>
        Manajemen kategori
        <small>Data kategori</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Manajemen kategori</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Data kategori</h3>
                    <a class="btn-sm btn-primary pull-right" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus-circle"></i> Tambah</a>
                </div>
                <div class="table-responsive">
                    <table id="komarudin" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Keterangan</th>
                                <th>Status</th>
                                <th width="15%">
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($koneksi, "SELECT * FROM tbl_kategoriberita order by id_kategori desc");
                            while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td> <?php echo $no; ?> </td>
                                    <td> <?php echo $data['nama_kategori']; ?> </td>
                                    <td> <?php echo $data['keterangan']; ?> </td>
                                    <td><?php if ($data['status_aktif'] == 'Aktif')
                                            echo '<span class="pull-left badge bg-green" >Aktif</span>';
                                        else
                                            echo '<span class="pull-left badge bg-red" >Tidak</span>';
                                        ?>
                                    </td>
                                    <td>
                                        <center>
                                            <a onclick="return confirm('Anda yakin akan menghapusnya ?')" title="hapus" href="admin.php?page=hapuskategori&id_kategori=<?php echo $data['id_kategori']; ?>" class="btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
                                            <a title="edit" href="admin.php?page=editkategori&id_kategori=<?php echo $data['id_kategori']; ?>" class="btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
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
                                <h4 class="modal-title">Tambah kategori</h4>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="Nama Kategori" class="control-label">Nama Kategori</label>
                                        <input type="text" name="nama_kategori" class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="Keterangan" class="control-label">Keterangan</label>
                                        <textarea name="keterangan" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="Status" class="control-label">Status</label>
                                        <select name="status_aktif" class="form-control" required>
                                            <option class="form-control">Aktif</option>
                                            <option class="form-control">Tidak</option>
                                        </select>
                                    </div>
                                    <input type="submit" name="fsimpankom" class="btn btn-sm btn-primary" value="Simpan">
                                    <a class="btn btn-sm btn-danger pull-right" href="?page=datakategori">Kembali</a>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['fsimpankom'])) {
                                $nama_kategori = htmlspecialchars($_POST['nama_kategori']);
                                $keterangan = htmlspecialchars($_POST['keterangan']);
                                $status_aktif = htmlspecialchars($_POST['status_aktif']);

                                $q = "INSERT INTO tbl_kategoriberita(nama_kategori, keterangan, status_aktif)
                                VALUES('$nama_kategori', '$keterangan', '$status_aktif')";
                                mysqli_query($koneksi, $q);
                                ?>
                                <script type="text/javascript">
                                    alert('Berhasil Menambahkan kategori !');
                                    document.location.href = "?page=datakategori";
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