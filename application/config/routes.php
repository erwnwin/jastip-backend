<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Routes untuk API
$route['api/jastip'] = 'api/ApiJasaTitipController/index';
$route['api/jastip/store'] = 'api/ApiJasaTitipController/store';
$route['api/jastip/edit/(:any)'] = 'api/ApiJasaTitipController/edit/$1';
$route['api/jastip/update/(:any)'] = 'api/ApiJasaTitipController/update/$1';
$route['api/jastip/delete/(:any)'] = 'api/ApiJasaTitipController/delete/$1';


// <<<<<<<<<<<<<<<< API >>>>>>>>>>>>>>>>>>>>>
$route['api/pengumuman'] = 'api/ApiPengumumanController/index';
$route['api/jastip'] = 'api/ApiJasTipController/index';
$route['api/request'] = 'api/ApiRequestBarangController/submit_request';
$route['api/upload'] = 'api/ApiRequestBarangController/upload_image';


// Routes views Jasa_titip
$route['jasa-titip'] = 'data/jasa_titip';
$route['jasa-titip/create'] = 'data/jasa_titip/create';
$route['jasa-titip/store'] = 'data/jasa_titip/store';
$route['jasa-titip/delete'] = 'data/jasa_titip/delete';
$route['dashboard'] = 'data/dashboard';

// Routes pengumuman
$route['pengumuman'] = 'data/pengumuman';
$route['pengumuman/create'] = 'data/pengumuman/create';
$route['pengumuman/store'] = 'data/pengumuman/store';
$route['pengumuman/delete'] = 'data/pengumuman/delete';

// Routes artikel
$route['artikel'] = 'data/artikel';
$route['artikel/create'] = 'data/artikel/create';
$route['artikel/store'] = 'data/artikel/store';
$route['artikel/delete'] = 'data/artikel/delete';

// Routes Titipan
$route['titipan'] = 'data/titipan';
$route['titipan/pembayaran-store'] = 'data/titipan/pembayaran_store';
$route['titipan/(:num)/acc'] = 'data/titipan/acc/$1';
$route['status-titipan'] = 'data/status_titipan';
$route['riwayat-titipan'] = 'data/status_titipan/riwayat';
$route['riwayat-pembayaran'] = 'data/status_titipan/riwayat_pembayaran';

// ==================
$route['api/titipan/'] = 'data/titipan';
$route['api/titipan/delete-old-data'] = 'api/ApiTitipan/delete_old_data';
$route['api/titipan/(:num)'] = 'api/ApiTitipan/getTitipanTerbaruByPelangganId/$1';
$route['api/titipan-antar/(:num)'] = 'api/ApiTitipan/getTitipanAntarByPelangganId/$1';
$route['api/titipan-done/(:num)'] = 'api/ApiTitipan/getTitipanDoneByPelangganId/$1';
$route['api/titipan/delete/(:num)'] = 'api/ApiTitipan/deleteTitipan/$1';
$route['api/titipan/proses-pay'] = 'api/ApiTitipan/proses_pay';
$route['api/titipan/data-bank/(:num)'] = 'api/ApiTitipan/getBankData/$1';
$route['api/titipan/detail-barang/(:num)'] = 'api/ApiTitipan/getRequestDetails/$1';
$route['api/titipan/get-bukti-bayar/(:num)'] = 'data/Titipan/getBuktiBayar/$1';
$route['api/titipan/ubah-status'] = 'data/Titipan/update_status';

// Routes gadai
$route['api/riwayat-gadai/(:num)'] = 'api/ApiGadai/get_riwayat/$1';

// Routes login API
// $route['api/login'] = 'api/ApiLogin/index';
// $route['auth/login/coba'] = 'auth/LoginController/index';

// ini yang kita pake
$route['auth/login'] = 'auth/LoginController/login';
$route['auth/register'] = 'auth/RegistrasiController/register';
$route['auth/verify'] = 'auth/RegistrasiController/verify_otp';

// Routes Login
$route['login'] = 'auth/LoginJastip';
$route['login/act'] = 'auth/LoginJastip/act_login';
$route['logout'] = 'auth/LoginJastip/logout';

// Routes users
$route['profil'] = 'users/Profil';
$route['info-apps'] = 'users/Info_apps';

// Routes gadai
$route['customers-gadai'] = 'gadai/customers_gadai';
$route['form-gadai'] = 'gadai/form_gadai';
$route['form-gadai/store'] = 'gadai/form_gadai/store';
$route['riwayat-gadai'] = 'gadai/riwayat_gadai';
