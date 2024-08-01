         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Create Jasa Titip</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">

                     <div class="row">
                         <div class="col-lg-2">

                         </div>
                         <!-- ./col -->

                         <div class="col-lg-8 col-12">
                             <!-- Default box -->
                             <div class="card">
                                 <div class="card-header">
                                     <h3 class="card-title">Form Create Jasa Titip</h3>

                                     <daiv class="card-tools">
                                         <a href="<?= base_url('jasa-titip') ?>" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalMaps"><i class="fa fa-map"></i> Get Location</a>
                                         <a href="<?= base_url('jasa-titip') ?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>
                                     </daiv>
                                 </div>
                                 <div class="card-body p-0">
                                     <form class="form-horizontal" id="formJastip" method="post" action="<?php echo base_url('jasa-titip/store'); ?>" enctype="multipart/form-data">
                                         <div class="card-body">
                                             <!-- <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" /> -->
                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Jasa Titip</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" name="nama_jastip" class="form-control" id="nama_jastip" placeholder="Nama Jasa Titip" autocomplete="off" required>
                                                 </div>
                                             </div>


                                             <div class="form-group row">
                                                 <label for="inputPassword3" class="col-sm-3 col-form-label">Latitude</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" name="latitude" class="form-control" id="latitude" autocomplete="off" placeholder="Klik tombol get location" readonly>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="inputPassword3" class="col-sm-3 col-form-label">Longitude</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" name="longitude" class="form-control" id="longitude" autocomplete="off" placeholder="Klik tombol get location" readonly>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                                                 <div class="col-sm-9">
                                                     <input type="email" name="alamat_email" class="form-control" id="alamat_email" placeholder="Alamat Email" autocomplete="off" required>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Password</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" name="password" class="form-control" id="password" placeholder="*****" autocomplete="off" required>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">No Telp/WA</label>
                                                 <div class="col-sm-9">
                                                     <input type="number" name="no_telp_wa" class="form-control" id="no_telp_wa" placeholder="0821xxxxxxx" autocomplete="off" required>
                                                 </div>
                                             </div>


                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat</label>
                                                 <div class="col-sm-9">
                                                     <textarea name="alamat" id="alamat" cols="2" rows="4" class="form-control" placeholder="Alamat Lengkap" required></textarea>

                                                 </div>
                                             </div>


                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">File Gambar</label>
                                                 <div class="col-sm-9">
                                                     <input type="file" name="gambar" class="form-control" id="gambar" accept="image/*" required>
                                                     <div id="imagePreviewContainer" style="display: none;">
                                                         <img src="#" id="imagePreview" class="preview-image">
                                                         <br>
                                                         <span id="removeImage" class="remove-image btn-sm btn-danger">Remove Image</span>
                                                     </div>
                                                 </div>
                                             </div>


                                         </div>
                                         <!-- /.card-body -->
                                         <div class="card-footer">
                                             <!-- <button type="submit" class="btn btn-info">Sign in</button> -->
                                             <button type="submit" class="btn btn-success btn-sm float-right">
                                                 <span id="btnLoader" style="display: none;">
                                                     <i class="fa fa-spinner fa-spin"></i>
                                                 </span>
                                                 Simpan
                                             </button>
                                         </div>
                                         <!-- /.card-footer -->
                                     </form>
                                     <!-- <div class="overlay hide">
                                         <i class="fas fa-spinner"></i>
                                     </div> -->
                                 </div>
                             </div>
                         </div>
                         <!-- ./col -->

                         <div class="col-lg-2">

                         </div>
                         <!-- ./col -->
                     </div>
                 </div>


             </section>

             <div>
                 <br>
             </div>

         </div>

         <!-- maps -->
         <div class="modal fade" id="modalMaps" tabindex="-1" role="dialog" aria-labelledby="modalMapsLabel" aria-hidden="true">
             <div class="modal-dialog modal-lg" role="document"> <!-- Modal besar (modal-lg) -->
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="modalMapsLabel">Drag Marker Untuk Mendapatkan Lat dan Long</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <div id="map" style="width: 100%; height: 400px;"></div> <!-- Ukuran peta -->
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
                         <!-- Tombol Simpan jika diperlukan -->
                     </div>
                 </div>
             </div>
         </div>