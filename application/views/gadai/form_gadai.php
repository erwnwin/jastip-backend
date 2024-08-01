         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Form Perjanjian Gadai</h1>
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
                                     <h3 class="card-title">Form Input Perjanjian</h3>

                                     <daiv class="card-tools">
                                         <!-- <a href="<?= base_url('jasa-titip') ?>" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalMaps"><i class="fa fa-map"></i> Get Location</a> -->
                                         <!-- <a href="<?= base_url('pengumuman') ?>" class="btn btn-sm btn-default"><i class="fa fa-arrow-left"></i> Back</a> -->
                                     </daiv>
                                 </div>
                                 <div class="card-body p-0">
                                     <form class="form-horizontal" id="formGadai">
                                         <div class="card-body">
                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Calon Customers</label>
                                                 <div class="col-sm-9">
                                                     <select class="form-control select2" name="pelanggan_id" id="pelanggan_id" style="width: 100%;" required>
                                                         <option value="">Pilih Calon Customers</option>
                                                         <?php foreach ($customers as $c) { ?>
                                                             <option value="<?= $c['id'] ?>"><?= $c['nama_lengkap'] ?></option>
                                                         <?php } ?>
                                                     </select>

                                                 </div>
                                             </div>

                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Asal Barang Jaminan</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" name="asal_barang_jaminan" class="form-control" id="asal_barang_jaminan" placeholder="Masukkan asal barang jaminan" required>
                                                 </div>
                                             </div>
                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Status Transaksi</label>
                                                 <div class="col-sm-9">
                                                     <select name="status_transaksi" id="status_transaksi" class="form-control">
                                                         <option>Pilih Status</option>
                                                         <option value="untuk diri sendiri">Untuk Diri Sendiri</option>
                                                         <option value="untuk orang lain">Untuk Orang Lain</option>
                                                     </select>
                                                 </div>
                                             </div>
                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Cara Pembayaran</label>
                                                 <div class="col-sm-9">
                                                     <select name="cara_pembayaran" id="cara_pembayaran" class="form-control">
                                                         <option>Pilih Status</option>
                                                         <option value="tunai">Tunai</option>
                                                         <option value="non-tunai">Non Tunai</option>
                                                     </select>
                                                 </div>
                                             </div>
                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Pilih Asal Bank</label>
                                                 <div class="col-sm-9">
                                                     <select class="form-control select2" name="banks_id" id="banks_id" style="width: 100%;">
                                                         <option value="">Pilih Bank</option>
                                                         <?php foreach ($banks as $c) { ?>
                                                             <option value="<?= $c['id'] ?>"><?= $c['sandi_bank'] ?> | <?= $c['nama_bank'] ?></option>
                                                         <?php } ?>
                                                     </select>

                                                 </div>
                                             </div>
                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Pengambilan Uang / Transfer</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" name="pengambilan_uang" class="form-control" id="pengambilan_uang" placeholder="Masukkan nomor rekening (Jika transfer)">
                                                 </div>
                                             </div>
                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Besar Jaminan</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" name="besar_pinjaman" class="form-control" id="besar_pinjaman" placeholder="Masukkan angka besar pinjaman" required>
                                                 </div>
                                             </div>
                                             <div class="form-group row">
                                                 <label for="inputEmail3" class="col-sm-3 col-form-label">Barang Jaminan Diserahkan</label>
                                                 <div class="col-sm-9">
                                                     <input type="text" name="barang_jaminan_diserahkan" class="form-control" id="barang_jaminan_diserahkan" placeholder="Masukkan barang jaminan" required>
                                                 </div>
                                             </div>
                                         </div>
                                         <!-- /.card-body -->
                                         <div class="card-footer">
                                             <!-- <button type="submit" class="btn btn-info">Sign in</button> -->
                                             <button type="submit" class="btn btn-success btn-sm float-right">
                                                 <span id="btnFormGadai" style="display: none;">
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