<section class="content-header">
    <h1>
        Tambah Student
        <small>student Baru</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">student</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <form role="form" method="POST" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border bg-info">
                        <h3 class="box-title">Student</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <label for="Judul student" class="control-label">Nisn</label>
                            <input type="text" name="nisn" class="form-control" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Judul student" class="control-label">Nama</label>
                            <input type="text" name="nama" class="form-control" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Tanggal" class="control-label">Tanggal</label>
                            <input type="text" name="tanggal" id="datepicker" class="form-control" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Alamat" class="control-label">Alamat</label>
                            <textarea name="alamat" cols="30" rows="6" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="fsimpan" class="btn btn-sm btn-info">Tambah</button>
                        <a class="btn btn-sm btn-danger pull-right" href="?page=datastudent">Kembali</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border bg-info">
                        <h3 class="box-title"> </h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            <label for="Jenis Kelamin" class="control-label">Jenis Kelamin</label>
                            <select name="jk" class="form-control" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option class="form-control">Laki - Laki</option>
                                <option class="form-control">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="jurusan" class="control-label">Jurusan</label>
                            <input type="text" name="jurusan" class="form-control" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="angkatan" class="control-label">Angkatan</label>
                            <input type="text" name="angkatan" class="form-control" require autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="Status" class="control-label">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="">Pilih Jenis Status</option>
                                <option class="form-control">Aktif</option>
                                <option class="form-control">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <?php
        if (isset($_POST['fsimpan'])) {
            $nisn = htmlspecialchars($_POST['nisn']);
            $nama = htmlspecialchars($_POST['nama']);
            $tanggal = htmlspecialchars($_POST['tanggal']);
            $alamat = htmlspecialchars($_POST['alamat']);
            $jk = htmlspecialchars($_POST['jk']);
            $jurusan = htmlspecialchars($_POST['jurusan']);
            $angkatan = htmlspecialchars($_POST['angkatan']);
            $status = htmlspecialchars($_POST['status']);


            $q = "INSERT INTO tbl_student(nisn,nama,tanggal,alamat,jk,jurusan,angkatan,status)
                    VALUES('$nisn','$nama','$tanggal','$alamat','$jk','$jurusan','$angkatan','$status')";
            mysqli_query($koneksi, $q);
            ?>
            <script type="text/javascript">
                alert('Berhasil Menambahkan student !');
                document.location.href = "?page=datastudent";
            </script>
        <?php
    }
    ?>
    </div>
</section>