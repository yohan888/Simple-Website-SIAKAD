<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

//USER
Route::get('/', function () {
    return view('home');
});
Route::get('/biodata', 'UserController@biodata');
Route::get('/hasil', 'UserController@hasil');
Route::get('/tagihan', 'UserController@tagihan');
Route::get('/registrasi', 'UserController@registrasi');
Route::get('/jadwal', 'UserController@jadwal');

Route::post('/ambilKelas', 'UserController@ambilKelas');
Route::get('/hapusJadwal/{id}', 'UserController@hapusKelas');

//ADMIN BIODATA
Route::get('/homeAdmin', 'AdminController@homeAdmin');
Route::get('/biodata_dosen', 'AdminController@biodata_Dosen');
Route::post('/tambah_matkul', 'AdminController@tambah_matkul');
Route::post('/tambah_jabatan', 'AdminController@tambah_jabatan');
Route::get('/hapus_jabatan/{id}', 'AdminController@hapus_jabatan');
Route::get('/hapus_matakuliah/{id}', 'AdminController@hapus_matakuliah');
Route::get('/view_matakuliah/{id}', 'AdminController@view_matakuliah');
Route::get('/view_jabatan/{id}', 'AdminController@view_jabatan');
Route::post('/editjabatan', 'AdminController@edit_jabatan');
Route::post('/editmatakuliah', 'AdminController@edit_matakuliah');

//HASIL STUDI
Route::get('/hasil_studi', 'AdminController@hasil_studi');
Route::get('/tambah_hasil','AdminController@tambah_hasil');
Route::post('/simpan_hasil','AdminController@simpan_hasil');

Route::get('/hapus_hasil/{id}','AdminController@hapus_hasil');

Route::post('/edit_hasil','AdminController@edit_hasil');
Route::post('/edit_hasil/{id}','AdminController@edit_hasil');

Route::post('/ubah_hasil','AdminController@ubah_hasil');

//DAFTAR MAHASISWA
Route::get('/daftar_mahasiswa', 'AdminController@daftar_mahasiswa');
Route::get('/cetak_list_mahasiswa', 'AdminController@cetak_list_mahasiswa');

//DAFTAR KELAS
Route::get('/daftar_kelas', 'AdminController@daftar_kelas');
Route::get('/tambah_kelas', 'AdminController@tambah_kelas');
Route::post('/simpan_kelas','AdminController@simpan_kelas');
Route::get('/hapus_kelas/{id}', 'AdminController@hapus_kelas');

//CETAK TAGIHAN
Route::get('/cetak_tagihan', 'UserController@cetak_tagihan');

