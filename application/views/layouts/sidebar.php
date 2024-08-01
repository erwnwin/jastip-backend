 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="<?= base_url('dashboard') ?>" class="brand-link">
         <!-- <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>public/img/icon.png"> -->
         <img src="<?= base_url() ?>assets/dist/img/logo-jastip.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light font-weight-bold text-center" style="font-size: 1.2rem; font-weight: bold">JASTIP MAKASSAR</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                 <li class="nav-header ">Pengguna</li>
                 <li class="nav-item">
                     <a href="<?= base_url('dashboard') ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? 'active' : ''
                                                                            ?>">
                         <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                         <i class="nav-icon fas fa-th-large"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="<?= base_url('profil') ?>" class="nav-link <?= $this->uri->segment(1) == 'profil' ? 'active' : ''
                                                                            ?>">
                         <i class="nav-icon fas fa-user-circle"></i>
                         <p>
                             Profil
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('info-apps') ?>" class="nav-link <?= $this->uri->segment(1) == 'info-apps' ? 'active' : ''
                                                                            ?>">
                         <i class="nav-icon fas fa-question-circle"></i>
                         <p>
                             Info Apps
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="<?= base_url('logout') ?>" class="nav-link">
                         <i class="nav-icon fas fa-power-off"></i>
                         <p>
                             Logout
                         </p>
                     </a>
                 </li>


                 <?php if ($this->session->userdata('hak_akses') == 'jastip') { ?>
                     <li class="nav-header">Jasa Titip</li>

                     <li class="nav-item">
                         <a href="<?= base_url('titipan') ?>" class="nav-link <?= $this->uri->segment(1) == 'titipan' ? 'active' : ''
                                                                                ?>">

                             <i class="nav-icon fas fa-hands"></i>
                             <p>
                                 Titipan Terbaru
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="<?= base_url('status-titipan') ?>" class="nav-link <?= $this->uri->segment(1) == 'status-titipan' ? 'active' : ''
                                                                                        ?>">
                             <i class="nav-icon far fa-share-square"></i>
                             <p>
                                 Status Titipan
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="<?= base_url('riwayat-titipan') ?>" class="nav-link <?= $this->uri->segment(1) == 'riwayat-titipan' ? 'active' : ''
                                                                                        ?>">
                             <i class="nav-icon fas fa-history"></i>
                             <p>
                                 Riwayat Titipan
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="<?= base_url('riwayat-pembayaran') ?>" class="nav-link <?= $this->uri->segment(1) == 'riwayat-pembayaran' ? 'active' : ''
                                                                                            ?>">
                             <i class="nav-icon fas fa-file-invoice-dollar"></i>
                             <p>
                                 Riwayat Pembayaran
                             </p>
                         </a>
                     </li>

                     <li class="nav-header">Jasa Gadai</li>
                     <li class="nav-item">
                         <a href="<?= base_url('customers-gadai') ?>" class="nav-link <?= $this->uri->segment(1) == 'customers-gadai' ? 'active' : ''
                                                                                        ?>">
                             <i class="nav-icon fas fa-users"></i>
                             <p>
                                 Customers Gadai
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url('form-gadai') ?>" class="nav-link <?= $this->uri->segment(1) == 'form-gadai' ? 'active' : ''
                                                                                    ?>">
                             <i class="nav-icon fas fa-file-alt"></i>
                             <p>
                                 Form Gadai
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="<?= base_url('riwayat-gadai') ?>" class="nav-link <?= $this->uri->segment(1) == 'riwayat-gadai' ? 'active' : ''
                                                                                    ?>">
                             <i class="nav-icon fas fa-history"></i>
                             <p>
                                 Riwayat Gadai
                             </p>
                         </a>
                     </li>
                 <?php } ?>

                 <?php if ($this->session->userdata('hak_akses') == 'admin') { ?>
                     <li class="nav-header">Setting</li>
                     <!-- <li class="nav-item <?= $this->uri->segment(1) == 'barang-masuk' || $this->uri->segment(1) == 'barang-keluar' ? 'menu-open' : '' ?>">
                     <a href="#" class="nav-link <?= $this->uri->segment(1) == 'barang-masuk' || $this->uri->segment(1) == 'barang-keluar' ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-shopping-cart"></i>
                         <p>
                             Transaksi
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= base_url('barang-masuk') ?>" class="nav-link <?= $this->uri->segment(1) == 'barang-masuk' ? 'active' : '' ?>">
                                 <i class="fas fa-arrow-right nav-icon"></i>
                                 <p>Barang Masuk</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url('barang-keluar') ?>" class="nav-link <?= $this->uri->segment(1) == 'barang-keluar' ? 'active' : '' ?>">
                                 <i class="fas fa-arrow-left nav-icon"></i>
                                 <p>Barang Keluar</p>
                             </a>
                         </li>
                     </ul>
                 </li>

                 <li class="nav-item <?= $this->uri->segment(1) == 'kategori' || $this->uri->segment(1) == 'units' || $this->uri->segment(1) == 'items' ? 'menu-open' : '' ?>">
                     <a href="#" class="nav-link <?= $this->uri->segment(1) == 'kategori' ||  $this->uri->segment(1) == 'units' || $this->uri->segment(1) == 'items' ? 'active' : '' ?>">
                         <i class="nav-icon fas fa-table"></i>
                         <p>
                             Produk
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="<?= base_url('kategori') ?>" class="nav-link <?= $this->uri->segment(1) == 'kategori' ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Kategori</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url('units') ?>" class="nav-link <?= $this->uri->segment(1) == 'units' ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Units</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="<?= base_url('items') ?>" class="nav-link <?= $this->uri->segment(1) == 'items' ? 'active' : '' ?>">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Items Products</p>
                             </a>
                         </li>
                     </ul>
                 </li> -->


                     <!-- <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-chart-pie"></i>
                         <p>
                             Report
                             <i class="fas fa-angle-left right"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="../layout/top-nav.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Riwayat Penjualan</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="../layout/top-nav-sidebar.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Stok Produk</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="../layout/top-nav-sidebar.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Filter Laporan</p>
                             </a>
                         </li>
                     </ul>
                 </li> -->
                     <li class="nav-item">
                         <a href="<?= base_url('jasa-titip') ?>" class="nav-link <?= $this->uri->segment(1) == 'jasa-titip' ? 'active' : ''
                                                                                    ?>">
                             <i class="nav-icon fas fa-users"></i>
                             <p>
                                 Jasa Titip
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="<?= base_url('pengumuman') ?>" class="nav-link <?= $this->uri->segment(1) == 'pengumuman' ? 'active' : ''
                                                                                    ?>">

                             <i class="nav-icon fas fa-bullhorn"></i>
                             <p>
                                 Pengumuman
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="<?= base_url('artikel') ?>" class="nav-link <?= $this->uri->segment(1) == 'artikel' ? 'active' : ''
                                                                                ?>">

                             <i class="nav-icon fas fa-newspaper"></i>
                             <p>
                                 Arikel
                             </p>
                         </a>
                     </li>
                 <?php } ?>
                 <!-- <li class="nav-header">Setting</li>
                 <li class="nav-item">
                     <a href="<?= base_url('users') ?>" class="nav-link <?= $this->uri->segment(1) == 'users' ? 'active' : ''
                                                                        ?>">
                         <i class="nav-icon fas fa-users"></i>
                         <p>
                             Users
                             <span class="right badge badge-danger">2</span>
                         </p>
                     </a>
                 </li> -->


                 <!-- STAF TOKO -->


             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>