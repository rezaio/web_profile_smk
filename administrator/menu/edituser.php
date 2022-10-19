<?php

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
    Edit User
    <small>User Baru</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Forms</a></li>
    <li class="active">User</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border bg-info">
          <h3 class="box-title">Edit User</h3>
        </div>
        <?php
        $id = $_GET['id_user'];
        $query = mysqli_query($koneksi, "SELECT * From tbl_user where id_user='$id'");
        $user = mysqli_fetch_array($query);
        ?>
        <form role="form" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <input type="hidden" name="gambarLama" class="form-control" value="<?= $user['gambar']; ?>" require>
            <div class="form-group col-md-12">
              <label for="Username" class="control-label">Username</label>
              <input type="text" name="username" class="form-control" value="<?= $user['username']; ?>" require autocomplete="off">
            </div>
            <div class="form-group col-md-12">
              <label for="Password" class="control-label">Password</label>
              <input type="password" name="password" class="form-control" value="<?= $user['password']; ?>" require autocomplete="off">
            </div>
            <div class="form-group col-md-3">
              <label for="Status" class="control-label">Status</label>
              <select name="status" class="form-control" require>
                <option <?php if ($user['status'] == "Aktif") {
                          echo "selected";
                        } ?> class="form-control">Aktif</option>
                <option <?php if ($user['status'] == "Tidak Aktif") {
                          echo "selected";
                        } ?> class="form-control">Tidak Aktif</option>
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="Level" class="control-label">Level</label>
              <select name="level" class="form-control" require>
                <option <?php if ($user['level'] == "Administrator") {
                          echo "selected";
                        } ?> class="form-control">Administrator</option>
                <option <?php if ($user['level'] == "Pengelola Data") {
                          echo "selected";
                        } ?> class="form-control">Pengelola Data</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <img class="profile-user-img img-responsive img-circle" src="img/user/<?= $user['gambar']; ?>" width="100">
            </div>
            <div class="form-group col-md-4">
              <label for="Gambar">Foto Pengguna</label>
              <input type="file" name="gambar" require>
              <p class="help-block"> Pilih jika ingin ganti Foto Pengguna (JPG atau PNG).</p>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" name="fsimpan" class="btn btn-sm btn-info">Edit User</button>
            <a class="btn btn-sm btn-danger pull-right" href="?page=datauser">Kembali</a>
          </div>
        </form>
        <?php
        if (isset($_POST['fsimpan'])) {
          $gambarLama = htmlspecialchars($_POST['gambarLama']);
          $username = htmlspecialchars($_POST['username']);
          $password = htmlspecialchars(md5($_POST['password']));
          $status = htmlspecialchars($_POST['status']);
          $level = htmlspecialchars($_POST['level']);

          if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarLama;
          } else {
            $gambar = upload();
          }

          $q = "UPDATE tbl_user SET gambar ='$gambar', username='$username', 
        password='$password', status='$status', level='$level' where id_user='$id'";
          mysqli_query($koneksi, $q);
          ?>
          <script type="text/javascript">
            alert('Berhasil Merubah data User !');
            document.location.href = "?page=datauser";
          </script>
        <?php
      }
      ?>
      </div>
    </div>
  </div>
</section>