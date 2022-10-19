<?php
if (!defined("INDEX")) die("---");
?>
<section class="content-header">
    <h1>
        Manajemen download
        <small>Data download</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Manajemen download</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Data download</h3>
                    <a class="btn-sm btn-primary pull-right" href="?page=tambahdownload"><i class="fa fa-plus-circle"></i> Tambah</a>
                </div>
                <div class="table-responsive">
                    <table id="komarudin" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Nama File</th>
                                <th>Keterangan</th>
                                <th>File download</th>
                                <th width="10%">Tanggal</th>
                                <th width="10%">Penerbit</th>
                                <th width="15%">
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($koneksi, "SELECT tbl_user.*,tbl_download.* FROM tbl_download  
                            INNER JOIN tbl_user ON tbl_user.id_user=tbl_download.id_user order by id_download desc");
                            while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td> <?php echo $no; ?> </td>
                                    <td> <?php echo $data['nama_file']; ?> </td>
                                    <td> <?php echo $data['keterangan']; ?></td>
                                    <td> <?php echo $data['file_download']; ?></td>
                                    <td> <?php echo $data['tgl_uploadfile']; ?> </td>
                                    <td> <?php echo $data['username']; ?> </td>
                                    <td>
                                        <center>
                                            <a onclick="return confirm('Anda yakin akan menghapusnya ?')" title="hapus" href="pengelola.php?page=hapusdownload&id_download=<?php echo $data['id_download']; ?>" class="btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
                                            <a title="edit" href="pengelola.php?page=editdownload&id_download=<?php echo $data['id_download']; ?>" class="btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
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