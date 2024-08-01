         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Daftar Titipan Terbaru</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">


                     <div class="card card-default">
                         <div class="card-header">
                             <h3 class="card-title">Daftar Titipan Terbaru</h3>

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
                                             <th style="width: 130px">Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if (!empty($titipan)) { ?>
                                             <?php $no = 1;
                                                foreach ($titipan as $r) { ?>
                                                 <tr>
                                                     <td><?= $no++; ?></td>
                                                     <td><?php echo $r['nama_lengkap']; ?></td>
                                                     <td><?php echo $r['alamat']; ?></td>
                                                     <td><?php echo $r['nama_barang']; ?> / Jumlah : <?php echo $r['jumlah']; ?></td>
                                                     <td>
                                                         <img src="<?php echo base_url('uploads/barang/' . $r['gambar']) ?>" alt="" width="50px" height="50px">
                                                     </td>
                                                     <td>
                                                         <?php if ($r['status'] == 'request') { ?>
                                                             <span class="badge bg-warning">Request Terbaru</span>
                                                         <?php } elseif ($r['status'] == 'acc-request') { ?>
                                                             <span class="badge bg-primary">Menunggu Pembayaran Pelanggan</span>
                                                         <?php } elseif ($r['status'] == 'payment-awal') { ?>
                                                             <span class="badge bg-warning">Segera lakukan pengiriman</span>
                                                         <?php } ?>

                                                     </td>
                                                     <td>
                                                         <?php if ($r['status'] == 'request') { ?>
                                                             <a href="<?= base_url('titipan/' . $r['id'] . '/acc') ?>" class="btn btn-sm btn-outline-warning"> Acc Request </a>
                                                             <button type="button" class="btn btn-sm btn-outline-danger delete-btn" data-id="<?php echo $r['id']; ?>" data-toggle="modal" data-target="#modalDelete"> Batal</button>
                                                         <?php } elseif ($r['status'] == 'acc-request') { ?>
                                                             <span class="badge bg-warning">Waiting......</span>
                                                         <?php } elseif ($r['status'] == 'payment-awal') { ?>
                                                             <a class="btn btn-sm btn-outline-primary view-bukti-bayar" data-id="<?php echo $r['id']; ?>"> Lihat Bukti Bayar </a>
                                                             <button type="button" class="btn btn-sm btn-outline-info" data-id="<?php echo $r['id']; ?>" data-toggle="modal" data-target="#modalChangeStatus"> Lakukan Pengiriman</button>
                                                         <?php } ?>
                                                     </td>
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

             <!-- Modal lihat bukti tf -->
             <div class="modal fade" id="modalBuktiBayar" tabindex="-1" role="dialog" aria-labelledby="modalBuktiBayarLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="modalBuktiBayarLabel">Detail Bukti Bayar</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <div id="bukti-bayar-details">
                                 <!-- Data bukti bayar akan di-load di sini -->
                             </div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         </div>
                     </div>
                 </div>
             </div>

             <!-- konfrm kirim -->
             <div class="modal fade" id="modalChangeStatus" tabindex="-1" role="dialog" aria-labelledby="modalChangeStatusLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="modalChangeStatusLabel">Ubah Status Pengiriman</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <form id="statusForm">
                                 <input type="hidden" id="requestId" name="requestId" value="">
                                 <div class="form-group">
                                     <label for="statusSelect">Pilih Status</label>
                                     <select id="statusSelect" name="status" class="form-control">
                                         <option value="pengantaran">Pengantaran</option>
                                         <!-- Tambahkan opsi lain jika diperlukan -->
                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <button type="button" class="btn btn-success btn-sm" id="updateStatusButton">Update Status</button>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
             </div>

             <div>
                 <br>
             </div>
         </div>