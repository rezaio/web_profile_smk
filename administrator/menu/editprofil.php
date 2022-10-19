<section class="content-header">
    <h1>
        Edit Profile
        <small>Profile Baru</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Profile</li>
    </ol>
</section>
<section class="content">
    <?php
    $id = $_GET['id_profil'];
    $query = mysqli_query($koneksi, "SELECT * From tbl_profil where id_profil='$id'");
    $data = mysqli_fetch_array($query);
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="box box-default">
            <div class="box-header with-border bg-info">
                <h3 class="box-title">Profile Perusahaan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Judul Perusahaan</label>
                            <input type="text" name="Judul_perusahan" class="form-control" value="<?php echo $data['Judul_perusahan']; ?>" autocomplete="off">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Nama Perusahaan</label>
                            <input type="text" name="Nama_perusahan" class="form-control" value="<?php echo $data['Nama_perusahan']; ?>" autocomplete="off">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" id="" class="form-control" cols="30" rows="10"><?php echo $data['alamat']; ?></textarea>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>" autocomplete="off">
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" name="no_telp" class="form-control" value="<?php echo $data['no_telp']; ?>" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Wesite</label>
                            <input type="text" name="website" class="form-control" value="<?php echo $data['website']; ?>" autocomplete="off">
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <input type="submit" name="fsimpankom" class="btn btn-sm btn-primary" value="Simpan">
            </div>

    </form>
    <?php
    if (isset($_POST['fsimpankom'])) {
        $Judul_perusahan = htmlspecialchars($_POST['Judul_perusahan']);
        $Nama_perusahan = htmlspecialchars($_POST['Nama_perusahan']);
        $alamat = htmlspecialchars($_POST['alamat']);
        $email = htmlspecialchars($_POST['email']);
        $no_telp = htmlspecialchars($_POST['no_telp']);
        $website = htmlspecialchars($_POST['website']);

        $q = "UPDATE tbl_profil SET Judul_perusahan ='$Judul_perusahan', Nama_perusahan='$Nama_perusahan', alamat='$alamat', email='$email', no_telp='$no_telp', website='$website' where id_profil='$id'";
        mysqli_query($koneksi, $q);
        ?>
        <script type="text/javascript">
            alert('Berhasil Menambahkan profil !');
            document.location.href = "?page=profil";
        </script>
    <?php
}
?>
    </div>
</section>