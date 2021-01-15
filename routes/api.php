<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/MonAn', 'APIController@index')->name('API.MonAn');

Route::get('/DanhMuc', 'APIController@DanhMuc')->name('API.DanhMuc');

Route::get('/TaiKhoan', 'APIController@TaiKhoan')->name('API.TaiKhoan');

Route::post('/CheckLogin', 'APIController@CheckLogin');

Route::post('/Create_MonAn', 'APIController@Create_MonAn');

Route::post('/Create_HuongDan', 'APIController@Create_HuongDan');

Route::get('/MonAn/{id}', 'APIController@ChiTietMonAn');

Route::get('/HuongDan/{id}', 'APIController@HuongDan'); 

Route::post('/Create_BinhLuan/{id}','APIController@Create_BinhLuan');
 
Route::get('/BinhLuan/{id}', 'APIController@BinhLuan'); 

Route::get('/TimTen','APIController@TimTen');

// Route::get('/TaiKhoan','CTNAController@APITaiKhoan')->name('API.TaiKhoan');
// Route::get('/TaiKhoan/{id}','CTNAController@store_apitaikhoan')->name('API1.TaiKhoan');

// Route::post('/TaiKhoan1','CTNAController@APITaiKhoan1')->name('API2.TaiKhoan');

// Route::get('/MonAn','CTNAController@APIMonAn')->name('API.MonAn');

//Route::get('/DanhMuc','CTNAController@APIDanhMuc')->name('API.DanhMuc');
//Route::get('/DanhMuc1/{id}','CTNAController@store')->name('store.DanhMuc');
