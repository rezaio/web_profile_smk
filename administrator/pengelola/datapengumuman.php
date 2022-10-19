<?php
if (!defined("INDEX")) die("---");
?>
<section class="content-header">
    <h1>
        Manajemen pengumuman
        <small>Data pengumuman</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Manajemen pengumuman</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Data pengumuman</h3>
                    <a class="btn-sm btn-primary pull-right" href="?page=tambahpengumuman"><i class="fa fa-plus-circle"></i> Tambah</a>
                </div>
                <div class="table-responsive">
                    <table id="komarudin" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Judul Pengumuman</th>
                                <th>Isi Pengumuman</th>
                                <th>File Pengumuman</th>
                                <th width="5%">Publish</th>
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
                            $sql = mysqli_query($koneksi, "SELECT tbl_user.*,tbl_pengumuman.* FROM tbl_pengumuman  
                            INNER JOIN tbl_user ON tbl_user.id_user=tbl_pengumuman.id_user order by id_pengumuman desc");
                            while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                <tr>
                                    <td> <?php echo $no; ?> </td>
                                    <td> <?php echo $data['judul_pengumuman']; ?> </td>
                                    <td> <?php echo $data['isi_pengumuman']; ?></td>
                                    <td> <?php echo $data['file_pengumuman']; ?></td>
                                    <td><?php if ($data['publish'] == 'Ya')
                                            echo '<span class="pull-left badge bg-green" >Ya</span>';
                                        else
                                            echo '<span class="pull-left badge bg-red" >Tidak</span>';
                                        ?>
                                    </td>

                                    <td> <?php echo $data['tgl_uploadpengumuman']; ?> </td>
                                    <td> <?php echo $data['username']; ?> </td>
                                    <td>
                                        <center>
                                            <a onclick="return confirm('Anda yakin akan menghapusnya ?')" title="hapus" href="pengelola.php?page=hapuspengumuman&id_pengumuman=<?php echo $data['id_pengumuman']; ?>" class="btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
                                            <a title="edit" href="pengelola.php?page=editpengumuman&id_pengumuman=<?php echo $data['id_pengumuman']; ?>" class="btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
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