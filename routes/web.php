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

Route::get('/sistemPakar/pertanyaan','SPakarController@pertanyaan');
Route::post('/simpanDiagnosa','SPakarController@simpanDiagnosa');

Route::get('/sistemPakar/hasil','SPakarController@hasil');

Route::get('/sistemPakar/index_hasil','SPakarController@indexHasil');

Route::get('/praktikDokter', function () {
    return view('frontend/praktikDokter');
});
Route::get('/tipsInfo', function () {
    return view('frontend/tipsInfo');
});

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
Route::get('/dataAdmin/edit/{id}', 'UserController@edit');
Route::post('/dataAdmin/update/{id}', 'UserController@update'); 

Route::get('/dataPenyakit', 'PenyakitController@index')->name('dataPenyakit');
Route::get('/tambahPenyakit', 'PenyakitController@tambah')->name('tambahPenyakit');
Route::post('/simpanpenyakit', 'PenyakitController@simpan');
Route::get('/dataPenyakit/hapus/{id}', 'PenyakitController@hapus');
Route::get('/dataPenyakit/edit/{id}', 'PenyakitController@edit');
Route::put('/dataPenyakit/update/{id}', 'PenyakitController@update');

Route::get('/dataGejala', 'GejalaController@index')->name('dataGejala');
Route::get('/tambahGejala', 'GejalaController@tambah')->name('tambahGejala');
Route::post('/simpangejala', 'GejalaController@simpan');
Route::get('/dataGejala/hapus/{id}', 'GejalaController@hapus');
Route::get('/dataGejala/edit/{id}', 'GejalaController@edit');
Route::put('/dataGejala/update/{id}', 'GejalaController@update');

//data aturan
Route::get('/dataAturan', 'AturanController@index')->name('dataAturan');
Route::get('/dataAturan/tambah', 'AturanController@tambah')->name('tambahAturan');
Route::post('/simpanaturan', 'AturanController@simpan');
Route::get('/dataAturan/hapus/{id}', 'AturanController@hapus');
Route::get('/dataAturan/edit/{id}', 'AturanController@edit');
Route::put('/dataAturan/update/{id}', 'AturanController@update');