<!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Gallery</h1>
            
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="?tampil=home">Home</a>
              </li>
              <li class="breadcrumb-item">
              Gallery
              </li>
          
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->



   <!--/ Agent Single Star /-->
  <section class="agent-single">
    <div class="container">
      <div class="row">
        <div class="row property-grid grid">
          </div>
           <?php
                $sql = mysqli_query($koneksi, "SELECT * from tbl_tags order by id_tags");
                while ($data = mysqli_fetch_array($sql)) {
                    ?>            
          <div class="col-md-4">
            <div class="card-box-a card-shadow">
              <div class="img-box-a">
                <img src="administrator/img/tags/<?php echo $data['gambar']; ?>" alt="" class="img-a img-fluid" />
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#"><?php echo $data['judul_tags']; ?></a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a"><?php echo $data['tanggal']; ?></span>
                    </div>
                    <a href="?tampil=gallery_detail&id=<?php echo $data['judul_tags']; ?>" class="link-a">More detail
                      <span class="ion-ios-arrow-forward"></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
            }
            ?>
            
         </div>
       </div>
     </section>
  <!--/ Agent Single End /-->


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