 <?php
    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pesan WHERE id_pesan='$_GET[id]'");
    $data      = mysqli_fetch_array($tampil);
    ?>
 <section class="content">
     <div class="row">
         <div class="col-md-12">
             <div class="box box-primary">
                 <div class="box-header with-border">
                     <h3 class="box-title">Balas Pesan</h3>
                 </div>
                 <form action="" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="id" value="<?php echo $data['id_pesan']; ?>">
                     <div class="modal-body">
                         <div class="form-group">
                             <label for="Kepada" class="control-label">Kepada</label>
                             <input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>">
                         </div>
                         <div class="form-group">
                             <label for="Subjek" class="control-label">Subjek</label>
                             <input type="text" name="subjeck" class="form-control" value="Re: <?php echo $data['subjek']; ?>">
                         </div>
                         <div class="form-group">
                             <label for="Pesan" class="control-label">Pesan</label>
                             <textarea name="pesan" id="" cols="30" rows="10" class="form-control">







                            ---------------------------------------------------------------------------------
                            <?php echo $data['pesan']; ?>
                            </textarea>
                         </div>
                         <input type="submit" name="fsimpan" class="btn btn-sm btn-primary" value="Simpan">
                         <a class="btn btn-sm btn-danger pull-right" href="?page=datapesan">Kembali</a>
                     </div>
                 </form>
                 <?php
                    if (isset($_POST['fsimpan'])) {

                        mail($_POST['email'], $_POST['subjek'], $_POST['pesan'], "From: sulungkomar@gmail.com");

                        ?>
                     <script type="text/javascript">
                         alert('Berhasil Membalas !');
                         document.location.href = "?page=datapesan";
                     </script>
                 <?php
                }
                ?>
             </div>
         </div>
     </div>
 </section>