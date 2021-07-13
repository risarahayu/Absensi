<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'HomeController@index')->name('login');

Route::get('/bulan', 'riwayatAbsenGuruController@time');

Route::post('absen/store', 'AbsenController@store');

Route::view('login', 'login');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jadwal', 'jadwalController@show');
Route::get('/tambahJadwal', 'jadwalController@add');
Route::post('/jadwal/store', 'jadwalController@store');
Route::get('/jadwal/time', 'jadwalController@time');
Route::get('/jadwal/{id}/edit', 'jadwalController@edit');
Route::patch('/jadwal/{id}', 'jadwalController@update');
Route::post('/jadwal/ajax', 'jadwalController@getAllFields');
Route::get('/jadwalGuru', 'jadwalController@jadwal_sesuai_guru');
Route::get('/updateBio/{user_id}/edit', 'userController@edit');
Route::patch('/profile/{user_id}/update', 'userController@update');
Route::get('/profile', 'userController@show');
Route::get('/searchAbsen', 'searchController@searchAbsen');
Route::get('/searchTanggal', 'searchController@searchTanggal');
Route::get('/searchJadwal', 'searchController@searchJadwal');
Route::get('/searchGuru', 'searchController@searchDaftarGuru');
Route::get('/searchRiwayat', 'searchController@searchRiwayat');
// Route::get('/searchRekap', 'searchController@searchRekap');
// Route::get('/searchDetail', 'searchController@searchDetail');
Route::get('/searchJadwalGuru', 'searchController@searchJadwalGuru');
Route::get('/detailAbsen/{id}', 'riwayatAbsenGuruController@detailAbsen');
Route::get('/jadwal_guru_hari_ini', 'jadwalController@jadwalHariIni');
Route::delete('/jadwal/{id}/hapus', 'jadwalController@hapus');
Route::get('/cetak/{id}', 'riwayatAbsenGuruController@cetak');
Route::get('/lihat', 'riwayatAbsenGuruController@lihat');
Route::get('/lihat1', 'riwayatAbsenGuruController@lihat1');
Route::get('/detailBulan/{user_id}', 'riwayatAbsenGuruController@detailBulan');
Route::get('/search_gaji_bulan', 'riwayatAbsenGuruController@detailBulan');
Route::get('/detailSearch', 'riwayatAbsenGuruController@detailBulanSearch');
Route::get('/search_gaji', 'riwayatAbsenGuruController@cari_gaji_bulanan');










// Route::get('/profileGuru/{user_id}/show', 'userController@profileGuru');
// Route::get('/profileGuru/detail', 'userController@detail');






// Route::group(['middleware' => 'auth'], function () {
// });

Route::get('/coba', function () {
    // return Auth::user();
    $akun = Auth::user();
    return $akun;
});
Route::get('/homepage', 'AbsenController@homepage')->name('homepage');
Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
    Route::get('/daftar_guru', 'daftarGuruController@daftarGuru');
    Route::get('/daftar_riwayat_guru', 'riwayatAbsenGuruController@riwayatAbsen');
    Route::get('/rekap_gaji_guru', 'riwayatAbsenGuruController@rekapGaji');
    Route::get('/detail/{user_id}', 'riwayatAbsenGuruController@detail');
    Route::get('/dashboard', 'dashboardController@index');
});

Route::group(['middleware' => ['auth', 'ceklevel:guru']], function () {
    Route::get('absen', 'AbsenController@new_absen')->name('absen');
    Route::get('/riwayat', 'AbsenController@index');
    Route::get('/gaji', 'AbsenController@gaji');
});

Route::group(['middleware' => ['auth', 'ceklevel:guru, admin']], function () {

    Route::get('/editBio', 'EditBioController@edit');
});


Route::get('coba', 'riwayatAbsenGuruController@coba');
