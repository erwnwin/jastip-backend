         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Data Customers Gadai</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">

                     <div class="card card-default">
                         <div class="card-header">
                             <h3 class="card-title">Daftar Customers Gadai</h3>

                             <div class="card-tools">
                                 <!-- <a href="<?= base_url('artikel/create') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> Search</a> -->
                             </div>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table">
                                     <thead>
                                         <tr>
                                             <th style="width: 10px">#</th>
                                             <th>Nama Customer</th>
                                             <th>Alamat</th>
                                             <th>Barang Jaminan</th>
                                             <th>Besar Jaminan</th>
                                             <th style="width: 130px">Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if (!empty($customers)) { ?>
                                             <?php $no = 1;
                                                foreach ($customers as $r) { ?>
                                                 <tr>
                                                     <td><?= $no++; ?></td>
                                                     <td><?php echo $r['nama_lengkap']; ?></td>
                                                     <td><?php echo $r['alamat']; ?></td>
                                                     <td><?php echo $r['barang_jaminan_diserahkan']; ?></td>
                                                     <td><?php echo $r['besar_pinjaman']; ?></td>
                                                     <td>
                                                         <a href="<?= base_url('customers-gadai/' . $r['id'] . '/riwayat-gadai') ?>" class="btn btn-sm btn-primary"><i class="fa fa-history"></i> Lihat Riwayat Gadai <?php echo $r['nama_lengkap']; ?></a>
                                                     </td>
                                                 </tr>
                                             <?php } ?>
                                         <?php } else { ?>
                                             <tr>
                                                 <td colspan="6" class="text-center">Tidak ada data</td>
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