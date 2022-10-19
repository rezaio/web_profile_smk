 <!--/ Services Star /-->
  <section class="section-services section-t8">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-wrap d-flex justify-content-between">
            <div class="title-box">
              <h2 class="title-a">Our Services</h2>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
         <?php
            $fitur = mysqli_query($koneksi, "SELECT * from tbl_fitur order by id_fitur");
            while ($data = mysqli_fetch_array($fitur)) {
                ?>
        <div class="col-md-3">
          <div class="card-box-c foo">
            <div class="card-header-c d-flex">
              <div class="card-box-ico">
               <span class="<?php echo $data['icon']; ?>"></span>
              </div>
              <div class="card-title-c align-self-center">
                <h2 class="title-c"><?php echo $data['nama']; ?></h2>
              </div>
            </div>
            <div class="card-body-c">
              <p class="content-c">
              <?php echo $data['keterangan']; ?>
              </p>
            </div>
            <div class="card-footer-c">
              <a href="#" class="link-c link-icon">Read more
                <span class="ion-ios-arrow-forward"></span>
              </a>
            </div>
          </div>
        </div>
             <?php
        }
        ?>
      </div>
    </div>
  </section>
  <!--/ Services End /-->