<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
  <section class="content">
    <div class="row">
      <?php
      $qjumlah = mysqli_query($koneksi, "SELECT * From tbl_user ");
      $jumlah = mysqli_num_rows($qjumlah);
      ?>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo $jumlah; ?></h3>

            <p>Data User</p>
          </div>

          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="?page=datauser" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <?php
      $qjumlah = mysqli_query($koneksi, "SELECT * From tbl_banner ");
      $jumlah = mysqli_num_rows($qjumlah);
      ?>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo $jumlah; ?></h3>

            <p>Data SlideShow</p>
          </div>

          <div class="icon">
            <i class="ion ion-android-film"></i>
          </div>
          <a href="?page=databanner" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <?php
      $qjumlah = mysqli_query($koneksi, "SELECT * From tbl_menu ");
      $jumlah = mysqli_num_rows($qjumlah);
      ?>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo $jumlah; ?></h3>

            <p>Data Menu</p>
          </div>

          <div class="icon">
            <i class="ion ion-android-menu"></i>
          </div>
          <a href="?page=datamenu" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <?php
      $qjumlah = mysqli_query($koneksi, "SELECT * From tbl_submenu ");
      $jumlah = mysqli_num_rows($qjumlah);
      ?>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo $jumlah; ?></h3>

            <p>Data Submenu</p>
          </div>

          <div class="icon">
            <i class="fa fa-sitemap"></i>
          </div>
          <a href="?page=datasubmenu" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <?php
      $qjumlah = mysqli_query($koneksi, "SELECT * From tbl_halaman ");
      $jumlah = mysqli_num_rows($qjumlah);
      ?>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-maroon">
          <div class="inner">
            <h3><?php echo $jumlah; ?></h3>

            <p>Data Halaman</p>
          </div>

          <div class="icon">
            <i class="fa fa-dedent"></i>
          </div>
          <a href="?page=datahalaman" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <?php
      $qjumlah = mysqli_query($koneksi, "SELECT * From tbl_kategoriberita ");
      $jumlah = mysqli_num_rows($qjumlah);
      ?>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-primary">
          <div class="inner">
            <h3><?php echo $jumlah; ?></h3>

            <p>Data Kategori</p>
          </div>

          <div class="icon">
            <i class="fa fa-circle-o"></i>
          </div>
          <a href="?page=datakategori" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <?php
      $qjumlah = mysqli_query($koneksi, "SELECT * From tbl_berita ");
      $jumlah = mysqli_num_rows($qjumlah);
      ?>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-purple">
          <div class="inner">
            <h3><?php echo $jumlah; ?></h3>

            <p>Data Berita</p>
          </div>

          <div class="icon">
            <i class="fa fa-newspaper-o"></i>
          </div>
          <a href="?page=databerita" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <?php
      $qjumlah = mysqli_query($koneksi, "SELECT * From tbl_fitur ");
      $jumlah = mysqli_num_rows($qjumlah);
      ?>
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-teal">
          <div class="inner">
            <h3><?php echo $jumlah; ?></h3>

            <p>Data Fitur</p>
          </div>

          <div class="icon">
            <i class="fa fa-mortar-board"></i>
          </div>
          <a href="?page=datafitur" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>
  </section>