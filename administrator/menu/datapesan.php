<?php
if (!defined("INDEX")) die("---");
$pesan = query("SELECT * FROM tbl_pesan order by id_pesan desc");
?>
<section class="content-header">
    <h1>
        Manajemen Pesan
        <small>Data pesan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Manajemen pesan</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Data pesan</h3>
                </div>
                <div class="table-responsive">
                    <table id="komarudin" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Subjek</th>
                                <th>Tanggal</th>
                                <th width="15%">
                                    <center>Action</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pesan as $row) :
                                ?>
                                <tr>
                                    <td> <?php echo $no; ?> </td>
                                    <td> <?php echo $row['nama']; ?> </td>
                                    <td> <?php echo $row['email']; ?> </td>
                                    <td> <a href='?page=balaspesan&id=<?php echo $row['id_pesan']; ?>'> <?php echo $row['subjek']; ?> </a></td>
                                    <td> <?php echo $row['tanggal']; ?> </td>
                                    <td>
                                        <center>
                                            <a onclick="return confirm('Anda yakin akan menghapusnya ?')" title="hapus" href="admin.php?page=hapuspesan&id_pesan=<?php echo $row['id_pesan']; ?>" class="btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
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
            </div>
        </div>
    </div>
</section>