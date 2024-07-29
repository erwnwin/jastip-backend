         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Data Jasa Titip</h1>
                         </div>
                     </div>
                 </div><!-- /.container-fluid -->
             </section>

             <!-- Main content -->
             <section class="content">
                 <div class="container-fluid">


                     <div class="card card-default">
                         <div class="card-header">
                             <h3 class="card-title">Daftar Jasa Titip</h3>

                             <div class="card-tools">
                                 <a href="<?= base_url('jasa-titip/create') ?>" class="btn btn-sm btn-primary"><i class="fa fa-plus-circle"></i> Create</a>
                             </div>
                         </div>
                         <!-- /.card-header -->
                         <div class="card-body">
                             <div class="table-responsive">
                                 <table class="table">
                                     <thead>
                                         <tr>
                                             <th style="width: 10px">#</th>
                                             <th>Nama Jasa Titip</th>
                                             <th>Alamat</th>
                                             <th>No Telp/WA</th>
                                             <th>Gambar</th>
                                             <th style="width: 130px">Action</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php if (!empty($jastip)) { ?>
                                             <?php $no = 1;
                                                foreach ($jastip as $r) { ?>
                                                 <tr>
                                                     <td><?= $no++; ?></td>
                                                     <td><?php echo $r['nama_jastip']; ?></td>
                                                     <td><?php echo $r['alamat']; ?></td>
                                                     <td><?php echo $r['no_telp_wa']; ?></td>
                                                     <td>
                                                         <img src="<?php echo base_url('public/uploads/' . $r['gambar']) ?>" alt="" width="50px" height="50px">
                                                     </td>
                                                     <td>
                                                         <a href="<?= base_url('jasa-titip/' . $r['id'] . '/edit') ?>" class="btn btn-sm btn-outline-warning"> Edit </a>
                                                         <button type="button" class="btn btn-sm btn-outline-danger delete-btn" data-id="<?php echo $r['id']; ?>" data-toggle="modal" data-target="#modalDelete"> Delete</button>
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

         <!-- Modal Delete -->
         <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h5 class="modal-title" id="modalDeleteLabel">Konfirmasi Delete</h5>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <p>Anda yakin ingin menghapus data ini?</p>
                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                         <button type="button" class="btn btn-danger" id="btnDelete">Hapus</button>
                     </div>
                 </div>
             </div>
         </div>