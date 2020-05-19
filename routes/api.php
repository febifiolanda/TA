<?php

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Dosen;
use App\BukuHarian;
use App\Laporan;
use App\Periode;
use App\DaftarNilaiAkhir;
use App\Group;
use App\listnilaiakhir;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// Setup CORS

    header('Access-Control-Allow-Origin:  *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, X-Token-Auth, Authorization');

    Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
 });

    Route::group(['middleware' => ['api']], function () {
    Route::resource('profile','ProfileController');
    Route::get('kelompok/detail/{id}','GroupController@api_showDetail');
 });

    Route::apiResource('laporan','LaporanController');
    Route::apiResource('dosen','ProfileController');
    Route::apiResource('bukuharian','BukuHarianController');
    Route::apiResource('daftarnilaiakhir','DaftarNilaiAkhirController');
    Route::apiResource('listdaftarnilaiakhir','ListDaftarNilaiAkhirController');
    Route::apiResource('listnilaiakhir','ListNilaiAkhirController');
   
   
    

    Route::post('login', 'UserController@login');
    Route::post('logout', 'UserController@api_logout');

//     Route::post('login', function(Request $request){
//     if(auth()->attempt([
//     'username'=>$request->input('username'),
//     'password'=>$request->input('password')
//     ])){
//     $user = auth()->user();
//     $user->api_token = Str::random(60);
//     $user->save();
//     return $user;
// }
    
//     return response()->json([
//     'status' => 'Error',
//     'massage' => 'User tidak terdaftar',
//     'code' => 401,
//     ], 401);
// });
//  Route::get('dosen/{id}', 'ProfileController@show');
// // Route::get('bukuHarian/{id}', 'BukuHarianController@show');
// Route::get('bukuharian', function(Request $request, BukuHarian $buku_harian){
//     $dailybook = $buku_harian->first();
//     return $dailybook;
// });

// Route::get('bukuharian', function(Request $request, BukuHarian $buku_harian){
//     $dailybook = $buku_harian->first();
//     return $dailybook;
// });

// Route::get('laporan', function(Request $request, Laporan $laporan){
//     $report = $laporan->first();
//     return $report;
// });

// Route::get('periode', function(Request $request, Periode $periode){
//     $period = $periode->first();
//     return $period;
// });


    

//  Dosen $dosen){
//     $lecture = $dosen->first();
//     return $lecture;
//     });
    
