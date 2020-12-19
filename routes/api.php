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
// Route::get('/TaiKhoan','CTNAController@APITaiKhoan')->name('API.TaiKhoan');
// Route::get('/TaiKhoan/{id}','CTNAController@store_apitaikhoan')->name('API1.TaiKhoan');

// Route::post('/TaiKhoan1','CTNAController@APITaiKhoan1')->name('API2.TaiKhoan');

// Route::get('/MonAn','CTNAController@APIMonAn')->name('API.MonAn');
