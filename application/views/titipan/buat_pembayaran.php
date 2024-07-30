         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Form Persetujuan | Pembayaran</h1>
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
                                     <h3 class="card-title">Form Proses Pembayaran | Request Barang</h3>

                                     <daiv class="card-tools">
                                         <!-- <a href="<?= base_url('jasa-titip') ?>" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalMaps"><i class="fa fa-map"></i> Get Location</a> -->
                                         <a href="<?= base_url('titipan') ?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a>
                                     </daiv>
                                 </div>
                                 <div class="card-body p-0">
                                     <form class="form-horizontal" id="formProsesPembayaran">
                                         <div class="card-body">
                                             <!-- <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" /> -->
                                             <div class="form-group row">
                                                 <label class="col-sm-3 col-form-label">Nama Pelanggan</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class="form-control" value="<?= $request['nama_lengkap']; ?>" readonly>
                                                     <input type="text" name="jastip_id" id="jastip_id" value="<?=
                                                                                                                $this->session->userdata('id');
                                                                                                                ?>" class="form-control" hidden>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label class="col-sm-3 col-form-label">Nama Barang / Qty</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class="form-control" name="request_id" id="request_id" value="<?= $request['id']; ?>" hidden>
                                                     <input type="text" class="form-control" value="<?= $request['nama_barang']; ?> | Jumlah : <?= $request['jumlah']; ?>" readonly>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label class="col-sm-3 col-form-label">Nama Jasa Titip</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class="form-control" name="pelanggan_id" id="pelanggan_id" value="<?= $request['pelanggan_id']; ?>" hidden>
                                                     <input type="text" class="form-control" value="<?= $request['nama_jastip']; ?>" readonly>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label class="col-sm-3 col-form-label">No Rek Tujuan</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class="form-control" value="<?= $request['no_rek_an']; ?>" readonly>
                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Jumlah Bayar</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Masukkan jumlah bayar" required>
                                                     <!-- <input type="email" name="alamat_email" class="form-control" id="alamat_email" placeholder="Alamat Email" autocomplete="off" required> -->
                                                 </div>
                                                 <!-- <span class="error-message" style="color: red; display: none;">Input harus berupa angka</span> -->
                                             </div>

                                         </div>
                                         <!-- /.card-body -->
                                         <div class="card-footer">
                                             <!-- <button type="submit" class="btn btn-info">Sign in</button> -->
                                             <button type="submit" id="btnProsesPembayaran" class="btn btn-success btn-sm float-right">
                                                 <span id="btnLoader" style="display: none;">
                                                     <i class="fa fa-spinner fa-spin"></i>
                                                 </span>
                                                 Proses Pembayaran
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