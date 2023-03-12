<?php

use Illuminate\Support\Facades\Route;

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
    return view('landing_page');
});

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/petugas','AuthController@indexMasyarakat')->name('masyarakat.index');
Route::get('/masyarakat/create','AuthController@create')->name('masyarakat.create');
Route::post('/masyarakat/store','AuthController@store')->name('masyarakat.store');

//indoregion
Route::post('getKota', 'AuthController@getKota')->name('getKota');//getkota
Route::post('getKecamatan', 'AuthController@getKecamatan')->name('getKecamatan');//getkemacatan
Route::post('getKelurahan', 'AuthController@getKelurahan')->name('getKelurahan');//getkelurahan          

//login dan regis
Route::get('/register', 'AuthController@getregister')->name('register')->middleware('guest');
Route::post('/register', 'AuthController@postregister')->middleware('guest');
Route::get('/login', 'AuthController@getlogin')->name('login')->middleware('guest');
Route::post('/login', 'AuthController@postlogin')->middleware('guest');
Route::get('/logout', 'AuthController@logout')->middleware('auth')->name('logout');

//pengaduan
Route::get('/pengaduan', 'MasyarakatController@index')->name('pengaduan.index');
Route::get('/pengaduan/create', 'MasyarakatController@create')->name('pengaduan.create');
Route::post('/pengaduan/store', 'MasyarakatController@store')->name('pengaduan.store');
Route::get('/pengaduan/edit/{id}', 'PengaduanController@edit')->name('pengaduan.edit');
Route::get('/pengaduan/update/{id}', 'PengaduanController@update')->name('pengaduan.update');
Route::delete('/pengaduan/delete/{id}', 'PengaduanController@destroy')->name('pengaduan.destroy');
// Route::get('pengaduan/status/{id}', 'PengaduanController@status')->name('pengaduan.status');


//tanggapan
Route::get('tanggapan', 'TanggapanController@index')->name('tanggapan.index');
Route::get('tanggapan/create', 'TanggapanController@create')->name('tanggapan.create');
Route::post('tanggapan/store', 'TanggapanController@store')->name('tanggapan.store');
Route::get('tanggapan/edit/{id}', 'TanggapanController@edit')->name('tanggapan.edit');
Route::get('tanggapan/update/{id}', 'TanggapanController@update')->name('tanggapan.update');
Route::delete('tanggapan/delete/{id}', 'TanggapanController@destroy')->name('tanggapan.destroy');
