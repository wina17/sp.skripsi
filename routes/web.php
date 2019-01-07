<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* Rounting sisi frontend 
website untuk tamu */

Route::get('/','BerandaController@index')->name('home');

Route::get('/mulai','SPakarController@index');
Route::post('/simpanpasien','SPakarController@simpan');


// Route::get('/praktikDokter', function () {
//     return view('frontend/praktikDokter');
// });
// Route::get('/tipsInfo', function () {
//     return view('frontend/tipsInfo');
// });
// //routing halaman artikel untuk frontend
// Route::get('/tipsInfo/artikelA', function () {
//     return view('frontend/artikelA');
// });

/* Routing untuk sisi backend
website menuju administrator*/
//routing halaman login admin backend
Route::get('/adminLogin', function () {
    return view('backend/login');
});

Route::get('/adminResetPass', function () {
    return view('backend/passwords/email');
});

/* Routing sisi backend (admin)
setelah dilakukan authentikasi */
Auth::routes();

Route::get('/homeAdmin', 'HomeController@indexAdmin')->name('homeAdmin');

Route::get('/dataAdmin', 'UserController@index')->name('dataAdmin');
Route::get('/tambahAdmin', 'UserController@tambah')->name('tambahAdmin');
Route::post('/simpanadmin', 'UserController@simpan');
Route::get('/dataAdmin/hapus/{id}', 'UserController@hapus');

Route::get('/dataPenyakit', 'PenyakitController@index')->name('dataPenyakit');

Route::get('/dataGejala', 'GejalaController@index')->name('dataGejala');