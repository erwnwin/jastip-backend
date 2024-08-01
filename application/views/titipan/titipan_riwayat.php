         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Daftar Riwayat Titipan</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">


                     <div class="card card-default">
                         <div class="card-header">
                             <h3 class="card-title">Daftar Riwayat Titipan</h3>

                             <!-- <div class="card-tools">
                                 <a href="<?= base_url('jasa-titip/create') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> Create</a>
                             </div> -->
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table">
                                     <thead>
                                         <tr>
                                             <th style="width: 10px">#</th>
                                             <th>Nama Pelanggan / Pemesan</th>
                                             <th>Alamat</th>
                                             <th>Nama Barang / Qty</th>
                                             <th>Gambar</th>
                                             <th>Status</th>
                                             <!-- <th style="width: 130px">Action</th> -->
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if (!empty($titipan_riwayat)) { ?>
                                             <?php $no = 1;
                                                foreach ($titipan_riwayat as $r) { ?>
                                                 <tr>
                                                     <td><?= $no++; ?></td>
                                                     <td><?php echo $r['nama_lengkap']; ?></td>
                                                     <td><?php echo $r['alamat']; ?></td>
                                                     <td><?php echo $r['nama_barang']; ?> / Jumlah : <?php echo $r['jumlah']; ?></td>
                                                     <td>
                                                         <img src="<?php echo base_url('uploads/barang/' . $r['gambar']) ?>" alt="" width="50px" height="50px">
                                                     </td>
                                                     <td>
                                                         <?php if ($r['status'] == 'done-antar') { ?>
                                                             <span class="badge bg-success">Pesanan telah diterima oleh Pelanggan</span>
                                                         <?php } ?>

                                                     </td>
                                                     <!-- <td>
                                                         <?php if ($r['status'] == 'request') { ?>
                                                             <a href="<?= base_url('titipan/' . $r['id'] . '/acc') ?>" class="btn btn-sm btn-outline-warning"> Acc Request </a>
                                                             <button type="button" class="btn btn-sm btn-outline-danger delete-btn" data-id="<?php echo $r['id']; ?>" data-toggle="modal" data-target="#modalDelete"> Batal</button>
                                                         <?php } elseif ($r['status'] == 'acc-request') { ?>
                                                             <span class="badge bg-warning">Waiting......</span>
                                                         <?php } elseif ($r['status'] == 'payment-awal') { ?>
                                                             <a href="<?= base_url('titipan/' . $r['id'] . '/acc') ?>" class="btn btn-sm btn-outline-primary"> Lihat Bukti Bayar </a>
                                                             <button type="button" class="btn btn-sm btn-outline-success delete-btn" data-id="<?php echo $r['id']; ?>" data-toggle="modal" data-target="#modalDelete"> Lakukan Pengiriman</button>
                                                         <?php } ?>
                                                     </td> -->
                                                 </tr>
                                             <?php } ?>
                                         <?php } else { ?>
                                             <tr>
                                                 <td colspan="7" class="text-center">Tidak ada data</td>
                                             </tr>
                                         <?php } ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
             </section>
             <div>
                 <br>
             </div>
         </div>