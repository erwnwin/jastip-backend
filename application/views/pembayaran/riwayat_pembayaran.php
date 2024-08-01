         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Riwayat Pembayaran</h1>
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
                                             <th>Bukti Bayar</th>
                                             <th>Info</th>
                                             <!-- <th style="width: 130px">Action</th> -->
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if (!empty($pembayaran)) { ?>
                                             <?php $no = 1;
                                                foreach ($pembayaran as $r) { ?>
                                                 <tr>
                                                     <td><?= $no++; ?></td>
                                                     <td><?php echo $r['nama_lengkap']; ?></td>
                                                     <td><?php echo $r['alamat']; ?></td>
                                                     <td>
                                                         <img src="<?php echo base_url('uploads/bukti_tf/' . $r['bukti_tf']) ?>" alt="" width="50px" height="50px">

                                                     </td>
                                                     <td>
                                                         <?php if ($r['status'] == 'done-antar') { ?>
                                                             <span class="badge bg-info">Pembayaran dan Pengantaran Sukses dilakukan</span><br>

                                                         <?php } ?>

                                                     </td>
                                                 </tr>
                                             <?php } ?>
                                         <?php } else { ?>
                                             <tr>
                                                 <td colspan="5" class="text-center">Tidak ada data</td>
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