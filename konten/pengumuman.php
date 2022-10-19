  <!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Pengumuman</h1>
            
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="?tampil=home">Home</a>
              </li>
              <li class="breadcrumb-item">
                 Daftar Pengumuman  
              </li>

            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Single Star /-->
  <section class="property-single nav-arrow-b">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
      <?php
      $qjumlah = mysqli_query($koneksi, "SELECT * From tbl_pengumuman ");
      $jumlah = mysqli_num_rows($qjumlah);
      ?>
          
          <div class="row justify-content-between">
            <div class="col-md-5 col-lg-4">
              <div class="property-price d-flex justify-content-center foo">
                <div class="card-header-c d-flex">
                  <div class="card-box-ico">
                    <span class="ion-money"><?=$jumlah;?></span>
                  </div>

                </div>
              </div>
              <div class="property-summary">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="title-box-d section-t4">
                      <h3 class="title-d">Data Pengumuman</h3>
                    </div>
                  </div>
                </div>
                <div class="summary-list">
                  <ul class="list">
                    <li class="d-flex justify-content-between">
                      <strong>File:</strong>
                      <span><?=$jumlah;?></span>
                    </li>

                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-lg-7 section-md-t3">
               <?php
                    $hal   = isset($_GET['hal']) ? $_GET['hal'] : 1;
                    $batas    = 6;
                    $posisi = ($hal - 1) * $batas;
                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_pengumuman order by id_pengumuman Desc limit $posisi, $batas");
                    while ($data = mysqli_fetch_array($sql)) {
                        $isi = substr($data['isi_pengumuman'], 0, 300);
                        $isi = substr($data['isi_pengumuman'], 0, strrpos($isi, " "));
                        ?>
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box-d">
                    <h3 class="title-d"><?php echo $data['judul_pengumuman']; ?></h3>
                  </div>
                </div>
              </div>
              <div class="property-description">
                        <div class="blog_grid_block clearfix">
                            <div class="blog_grid_con">
                                <a href="?tampil=detail_pengumuman&id=<?php echo $data['id_pengumuman']; ?>" title="<?php echo $data['judul_pengumuman']; ?>"><?php echo $data['judul_pengumuman']; ?></a>
                                <p><?php echo $isi; ?>...</p>
                                Download Lampiran : <i class="fa fa-file"></i> <a href="administrator/file/pengumuman/<?= $data['file_pengumuman']; ?>"><?= $data['file_pengumuman']; ?></a>
                
              </div>
                <?php
                }
                ?>
              
            </div>

      
          </div>
        </div>

      </div>
    </div>
  </section>
    <!--/ footer Star /-->
  <section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">TKI SMKN1</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                Keahlian Teknik Komputer Dan Informatika sebagai pusat program keahlian yang memiliki keunggulan ilmu dan teknologi dalam bidang informasi dan komunikasi menjelang era globalisasi. Teknik Komputer Dan Informatika SMKN1 Terdapat 2 Kompetensi Keahlian yaitu : <br>
                1. Teknik Komputer Dan Jaringan <br>
                2. Rekayasa Perangkat Lunak
              </p>
            </div>
          
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Contact info</h3>
            </div>
            <?php
            $sql = mysqli_query($koneksi, "SELECT * FROM tbl_profil");
            $data = mysqli_fetch_array($sql)
            ?>
            <div class="w-body-a">
                <p class="w-text-a color-text-a">
              <?= $data['alamat']; ?>

             </p>
           </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
              
                <li class="color-a">
                  <span class="color-text-a">Telp .</span> <?= $data['no_telp']; ?></li>
              
              <li class="color-a">
                  <span class="color-text-a">Email .</span> <?= $data['email']; ?></li>

              <li class="color-a">
                  <span class="color-text-a">website .</span> <?= $data['website']; ?></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">Tags</h3>
            </div>
            <div class="w-body-a">
              <ul class="list-unstyled">
                <?php
                $kategori = mysqli_query($koneksi, "select * from tbl_kategoriberita order by id_kategori");
                while ($data = mysqli_fetch_array($kategori)) {
                  ?>
                <li class="item-list-a">
                  <i class="fa fa-angle-right"></i> <a href="#"> <?= $data['nama_kategori']; ?></a>
                </li>
              <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
