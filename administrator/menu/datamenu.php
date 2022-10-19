<?php
if (!defined("INDEX")) die("---");
$menu = query("SELECT * FROM tbl_menu order by urutan Asc");
?>

<section class="content-header">
    <h1>
        Manajemen Menu
        <small>Data Menu</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Manajemen menu</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Data Menu</h3>
                    <a class="btn-sm btn-primary pull-right" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus-circle"></i> Tambah</a>
                </div>
                <div class="table-responsive">
                    <table id="komarudin" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Link</th>
                                <th>Urutan</th>
                                <th width="15%">
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($menu as $row) :
                                ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $row['judul']; ?></td>
                                    <td><?php echo $row['link']; ?></td>
                                    <td><?php echo $row['urutan']; ?></td>
                                    <td>
                                        <center>
                                            <a onclick="return confirm('Anda yakin akan menghapusnya ?')" title="hapus" href="admin.php?page=hapusmenu&id_menu=<?php echo $row['id_menu']; ?>" class="btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
                                            <a title="edit" href="admin.php?page=editmenu&id_menu=<?php echo $row['id_menu']; ?>" class="btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                                        </center>
                                    </td>
                                </tr>
                                <?php
                                $no++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Tambah User -->
                <div id="tambah" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Tambah Menu</h4>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="Judul" class="control-label">Judul</label>
                                        <input type="text" name="judul" class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="Link" class="control-label">Link</label>
                                        <input type="text" name="link" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="Urutan" class="control-label">Urutan</label>
                                        <input type="text" name="urutan" class="form-control" required autocomplete="off">
                                    </div>
                                    <input type="submit" name="fsimpan" class="btn btn-sm btn-primary" value="Simpan">
                                    <a class="btn btn-sm btn-danger pull-right" href="?page=datamenu">Kembali</a>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['fsimpan'])) {
                                $judul = htmlspecialchars($_POST['judul']);
                                $link = htmlspecialchars($_POST['link']);
                                $urutan = htmlspecialchars($_POST['urutan']);

                                $q = "INSERT INTO tbl_menu(judul, link, urutan)
                                VALUES('$judul', '$link','$urutan')";
                                mysqli_query($koneksi, $q);
                                ?>
                                <script type="text/javascript">
                                    alert('Berhasil Menambahkan Menu !');
                                    document.location.href = "?page=datamenu";
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