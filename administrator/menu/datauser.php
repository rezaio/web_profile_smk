<?php
if (!defined("INDEX")) die("---");
$user = query("SELECT * FROM tbl_user order by id_user desc");

function upload()
{
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFIle = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload
  if ($error === 4) {
    echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>
        alert('pilih gambar terlebih dahulu!');
        </script>";
    return false;
  }

  // cek jika ukurannya terlalu besar
  if ($ukuranFIle > 5000000) {
    echo "<script>
        alert('Ukuran Gambar Terlalu Besar');
        </script>";
    return false;
  }

  //lolos pengecekan gambar siap diupload
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, 'img/user/' . $namaFileBaru);
  return $namaFileBaru;
}

?>

<section class="content-header">
  <h1>
    Manajemen User
    <small>Data Pengguna</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Tables</a></li>
    <li class="active">Manajemen User</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Data User</h3>
          <!-- <a class="btn-sm btn-primary pull-right" href="?page=tambahuser"><i class="fa fa-plus-circle"></i> Tambah</a> -->
          <a class="btn-sm btn-primary pull-right" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus-circle"></i> Tambah</a>
        </div>
        <div class="table-responsive">
          <table id="komarudin" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Username</th>
                <th>Status</th>
                <th>Level</th>
                <th width="15%">
                  <center>Action</center>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($user as $row) :
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td style="text-align:center;"><img src="img/user/<?= $row['gambar']; ?>" width="35"></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php if ($row['status'] == 'Aktif')
                        echo '<span class="pull-left badge bg-green" >Aktif</span>';
                      else
                        echo '<span class="pull-left badge bg-red" >Tidak Aktif</span>';
                      ?>
                  </td>
                  <td><?php echo $row['level']; ?></td>
                  <td>
                    <center>
                      <a onclick="return confirm('Anda yakin akan menghapusnya ?')" title="hapus" href="admin.php?page=hapususer&id_user=<?php echo $row['id_user']; ?>" class="btn-sm btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
                      <a title="edit" href="admin.php?page=edituser&id_user=<?php echo $row['id_user']; ?>" class="btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
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
                <h4 class="modal-title">Tambah User</h4>
              </div>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="gambar" class="control-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="Username" class="control-label">Username</label>
                    <input type="text" name="username" class="form-control" required autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="Password" class="control-label">Password</label>
                    <input type="password" name="password" class="form-control" required autocomplete="off">
                  </div>
                  <div class="form-group">
                    <label for="Status" class="control-label">Status</label>
                    <select name="status" class="form-control" required>
                      <option value="">Pilih Status Aktif</option>
                      <option class="form-control">Aktif</option>
                      <option class="form-control">Tidak Aktif</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Level" class="control-label">Level</label>
                    <select name="level" class="form-control" required>
                      <option value="">Pilih Level Akses</option>
                      <option class="form-control">Administrator</option>
                      <option class="form-control">Pengelola Data</option>
                    </select>
                  </div>
                  <input type="submit" name="fsimpankom" class="btn btn-sm btn-primary" value="Simpan">
                  <a class="btn btn-sm btn-danger pull-right" href="?page=datauser">Kembali</a>
                </div>
              </form>
              <?php
              if (isset($_POST['fsimpankom'])) {
                $gambar = htmlspecialchars($_POST['gambar']);
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars(md5($_POST['password']));
                $status = htmlspecialchars($_POST['status']);
                $level = htmlspecialchars($_POST['level']);

                //upload gambar
                $gambar = upload();
                if (!$gambar) {
                  return false;
                } else {

                  $q = "INSERT INTO tbl_user(gambar, username, password, status, level)
                VALUES('$gambar', '$username','$password',  '$status','$level')";
                  mysqli_query($koneksi, $q);

                  ?>
                  <script type="text/javascript">
                    alert('Berhasil Menambahkan user !');
                    document.location.href = "?page=datauser";
                  </script>
                <?php
              }
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