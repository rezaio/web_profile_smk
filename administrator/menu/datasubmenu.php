<?php
if (!defined("INDEX")) die("---");
?>

<section class="content-header">
    <h1>
        Manajemen Submenu
        <small>Data Submenu</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Manajemen Submenu</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Data Submenu</h3>
                    <a class="btn-sm btn-primary pull-right" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus-circle"></i> Tambah</a>
                </div>
                <div class="table-responsive">
                    <table id="komarudin" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Induk</th>
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
                            $sql = mysqli_query($koneksi, "SELECT * FROM tbl_submenu order by urutan asc") or die(mysqli_error());
                            while ($data = mysqli_fetch_array($sql)) {
                                $sqlmenu = mysqli_query($koneksi, "SELECT * FROM tbl_menu where id_menu='$data[id_menu]'");
                                $datamenu = mysqli_fetch_array($sqlmenu);
                                ?>
                                <tr>
                                    <td> <?php echo $no; ?> </td>
                                    <td> <?php echo $data['judul']; ?> </td>
                                    <td> <?php echo $datamenu['judul']; ?> </td>
                                    <td> <?php echo $data['link']; ?> </td>
                                    <td> <?php echo $data['urutan']; ?> </td>
                                    <td>
                                        <center>
                                            <a onclick="return confirm('Anda yakin akan menghapusnya ?')" title="hapus" href="admin.php?page=hapussubmenu&id_submenu=<?php echo $data['id_submenu']; ?>" class="btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
                                            <a title="edit" href="admin.php?page=editsubmenu&id_submenu=<?php echo $data['id_submenu']; ?>" class="btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                                        </center>
                                    </td>
                                </tr>
                            </tbody>
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
                                <h4 class="modal-title">Tambah Submenu</h4>
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="Judul" class="control-label">Judul</label>
                                        <input type="text" name="judul" class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="Induk" class="control-label">Induk</label>
                                        <select name="id_menu" class="form-control">
                                            <?php
                                            $sqlmenu = mysqli_query($koneksi, "select * from tbl_menu");
                                            while ($datamenu = mysqli_fetch_array($sqlmenu)) {
                                                echo "<option value='$datamenu[id_menu]'> $datamenu[judul] </option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Link" class="control-label">Link</label>
                                        <input type="text" name="link" class="form-control" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="Urutan" class="control-label">Urutan</label>
                                        <input type="text" name="urutan" class="form-control" required autocomplete="off">
                                    </div>
                                    <input type="submit" name="fsimpankom" class="btn btn-sm btn-primary" value="Simpan">
                                    <a class="btn btn-sm btn-danger pull-right" href="?page=datasubmenu">Kembali</a>
                                </div>
                            </form>
                            <?php
                            if (isset($_POST['fsimpankom'])) {
                                $judul = htmlspecialchars($_POST['judul']);
                                $id_menu = htmlspecialchars($_POST['id_menu']);
                                $link = htmlspecialchars($_POST['link']);
                                $urutan = htmlspecialchars($_POST['urutan']);

                                $q = "INSERT INTO tbl_submenu(judul, id_menu, link, urutan)
                                VALUES('$judul', '$id_menu', '$link','$urutan')";
                                mysqli_query($koneksi, $q);
                                ?>
                                <script type="text/javascript">
                                    alert('Berhasil Menambahkan Submenu !');
                                    document.location.href = "?page=datasubmenu";
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