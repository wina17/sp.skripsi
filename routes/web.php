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

Route::get('/', function () {
    return view('frontend/home');
});
Route::get('/praktikDokter', function () {
    return view('frontend/praktikDokter');
});
Route::get('/tipsInfo', function () {
    return view('frontend/tipsInfo');
});
Route::get('/sistemPakar', function () {
    return view('frontend/sistemPakar');
});
//routing halaman artikel untuk frontend
Route::get('/tipsInfo/artikelA', function () {
    return view('frontend/artikelA');
});

//routing halaman login admin backend
Route::get('/adminLogin', function () {
    return view('backend/login');
});

Route::get('/resetPass', function () {
    return view('backend/passwords/email');
});

Route::get('/admin', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/homeAdmin', 'HomeController@indexAdmin')->name('homeAdmin');
Route::get('/dataAdmin', 'HomeController@dataAdmin')->name('dataAdmin');
