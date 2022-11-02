<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->set404Override(function() {
    // return "
    //         <script>
    //             window.location = '/';
    //         </script>
    //         ";
});
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Dashboard::index');
$routes->get('/admin/dashboard/mahasiswa', 'Admin::dashboardmhs', ['filter' => 'role:admin']);
$routes->post('/admin/dashboard/mahasiswa', 'Admin::dashboardmhs', ['filter' => 'role:admin']);

$routes->get('/admin/dashboard/dosen', 'Admin::dashboarddosen', ['filter' => 'role:admin']);
$routes->post('/admin/dashboard/dosen', 'Admin::dashboarddosen', ['filter' => 'role:admin']);

$routes->get('/admin/dashboard/staff', 'Admin::dashboardstaff', ['filter' => 'role:admin']);
$routes->post('/admin/dashboard/staff', 'Admin::dashboardstaff', ['filter' => 'role:admin']);

$routes->get('/admin/dashboard/tamu', 'Admin::dashboardtamu', ['filter' => 'role:admin']);
$routes->post('/admin/dashboard/tamu', 'Admin::dashboardtamu', ['filter' => 'role:admin']);


$routes->get('/admin/users/mahasiswa', 'Admin::usersmhs', ['filter' => 'role:admin','as' => 'usermhs']);
$routes->post('/admin/users/mahasiswa', 'Admin::usersmhs', ['filter' => 'role:admin']);
$routes->get('/admin/users/dosen', 'Admin::usersdosen', ['filter' => 'role:admin']);
$routes->post('/admin/users/dosen', 'Admin::usersdosen', ['filter' => 'role:admin']);

$routes->get('/admin/users/delete/mahasiswa/(:any)', 'Delete::mahasiswa/$1', ['filter' => 'role:admin']);
$routes->get('/admin/users/active/mahasiswa/(:any)', 'Active::mahasiswa/$1', ['filter' => 'role:admin']);
$routes->get('/admin/users/delete/dosen/(:any)', 'Delete::dosen/$1', ['filter' => 'role:admin']);
$routes->get('/admin/users/active/dosen/(:any)', 'Active::dosen/$1', ['filter' => 'role:admin']);
$routes->get('/admin/users/delete/staff/(:any)', 'Delete::staff/$1', ['filter' => 'role:admin']);
$routes->get('/admin/users/active/staff/(:any)', 'Active::staff/$1', ['filter' => 'role:admin']);
$routes->get('/admin/users/delete/tamu/(:any)', 'Delete::tamu/$1', ['filter' => 'role:admin']);
$routes->get('/admin/users/active/tamu/(:any)', 'Active::tamu/$1', ['filter' => 'role:admin']);

$routes->get('/admin/users/staff', 'Admin::usersstaff', ['filter' => 'role:admin']);
$routes->post('/admin/users/staff', 'Admin::usersstaff', ['filter' => 'role:admin']);

$routes->get('/admin/users/tamu', 'Admin::userstamu', ['filter' => 'role:admin']);
$routes->post('/admin/users/tamu', 'Admin::userstamu', ['filter' => 'role:admin']);

$routes->get('/admin/cards', 'Cards::index', ['filter' => 'role:admin']);
$routes->post('/admin/cards', 'Cards::index', ['filter' => 'role:admin']);

$routes->get('/admin/rooms', 'Admin::Rooms', ['filter' => 'role:admin']);
$routes->post('/admin/rooms', 'Admin::Rooms', ['filter' => 'role:admin']);

$routes->get('/admin/komplain', 'Admin::Komplain', ['filter' => 'role:admin']);
$routes->get('/admin/tambah_user/mahasiswa', 'TambahMahasiswa::index', ['filter' => 'role:admin']);
$routes->post('/admin/tambah_user/mahasiswa', 'TambahMahasiswa::index', ['filter' => 'role:admin']);
$routes->get('/admin/tambah_user/dosen', 'TambahDosen::index', ['filter' => 'role:admin']);
$routes->post('/admin/tambah_user/dosen', 'TambahDosen::index', ['filter' => 'role:admin']);
$routes->get('/admin/tambah_user/staff', 'TambahStaff::index', ['filter' => 'role:admin']);
$routes->post('/admin/tambah_user/staff', 'TambahStaff::index', ['filter' => 'role:admin']);
$routes->get('/admin/tambah_user/tamu', 'TambahTamu::index', ['filter' => 'role:admin']);
$routes->post('/admin/tambah_user/tamu', 'TambahTamu::index', ['filter' => 'role:admin']);

$routes->post('/admin/users/edit/mahasiswa', 'EditMahasiswa::index', ['filter' => 'role:admin']);
$routes->post('/admin/users/edit/dosen', 'EditDosen::index', ['filter' => 'role:admin']);
$routes->post('/admin/users/edit/staff', 'EditStaff::index', ['filter' => 'role:admin']);
$routes->post('/admin/users/edit/tamu', 'EditTamu::index', ['filter' => 'role:admin']);

$routes->get('/admin/tambah_user', 'TambahUser::index', ['filter' => 'role:admin']);
$routes->post('/admin/tambah_user', 'TambahUser::index', ['filter' => 'role:admin']);

$routes->get('/user/dashboard', 'User::Dashboard', ['filter' => 'role:user']);
$routes->get('/user/komplain', 'User::Komplain', ['filter' => 'role:user']);

$routes->post('/admin/users/upload_foto/(:any)', 'UploadFoto::index/$1', ['filter' => 'role:admin']);

$routes->get('/admin/users/belumadakartu', 'UserBelumAdaKartu::index', ['filter' => 'role:admin']);
$routes->post('/admin/users/mahasiswa/(:any)', 'Admin::usersmhs/$1', ['filter' => 'role:admin']);
$routes->post('/admin/users/dosen/(:any)', 'Admin::usersdosen/$1', ['filter' => 'role:admin']);
$routes->post('/admin/users/staff/(:any)', 'Admin::usersstaff/$1', ['filter' => 'role:admin']);
$routes->post('/admin/users/tamu/(:any)', 'Admin::userstamu/$1', ['filter' => 'role:admin']);

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
