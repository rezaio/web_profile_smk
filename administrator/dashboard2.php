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
        </div>
    </section>