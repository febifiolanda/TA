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
    return view('layout.welcome');
});
Route::get('/kelompok', 'Mah@index')->name('/kelompok');
Route::get('/profile', 'Mah@indexprofile')->name('/profile');
Route::get('/detail_kelompok', 'Mah@detailkelompok')->name('/detail_kelompok');
Route::get('/detail_nilai', 'Mah@detailnilai')->name('/detail_nilai');
Route::get('/detail_nilai_penguji', 'Mah@nilaipenguji')->name('/detail_nilai_penguji');
Route::get('/input_nilai', 'Mah@inputnilai_dosen')->name('/input_nilai');
Route::get('/inputNilai_penguji', 'Mah@inputNilai_penguji')->name('/inputNilai_penguji');
Route::get('/dashboard', 'Mah@dashboard')->name('/dashboard');
Route::get('/laporan', 'Mah@laporan')->name('/laporan');
Route::get('/nilai_akhir', 'Mah@nilai_akhir')->name('/nilai_akhir');
Route::get('/login', 'Mah@login')->name('/login');
Route::get('/detail_inputNilai', 'Mah@detail_inputNilai')->name('/detail_inputNilai');
Route::get('/edit_profil', 'Mah@edit_profil')->name('/edit_profil');
Route::get('/daftar_nilaiAkhir', 'Mah@daftar_nilaiAkhir')->name('/daftar_nilaiAkhir');
Route::get('/list_kegiatanHarian', 'Mah@list_kegiatanHarian')->name('/list_kegiatanHarian');

Route::resource('company','CompanyController');
Route::resource('group','GroupController');



