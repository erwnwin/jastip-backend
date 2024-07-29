         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Create Data Pengumuman</h1>
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
                                     <h3 class="card-title">Form Create Pengumuman</h3>

                                     <daiv class="card-tools">
                                         <!-- <a href="<?= base_url('jasa-titip') ?>" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalMaps"><i class="fa fa-map"></i> Get Location</a> -->
                                         <a href="<?= base_url('pengumuman') ?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>
                                     </daiv>
                                 </div>
                                 <div class="card-body p-0">
                                     <form class="form-horizontal" id="formPengumuman" method="post" action="<?php echo base_url('pengumuman/store'); ?>" enctype="multipart/form-data">
                                         <div class="card-body">
                                             <!-- <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" /> -->
                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Judul Pengumuman</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" name="judul_pengumuman" class="form-control" id="judul_pengumuman" placeholder="Judul Pengumuman" autocomplete="off" required>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Detail Pengumuman</label>
                                                 <div class="col-sm-9">
                                                     <textarea name="detail_pengumuman" id="detail_pengumuman" cols="15" rows="15" class="form-control" placeholder="Detail Pengumuman" required></textarea>

                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Status Pengumuman</label>
                                                 <div class="col-sm-9">
                                                     <select name="status_pengumuman" id="status_pengumuman" class="form-control">
                                                         <option>Pilih Status</option>
                                                         <option value="post">Posting</option>
                                                         <option value="no-post">No Posting</option>
                                                     </select>
                                                 </div>
                                             </div>


                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">File Gambar</label>
                                                 <div class="col-sm-9">
                                                     <input type="file" name="gambar_depan" class="form-control" id="gambar_depan" accept="image/*" required>
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
                                                 <span id="btnLoaderPengumuman" style="display: none;">
                                                     <i class="fa fa-spinner fa-spin"></i> Loading...
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