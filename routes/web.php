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
Route::get('/logout', 'Mah@logout')->name('/logout');
Route::get('/detail_kelompok_baru/{id_kelompok}', 'Mah@detail_kelompok_baru')->name('/detail_kelompok_baru');
Route::get('/detail_inputNilai/{id_kelompok}', 'ListNilaiAkhirController@show')->name('/detail_inputNilai');

Route::get('/profile', 'profileController@index')->name('/profile');
Route::get('/profile/edit_profil/{id}','profileController@edit')->name('/edit_profil');
Route::post('/profile/update_profil/{id}','ProfileController@update')->name('profil-update');                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          

Route::get('/daftar_nilaiAkhir', 'DaftarNilaiAkhirController@getData')->name('list.anggota');
Route::get('/daftarPenilaianPenguji', 'DaftarPenilaianPengujiController@getData')->name('list.anggota1');

Route::get('/list_nilaiAkhir', 'Mah@list_nilaiAkhir')->name('/list_nilaiAkhir');
Route::get('/detailinputNilai/{id_kelompok}', 'Mah@detail_inputNilai')->name('nilaiakhir-detail');

Route::get('/list_daftarNilaiAkhir', 'Mah@List_daftarNilaiAkhir')->name('/list_daftarNilaiAkhir');
Route::get('/list_kegiatanHarian', 'Mah@list_kegiatanHarian')->name('/list_kegiatanHarian');

Route::get('/acckegiatan/{id}/{tipe}', 'BukuHarianController@acckegiatan')->name('acckegiatan');

// tombolsave 
Route::get('/post/add/', 'ProfileController@add')->name('post.add');
Route::post('/profile/{id}', 'ProfileController@updateAvatar')->name('upload');

//buku harian
Route::get('/list_kegiatan/{id_mahasiswa}', 'BukuHarianController@index')->name('bukuharian.index');
Route::resource('company','CompanyController');
Route::resource('group','GroupController');
Route::get('/list_anggota/{id_kelompok}', 'ListNilaiAkhirController@indexAnggota')->name('group.anggota');





Route::group(['prefix' => '/table'], function () {
    Route::get('/data-group', 'GroupController@getData');
    Route::get('/data-laporan', 'LaporanController@getData');
    Route::get('/data-bukuharian-mahasiswa', 'BukuHarianController@getDataMahasiswa');
    Route::get('/data-bukuharian/{id_mahasiswa}', 'BukuHarianController@getData');
    Route::get('/data-groupNilaiAkhir', 'ListNilaiAkhirController@getData');
    Route::get('/data-daftarNilaiAkhir', 'ListDaftarNilaiAkhirController@getData');
    Route::get('/data-detail', 'ListNilaiAkhirController@detailNilai');
    Route::get('/data-detailKelompok/{id_kelompok}', 'GroupController@detailkelompok');
    Route::get('/data-nilaiAkhir/{id_mahasiswa}', 'NilaiAkhirController@getnilai');
});

Route::prefix('dosen')->group(function () {
    Route::get('/', 'DashboardController@indexadmin');
    // Route::get('/dashboard', 'Auth\LoginController@dashboard');
    Route::get('/dasboard', 'DashboardController@indexadmin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
