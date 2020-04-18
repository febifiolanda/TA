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

Route::get('/profile', 'profileController@index')->name('/profile');
Route::get('/profile/edit_profil/{id}','profileController@edit')->name('/edit_profil');
Route::post('/profile/update_profil/{id}','ProfileController@update')->name('profil.update');                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          

Route::get('/daftar_nilaiAkhir', 'Mah@daftar_nilaiAkhir')->name('/daftar_nilaiAkhir');
Route::get('/list_nilaiAkhir', 'Mah@list_nilaiAkhir')->name('/list_nilaiAkhir');
Route::get('/list_kegiatanHarian', 'Mah@list_kegiatanHarian')->name('/list_kegiatanHarian');
// Route::get('/list_kegiatan', 'Mah@list_kegiatan')->name('/list_kegiatan');
Route::get('/list_kegiatan/{id_mahasiswa}', 'BukuHarianController@index');
Route::resource('company','CompanyController');
Route::resource('group','GroupController');
Route::get('/list_anggota/{id_kelompok}', 'ListNilaiAkhirController@indexAnggota')->name('group.anggota');


Route::group(['prefix' => '/table'], function () {
    Route::get('/data-group', 'GroupController@getData');
    Route::get('/data-laporan', 'LaporanController@getData');
    Route::get('/data-bukuharian-mahasiswa', 'BukuHarianController@getDataMahasiswa');
    Route::get('/data-bukuharian/{id_mahasiswa}', 'BukuHarianController@getData');
    Route::get('/data-groupNilaiAkhir', 'ListNilaiAkhirController@getData');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
