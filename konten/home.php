

<?= include "slideshow.php" ?>
<?= include "services.php" ?>



  <!--/ Property Star /-->
 
  <!--/ Property End /-->

  <!--/ Agents Star /-->
 
  <!--/ Agents End /-->

  <!--/ News Star /-->
  <section class="section-news section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">

            <div class="title-box">
              <h2 class="title-a">Latest news</h2>
            </div>
            <div class="title-link">
              <a href="blog-grid.html">All
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div id="new-carousel" class="owl-carousel owl-theme">
                    <?php
                        $hal   = isset($_GET['hal']) ? $_GET['hal'] : 1;

                        $batas    = 3;
                        $posisi = ($hal - 1) * $batas;
                        $berita = mysqli_query($koneksi, "SELECT tbl_kategoriberita.*,tbl_user.*,tbl_berita.* FROM tbl_berita 
                  INNER JOIN tbl_kategoriberita ON tbl_kategoriberita.id_kategori=tbl_berita.id_kategori 
                  INNER JOIN tbl_user ON tbl_user.id_user=tbl_berita.id_user where publish='Ya' order by id_berita desc limit $posisi, $batas");
                        while ($data = mysqli_fetch_array($berita)) {
                            $isi = substr($data['isi'], 0, 500);
                            $isi = substr($data['isi'], 0, strrpos($isi, " "));
                            ?>
        <div class="carousel-item-c">
          <div class="card-box-b card-shadow news-box">
            <div class="img-box-b">
              <img width="360" height="231" src="administrator/img/berita/<?php echo $data['gambar']; ?>" class="img-responsive wp-post-image" alt="" />
            </div>
            <div class="card-overlay">
              <div class="card-header-b">
                <div class="card-category-b">
                  <a href="" class="category-b"><?php echo $data['nama_kategori']; ?></a>
                </div>
                <div class="card-title-b">
                  <h2 class="title-2">
                    <a href="?tampil=berita_detail&id=<?php echo $data['id_berita']; ?>"><?php echo $data['judul']; ?></a>
                  </h2>
                </div>
                <div class="card-date">                  
                  <span class="date-b"><?php echo $data['tglupload']; ?></span>
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
  <!--/ News End /-->

  <!--/ Testimonials Star /-->
  <section class="section-testimonials section-t8 nav-arrow-a">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Testimonials</h2>
            </div>
          </div>
        </div>
      </div>
      <div id="testimonial-carousel" class="owl-carousel owl-arrow">
        <div class="carousel-item-a">
          <div class="testimonials-box">
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-img">
                  <img src="img/testimonial-6.jpg" alt="" class="img-fluid">
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div class="testimonial-ico">
                  <span class="ion-ios-quote"></span>
                </div>
                <div class="testimonials-content">
                  <p class="testimonial-text">
                    jutaan orang tidak mengetahui bahwa copy lebih enak dari pada ngoding sendiri
                    awokawokawok:v
                  </p>
                </div>
                <div class="testimonial-author-box">
                  <img src="img/1favicon.png" alt="" class="testimonial-avatar">
                  <h5 class="testimonial-author">Reza oktario</h5>
                </div>
              </div>
            </div>
          </div>
        </div>
  <!--/ Testimonials Star /-->       
              </div>
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