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

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Barang;

//Route for Auth
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


// Route for ordinary user, user that only can meminjam and mengembalikan, admin users can visit this page
Route::group(['middleware'=>['auth','banpageadmin']],function (){
    Route::get('/', function () {return view('index');});
    Route::get('peminjaman','RequestFormController@peminjaman');
    Route::post('peminjaman','ProsesPinjamController@store');
    Route::get('pengembalian','RequestFormController@pengembalian');
    Route::post('pengembalian','ProsesKembaliController@store');
});


//Route for Admin, Only Admin can Acces this Route
Route::group(['middleware' => ['auth','adminuser'],],function(){
    Route::get('home','DataShowController@home');
    Route::get('barang/tambah','RequestFormController@tambahbarang');
    Route::post('barang/tambah','BarangController@tambah');
    Route::post('barang/tambah/jenis','BarangController@tambahjenis');
    Route::get('barang/hapus','RequestFormController@hapusbarang');
    Route::post('barang/hapus','BarangController@hapusbarang');
    Route::get('barang/data','BarangController@tampilbarang');
    Route::get('datapeminjaman','RequestFormController@datapeminjaman');
    Route::get('datapeminjaman/show','DataShowController@datapeminjaman');
    Route::get('datapeminjam','DataShowController@datapeminjam');
    Route::get('about',function (){
        return redirect("https://github.com/kode-developer/system-peminjaman-barang");
    });
});
