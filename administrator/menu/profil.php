<?php
$sql = mysqli_query($koneksi, "SELECT * FROM tbl_profil");
$data = mysqli_fetch_array($sql)
?>
<section class="content">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Profile Perusahaan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Judul Perusahaan</label>
                            <input type="text" name="Judul_perusahan" disabled="disabled" class="form-control" value="<?php echo $data['Judul_perusahan']; ?>">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <input type="text" name="Nama_perusahan" disabled="disabled" class="form-control" value="<?php echo $data['Nama_perusahan']; ?>">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" id="" disabled="disabled" class="form-control" cols="30" rows="10"><?php echo $data['alamat']; ?></textarea>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" disabled="disabled" class="form-control" value="<?php echo $data['email']; ?>">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" name="no_telp" disabled="disabled" class="form-control" value="<?php echo $data['no_telp']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Website</label>
                            <input type="text" name="website" disabled="disabled" class="form-control" value="<?php echo $data['website']; ?>">
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a title="edit" href="admin.php?page=editprofil&id_profil=<?php echo $data['id_profil']; ?>" class="btn btn-sm btn-primary"> Edit Profil Sya</a>
        </div>
    </div>
</section>