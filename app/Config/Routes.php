<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('student/login', 'StudentCtl::login');
$routes->get('student/register', 'StudentCtl::register');
$routes->get('student/home', 'StudentCtl::index', ['filter' => 'authStudent']);
$routes->get('student/formkp', 'StudentCtl::formPengajuan', ['filter' => 'authStudent']);
$routes->get('student/logbook', 'StudentCtl::pengumpulanLogbook', ['filter' => 'authStudent']);
$routes->get('student/pengumpulan-berkas', 'StudentCtl::pengumpulanBerkas', ['filter' => 'authStudent']);
$routes->get('student/profile', 'StudentCtl::userProfile', ['filter' => 'authStudent']);
$routes->get('student/pengajuanKP', 'StudentCtl::userDaftarPengajuan', ['filter' => 'authStudent']);
$routes->get('student/pengajuanAlihKredit', 'StudentCtl::userDaftarPengajuan', ['filter' => 'authStudent']);
$routes->get('student/downloaddokumen', 'StudentCtl::downloadPengajuan', ['filter' => 'authStudent']);
$routes->get('student/downloaddokumenAlihKredit', 'StudentCtl::downloadPengajuanAlihKredit', ['filter' => 'authStudent']);
$routes->get('student/uploadpengajuan', 'StudentCtl::uploadDokumenPengajuan', ['filter' => 'authStudent']);
$routes->get('student/uploadpengajuanAlihKredit', 'StudentCtl::uploadDokumenPengajuanAlihKredit', ['filter' => 'authStudent']);
$routes->get('student/formsks', 'StudentCtl::formAlihKredit', ['filter' => 'authStudent']);
$routes->get('student/logout', 'StudentCtl::logout', ['filter' => 'authStudent']);

$routes->get('lecture/login', 'LectureCtl::login');
$routes->get('lecture/register', 'LectureCtl::register');
$routes->get('lecture/home', 'LectureCtl::index', ['filter' => 'authLecture']);
$routes->get('lecture/mahasiswakp', 'LectureCtl::mahasiswakp', ['filter' => 'authLecture']);
$routes->get('lecture/penilaian-mhs', 'LectureCtl::penilaianMahasiswa', ['filter' => 'authLecture']);
$routes->get('lecture/logbook/(:any)', 'LectureCtl::showLogbook/$1' , ['filter' => 'authLecture']);
$routes->get('lecture/updatenilai/(:any)/(:any)', 'LectureCtl::updateNilai/$1/$2' , ['filter' => 'authLecture']);
$routes->get('lecture/updatenilaikp/(:any)/(:any)', 'LectureCtl::updateNilaikp/$1/$2' , ['filter' => 'authLecture']);
$routes->get('lecture/logout', 'LectureCtl::logout', ['filter' => 'authLecture']);


$routes->get('admin/login', 'AdminCtl::login');
$routes->get('admin/home', 'AdminCtl::index', ['filter' => 'authAdmin']);
$routes->get('admin/suratpengantarkp/(:any)', 'AdminCtl::suratpengantar/$1', ['filter' => 'authAdmin']);
$routes->get('admin/suratpengantaralihkredit/(:any)', 'AdminCtl::suratpengantarAlihKredit/$1', ['filter' => 'authAdmin']);
$routes->get('admin/showberkas/(:any)/(:any)', 'AdminCtl::showberkas/$1/$2', ['filter' => 'authAdmin']);
$routes->get('admin/logout', 'AdminCtl::logout', ['filter' => 'authAdmin']);
$routes->get('admin/suratpengajuanmahasiswa', 'AdminCtl::statuspengajuanmhs', ['filter' => 'authAdmin']);

$routes->get('external/home', 'ExternalCtl::index');
$routes->get('external/tambah', 'ExternalCtl::tambahLowongan');
$routes->get('external/detail/(:any)', 'ExternalCtl::showDetail/$1');





/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
