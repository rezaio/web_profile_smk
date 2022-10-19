<?php
if (!defined("INDEX")) die("---");
$fitur = query("SELECT * FROM tbl_fitur order by id_fitur desc");
?>
<section class="content-header">
    <h1>
        Manajemen fitur
        <small>Data fitur</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Manajemen fitur</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Data fitur</h3>
                    <a class="btn-sm btn-primary pull-right" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus-circle"></i> Tambah</a>
                </div>
                <div class="table-responsive">
                    <table id="komarudin" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Icon</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                                <th width="15%">
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($fitur as $row) :
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['icon']; ?></td>
                                    <td><?php echo $row['nama']; ?></td>
                                    <td><?php echo $row['keterangan']; ?></td>
                                    <td>
                                        <center>
                                            <a onclick="return confirm('Anda yakin akan menghapusnya ?')" title="hapus" href="admin.php?page=hapusfitur&id_fitur=<?php echo $row['id_fitur']; ?>" class="btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
                                            <a title="edit" href="admin.php?page=editfitur&id_fitur=<?php echo $row['id_fitur']; ?>" class="btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
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
                                <h4 class="modal-title">Tambah fitur</h4>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="icon" class="control-label">icon</label>
                                        <input type="text" name="icon" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan" class="control-label">Keterangan</label>
                                        <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                    <input type="submit" name="fsimpan" class="btn btn-sm btn-primary" value="Simpan">
                                    <a class="btn btn-sm btn-danger pull-right" href="?page=datafitur">Kembali</a>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['fsimpan'])) {
                                $icon = htmlspecialchars($_POST['icon']);
                                $nama = htmlspecialchars($_POST['nama']);
                                $keterangan = htmlspecialchars($_POST['keterangan']);

                                $q = "INSERT INTO tbl_fitur(icon, nama, keterangan)
                                VALUES('$icon', '$nama','$keterangan')";
                                mysqli_query($koneksi, $q);
                                ?>
                                <script type="text/javascript">
                                    alert('Berhasil Menambahkan fitur !');
                                    document.location.href = "?page=datafitur";
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