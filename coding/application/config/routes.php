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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

$route['faq'] = 'welcome/faq';
$route['cars'] = 'welcome/cars';
$route['blog'] = 'welcome/blog';
$route['team'] = 'welcome/team';
$route['terms'] = 'welcome/terms';
$route['about'] = 'welcome/about';
$route['contact'] = 'welcome/contact';
$route['kirim_pesan'] = 'welcome/post_pesan';
$route['testimonials'] = 'welcome/testimonials';

$route['administrator'] = 'auth';
$route['administrator/auth'] = 'auth';
$route['administrator/auth/logout'] = 'auth/logout';
$route['administrator/admin'] = 'admin';
$route['administrator/auth/blocked'] = 'auth/blocked';

$route['administrator/admin/role'] = 'admin/role';
$route['administrator/admin/roleaccess/(:num)'] = 'admin/roleaccess/$1';
$route['administrator/admin/changeaccess'] = 'admin/changeaccess';
$route['administrator/admin/user'] = 'admin/user';
$route['administrator/admin/edit_user/(:num)'] = 'admin/edit_user/$1';
$route['administrator/admin/hapus_user/(:num)'] = 'admin/hapus_user/$1';


$route['administrator/user'] = 'user';
$route['administrator/user/changepassword'] = 'user/changepassword';
$route['administrator/user/edit'] = 'user/edit';

$route['administrator/menu'] = 'menu';
$route['administrator/menu/edit_menu/(:num)'] = 'menu/edit_menu/$1';
$route['administrator/menu/hapus_menu/(:num)'] = 'menu/hapus_menu/$1';

$route['administrator/menu/submenu'] = 'menu/submenu';
$route['administrator/menu/submenu/index/(:num)'] = 'menu/submenu/index/$1';
$route['administrator/menu/edit_submenu/(:num)'] = 'menu/edit_submenu/$1';
$route['administrator/menu/hapus_submenu/(:num)'] = 'menu/hapus_submenu/$1';

$route['administrator/setting'] = 'setting';
$route['administrator/setting/update_setting'] = 'setting/update_setting';

$route['administrator/banner'] = 'banner';
$route['administrator/banner/tambah'] = 'banner/tambah';
$route['administrator/banner/post_banner'] = 'banner/post_banner';
$route['administrator/banner/update_banner/(:num)'] = 'banner/update_banner/$1';
$route['administrator/banner/edit/(:num)'] = 'banner/edit/$1';
$route['administrator/banner/hapus/(:num)'] = 'banner/hapus/$1';

$route['administrator/mobil'] = 'mobil';
$route['administrator/mobil/tambah'] = 'mobil/tambah';
$route['administrator/mobil/edit/(:num)'] = 'mobil/edit/$1';
$route['administrator/mobil/hapus/(:num)'] = 'mobil/hapus/$1';
$route['administrator/mobil/post_mobil'] = 'mobil/post_mobil';
$route['administrator/mobil/update_mobil/(:num)'] = 'mobil/update_mobil/$1';
$route['administrator/mobil/list-gambar/(:num)'] = 'mobil/list_gambar/$1';
$route['administrator/mobil/list-gambar/tambah/(:num)'] = 'mobil/tambah_gambar/$1';
$route['administrator/mobil/list-gambar/post_gambar_mobil/(:num)'] = 'mobil/post_gambar_mobil/$1';
$route['administrator/mobil/list-gambar/hapus/(:num)'] = 'mobil/hapus_gambar/$1';

$route['administrator/blog'] = 'blog';
$route['administrator/blog/tambah'] = 'blog/tambah';
$route['administrator/blog/post_blog'] = 'blog/post_blog';
$route['administrator/blog/edit/(:num)'] = 'blog/edit/$1';
$route['administrator/blog/update_blog/(:num)'] = 'blog/update_blog/$1';
$route['administrator/blog/hapus/(:num)'] = 'blog/hapus/$1';

$route['administrator/testimoni'] = 'testimoni';
$route['administrator/testimoni/tambah'] = 'testimoni/tambah';
$route['administrator/testimoni/post_testimoni'] = 'testimoni/post_testimoni';
$route['administrator/testimoni/edit/(:num)'] = 'testimoni/edit/$1';
$route['administrator/testimoni/update_testimoni/(:num)'] = 'testimoni/update_testimoni/$1';
$route['administrator/testimoni/hapus/(:num)'] = 'testimoni/hapus/$1';

$route['administrator/supir'] = 'supir';
$route['administrator/supir/tambah'] = 'supir/tambah';
$route['administrator/supir/edit/(:num)'] = 'supir/edit/$1';
$route['administrator/supir/hapus/(:num)'] = 'supir/hapus/$1';

$route['administrator/pesan'] = 'pesan';
$route['administrator/pesan/detail/(:num)'] = 'pesan/detail/$1';

$route['administrator/mobil/gambar'] = 'gambar_mobil';
$route['administrator/mobil/gambar/index'] = 'gambar_mobil';
$route['administrator/mobil/gambar/index/(:num)'] = 'administrator/gambar_mobil';
$route['administrator/mobil/gambar/tambah/(:any)'] = 'gambar_mobil/tambah';
$route['administrator/mobil/gambar/tambah/(:any)'] = 'administrator/gambar_mobil/tambah/$1';
$route['administrator/mobil/gambar/post_gambar_mobil'] = 'administrator/gambar_mobil/post_gambar_mobil';
$route['administrator/mobil/gambar/hapus/(:num)'] = 'administrator/gambar_mobil/hapus/$1';

$route['administrator/customer'] = 'customer';
$route['administrator/customer/tambah'] = 'customer/tambah';
$route['administrator/customer/edit/(:num)'] = 'customer/edit/$1';
$route['administrator/customer/hapus/(:num)'] = 'customer/hapus/$1';

$route['administrator/pesanan'] = 'pesanan';
$route['administrator/pesanan/tambah'] = 'pesanan/tambah';
$route['administrator/pesanan/edit/(:num)'] = 'pesanan/edit/$1';
$route['administrator/pesanan/update/(:num)'] = 'pesanan/update/$1';
$route['administrator/pesanan/detail/(:num)'] = 'pesanan/detail/$1';

$route['administrator/pengeluaran'] = 'pengeluaran';
$route['administrator/pengeluaran/tambah'] = 'pengeluaran/tambah';
$route['administrator/pengeluaran/edit/(:num)'] = 'pengeluaran/edit/$1';
$route['administrator/pengeluaran/hapus/(:num)'] = 'pengeluaran/hapus/$1';

$route['administrator/pemasukan'] = 'pemasukan';
$route['administrator/dashboard'] = 'dashboard';

$route['administrator/grafik'] = 'grafik';

$route['mobil/(:any)'] = 'welcome/detail_mobil/$1';
$route['blog/(:any)'] = 'welcome/detail_blog/$1';
$route['about'] = 'welcome/about';
$route['login'] = 'welcome/login';
$route['register'] = 'welcome/register';
$route['customer'] = 'customer_page/index';
$route['customer/edit'] = 'customer_page/edit';
$route['customer/pesanan'] = 'customer_page/pesanan';
$route['customer/pesanan/detail/(:num)'] = 'customer_page/detail_pesanan/$1';
$route['customer/post_pesanan'] = 'customer_page/post_pesanan';
$route['customer/post_konfirmasi_pesanan'] = 'customer_page/post_konfirmasi_pesanan';
$route['customer/post_testimoni'] = 'customer_page/post_testimoni';
$route['customer/logout'] = 'customer_page/logout';
