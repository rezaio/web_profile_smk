<?php
if (!defined("INDEX")) die("---");
?>
<section class="content-header">
    <h1>
        Manajemen student
        <small>Data student</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Manajemen student</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Data student</h3>
                    <br></br>
                    <a class="btn-sm btn-primary" href="?page=tambahstudent"><i class="fa fa-plus-circle"></i> Tambah</a>
                    <a class="btn-sm btn-info" href="?page=import"><i class="fa fa-cloud-upload"></i> Import</a>
                    <a class="btn-sm btn-warning" href="?page=export"><i class="fa fa-cloud-download"></i> Export</a>
                </div>
                <div class="table-responsive">
                    <table id="komarudin" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="9%">Nisn</th>
                                <th>Nama</th>
                                <th width="8%">Tanggal Lahir</th>
                                <th width="8%">Jenis Kelamin</th>
                                <th width="15%">Jurusan</th>
                                <th width="8%">Angkatan</th>
                                <th width="8%">Status</th>
                                <th>Alamat</th>
                                <th width="15%">
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['berhasil'])) {
                                echo "<p>" . $_GET['berhasil'] . " Data berhasil di import.</p>";
                            }
                            ?>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($koneksi, "SELECT * from tbl_student order by id_student desc");
                            while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $data['nisn']; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['tanggal']; ?></td>
                                    <td><?= $data['jk']; ?></td>
                                    <td><?= $data['jurusan']; ?></td>
                                    <td><?= $data['angkatan']; ?></td>
                                    <td><?php if ($data['status'] == 'Aktif')
                                            echo '<span class="pull-left badge bg-green" >Aktif</span>';
                                        else
                                            echo '<span class="pull-left badge bg-red" >Tidak Aktif</span>';
                                        ?>
                                    </td>
                                    <td><?= $data['alamat']; ?></td>
                                    <td>
                                        <center>
                                            <a onclick="return confirm('Anda yakin akan menghapusnya ?')" title="hapus" href="admin.php?page=hapusstudent&id_student=<?php echo $data['id_student']; ?>" class="btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
                                            <a title="edit" href="admin.php?page=editstudent&id_student=<?php echo $data['id_student']; ?>" class="btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
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
            </div>
        </div>
    </div>
</section>