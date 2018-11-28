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
    return view('layouts.front');
});
Route::get('/login', function () {
    return view('layouts.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/about', 'FrontendController@about');
Route::get('/front', 'FrontendController@front');
Route::get('/blog', 'FrontendController@blog');
Route::get('/singleblog', 'FrontendController@singleblog');
Route::get('/shop', 'FrontendController@shop');



Route::resource('kategori', 'KategorisController');
Route::resource('barang', 'BarangController');
Route::resource('tentang', 'TentangController');
Route::resource('artikel', 'ArtikelController');
Route::resource('kategoriartikel', 'KategoriArtikelController');

Route::group(['prefix'=> 'admin', 'middleware' => ['auth','role:admin']], function(){
    Route::resource('kategori','KategorisController');
    Route::resource('barang','BarangsController');
    Route::resource('tentang','TentangsController');
    Route::resource('artikel','ArtikelsController');
    Route::resource('galeri','GalerisController');
    Route::resource('testimoni','TestimonisController');
    Route::resource('kategoriartikel','KategoriArtikelsController');
    Route::resource('tag','TagController');
});
Route::get('/contact', function () {
    return view('frontends.contact');
});


