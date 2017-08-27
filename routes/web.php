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

Route::get('/', 'HomeController@index', function () {
    return view('home');
})->name('home');

Route::post('/store', 'HomeController@store');

Route::get('/barang', 'BarangController@index', function () {
    return view('barang');
})->name('barang');

Route::get('/barang/destroy/{id}', 'BarangController@destroy');

Route::get('/barang/edit/{id}', 'BarangController@edit');

Route::post('/barang/update', 'BarangController@update');

Route::get('/inputbarang', 'BarangController@create');

Route::post('/inputbarang/store', 'BarangController@store');

Route::get('/penjualan', 'TransaksiController@penjualan', function () {
    return view('penjualan');
})->name('penjualan');

Route::get('/stokbarang', 'StokController@index', function () {
    return view('stokbarang');
})->name('stokbarang');

Route::get('/transaksi', 'TransaksiController@index', function () {
    return view('transaksi');
})->name('transaksi');

Route::get('/barangdatang', function () {
    return view('barangdatang');
})->name('barangdatang');
