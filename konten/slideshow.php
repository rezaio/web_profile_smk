<!--/ Carousel Star /-->
<div class="intro intro-carousel">
    <div id="carousel" class="owl-carousel owl-theme">
    <?php
  $banner = mysqli_query($koneksi, "select * from tbl_banner order by id_banner Desc");
  while ($data = mysqli_fetch_array($banner)) {

    ?>
    <div class="carousel-item-a intro-item bg image">

        <div class="overlay overlay-a">
        <img src ="administrator/img/slideshow/<?php echo $data['gambar']; ?>"/>
        </div>
        <div class="intro-content display-table">
          <div class="table-cell">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <div class="intro-body">
                    <p class="intro-title-top"><?= $data['judul_belakang']; ?></p>
                    <h1 class="intro-title mb-4">
                      <span class="color-c"><?= $data['judul_depan'] ?> 
                    <p class="intro-subtitle intro-price">
                      <a href="#"><span class="price-a">Read more</span></a>
                    </p>
                  </div>
                </div>
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
  <!--/ Carousel end /-->