         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
             <!-- Content Header (Page header) -->
             <section class="content-header">
                 <div class="container-fluid">
                     <div class="row mb-2">
                         <div class="col-sm-6">
                             <h1>Profil Pengguna</h1>
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
                             <!-- Widget: user widget style 2 -->
                             <div class="card card-widget widget-user-2 shadow-sm">
                                 <!-- Add the bg color to the header using any of the bg-* classes -->
                                 <div class="widget-user-header bg-primary">
                                     <div class="widget-user-image">
                                         <img class="img-circle elevation-2" src="<?= base_url() ?>assets/dist/img/user.png" alt="User Avatar">
                                     </div>
                                     <!-- /.widget-user-image -->
                                     <h3 class="widget-user-username"><?php if (
                                                                            $this->session->userdata('hak_akses') == 'admin'
                                                                        ) { ?>
                                             <?=
                                                                            $this->session->userdata('nama');
                                                ?>
                                         <?php } else { ?>
                                             <?= $this->session->userdata('nama'); ?>
                                         <?php } ?></h3>
                                     <h5 class="widget-user-desc">
                                         <?php if (
                                                $this->session->userdata('hak_akses') == 'admin'
                                            ) { ?>
                                             Administrator Sistem
                                         <?php } else { ?>
                                             Jasa Titip Gadai
                                         <?php } ?>
                                     </h5>
                                 </div>
                                 <div class="card-footer p-0">
                                     <ul class="nav flex-column">
                                         <li class="nav-item">
                                             <a class="nav-link">
                                                 Projects <span class="float-right badge bg-primary">31</span>
                                             </a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link">
                                                 Tasks <span class="float-right badge bg-info">5</span>
                                             </a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link">
                                                 Completed Projects <span class="float-right badge bg-success">12</span>
                                             </a>
                                         </li>
                                         <li class="nav-item">
                                             <a class="nav-link">
                                                 Followers <span class="float-right badge bg-danger">842</span>
                                             </a>
                                         </li>
                                     </ul>
                                 </div>
                             </div>
                             <a href="<?= base_url('profil/update-profil') ?>" class="btn btn-sm btn-outline-info btn-block"><i class="fa fa-user"></i> Update Profil</a>
                             <a href="<?= base_url('profil/update-password') ?>" class="btn btn-sm btn-outline-warning btn-block"><i class="fa fa-edit"></i> Update Password</a>
                             <!-- /.widget-user -->
                         </div>
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