<!--/ Intro Single star /-->
  <section class="intro-single">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="title-single-box">
            <h1 class="title-single">Contact Us</h1>
            
          </div>
        </div>
        <div class="col-md-12 col-lg-4">
          <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="?tampil=home">Home</a>
              </li>
              <li class="breadcrumb-item">
              Contact
              </li>
          
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Contact Star /-->
  <section class="contact">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="title-d"></i>Your message has been sent. Thank you!</h2>
       
        <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_profil");
                    $data = mysqli_fetch_array($sql)
                    ?>

        <div class="col-sm-12 section-t8">
          <div class="row">
            <div class="col-md-7">
              <form class="form-a contactForm" action="" method="post" role="form">
                <div id="contact-us-form"></div>
                <div id="contact-us-form"></div>
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input type="text" name="nama" class="form-control form-control-lg form-control-a" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <input name="email" type="email" class="form-control form-control-lg form-control-a" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <input type="text" name="subjek" class="form-control form-control-lg form-control-a" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject">
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12 mb-3">
                    <div class="form-group">
                      <textarea name="pesan" class="form-control" name="pesan" cols="45" rows="8" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" name="submit" class="btn btn-a" value="submit">Send Message</button>
                  </div>
                </div>
              </form>
               <?php
                    if (isset($_POST['submit'])) {

                        $nama    = $_POST['nama'];
                        $email    = $_POST['email'];
                        $pesan    = $_POST['pesan'];

                        $subjek    = $_POST['subjek'];
                        $dari    = "sulungkomar@gmail.com";
                        $tgl    = date('Ymd');

                        $q = "INSERT INTO tbl_pesan(nama,email,pesan,subjek,tanggal)
                                            VALUES('$nama','$email','$pesan','$subjek','$tgl' )";
                        mysqli_query($koneksi, $q);
                        ?>
                     <script type="text/javascript">
                         alert('Berhasil Membalas !');
                         document.location.href = "?tampil=contact";
                     </script>
                 <?php
                }
                ?>
            </div>
            <div class="col-md-5 section-md-t3">
              <div class="icon-box section-b2">
                <div class="icon-box-icon">
                  <span class="ion-ios-paper-plane"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title">Say Hello</h4>
                  </div>
                  <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM tbl_profil");
                    $data = mysqli_fetch_array($sql)
                    ?>
                  <div class="icon-box-content">
                    <p class="mb-1">Email.
                      <span class="color-a"><?= $data['email']; ?></span>
                    </p>
                    <p class="mb-1">Phone.
                      <span class="color-a"><?= $data['no_telp']; ?></span>
                    </p>
                    <p class="mb-1">Website
                      <span class="color-a"><?= $data['website']; ?></span>
                    </p>
                  </div>
                </div>
              </div>
              <div class="icon-box section-b2">
                <div class="icon-box-icon">
                  <span class="ion-ios-pin"></span>
                </div>
                <div class="icon-box-content table-cell">
                  <div class="icon-box-title">
                    <h4 class="icon-title">Find us in</h4>
                  </div>
                  <div class="icon-box-content">
                    <p class="mb-1">
                     <?= $data['alamat']; ?>.
                    </p>
                  </div>
                </div>
              </div>
            </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ Contact End /-->







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